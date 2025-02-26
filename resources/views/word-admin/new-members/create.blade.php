@extends('word-admin.layouts.app')

@section('content')
<form class="member-add-form" action="#" method="POST">
    <h6 class="text-center fw-bold">নতুন সদস‌্য ফরম </h6>
    <button type="button" class="profile-photo">
        <img src="{{asset('assets/img/profile.png')}}" alt="profile icon">
        <input type="file" name="profile-inp" class="profile-inp">
    </button>

    <!-- verify button -->
    <label class="input-label" for="card-no">কার্ড নং (Choice)</label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="card-no">
            <img src="{{asset('assets/img/card.png')}}" alt="card icon">
        </span>
        <input type="text" maxlength="40" class="input-box form-control shadow-none"name="card-no" id="card-no" placeholder="354656" require>
    </div>

    <label class="input-label" for="duration">মেয়াদ (বছর সি‌লেক্ট 1,2,3,4 5,10)</label>
    <div class="input-group select-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="duration">
            <img src="{{asset('assets/img//term.png')}}" alt="term icon">
        </span>
        <select class="input-box select-box" name="duration" id="duration">
            <option value="1 Year">১ বছর</option>
            <option value="2 Year">২ বছর</option>
            <option value="3 Year">৩ বছর</option>
            <option value="4 Year">৪ বছর</option>
            <option value="5 Year">৫ বছর</option>
            <option value="10 Year">১০ বছর</option>
        </select>
    </div>

    <label class="input-label" for="name">নাম (বাংলা)</label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="name">
            <img src="{{asset('assets/img/name.png')}}" alt="name icon">
        </span>
        <input type="text" maxlength="40" class="input-box form-control shadow-none"name="name" id="name" placeholder="নাম (বাংলা)" require>
    </div>

    <label class="input-label" for="father_name">পিতার নাম (বাংলা)</label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="father_name">
            <img src="{{asset('assets/img/name.png')}}" alt="name icon">
        </span>
        <input type="text" maxlength="40" class="input-box form-control shadow-none"name="father_name" id="father_name" placeholder="পিতার নাম (বাংলা)" require>
    </div>

    <label class="input-label" for="mother_name">মাতার নাম (বাংলা)</label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="mother_name">
            <img src="{{asset('assets/img/name.png')}}" alt="name icon">
        </span>
        <input type="text" maxlength="40" class="input-box form-control shadow-none"name="mother_name" id="mother_name" placeholder="মাতার নাম (বাংলা)" require>
    </div>

    <label class="input-label" for="birth-date">জন্ম তা‌রিখ </label>
    <div class="input-group mb-2">
        <span class="input-box-icon select-group input-group-text rounded-end-0" id="birth-date">
            <img src="{{asset('assets/img/date.png')}}" alt="date icon">
        </span>
        <div class="birth-date">
            <!-- month -->
            <select>
                <option value="জানুয়ারি">জানুয়ারি</option>
                <option value="ফেব্রুয়ারি">ফেব্রুয়ারি</option>
                <option value="মার্চ">মার্চ</option>
                <option value="এপ্রিল">এপ্রিল</option>
                <option value="মে">মে</option>
                <option value="জুন">জুন</option>
                <option value="জুলাই">জুলাই</option>
                <option value="আগস্ট">আগস্ট</option>
                <option value="সেপ্টেম্বর">সেপ্টেম্বর</option>
                <option value="অক্টোবর">অক্টোবর</option>
                <option value="নভেম্বর">নভেম্বর</option>
                <option value="ডিসেম্বর">ডিসেম্বর</option>
            </select>

            <!-- day -->
            <select>
                <option value="১">১</option>
                <option value="২">২</option>
                <option value="৩">৩</option>
                <option value="৪">৪</option>
                <option value="৫">৫</option>
                <option value="৬">৬</option>
                <option value="৭">৭</option>
                <option value="৮">৮</option>
                <option value="৯">৯</option>
                <option value="১০" selected>১০</option>
                <option value="১১">১১</option>
                <option value="১২">১২</option>
                <option value="১৩">১৩</option>
                <option value="১৪">১৪</option>
                <option value="১৫">১৫</option>
                <option value="১৬">১৬</option>
                <option value="১৭">১৭</option>
                <option value="১৮">১৮</option>
                <option value="১৯">১৯</option>
                <option value="২০">২০</option>
                <option value="২১">২১</option>
                <option value="২২">২২</option>
                <option value="২৩">২৩</option>
                <option value="২৪">২৪</option>
                <option value="২৫">২৫</option>
                <option value="২৬">২৬</option>
                <option value="২৭">২৭</option>
                <option value="২৮">২৮</option>
                <option value="২৯">২৯</option>
                <option value="৩০">৩০</option>
                <option value="৩১">৩১</option>
            </select>

            <!-- year -->
            <select class="year-select">
                <option value="২০২৫">২০২৫</option>
                <option value="২০২৪">২০২৪</option>
                <option value="২০২৩">২০২৩</option>
                <option value="২০২২">২০২২</option>
                <option value="২০২১">২০২১</option>
                <option value="২০২০">২০২০</option>
                <option value="২০১৯">২০১৯</option>
                <option value="২০১৮">২০১৮</option>
                <option value="২০১৭">২০১৭</option>
                <option value="২০১৬">২০১৬</option>
                <option value="২০১৫">২০১৫</option>
                <option value="২০১৪">২০১৪</option>
                <option value="২০১৩">২০১৩</option>
                <option value="২০১২">২০১২</option>
                <option value="২০১১">২০১১</option>
                <option value="২০১০">২০১০</option>
                <option value="২০০৯">২০০৯</option>
                <option value="২০০৮">২০০৮</option>
                <option value="২০০৭">২০০৭</option>
                <option value="২০০৬">২০০৬</option>
                <option value="২০০৫">২০০৫</option>
                <option value="২০০৪">২০০৪</option>
                <option value="২০০৩">২০০৩</option>
                <option value="২০০২">২০০২</option>
                <option selected value="২০০১">২০০১</option>
                <option value="২০০০">২০০০</option>
                <option value="১৯৯৯">১৯৯৯</option>
                <option value="১৯৯৮">১৯৯৮</option>
                <option value="১৯৯৭">১৯৯৭</option>
                <option value="১৯৯৬">১৯৯৬</option>
                <option value="১৯৯৫">১৯৯৫</option>
                <option value="১৯৯৪">১৯৯৪</option>
                <option value="১৯৯৩">১৯৯৩</option>
                <option value="১৯৯২">১৯৯২</option>
                <option value="১৯৯১">১৯৯১</option>
                <option value="১৯৯০">১৯৯০</option>
                <option value="১৯৮৯">১৯৮৯</option>
                <option value="১৯৮৮">১৯৮৮</option>
                <option value="১৯৮৭">১৯৮৭</option>
                <option value="১৯৮৬">১৯৮৬</option>
                <option value="১৯৮৫">১৯৮৫</option>
                <option value="১৯৮৪">১৯৮৪</option>
                <option value="১৯৮৩">১৯৮৩</option>
                <option value="১৯৮২">১৯৮২</option>
                <option value="১৯৮১">১৯৮১</option>
                <option value="১৯৮০">১৯৮০</option>
                <option value="১৯৭৯">১৯৭৯</option>
                <option value="১৯৭৮">১৯৭৮</option>
                <option value="১৯৭৭">১৯৭৭</option>
                <option value="১৯৭৬">১৯৭৬</option>
                <option value="১৯৭৫">১৯৭৫</option>
                <option value="১৯৭৪">১৯৭৪</option>
                <option value="১৯৭৩">১৯৭৩</option>
                <option value="১৯৭২">১৯৭২</option>
                <option value="১৯৭১">১৯৭১</option>
                <option value="১৯৭০">১৯৭০</option>
                <option value="১৯৬৯">১৯৬৯</option>
                <option value="১৯৬৮">১৯৬৮</option>
                <option value="১৯৬৭">১৯৬৭</option>
                <option value="১৯৬৬">১৯৬৬</option>
                <option value="১৯৬৫">১৯৬৫</option>
                <option value="১৯৬৪">১৯৬৪</option>
                <option value="১৯৬৩">১৯৬৩</option>
                <option value="১৯৬২">১৯৬২</option>
                <option value="১৯৬১">১৯৬১</option>
                <option value="১৯৬০">১৯৬০</option>
                <option value="১৯৫৯">১৯৫৯</option>
                <option value="১৯৫৮">১৯৫৮</option>
                <option value="১৯৫৭">১৯৫৭</option>
                <option value="১৯৫৬">১৯৫৬</option>
                <option value="১৯৫৫">১৯৫৫</option>
                <option value="১৯৫৪">১৯৫৪</option>
                <option value="১৯৫৩">১৯৫৩</option>
                <option value="১৯৫২">১৯৫২</option>
                <option value="১৯৫১">১৯৫১</option>
                <option value="১৯৫০">১৯৫০</option>
            </select>
        </div>
    </div>

    <label class="input-label" for="id_no">আইডি নং </label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="id_no">
            <img src="{{asset('assets/img/card.png')}}" alt="card icon">
        </span>
        <input type="text" maxlength="40" class="input-box form-control shadow-none"name="id_no" id="id_no" placeholder="আইডি নং" require>
    </div>

    <label class="input-label" for="gender">পুরুষ ম‌হিলা (Select)</label>
    <div class="input-group mb-2">
        <span class="input-box-icon select-group input-group-text rounded-end-0" id="gender">
            <img src="{{asset('assets/img/gender.png')}}" alt="gender icon">
        </span>
        <select class="input-box select-box" name="gender" id="gender">
            <option value="male">পুরুষ </option>
            <option value="female">ম‌হিলা </option>
        </select>
    </div>

    <label class="input-label" for="religion">ধর্ম (Select)</label>
    <div class="input-group mb-2">
        <span class="input-box-icon select-group input-group-text rounded-end-0" id="religion">
            <img src="{{asset('assets/img/religion.png')}}" alt="religion icon">
        </span>
        <select class="input-box select-box" name="religion" id="religion">
            <option value="ইসলাম">ইসলাম </option>
            <option value="সনাতন">সনাতন </option>
            <option value="বৈাদ্ধ">বৈাদ্ধ </option>
            <option value="খ্রিস্টান">খ্রিস্টান </option>
        </select>
    </div>

    <label class="input-label" for="work">পেশা</label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="work">
            <img src="{{asset('assets/img/occupation.png')}}" alt="occupation icon">
        </span>
        <input type="text" maxlength="40" class="input-box form-control shadow-none"name="work" id="work" placeholder="পেশা" require>
    </div>

    <label class="input-label" for="division">বিভাগ</label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="division">
            <img src="{{asset('assets/img/city.png')}}" alt="city icon">
        </span>
        <input type="text" maxlength="40" class="input-box form-control shadow-none"name="division" id="division" placeholder="বিভাগ" require>
    </div>

    <label class="input-label" for="dristrick">জেলা</label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="dristrick">
            <img src="{{asset('assets/img/city.png')}}" alt="city icon">
        </span>
        <input type="text" maxlength="40" class="input-box form-control shadow-none" name="dristrick" id="dristrick" placeholder="জেলা" require>
    </div>

    <label class="input-label" for="Upazilla">উপ‌জেলা</label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="Upazilla">
            <img src="{{asset('assets/img/city.png')}}" alt="city icon">
        </span>
        <input type="text" maxlength="40" class="input-box form-control shadow-none" name="Upazilla" id="Upazilla" placeholder="উপ‌জেলা" require>
    </div>

    <label class="input-label" for="Union">ইউনিয়ন</label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="Union">
            <img src="{{asset('assets/img/city.png')}}" alt="city icon">
        </span>
        <input type="text" maxlength="40" class="input-box form-control shadow-none" name="Union" id="Union" placeholder="ইউনিয়ন" require>
    </div>

    <label class="input-label" for="word">ওয়ার্ড</label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="word">
            <img src="{{asset('assets/img/city.png')}}" alt="city icon">
        </span>
        <input type="text" maxlength="40" class="input-box form-control shadow-none" name="word" id="word" placeholder="ওয়ার্ড" require>
    </div>

    <label class="input-label" for="post-code">পোস্ট কোড </label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="post-code">
            <img src="{{asset('assets/img/post code.png')}}" alt="post code icon">
        </span>
        <input type="text" maxlength="40" class="input-box form-control shadow-none" name="post-code" id="post-code" placeholder="পোস্ট কোড " require>
    </div>

    <label class="input-label" for="mobile_no">মোবাইল নং </label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="mobile_no">
            <img src="{{asset('assets/img/number.png')}}" alt="number icon">
        </span>
        <input type="number" maxlength="40" class="input-box form-control shadow-none" name="mobile_no" id="mobile_no" placeholder="01402860617..." require>
    </div>

    <div id="familyContainer">
        <div id="familyMember" class="mt-4">
            <label class="input-label member-title"><b>পরিবারের সদস্য তথ্য ১:</b></label>

            <label class="input-label">নাম (বাংলা)</label>
            <div class="input-group mb-2">
                <span class="input-box-icon input-group-text">
                    <img src="{{asset('assets/img/name.png')}}" alt="name icon">
                </span>
                <input type="text" class="input-box form-control shadow-none" name="family_name" placeholder="নাম (বাংলা)">
            </div>

            <label class="input-label">বয়স</label>
            <div class="input-group mb-2">
                <span class="input-box-icon input-group-text">
                    <img src="{{asset('assets/img/old.png')}}" alt="old icon">
                </span>
                <input type="text" class="input-box form-control shadow-none" name="family_old" placeholder="বয়স">
            </div>

            <label class="input-label">পুরুষ মহিলা (Select)</label>
            <div class="input-group mb-2">
                <span class="input-box-icon select-group input-group-text">
                    <img src="{{asset('assets/img/gender.png')}}" alt="gender icon">
                </span>
                <select class="input-box select-box" name="family_gender">
                    <option value="male">পুরুষ</option>
                    <option value="female">মহিলা</option>
                </select>
            </div>
        </div>
    </div>



    <button onclick="addFamilyMember()" type="button" class="add-more-btn button">
        <img src="{{asset('assets/img/plus.png')}}" alt="">
        Add More
    </button>

    <button type="submit" class="button">Save</button>
