@extends('SuperAdmin.layouts.app')

@section('content')


<div class="tab-btns">
    <button type="button" class="buttons active-btn">ইউজার লিস্ট</button>
    <button type="button" class="buttons">পেনডিং ইউজার</button>
</div>
{{-- {{dd(request('ward_admins') )}} --}}
<div class="contents active_section">
    <div class="tab-btns">
        <button type="button" class="user-list-btn  {{$tab == 'ward_admins' ? 'active-btn' : ''}} ">ওর্য়াড ইউজার</button>
        <button type="button" class="user-list-btn">ইউনিয়ন ইউজার</button>
        <button type="button" class="user-list-btn">উপজেলা ইউজার</button>
        <button type="button" class="user-list-btn">জেলা ইউজার</button>
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
                                <button type="button" class="delete-btn">Delete</button>
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
                    'ward_admins' => request('ward_admins'),
                    'tab' => 'ward_admins',
                    'total' => $total
                ])->links('vendor.pagination.bootstrap-5', ['total' => $total_page]) !!}
                </div>
        </div>

    </div>


    <!-- ইউনিয়ন এডমিন -->
    <div class="user-content">
        <h6 class="all-user">মোট - ৮৭৯০ জন</h6>
        <form action="#" class="search-user-area">
            <input type="text" name="search-user" id="search-user" placeholder="mobile number/id">
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
                        <th>ইউনিয়ন</th>
                        <th>ইডিট/ডিলিট</th>
                        <th>এক্টিভ/ডিএক্টিভ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><div class="center-item">০১</div></td>
                        <td class="user-picture">
                            <img src="{{ asset('assets/img/men 1.jpg')}}" alt="Profile Picture">
                        </td>
                        <td class="user-name-id">
                            <h6>মো: রিমন শেখ</h6>
                            <p>০২৮৫৪৬</p>
                        </td>
                        <td><div class="center-item">০১৪০২৮৬০৬১৭</div></td>
                        <td><div class="center-item">গোবিন্দপুর</div></td>
                        <td><div class="center-item">যদুবয়রা</div></td>
                        <td>
                            <div class="edit-delete-btn">
                                <button type="button" class="edit-btn">Edit</button>
                                <button type="button" class="delete-btn">Delete</button>
                            </div>
                        </td>
                        <td>
                            <div class="status-btn">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="day" checked>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><div class="center-item">০১</div></td>
                        <td class="user-picture">
                            <img src="{{ asset('assets/img/men 1.jpg')}}" alt="Profile Picture">
                        </td>
                        <td class="user-name-id">
                            <h6>মো: রিমন শেখ</h6>
                            <p>০২৮৫৪৬</p>
                        </td>
                        <td><div class="center-item">০১৪০২৮৬০৬১৭</div></td>
                        <td><div class="center-item">গোবিন্দপুর</div></td>
                        <td><div class="center-item">যদুবয়রা</div></td>
                        <td>
                            <div class="edit-delete-btn">
                                <button type="button" class="edit-btn">Edit</button>
                                <button type="button" class="delete-btn">Delete</button>
                            </div>
                        </td>
                        <td>
                            <div class="status-btn">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="day" checked>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- উপজেলা এডমিন -->
    <div class="user-content">
        <h6 class="all-user">মোট - ৮৭৯০ জন</h6>
        <form action="#" class="search-user-area">
            <input type="text" name="search-user" id="search-user" placeholder="mobile number/id">
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
                        <th>ইউনিয়ন</th>
                        <th>উপজেলা</th>
                        <th>ইডিট/ডিলিট</th>
                        <th>এক্টিভ/ডিএক্টিভ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><div class="center-item">০১</div></td>
                        <td class="user-picture">
                            <img src="{{ asset('assets/img/men 1.jpg')}}" alt="Profile Picture">
                        </td>
                        <td class="user-name-id">
                            <h6>মো: রিমন শেখ</h6>
                            <p>০২৮৫৪৬</p>
                        </td>
                        <td><div class="center-item">০১৪০২৮৬০৬১৭</div></td>
                        <td><div class="center-item">গোবিন্দপুর</div></tdr>
                        <td><div class="center-item">যদুবয়রা</div></td>
                        <td><div class="center-item">কুমারখালী</div></td>
                        <td>
                            <div class="edit-delete-btn">
                                <button type="button" class="edit-btn">Edit</button>
                                <button type="button" class="delete-btn">Delete</button>
                            </div>
                        </td>
                        <td>
                            <div class="status-btn">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="day" checked>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><div class="center-item">০১</div></td>
                        <td class="user-picture">
                            <img src="{{ asset('assets/img/men 1.jpg')}}" alt="Profile Picture">
                        </td>
                        <td class="user-name-id">
                            <h6>মো: রিমন শেখ</h6>
                            <p>০২৮৫৪৬</p>
                        </td>
                        <td><div class="center-item">০১৪০২৮৬০৬১৭</div></td>
                        <td><div class="center-item">গোবিন্দপুর</div></tdr>
                        <td><div class="center-item">যদুবয়রা</div></td>
                        <td><div class="center-item">কুমারখালী</div></td>
                        <td>
                            <div class="edit-delete-btn">
                                <button type="button" class="edit-btn">Edit</button>
                                <button type="button" class="delete-btn">Delete</button>
                            </div>
                        </td>
                        <td>
                            <div class="status-btn">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="day" checked>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- জেলা এডমিন -->
    <div class="user-content">
        <h6 class="all-user">মোট - ৮৭৯০ জন</h6>
        <form action="#" class="search-user-area">
            <input type="text" name="search-user" id="search-user" placeholder="mobile number/id">
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
                        <th>ইউনিয়ন</th>
                        <th>উপজেলা</th>
                        <th>জেলা</th>
                        <th>ইডিট/ডিলিট</th>
                        <th>এক্টিভ/ডিএক্টিভ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><div class="center-item">০১</div></td>
                        <td class="user-picture">
                            <img src="{{ asset('assets/img/men 1.jpg')}}" alt="Profile Picture">
                        </td>
                        <td class="user-name-id">
                            <h6>মো: রিমন শেখ</h6>
                            <p>০২৮৫৪৬</p>
                        </td>
                        <td><div class="center-item">০১৪০২৮৬০৬১৭</div></td>
                        <td><div class="center-item">গোবিন্দপুর</div></tdr>
                        <td><div class="center-item">যদুবয়রা</div></td>
                        <td><div class="center-item">কুমারখালী</div></td>
                        <td><div class="center-item">কুষ্টিয়া</div></td>
                        <td>
                            <div class="edit-delete-btn">
                                <button type="button" class="edit-btn">Edit</button>
                                <button type="button" class="delete-btn">Delete</button>
                            </div>
                        </td>
                        <td>
                            <div class="status-btn">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="day" checked>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><div class="center-item">০১</div></td>
                        <td class="user-picture">
                            <img src="{{ asset('assets/img/men 1.jpg')}}" alt="Profile Picture">
                        </td>
                        <td class="user-name-id">
                            <h6>মো: রিমন শেখ</h6>
                            <p>০২৮৫৪৬</p>
                        </td>
                        <td><div class="center-item">০১৪০২৮৬০৬১৭</div></td>
                        <td><div class="center-item">গোবিন্দপুর</div></tdr>
                        <td><div class="center-item">যদুবয়রা</div></td>
                        <td><div class="center-item">কুমারখালী</div></td>
                        <td><div class="center-item">কুষ্টিয়া</div></td>
                        <td>
                            <div class="edit-delete-btn">
                                <button type="button" class="edit-btn">Edit</button>
                                <button type="button" class="delete-btn">Delete</button>
                            </div>
                        </td>
                        <td>
                            <div class="status-btn">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="day" checked>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="contents">
    <div class="pending-user">
        <div class="user-profile">
            <img src="{{ asset('assets/img/profile.png') }}" alt="profile icon">
            <div>
                <h4>মো: রিমন ইসলাম</h4>
                <p>০১৯০২৮৬০৬১৭</p>
                <p>উপজেলা ইউজার</p>
            </div>
        </div>
        <div class="user-profile-btn">
            <button type="button" class="view-more-btn">View More</button>
            <button type="button" class="approved-btn">Approved</button>
        </div>
    </div>
    <div class="pending-user">
        <div class="user-profile">
            <img src="{{ asset('assets/img/profile.png') }}" alt="profile icon">
            <div>
                <h4>মো: রিমন ইসলাম</h4>
                <p>০১৯০২৮৬০৬১৭</p>
                <p>উপজেলা ইউজার</p>
            </div>
        </div>
        <div class="user-profile-btn">
            <button type="button" class="view-more-btn">View More</button>
            <button type="button" class="approved-btn">Approved</button>
        </div>
    </div>
    <div class="pending-user">
        <div class="user-profile">
            <img src="{{ asset('assets/img/profile.png') }}" alt="profile icon">
            <div>
                <h4>মো: রিমন ইসলাম</h4>
                <p>০১৯০২৮৬০৬১৭</p>
                <p>উপজেলা ইউজার</p>
            </div>
        </div>
        <div class="user-profile-btn">
            <button type="button" class="view-more-btn">View More</button>
            <button type="button" class="approved-btn">Approved</button>
        </div>
    </div>
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
