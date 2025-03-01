@extends('word-admin.layouts.app')

@section('content')
    <div class="py-5">
        <!-- user table -->
        <h6 class="all-user">মোট - {{ $cards->count() }} </h6>
        <form action="{{ route('ward.new-members.index') }}" method="GET" class="search-user-area">
            <input type="text" name="search" id="searchCard" class="form-control w-100" placeholder="Search by Card Number"
                value="">
        </form>
        <div class="user-table">
            <table class="all-user-table table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>C.Number</th>
                        <th>Price</th>
                        <th>S.Date</th>
                        <th>E.Date</th>
                        <th>Status</th>
                        <th>Distributor</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody id="cardTable">
                    @if (count($cards) > 0)
                        @foreach ($cards as $index => $card)
                            <tr id="row_{{ $card->id }}">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $card->card_number }}</td>
                                <td>{{ $card->price }}</td>
                                <td>{{ $card->start_date }}</td>
                                <td>{{ $card->end_date }}</td>
                                <td>{{ $card->status }}</td>
                                <td>
                                    <button class="btn btn-info btn-sm toggle-details" data-id="{{ $card->wardAdmin->id }}">
                                        {{ $card->wardAdmin->name }}
                                    </button>
                                    <div class="details-section mt-2 d-none" id="details_{{ $card->wardAdmin->id }}">
                                        <strong>Division:</strong> {{ $card->wardAdmin->division->name ?? 'N/A' }} <br>
                                        <strong>District:</strong> {{ $card->wardAdmin->district->name ?? 'N/A' }} <br>
                                        <strong>Upazila:</strong> {{ $card->wardAdmin->upazila->name ?? 'N/A' }} <br>
                                        <strong>Union:</strong> {{ $card->wardAdmin->union->name ?? 'N/A' }} <br>
                                        <strong>Ward:</strong> {{ $card->wardAdmin->ward->name ?? 'N/A' }}
                                    </div>
                                </td>
                                {{-- <td>
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
                            </td> --}}
                            </tr>
                            <!-- Hidden Edit Section -->
                            <tr id="edit_section_{{ $card->id }}" class="d-none">
                                <td colspan="7">
                                    <form class="editCardForm" data-id="{{ $card->id }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input type="text" class="form-control card_number"
                                                    value="{{ $card->card_number }}" name="card_number" required
                                                    pattern="\d{6}" minlength="6" maxlength="6">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" class="form-control price"
                                                    value="{{ $card->price }}" name="price" required>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="date" class="form-control start_date"
                                                    value="{{ $card->start_date }}" name="start_date" required>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="date" class="form-control end_date"
                                                    value="{{ $card->end_date }}" name="end_date" required>
                                            </div>
                                            <div class="col-md-2">
                                                <select class="form-control status" name="status">
                                                    <option value="pending"
                                                        {{ $card->status == 'pending' ? 'selected' : '' }}>
                                                        Pending</option>
                                                    <option value="active"
                                                        {{ $card->status == 'active' ? 'selected' : '' }}>
                                                        Active</option>
                                                    <option value="expired"
                                                        {{ $card->status == 'expired' ? 'selected' : '' }}>
                                                        Expired</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-success btn-sm saveEditBtn"
                                                    data-id="{{ $card->id }}">
                                                    Save Changes
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
                    @endif
                </tbody>
            </table>
            {!! $cards->links() !!}
        </div>
    </div>

    <!-- user table -->
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/MemberList.css') }}">
@endpush
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#searchCard').on('keyup', function() {
                var query = $(this).val().toLowerCase();
                // alert(searchCard);
                $('#cardTable tr').each(function() {
                    var cardNumber = $(this).find('td:nth-child(2)').text().toLowerCase();

                    if (cardNumber.includes(query) || query === '') {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>
@endpush
