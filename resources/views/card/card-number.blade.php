@extends('SuperAdmin.layouts.app')

@section('content')
    <style>
        .delete-btn {
            border: none;
            color: #fff;
            font-size: 11px;
            font-weight: 550;
            background-color: #BB2D3B;
            border-radius: 5px;
            font-family: "Poppins", serif;
        }

        .card-number-table {
            min-width: 0px;
        }
    </style>
    <div>
        <h6 class="p-2 fw-bold">কার্ড নাম্বার লিস্ট</h6>
        <div class="user-table mt-3">
            <table class="table card-number-table">
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
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $card->card_number }}</td>
                            <td>{{ $card->price }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning toggle-edit" data-id="{{ $card->id }}">
                                    Edit
                                </button>
                                <form action="{{ route('cards.destroy', $card->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this card?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <tr id="edit_section_{{ $card->id }}" class="d-none bg-light border">
                            <td colspan="4">
                                <form class="editCardForm p-3" data-id="{{ $card->id }}">
                                    @csrf
                                    <div class="row align-items-center">
                                        <div class="col-md-3">
                                            <label><strong>Card</strong></label>
                                            <input type="text" class="form-control card_number"
                                                value="{{ $card->card_number }}" name="card_number" required pattern="\d{6}"
                                                minlength="6" maxlength="6">
                                        </div>
                                        <div class="col-md-3">
                                            <label><strong>Price</strong></label>
                                            <input type="number" class="form-control price" value="{{ $card->price }}"
                                                name="price" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label><strong>Status</strong></label>
                                            <select class="form-control status" name="status">
                                                <option value="pending" {{ $card->status == 'pending' ? 'selected' : '' }}>
                                                    Pending
                                                </option>
                                                <option value="active" {{ $card->status == 'active' ? 'selected' : '' }}>
                                                    Active
                                                </option>
                                                <option value="expired" {{ $card->status == 'expired' ? 'selected' : '' }}>
                                                    Expired
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mt-4">
                                            <button type="button" class="btn btn-success btn-sm saveEditBtn"
                                                data-id="{{ $card->id }}">
                                                Update
                                            </button>
                                            <button type="button" class="btn btn-secondary btn-sm cancelEditBtn"
                                                data-id="{{ $card->id }}">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                {{ $cards->links() }}
            </table>
        </div>
    </div>
@endsection
@push('styles')
    <script src="{{ asset('backend/js/core/jquery-3.7.1.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('SuperAdmin/assets/css/index.css') }}">

    <script>
        $(document).ready(function() {
            // Toggle Edit Section
            $('.toggle-edit').click(function() {
                var id = $(this).data('id');
                $('#edit_section_' + id).toggleClass('d-none');
            });

            // Cancel Editing
            $('.cancelEditBtn').click(function() {
                var id = $(this).data('id');
                $('#edit_section_' + id).addClass('d-none');
            });

            // Save Edited Data via AJAX
            $('.saveEditBtn').click(function() {
                var id = $(this).data('id');
                var form = $('.editCardForm[data-id="' + id + '"]');

                var formData = {
                    _token: "{{ csrf_token() }}",
                    card_number: form.find('.card_number').val(),
                    price: form.find('.price').val(),
                    status: form.find('.status').val(),
                };

                $.ajax({
                    url: "{{ url('cards/update') }}/" + id,
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        alert(response.message);
                        location.reload(); // Refresh page to show updated values
                    },
                    error: function(xhr) {
                        alert("Error updating card!");
                    }
                });
            });
        });
    </script>
@endpush
