<table class="display table table-striped table-hover">
    <thead>
    <tr>
        <th>SN</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Religion</th>
        <th>Occupation</th>
        <th>Divisions</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @if($customers->count() > 0)
        @foreach ($customers as $key => $customer)
            <tr >
                <td>{{ $key + 1 }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->gender }}</td>
                <td>{{ $customer->religion }}</td>
                <td>{{ $customer->occupation }}</td>
                <td>Divisions</td>
                <td>Divisions</td>
                <td>
                    <!-- Edit Button -->
                    <button class="btn btn-sm btn-primary edit-btn" data-id="{{ $customer->id }}">Edit</button>

                    <!-- Delete Button -->
                    <form action="" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
