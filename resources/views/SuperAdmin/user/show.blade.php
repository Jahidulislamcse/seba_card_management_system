@extends('SuperAdmin.layouts.app')

@section('content')

<div class="admin-area container my-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="card-title mb-0">
                <img src="{{ $user->photo_url }}" alt="{{ $user->name }}" class="rounded-circle me-2" width="80px">
                {{ $user->name }}
            </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Left Column -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <p class="mb-1"><strong>নাম:</strong> {{ $user->name }}</p>
                        <p class="mb-1"><strong>এডমিন প্রকার:</strong> {{ $user->getRoleName() }}</p>
                        @if ($user->role != \App\Models\User::USER_ROLE_ADMIN)
                            <p class="mb-1"><strong>পিতার নাম:</strong> {{ $user->father }}</p>
                        @endif
                        <p class="mb-1"><strong>জন্ম তারিখ:</strong> {{ $user->birth_date }}</p>
                        <p class="mb-1"><strong>আইডি নং:</strong> {{ $user->id_no }}</p>
                        <p class="mb-1"><strong>মোবাইল নং:</strong> {{ $user->phone }}</p>
                        <p class="mb-1"><strong>ইমেইল এড্রেস:</strong> {{ $user->email }}</p>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <p class="mb-1"><strong>বিভাগ:</strong> {{ $user?->division->name ?? '' }}</p>
                        <p class="mb-1"><strong>জেলা:</strong> {{ $user?->district->name ?? '' }}</p>
                        <p class="mb-1"><strong>উপজেলা:</strong> {{ $user?->upazila->name ?? '' }}</p>
                        <p class="mb-1"><strong>ইউনিয়ন:</strong> {{ $user?->union->name ?? '' }}</p>
                    </div>
                </div>
            </div>

            <!-- Documents Section -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <h5 class="mb-3">ডকুমেন্টস</h5>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="form-label"><strong>এনআইডি ফ্রন্ট</strong></label>
                            <a href="{{ $user->nid_front_url }}" target="_blank">
                                <img src="{{ $user->nid_front_url }}" class="img-thumbnail" alt="NID Front" width="100%">
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label"><strong>এনআইডি ব্যাক</strong></label>
                            <a href="{{ $user->nid_back_url }}" target="_blank">
                                <img src="{{ $user->nid_back_url }}" class="img-thumbnail" alt="NID Back" width="100%">
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label"><strong>সিভি</strong></label>
                            <a href="{{ $user->cv_url }}" target="_blank" class="btn btn-outline-primary w-100">
                                <i class="fas fa-download me-2"></i> ডাউনলোড
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label"><strong>সার্টিফিকেট</strong></label>
                            <a href="{{ $user->certificate_url }}" target="_blank">
                                <img src="{{ $user->certificate_url }}" class="img-thumbnail" alt="Certificate" width="100%">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Admin Hierarchy Section -->
            @if (in_array($user->role, [
                    \App\Models\User::USER_ROLE_WARD_ADMIN,
                    \App\Models\User::USER_ROLE_UNI_ADMIN,
                    \App\Models\User::USER_ROLE_UPO_ADMIN,
                ]))
                <div class="row mt-4">
                    <div class="col-md-12">
                        <h5 class="mb-3">অ্যাডমিনের অধীনে</h5>
                        <div class="row">
                            @if (in_array($user->role, [
                                    \App\Models\User::USER_ROLE_WARD_ADMIN,
                                    \App\Models\User::USER_ROLE_UNI_ADMIN,
                                    \App\Models\User::USER_ROLE_UPO_ADMIN,
                                ]))
                                <div class="col-md-4 mb-3">
                                    <p class="mb-1"><strong>জেলা এডমিন:</strong> {{ $user->getDistrictAdminName() }}</p>
                                </div>
                            @endif
                            @if (in_array($user->role, [\App\Models\User::USER_ROLE_WARD_ADMIN, \App\Models\User::USER_ROLE_UNI_ADMIN]))
                                <div class="col-md-4 mb-3">
                                    <p class="mb-1"><strong>উপজেলা এডমিন:</strong> {{ $user->getUpazilaAdminName() }}</p>
                                </div>
                            @endif
                            @if (in_array($user->role, [\App\Models\User::USER_ROLE_WARD_ADMIN]))
                                <div class="col-md-4 mb-3">
                                    <p class="mb-1"><strong>ইউনিয়ন এডমিন:</strong> {{ $user->getUnionAdminName() }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
    <!-- send money end -->
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('SuperAdmin/assets/css/Report.css') }}">
@endpush
@push('scripts')
    <script>
        $(document).ready(function() {

        });
    </script>
@endpush
