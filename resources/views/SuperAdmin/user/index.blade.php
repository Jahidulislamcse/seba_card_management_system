@extends('SuperAdmin.layouts.app')

@section('content')

<div class="tab-btns">
    <button type="button"  class="buttons {{ in_array($tab, ['ward_admins', 'union_admins', 'upozila_admins', 'district_admins']) ? 'active-btn' : '' }} ">ইউজার লিস্ট</button>
    <button type="button" class="buttons {{$tab == 'pending_admins' ? 'active-btn' : ''}}" >পেনডিং ইউজার</button>
</div>
{{-- {{dd(request('ward_admins') )}} --}}
<div class="contents {{ in_array($tab, ['ward_admins', 'union_admins', 'upozila_admins', 'district_admins']) ? 'active_section' : '' }} ">
    <div class="tab-btns">
        <button type="button" class="user-list-btn  {{$tab == 'ward_admins' ? 'active-btn' : ''}} ">ওর্য়াড ইউজার</button>
        <button type="button" class="user-list-btn {{$tab == 'union_admins' ? 'active-btn' : ''}}  ">ইউনিয়ন ইউজার</button>
        <button type="button" class="user-list-btn {{$tab == 'upozila_admins' ? 'active-btn' : ''}} ">উপজেলা ইউজার</button>
        <button type="button" class="user-list-btn  {{$tab == 'district_admins' ? 'active-btn' : ''}}" >জেলা ইউজার</button>
    </div>

    <!-- ওর্য়াড এডমিন -->
    {{-- <div class="user-content active_user_section "> --}}
    <div class="user-content {{$tab == 'ward_admins' ? 'active_user_section' : ''}} ">
        <h6 class="all-user">মোট - {{$approved_ward_admins->total()}} জন</h6>
        <form action="{{route('super-admin.user.manage')}}" class="search-user-area" method="GET">
            <input type="hidden" name="tab" value="ward_admins">
            <input type="text" name="search" id="search-user" placeholder="mobile number/id no" value="{{$tab == 'ward_admins' ? $search ?? '' : ''}}">
            <button type="submit" class="button">Submit</button>
        </form>

        <!-- user table -->
        <div class="user-table">
            <table class="table user-manage-table">
                <thead>
                    <tr>
                        <th>ক্রমিক নং</th>
                        <th>ছবি</th>
                        <th>ইউজার নাম ও আইডি</th>
                        <th>মোবাইল নং</th>
                        <th>ওয়ার্ড</th>
                        <th>ইডিট/ডিলিট</th>
                        <th>এক্টিভ/ডিএক্টিভ</th>
                    </tr>
                </thead>
                <tbody>
                    @if($approved_ward_admins->count() > 0)
                    @foreach($approved_ward_admins as $ward_admin)
                    <tr>
                        <td><div class="center-item">{{$loop->iteration}}</div></td>
                        <td class="user-picture">
                            <img src="{{ $ward_admin->photo_url }}" alt="{{$ward_admin->name}}">
                        </td>
                        <td class="user-name-id">
                            <h6>{{$ward_admin->name}}</h6>
                            <p>{{$ward_admin->id_no}}</p>
                        </td>
                        <td><div class="center-item">{{$ward_admin->phone}}</div></td>
                        <td><div class="center-item">{{$ward_admin->ward}}</div></td>
                        <td>
                            <div class="edit-delete-btn">
                                <button type="button" class="edit-btn">Edit</button>
                                <!-- Delete Button -->
                                <form action="{{ route('user.destroy', $ward_admin->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                    {{-- <button type="button" class="delete-btn">Delete</button> --}}
                                </form>

                                <button type="button" onclick="window.location.href = '{{ route('super-admin.users.show', $ward_admin->id) }}'" class="edit-btn">View More</button>
                            </div>
                        </td>
                        <td>
                            <div class="status-btn">
                                <div class="form-check form-switch">
                                    <input class="form-check-input active_status_switch" data-userid="{{$ward_admin->id}}" type="checkbox" role="switch"  {{$ward_admin->active_status == STATUS_ACTIVE ? 'checked' : ''}}>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            <div style="margin-bottom:20%; margin-top:10px;">
                @php $total_page = !request('total') ?  $approved_ward_admins->total() : $total; @endphp
                {!! $approved_ward_admins->appends([
                    'ward_admins_page' => request('ward_admins_page'),
                    'tab' => 'ward_admins',
                    'total' => $total
                ])->links('vendor.pagination.bootstrap-5', ['total' => $total_page,'tab' => 'ward_admins']) !!}
                </div>
        </div>

    </div>


    <!-- ইউনিয়ন এডমিন -->
    <div class="user-content {{$tab == 'union_admins' ? 'active_user_section' : ''}}">
        <h6 class="all-user">মোট - {{$approved_union_admins->total()}} জন</h6>
        <form action="{{route('super-admin.user.manage')}}"  class="search-user-area"  method="GET">
            <input type="hidden" name="tab" value="union_admins">
            <input type="text" name="search" id="search-user" placeholder="mobile number/id" value="{{$tab == 'union_admins' ? $search ?? '' : ''}}">
            <button type="submit" class="button">Submit</button>
        </form>

        <!-- user table -->
        <div class="user-table">
            <table class="table user-manage-table">
                <thead>
                    <tr>
                        <th>ক্রমিক নং</th>
                        <th>ছবি</th>
                        <th>ইউজার নাম ও আইডি</th>
                        <th>মোবাইল নং</th>
                        <th>বিভাগ</th>
                        <th>জেলা</th>
                        <th>উপজেলা</th>
                        <th>ইউনিয়ন</th>
                        <th>ইডিট/ডিলিট</th>
                        <th>এক্টিভ/ডিএক্টিভ</th>
                    </tr>
                </thead>
                <tbody>
                    @if($approved_union_admins->count() > 0)
                    @foreach($approved_union_admins as $admin)
                    <tr>
                        <td><div class="center-item">{{$loop->iteration}}</div></td>
                        <td class="user-picture">
                            <img src="{{ $admin->photo_url }}" alt="{{$admin->name}}">
                        </td>
                        <td class="user-name-id">
                            <h6>{{$admin->name}}</h6>
                            <p>{{$admin->id_no}}</p>
                        </td>
                        <td><div class="center-item">{{$admin->phone}}</div></td>

                        <td><div class="center-item">{{$admin?->division->name ?? ''}}</div></td>
                        <td><div class="center-item">{{$admin?->district->name ?? ''}}</div></td>
                        <td><div class="center-item">{{$admin?->upazila->name ?? ''}}</div></td>
                        <td><div class="center-item">{{$admin?->union->name ?? ''}}</div></td>
                        <td>
                            <div class="edit-delete-btn">
                                <button type="button" class="edit-btn">Edit</button>
                                <!-- Delete Button -->
                                <form action="{{ route('user.destroy', $admin->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                    {{-- <button type="button" class="delete-btn">Delete</button> --}}
                                </form>
                                <button type="button" onclick="window.location.href = '{{ route('super-admin.users.show', $admin->id) }}'" class="edit-btn">View More</button>
                            </div>
                        </td>
                        <td>
                            <div class="status-btn">
                                <div class="form-check form-switch">

                                    <input class="form-check-input active_status_switch" data-userid="{{$admin->id}}" type="checkbox" role="switch"  {{$admin->active_status == STATUS_ACTIVE ? 'checked' : ''}}>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            <div style="margin-bottom:20%; margin-top:10px;">
                @php $total_page = !request('total') ?  $approved_union_admins->total() : $total; @endphp
                {!! $approved_union_admins->appends([
                    'union_admins_page' => request('union_admins_page'),
                    'tab' => 'union_admins',
                    'total' => $total
                ])->links('vendor.pagination.bootstrap-5', ['total' => $total_page,'tab' => 'union_admins']) !!}
                </div>
        </div>
    </div>

    <!-- উপজেলা এডমিন -->
    <div class="user-content {{$tab == 'upozila_admins' ? 'active_user_section' : ''}}">
        <h6 class="all-user">মোট - {{$approved_upozila_admins->total()}} জন</h6>
        <form action="{{route('super-admin.user.manage')}}"  class="search-user-area"  method="GET">
            <input type="hidden" name="tab" value="upozila_admins">
            <input type="text" name="search" id="search-user" placeholder="mobile number/id" value="{{$tab == 'upozila_admins' ? $search ?? '' : ''}}">
            <button type="submit" class="button">Submit</button>
        </form>

        <!-- user table -->
        <div class="user-table">
            <table class="table user-manage-table">
                <thead>
                    <tr>
                        <th>ক্রমিক নং</th>
                        <th>ছবি</th>
                        <th>ইউজার নাম ও আইডি</th>
                        <th>মোবাইল নং</th>
                        <th>বিভাগ</th>
                        <th>জেলা</th>
                        <th>উপজেলা</th>
                        <th>ইডিট/ডিলিট</th>
                        <th>এক্টিভ/ডিএক্টিভ</th>
                    </tr>
                </thead>
                <tbody>
                    @if($approved_upozila_admins->count() > 0)
                    @foreach($approved_upozila_admins as $admin)
                    <tr>
                        <td><div class="center-item">{{$loop->iteration}}</div></td>
                        <td class="user-picture">
                            <img src="{{ $admin->photo_url }}" alt="{{$admin->name}}">
                        </td>
                        <td class="user-name-id">
                            <h6>{{$admin->name}}</h6>
                            <p>{{$admin->id_no}}</p>
                        </td>
                        <td><div class="center-item">{{$admin->phone}}</div></td>

                        <td><div class="center-item">{{$admin?->division->name ?? ''}}</div></td>
                        <td><div class="center-item">{{$admin?->district->name ?? ''}}</div></td>
                        <td><div class="center-item">{{$admin?->upazila->name ?? ''}}</div></td>
                        <td>
                            <div class="edit-delete-btn">
                                <button type="button" class="edit-btn">Edit</button>
                                <!-- Delete Button -->
                                <form action="{{ route('user.destroy', $admin->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                    {{-- <button type="button" class="delete-btn">Delete</button> --}}
                                </form>
                                <button type="button" onclick="window.location.href = '{{ route('super-admin.users.show', $admin->id) }}'" class="edit-btn">View More</button>
                            </div>
                        </td>
                        <td>
                            <div class="status-btn">
                                <div class="form-check form-switch">

                                    <input class="form-check-input active_status_switch" data-userid="{{$admin->id}}" type="checkbox" role="switch"  {{$admin->active_status == STATUS_ACTIVE ? 'checked' : ''}}>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            <div style="margin-bottom:20%; margin-top:10px;">
                @php $total_page = !request('total') ?  $approved_upozila_admins->total() : $total; @endphp
                {!! $approved_upozila_admins->appends([
                    'upozila_admins_page' => request('upozila_admins_page'),
                    'tab' => 'upozila_admins',
                    'total' => $total
                ])->links('vendor.pagination.bootstrap-5', ['total' => $total_page,'tab' => 'upozila_admins']) !!}
                </div>
        </div>
    </div>

    <!-- জেলা এডমিন -->
    <div class="user-content {{$tab == 'district_admins' ? 'active_user_section' : ''}}">
        <h6 class="all-user">মোট - {{$approved_district_admins->total()}} জন</h6>
        <form action="{{route('super-admin.user.manage')}}"  class="search-user-area"  method="GET">
            <input type="hidden" name="tab" value="district_admins">
            <input type="text" name="search" id="search-user" placeholder="mobile number/id" value="{{$tab == 'district_admins' ? $search ?? '' : ''}}">
            <button type="submit" class="button">Submit</button>
        </form>

        <!-- user table -->
        <div class="user-table">
            <table class="table user-manage-table">
                <thead>
                    <tr>
                        <th>ক্রমিক নং</th>
                        <th>ছবি</th>
                        <th>ইউজার নাম ও আইডি</th>
                        <th>মোবাইল নং</th>
                        <th>বিভাগ</th>
                        <th>জেলা</th>
                        <th>উপজেলা</th>
                        <th>ইডিট/ডিলিট</th>
                        <th>এক্টিভ/ডিএক্টিভ</th>
                    </tr>
                </thead>
                <tbody>
                    @if($approved_district_admins->count() > 0)
                    @foreach($approved_district_admins as $admin)
                    <tr>
                        <td><div class="center-item">{{$loop->iteration}}</div></td>
                        <td class="user-picture">
                            <img src="{{ $admin->photo_url }}" alt="{{$admin->name}}">
                        </td>
                        <td class="user-name-id">
                            <h6>{{$admin->name}}</h6>
                            <p>{{$admin->id_no}}</p>
                        </td>
                        <td><div class="center-item">{{$admin->phone}}</div></td>

                        <td><div class="center-item">{{$admin?->division->name ?? ''}}</div></td>
                        <td><div class="center-item">{{$admin?->district->name ?? ''}}</div></td>
                        <td><div class="center-item">{{$admin?->upazila->name ?? ''}}</div></td>
                        <td>
                            <div class="edit-delete-btn">
                                <button type="button" class="edit-btn">Edit</button>
                                <!-- Delete Button -->
                                <form action="{{ route('user.destroy', $admin->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                    {{-- <button type="button" class="delete-btn">Delete</button> --}}
                                </form>
                                <button type="button"  onclick="window.location.href = '{{ route('super-admin.users.show', $admin->id) }}'" class="edit-btn">View More</button>
                            </div>
                        </td>
                        <td>
                            <div class="status-btn">
                                <div class="form-check form-switch">

                                    <input class="form-check-input active_status_switch" data-userid="{{$admin->id}}" type="checkbox" role="switch"  {{$admin->active_status == STATUS_ACTIVE ? 'checked' : ''}}>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif

                </tbody>
            </table>
            <div style="margin-bottom:20%; margin-top:10px;">
                @php $total_page = !request('total') ?  $approved_district_admins->total() : $total; @endphp
                {!! $approved_district_admins->appends([
                    'district_admins_page' => request('district_admins_page'),
                    'tab' => 'district_admins',
                    'total' => $total
                ])->links('vendor.pagination.bootstrap-5', ['total' => $total_page,'tab' => 'district_admins']) !!}
                </div>
        </div>
    </div>
