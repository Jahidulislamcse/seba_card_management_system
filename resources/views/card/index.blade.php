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
                <th>Action</th>
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

                <td>
                    <button class="btn btn-sm btn-warning toggle-edit" data-id="{{ $card->id }}">
                        Edit
                    </button>

                    <form action="{{ route('cards.destroy', $card->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this card?');">Delete</button>
                    </form>
                </td>
            </tr>
            <!-- Hidden Edit Section -->
            <tr id="edit_section_{{ $card->id }}" class="d-none">
                <td colspan="7">
                    <form class="editCardForm" data-id="{{ $card->id }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <input type="text" class="form-control card_number" value="{{ $card->card_number }}" name="card_number" required pattern="\d{6}" minlength="6" maxlength="6">
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control price" value="{{ $card->price }}" name="price" required>
                            </div>
                            <div class="col-md-2">
                                <input type="date" class="form-control start_date" value="{{ $card->start_date }}" name="start_date" required>
                            </div>
                            <div class="col-md-2">
                                <input type="date" class="form-control end_date" value="{{ $card->end_date }}" name="end_date" required>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control status" name="status">
                                    <option value="pending" {{ $card->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="active" {{ $card->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="expired" {{ $card->status == 'expired' ? 'selected' : '' }}>Expired</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success btn-sm saveEditBtn" data-id="{{ $card->id }}">
                                    Save Changes
                                </button>
                                <button type="button" class="btn btn-secondary btn-sm cancelEditBtn" data-id="{{ $card->id }}">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
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

<script>
    $(document).ready(function() {
        $('.toggle-details').click(function() {
            var id = $(this).data('id');
            $('#details_' + id).toggleClass('d-none');
        });
    });
</script>

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
                start_date: form.find('.start_date').val(),
                end_date: form.find('.end_date').val(),
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
