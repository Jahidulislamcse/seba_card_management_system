@extends('SuperAdmin.layouts.app')

@section('content')
    <style>
        .card-inp {
            >form {
                >input {
                    outline: none;
                    padding: 5px;
                    border-radius: 5px;
                    border: 1px solid rgb(139, 139, 139);
                }
            }
        }
    </style>
    <div class="">
        <p class="p-2 m-0 fw-bold">কার্ড রেকু‌য়েস্ট</p>
        <div class="user-table mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>ক্র: নং</th>
                        <th>কার্ড নাম্বার</th>
                        <th>প্রাইস এন্ট্রি</th>
                        <th>একশন</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cards as $key => $card)
                        <tr>
                            <td class="center-item">{{ $key + 1 }}</td>
                            <td class="center-item">{{ $card->card_number }}</td>
                            <td class="center-item card-inp">
                                <input type="text" class="form-control" id="price-{{ $card->id }}" placeholder="price"
                                    value="{{ $card->price }}">
                            </td>
                            <td class="center-item status-btn">
                                <!-- Approve Button -->
                                <button type="button" class="approved-btn btn-sm" data-card-id="{{ $card->id }}"
                                    data-price-id="price-{{ $card->id }}">
                                    Approved
                                </button>
                                <!-- Delete Form -->
                                <form action="{{ route('cards.destroy', $card->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this card?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('styles')
    <script src="{{ asset('backend/js/core/jquery-3.7.1.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('SuperAdmin/assets/css/index.css') }}">

    <script>
        $(document).ready(function() {
            $('.approved-btn').on('click', function() {
                var cardId = $(this).data('card-id');
                var priceInputId = $(this).data('price-id');
                var price = $('#' + priceInputId).val();

                if (price && !isNaN(price)) {
                    $.ajax({
                        url: '/cards/' + cardId + '/approve',
                        method: 'POST',
                        data: {
                            price: price,
                            _token: $('meta[name="csrf-token"]').attr(
                                'content')
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content')
                        },
                        success: function(response) {
                            if (response.success) {

                                location
                                    .reload();
                                alert('Status updated successfully.');
                            } else {
                                alert('Failed to update the price.');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error details:", xhr.responseText);
                            alert('An error occurred while approving the card.');
                        }
                    });
                } else {
                    alert('Please enter a valid price.');
                }
            });
        });
    </script>
@endpush
