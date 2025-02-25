@extends('word-admin.layouts.app')

@section('content')
<div class="page-inner">

    <div class="row justify-content-center">
        
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <!-- Toggle Buttons -->
                    <div class="mb-4">
                        <a href="{{route('ward.new-members.create')}}" class="btn btn-primary ">Create</a>

                    </div>



                    <!-- Users Table -->
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
