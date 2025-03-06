@extends('SuperAdmin.layouts.app')

@section('content')
<div class="py-2">
    <div class="">
        <div class="tab-btns">
            <button type="button" class="buttons active-btn" id="user-list-btn">ইউজার লিস্ট</button>
            <button type="button" class="buttons" id="pending-user-btn">পেনডিং ইউজার</button>
        </div>

        {{-- User List Section --}}
        <div class="contents active_section" id="user-list-section">
            <div class="tab-btns">
                <button type="button" class="user-list-btn active-btn">ওর্য়াড ইউজার</button>
                <button type="button" class="user-list-btn">ইউনিয়ন ইউজার</button>
                <button type="button" class="user-list-btn">উপজেলা ইউজার</button>
                <button type="button" class="user-list-btn">জেলা ইউজার</button>
            </div>

            @php
            $userRoles = [
            'ward_admin' => 'ওর্য়াড ইউজার',
            'union_admin' => 'ইউনিয়ন ইউজার',
            'upo_admin' => 'উপজেলা ইউজার',
            'district_admin' => 'জেলা ইউজার',
            ];
            @endphp

            @foreach($userRoles as $role => $roleName)
            <div class="user-content {{ $loop->first ? 'active_user_section' : '' }}">
                <h6 class="all-user">মোট - {{ $users->where('role', $role)->count() }} জন</h6>

                <form action="" method="GET" class="search-user-area">
                    <input type="text" name="query" placeholder="mobile number/id">
                    <button type="submit" class="button">Submit</button>
                </form>

                <div class="user-table">
                    <table class="table user-manage-table">
                        <thead>
                            <tr>
                                <th>ক্রমিক নং</th>
                                <th>ছবি</th>
                                <th>ইউজার নাম ও আইডি</th>
                                <th>মোবাইল নং</th>
                                <th>ঠিকানা</th>
                                <th>স্ট্যাটাস</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users->where('role', $role) as $key => $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('upload/' . $user->profile_picture) }}" alt="Profile Picture">
                                </td>
                                <td>
                                    <h6>{{ $user->name }}</h6>
                                    <p>{{ $user->id_no }}</p>
                                </td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    @if ($role == 'union_admin') {{ $user->union }}
                                    @elseif ($role == 'upo_admin') {{ $user->upozila }}
                                    @elseif ($role == 'district_admin') {{ $user->district }}
                                    @else {{ $user->ward }}
                                    @endif
                                </td>
                                <td>
                                    <span class="status-badge {{ $user->status == 'approved' ? 'approved' : 'pending' }}">
                                        {{ ucfirst($user->status) }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pending User Section --}}
        <div class="contents" id="pending-user-section" style="display: none;">
            <div class="tab-btns">
                <button type="button" class="user-list-btn active-btn" id="pending-ward-btn">ওর্য়াড ইউজার</button>
                <button type="button" class="user-list-btn" id="pending-union-btn">ইউনিয়ন ইউজার</button>
                <button type="button" class="user-list-btn" id="pending-upo-btn">উপজেলা ইউজার</button>
                <button type="button" class="user-list-btn" id="pending-district-btn">জেলা ইউজার</button>
            </div>

            @foreach($userRoles as $role => $roleName)
            <div class="user-content {{ $loop->first ? 'active_user_section' : '' }}" id="pending-{{ $role }}-section">
                <h6 class="all-user">মোট - {{ $users->where('status', 'pending')->where('role', $role)->count() }} জন</h6>

                <div class="pending-user-list px-3">
                    <table class="pending-user-table " style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr>
                                <th>Profile</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users->where('status', 'pending')->where('role', $role) as $user)
                            <tr class="user-row" id="user-row-{{ $user->id }}">
                                <td><img src="{{ asset('storage/' . $user->profile_picture) }}" alt="profile icon" style="max-width: 50px;"></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $role == 'upo_admin' ? 'উপজেলা ইউজার' : ($role == 'union_admin' ? 'ইউনিয়ন ইউজার' : ($role == 'district_admin' ? 'জেলা ইউজার' : 'ওর্য়াড ইউজার')) }}</td>
                                <td>
                                    <button type="button" class="view-more-btn" onclick="toggleUserDetails({{ $user->id }})">View More</button>
                                    <button type="button" class="approved-btn">Approved</button>
                                </td>
                            </tr>
                            <tr class="user-details-row" id="user-details-row-{{ $user->id }}" style="display: none;">
                                <td colspan="5">
                                    <div class="user-table">
                                        <table class="table user-manage-table">
                                            <thead>
                                                <tr>
                                                    <th>Father's Name</th>
                                                    <th>ID No</th>
                                                    <th>Birth Date</th>
                                                    <th>NID</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>Division</th>
                                                    <th>District</th>
                                                    <th>Upazila</th>
                                                    <th>Union</th>
                                                    <th>Ward</th>
                                                    <th>Photo</th>
                                                    <th>NID Front</th>
                                                    <th>NID Back</th>
                                                    <th>CV</th>
                                                    <th>Certificate</th>
                                                    <th>Total Balance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $user->father }}</td>
                                                    <td>{{ $user->id_no }}</td>
                                                    <td>{{ $user->birth_date }}</td>
                                                    <td>{{ $user->nid }}</td>
                                                    <td>{{ $user->phone }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->division ? $user->division->name : 'N/A' }}</td>
                                                    <td>{{ $user->district ? $user->district->name : 'N/A' }}</td>
                                                    <td>{{ $user->upazila ? $user->upazila->name : 'N/A' }}</td>
                                                    <td>{{ $user->union ? $user->union->name : 'N/A' }}</td>
                                                    <td>{{ $user->ward }}</td>
                                                    <td>
                                                        <div class="image-container">
                                                            <img src="{{ asset($user->photo) }}" alt="User Photo" style="max-height: 100px;">
                                                            <button class="view-btn" onclick="viewImage('{{ asset($user->photo) }}')">View</button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="image-container">
                                                            <img src="{{ asset($user->nid_front) }}" alt="NID Front" style="max-height: 100px;">
                                                            <button class="view-btn" onclick="viewImage('{{ asset($user->nid_front) }}')">View</button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="image-container">
                                                            <img src="{{ asset($user->nid_back) }}" alt="NID Back" style="max-height: 100px;">
                                                            <button class="view-btn" onclick="viewImage('{{ asset($user->nid_back) }}')">View</button>
                                                        </div>
                                                    </td>
                                                    <td><a href="{{ asset($user->cv) }}" target="_blank">Download</a></td>
                                                    <td><a href="{{ asset($user->certificate) }}" target="_blank">Download</a></td>
                                                    <td>{{ $user->total_balance }} BDT</td>
                                                </tr>
                                            </tbody>
                                        </table>



                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Modal for Image Preview -->
        <div id="image-preview-modal" class="image-preview-modal">
            <div class="image-preview-container">
                <span class="close-btn" onclick="closePreview()">&times;</span>
                <img id="preview-image" src="" alt="Preview Image" style="width: 300px; height: 400px;">
            </div>
        </div>
    </div>
