<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0 text-center">Registration</h4>
                </div>
            </div>
            <div class="card-body p-4">
                <form id="user-registration-form" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <!-- Name -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="name" class="font-weight-bold">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                        </div>

                        <!-- Role -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="role" class="font-weight-bold">Role</label>
                                <select name="role" id="role" class="form-control" required>
                                    <option value="admin">Admin</option>
                                    <option value="dis_admin">District Admin</option>
                                    <option value="upo_admin">Upozila Admin</option>
                                    <option value="uni_admin">Union Admin</option>
                                    <option value="ward_admin">Ward Admin</option>
                                </select>
                            </div>
                        </div>

                        <!-- Father's Name -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="father" class="font-weight-bold">Father's Name</label>
                                <input type="text" name="father" id="father" class="form-control">
                            </div>
                        </div>

                        <!-- Birth Date -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="birth_date" class="font-weight-bold">Birth Date</label>
                                <input type="date" name="birth_date" id="birth_date" class="form-control">
                            </div>
                        </div>

                        <!-- NID -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="nid" class="font-weight-bold">NID</label>
                                <input type="text" name="nid" id="nid" class="form-control">
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="phone" class="font-weight-bold">Phone</label>
                                <input type="tel" name="phone" id="phone" class="form-control" required pattern="^\+[0-9]{8,15}$" title="Phone number must start with + and contain only numbers (8-15 digits)">
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="email" class="font-weight-bold">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                        </div>

                        <!-- Division -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="division" class="font-weight-bold">Division</label>
                                <select name="division" id="division" class="form-control" required>
                                    <option value="">Select Division</option>
                                    @foreach($division as $div)
                                        <option value="{{ $div->id }}">{{ $div->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- District -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="district" class="font-weight-bold">District</label>
                                <select name="district" id="district" class="form-control" required>
                                    <option value="">Select District</option>
                                </select>
                            </div>
                        </div>

                        <!-- Upozila -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="upozila" class="font-weight-bold">Upozila</label>
                                <select name="upozila" id="upozila" class="form-control" required>
                                    <option value="">Select Upozila</option>
                                </select>
                            </div>
                        </div>

                        <!-- Union -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="union" class="font-weight-bold">Union</label>
                                <select name="union" id="union" class="form-control" required>
                                    <option value="">Select Union</option>
                                </select>
                            </div>
                        </div>

                        <!-- Ward -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="ward" class="font-weight-bold">Ward</label>
                                <input type="text" name="ward" id="ward" class="form-control">
                            </div>
                        </div>

                        <!-- File Uploads -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="photo" class="font-weight-bold">Photo</label>
                                <input type="file" name="photo" id="photo" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="nid_front" class="font-weight-bold">NID Front</label>
                                <input type="file" name="nid_front" id="nid_front" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="nid_back" class="font-weight-bold">NID Back</label>
                                <input type="file" name="nid_back" id="nid_back" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="cv" class="font-weight-bold">CV</label>
                                <input type="file" name="cv" id="cv" class="form-control">
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="password" class="font-weight-bold">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                        </div>

                    </div>

                    <!-- Buttons -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary px-5 py-2">Register</button>
                        <button type="button" id="cancel-registration" class="btn btn-secondary px-5 py-2">Cancel</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('phone').addEventListener('input', function(e) {
        // Remove any character that is not a number or '+'
        this.value = this.value.replace(/[^0-9+]/g, '');

        // Ensure it always starts with '+'
        if (!this.value.startsWith('+')) {
            this.value = '+' + this.value.replace(/\+/g, ''); // Removes extra '+'
        }
    });
</script>
<script>
    $(document).ready(function() {
        // Fetch districts based on division selection
        $('#division').change(function() {
            var divisionId = $(this).val();
            if (divisionId) {
                $.ajax({
                    url: '/get-districts/' + divisionId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#district').empty().append('<option value="">Select District</option>');
                        $.each(data, function(key, value) {
                            $('#district').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                        $('#upozila').empty().append('<option value="">Select Upozila</option>'); // Reset upozila dropdown
                    }
                });
            } else {
                $('#district').empty().append('<option value="">Select District</option>');
                $('#upozila').empty().append('<option value="">Select Upozila</option>');
            }
        });

        // Fetch upozilas based on district selection
        $('#district').change(function() {
            var districtId = $(this).val();
            if (districtId) {
                $.ajax({
                    url: '/get-upozilas/' + districtId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#upozila').empty().append('<option value="">Select Upozila</option>');
                        $.each(data, function(key, value) {
                            $('#upozila').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#upozila').empty().append('<option value="">Select Upozila</option>');
            }
        });

        // Fetch Union based on upozila selection
        $('#upozila').change(function() {
            var upozilaId = $(this).val();
            if (upozilaId) {
                $.ajax({
                    url: '/get-unions/' + upozilaId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#union').empty().append('<option value="">Select union</option>');
                        $.each(data, function(key, value) {
                            $('#union').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#union').empty().append('<option value="">Select union</option>');
            }
        });
    });
</script>


<script>
    $(document).ready(function() {
        // Show all users by default
        $('tbody tr').show();

        // Toggle button click event
        $('.toggle-btn').click(function() {
            const role = $(this).data('role'); // Get the role from the button

            // Hide all rows
            $('tbody tr').hide();

            // Show rows with the selected role
            $(`tbody tr[data-role="${role}"]`).show();

            // Show "Add New" button and hide registration form for vendors and admins
            if (role === 'super_admin' || role === 'admin' || role === 'dis_admin' || role === 'upo_admin' || role === 'uni_admin' || role === 'ward_admin') {
                $('#add-new-section').show();
                $('#registration-form').hide(); // Hide registration form
            } else {
                // Hide both "Add New" button and registration form for customers
                $('#add-new-section').hide();
                $('#registration-form').hide();
            }

            // Set the role in the registration form
            $('#role').val(role);
        });

        // Show registration form when "Add New" button is clicked
        $('#add-new-btn').click(function() {
            $('#registration-form').show();
            $('#add-new-section').hide();
        });

        // Hide registration form when "Cancel" button is clicked
        $('#cancel-registration').click(function() {
            $('#registration-form').hide();
            $('#add-new-section').show();
        });

        // Edit Button Click Event
        $('.edit-btn').click(function() {
            const userId = $(this).data('id');
            const editUrl = ``; // Route to fetch user data
            const $row = $(this).closest('tr'); // Get the current row

            // Remove any existing edit forms
            $('.edit-form').remove();

            // Fetch user data via AJAX
            $.ajax({
                url: editUrl,
                method: 'GET',
                success: function(response) {
                    // Create the edit form HTML
                    const editForm = `
                        <tr class="edit-form">
                            <td colspan="7">
                                <form action="" method="POST" class="p-3 bg-light">
                                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit-name">Name</label>
                                <input type="text" name="name" id="edit-name" class="form-control" value="${response.name}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="edit-email">Email</label>
                                                <input type="email" name="email" id="edit-email" class="form-control" value="${response.email}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="edit-phone">Phone</label>
                                                <input type="text" name="phone" id="edit-phone" class="form-control" value="${response.phone_number}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="edit-address">Address</label>
                                                <input type="text" name="address" id="edit-address" class="form-control" value="${response.address}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="edit-role">Role</label>
                                                <select name="role" id="edit-role" class="form-control" required>
                                                    <option value="vendor" ${response.role === 'vendor' ? 'selected' : ''}>Vendor</option>
                                                    <option value="admin" ${response.role === 'admin' ? 'selected' : ''}>Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <button type="button" class="btn btn-secondary cancel-edit">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    `;

                    // Insert the edit form below the current row
                    $row.after(editForm);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching user data:', error);
                }

            });
        });

        // Cancel Edit Button Click Event
        $(document).on('click', '.cancel-edit', function() {
            $('.edit-form').remove(); // Remove the edit form
        });
    });
</script>
</body>
</html>