</form>

@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/NewMember.css')}}">

@endpush
@push('scripts')
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
                            $('#district').empty().append(
                                '<option value="">Select District</option>');
                            $.each(data, function(key, value) {
                                $('#district').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                            $('#upozila').empty().append(
                                '<option value="">Select Upozila</option>'
                                ); // Reset upozila dropdown
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
                            $('#upozila').empty().append(
                                '<option value="">Select Upozila</option>');
                            $.each(data, function(key, value) {
                                $('#upozila').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
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
                            $('#union').empty().append(
                            '<option value="">Select union</option>');
                            $.each(data, function(key, value) {
                                $('#union').append('<option value="' + value.id + '">' +
                                    value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#union').empty().append('<option value="">Select union</option>');
                }
            });

            var index = 0;
            $(document).on('click', '#add_family_member_btn', function(e) {
                e.preventDefault();
                index = index + 1
                let member_list = $('.member_list').length
                let html = `
                <div class="col-md-12 border border-primary p-2 my-2 member_list" >
                    <h4>Family Member ${member_list+1}</h4>
                    <div class="row" >
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="family_members[${index}][name]" id="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_of_birth">Date Of Birth</label>
                                <input type="date" name="family_members[${index}][date_of_birth]" id="date_of_birth" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Gender <span class="text-danger">*</span></label>
                                <select name="family_members[${index}][gender]" id="gender" class="form-control" required>
                                    <option value="">Select One</option>
                                    @foreach (ALL_GENDER as $value)
                                    <option value="{{ $value }}">{{ ucwords($value) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="relationship">Relationship</label>
                                <input type="text" name="family_members[${index}][relationship]" id="relationship" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-danger " type="button" onclick="$(this).parent().remove()" style="    float: right;">Delete </button>
                </div>
            `
                $("#add_family_members_section").append(html)
                console.log('click', html)
            })
        });
    </script>
@endpush
