@extends('dashboard')
@section('main')
    <div class="container">
        <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
        <h2>Cards List</h2>
        <button class="btn btn-primary" id="createNewCard">Create Card</button>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Card Number</th>
                    <th>Price</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Ward Admin</th>
                </tr>
            </thead>
            <tbody id="cardTable">
                @foreach ($cards as $card)
                    <tr id="row_{{ $card->id }}">
                        <td>{{ $card->id }}</td>
                        <td>{{ $card->card_number }}</td>
                        <td>{{ $card->price }}</td>
                        <td>{{ $card->start_date }}</td>
                        <td>{{ $card->end_date }}</td>
                        <td>{{ $card->status }}</td>
                        <td>
                            {{ $card->wardAdmin->name }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Bootstrap Modal -->
    <div class="modal fade" id="cardModal" tabindex="-1" aria-labelledby="cardModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cardModalLabel">Create Card</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('cards.store') }}" id="cardForm" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Select Ward Admin</label>
                            <select name="assign_id" id="" class="form-control" required>
                                <option value="">Select Word Admin</option>
                                @foreach ($ward_admins as $admin)
                                    <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Card Number(Min:6 & Max:6)</label>
                            <input type="text" id="card_number" name="card_number" class="form-control" minlength="6"
                                maxlength="6" pattern="\d{6}" placeholder="Please enter exactly 6 digits" required>

                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" id="price" name="price" class="form-control"
                                placeholder="Please enter price" required>
                        </div>
                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="date" id="start_date" name="start_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>End Date</label>
                            <input type="date" id="end_date" name="end_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select id="status" class="form-control" name="status" required>
                                <option value="pending">Pending</option>
                                <option value="active">Active</option>
                                <option value="expired">Expired</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success" id="saveBtn">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#createNewCard').click(function() {
                $('#cardForm')[0].reset();
                $('#card_id').val('');
                $('#cardModalLabel').text('Create Card');
                $('#cardModal').modal('show');
            });
        });
    </script>
@endpush
