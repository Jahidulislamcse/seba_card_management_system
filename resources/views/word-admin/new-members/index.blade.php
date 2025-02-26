@extends('word-admin.layouts.app')

@section('content')
<div class="page-inner">

                </div>
                <!-- Users Table -->
                <div>
                    <form id="search-filter-form" method="GET"
                          class="d-flex justify-content-between align-items-center m-3">
                        <div class="d-flex align-items-center">
                            <select name="per_page" id="per_page" class="form-control form-control-sm"
                                    style="width: auto;">
                                <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10
                                </option>
                                <option value="15" {{ request('per_page') == 15 ? 'selected' : '' }}>15
                                </option>
                                <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20
                                </option>
                                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50
                                </option>
                            </select>
                        </div>
                        <div class="d-flex align-items-center">
                            <select name="order_by" id="order_by" class="form-control form-control-sm"
                                    style="width: auto; margin-left: 10px;">
                                <option value="asc" {{ request('order_by') == 'asc' ? 'selected' : '' }}>Name
                                    (A-Z)</option>
                                <option value="desc" {{ request('order_by') == 'desc' ? 'selected' : '' }}>
                                    Name (Z-A)</option>
                            </select>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="input-group">
                                <input type="text" id="search" name="search"
                                       class="form-control form-control" placeholder="Enter keyword...">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">

                    <div id="data-container">
                        @include('word-admin.new-members.member_table')
                    </div>

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
                                    <th>Image</th>
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
                                        <td><img src="{{ $customer->avatar_url }}" alt="Customer Avatar" width="50"></td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->gender }}</td>
                                        <td>{{ $customer->religion }}</td>
                                        <td>{{ $customer->occupation }}</td>
                                        <td>{{$customer?->division?->name}}</td>
                                        <td>
                                            {!! $customer->status_html() !!}
                                        </td>
                                        <td>
                                            <!-- Edit Button -->
                                            <a href="{{route('ward.new-members.edit', $customer->id)}}" class="btn btn-sm btn-primary edit-btn" >Edit</a>

                                            <!-- Delete Button -->
                                            <form action="{{route('ward.new-members.destroy', $customer->id)}}" method="POST" style="display: inline-block;">
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