</div>
@endsection


<script>
    function toggleUserDetails(userId) {
        var detailsRow = document.getElementById('user-details-row-' + userId);
        if (detailsRow.style.display === 'none' || detailsRow.style.display === '') {
            detailsRow.style.display = 'table-row'; // Show details row
        } else {
            detailsRow.style.display = 'none'; // Hide details row
        }
    }

    // Function to display the image in the preview modal
    function viewImage(imageSrc) {
        document.getElementById('preview-image').src = imageSrc;
        document.getElementById('image-preview-modal').style.display = 'flex';
    }

    // Function to close the preview modal
    function closePreview() {
        document.getElementById('image-preview-modal').style.display = 'none';
    }


    document.addEventListener("DOMContentLoaded", function() {
        const wardBtn = document.getElementById("pending-ward-btn");
        const unionBtn = document.getElementById("pending-union-btn");
        const upoBtn = document.getElementById("pending-upo-btn");
        const districtBtn = document.getElementById("pending-district-btn");

        const wardSection = document.getElementById("pending-ward-section");
        const unionSection = document.getElementById("pending-union-section");
        const upoSection = document.getElementById("pending-upo-section");
        const districtSection = document.getElementById("pending-district-section");

        wardBtn.addEventListener("click", function() {
            wardSection.style.display = "block";
            unionSection.style.display = "none";
            upoSection.style.display = "none";
            districtSection.style.display = "none";
            wardBtn.classList.add("active-btn");
            unionBtn.classList.remove("active-btn");
            upoBtn.classList.remove("active-btn");
            districtBtn.classList.remove("active-btn");
        });

        unionBtn.addEventListener("click", function() {
            wardSection.style.display = "none";
            unionSection.style.display = "block";
            upoSection.style.display = "none";
            districtSection.style.display = "none";
            wardBtn.classList.remove("active-btn");
            unionBtn.classList.add("active-btn");
            upoBtn.classList.remove("active-btn");
            districtBtn.classList.remove("active-btn");
        });

        upoBtn.addEventListener("click", function() {
            wardSection.style.display = "none";
            unionSection.style.display = "none";
            upoSection.style.display = "block";
            districtSection.style.display = "none";
            wardBtn.classList.remove("active-btn");
            unionBtn.classList.remove("active-btn");
            upoBtn.classList.add("active-btn");
            districtBtn.classList.remove("active-btn");
        });

        districtBtn.addEventListener("click", function() {
            wardSection.style.display = "none";
            unionSection.style.display = "none";
            upoSection.style.display = "none";
            districtSection.style.display = "block";
            wardBtn.classList.remove("active-btn");
            unionBtn.classList.remove("active-btn");
            upoBtn.classList.remove("active-btn");
            districtBtn.classList.add("active-btn");
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const userListBtn = document.getElementById("user-list-btn");
        const pendingUserBtn = document.getElementById("pending-user-btn");
        const userListSection = document.getElementById("user-list-section");
        const pendingUserSection = document.getElementById("pending-user-section");

        userListBtn.addEventListener("click", function() {
            userListSection.style.display = "block";
            pendingUserSection.style.display = "none";
            userListBtn.classList.add("active-btn");
            pendingUserBtn.classList.remove("active-btn");
        });

        pendingUserBtn.addEventListener("click", function() {
            userListSection.style.display = "none";
            pendingUserSection.style.display = "block";
            userListBtn.classList.remove("active-btn");
            pendingUserBtn.classList.add("active-btn");
        });
    });
</script>

<style>
    /* Styling for the hover button and image container */
    .image-container {
        position: relative;
        display: inline-block;
    }

    .view-btn {
        position: absolute;
        top: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.6);
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        visibility: hidden;
    }

    .image-container:hover .view-btn {
        visibility: visible;
    }

    /* Modal for Image Preview */
    .image-preview-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        justify-content: center;
        align-items: center;
    }

    .image-preview-container {
        text-align: center;
    }

    #preview-image {
        max-width: 100%;
        max-height: 100%;
    }

    .close-btn {
        position: absolute;
        top: 125px;
        right: 580px;
        font-size: 30px;
        color: white;
        cursor: pointer;
    }

    #pending-user-section {
        max-height: 80vh;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .pending-user-table,
    .user-details-table {
        width: 100%;
        table-layout: fixed;
    }

    .user-details {
        overflow-x: auto;
    }

    .user-card {
        display: flex;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .user-card img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .user-info h6 {
        margin: 0;
        font-size: 16px;
    }

    .user-info p {
        margin: 2px 0;
        font-size: 14px;
        color: gray;
    }

    .user-actions {
        margin-left: auto;
        display: flex;
        align-items: center;
    }

    .view-more {
        background: #d4a017;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        margin-right: 5px;
    }

    .status-badge {
        padding: 5px 10px;
        border-radius: 5px;
        color: white;
    }

    .approved {
        background: green;
    }

    .pending {
        background: orange;
    }
</style>