</div>
<div class="contents {{$tab == 'pending_admins' ? 'active_section' : ''}}" style="margin-bottom:20%;">
    @if($pending_admins->count() > 0)
        @foreach ($pending_admins as $admin)
        <div class="pending-user">
            <div class="user-profile">
                <img src="{{ $admin->photo_url }}" alt="{{$admin->name}}">
                <div>
                    <h4>{{ $admin->name }}</h4>
                    <p>{{ $admin->phone }}</p>
                    <p>{{ $admin->getRoleName() }}</p>
                </div>
            </div>
            <div class="user-profile-btn">
                <button type="button" onclick="window.location.href = '{{ route('super-admin.users.show', $admin->id) }}'" class="view-more-btn">View More</button>
                <button onclick="window.location.href = '{{ route('user.status', $admin->id) }}'" type="button" class="approved-btn">Approved</button>
            </div>
        </div>
        @endforeach

    @endif

</div>

    <!-- send money end -->
@endsection
@push('styles')



@endpush
@push('scripts')
<script>
    $(document).ready(function () {
         // Include CSRF token in AJAX headers
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('change', '.active_status_switch', function() {
            var id = $(this).data('userid');
            var active_status = $(this).prop('checked') == true ? 'active' : 'inactive'; // This will return true if checked, false if unchecked
             // Send AJAX POST request
            $.ajax({
                url: "{!! route('super-admin.user.active-status-update')!!}", // Replace with your route URL
                type: 'POST',
                data: {
                    user_id: id,
                    active_status: active_status
                },
                success: function(response) {
                    console.log('Response:', response);
                    if (response.success) {
                        alert('Status updated successfully!');
                    } else {
                        alert('Failed to update status.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    alert('An error occurred while updating the status.');
                }
            });
        });
    });
</script>
@endpush
