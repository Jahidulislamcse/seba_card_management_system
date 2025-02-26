@extends('word-admin.layouts.app')

@section('content')
<div class="page-inner">
    <div class="row justify-content-center">
        <div class="col-md-10">
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
            <div class="card">
                <div class="card-body">
                    <!-- Toggle Buttons -->
                    <div class="mb-4">
                        <a href="{{route('ward.new-members.create')}}" class="btn btn-primary ">Create</a>
                    </div>
                    <!-- Users Table -->
                    <div class="table-responsive">
                        <div id="data-container">
                            @include('word-admin.new-members.member_table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
