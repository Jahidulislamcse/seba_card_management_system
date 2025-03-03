@extends('WardAdmin.layouts.app')



@section('content')

<div class="py-4">
    <div class="m-2">
        <form class="user-find-form" id="search-form">
            <label for="card_number">আপনার কার্ড নাম্বার লিখুন</label>
            <div>
                <input type="text" name="card_number" id="card_number" placeholder="354656" required>
                <button class="button" type="submit">খুজুন</button>
            </div>
        </form>
        <p id="error-message" class="text-danger"></p>

        <div id="customer-details" style="display: none;">
            <p class="sended-id">অনুসন্ধানের ফলাফল:</p>
            <div class="user-table-area">
                <table class="specific-user-table">
                    <tbody>
                        <tr>
                            <td class="serial_no">নাম:</td>
                            <td id="customer-name"></td>
                        </tr>
                        <tr>
                            <td class="user-picture">পিতা:</td>
                            <td id="customer-father"></td>
                        </tr>
                        <tr>
                            <td class="user-number">মাতা:</td>
                            <td id="customer-mother"></td>
                        </tr>
                        <tr>
                            <td class="user-date">জন্ম তারিখ:</td>
                            <td id="customer-dob"></td>
                        </tr>
                        <tr>
                            <td class="user-date">আইডি নং:</td>
                            <td id="customer-id"></td>
                        </tr>
                        <tr>
                            <td class="user-date">মোবাইল নং:</td>
                            <td id="customer-phone"></td>
                        </tr>
                        <tr>
                            <td class="user-date">পেশা:</td>
                            <td id="customer-occupation"></td>
                        </tr>
                        <tr>
                            <td class="user-date">জেলা:</td>
                            <td id="customer-district"></td>
                        </tr>
                        <tr>
                            <td class="user-date">উপজেলা:</td>
                            <td id="customer-upazila"></td>
                        </tr>
                        <tr>
                            <td class="user-date">ইউনিয়ন:</td>
                            <td id="customer-union"></td>
                        </tr>
                        <tr>
                            <td class="user-date">ওয়ার্ড:</td>
                            <td id="customer-ward"></td>
                        </tr>

                    </tbody>
                </table>
                <div class="user-profile-img">
                    <img id="customer-avatar" src="assets/img/default.png" alt="profile image">
                </div>
            </div>
        </div>

        <div id="family-members-container"></div>
        <!-- user table -->
    </div>
</div>

<script src="assets/js/script.js"></script>
<script src="https://kit.fontawesome.com/696233e01c.js" crossorigin="anonymous"></script>


@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/CardVerify.css') }}">
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#search-form').submit(function(e) {
            e.preventDefault();

            let cardNumber = $('#card_number').val();
            let url = "{{ route('ward_admin.cards.search') }}";

            $.ajax({
                url: url,
                type: "GET",
                data: {
                    card_number: cardNumber
                },
                success: function(response) {
                    console.log(response);

                    // Show customer details
                    $('#customer-details').show();
                    $('#customer-name').text(response.name);
                    $('#customer-father').text(response.father_name);
                    $('#customer-mother').text(response.mother_name);
                    $('#customer-dob').text(response.date_of_birth);
                    $('#customer-id').text(response.id);
                    $('#customer-phone').text(response.phone);
                    $('#customer-occupation').text(response.occupation);
                    $('#customer-district').text(response.district);
                    $('#customer-upazila').text(response.upazila);
                    $('#customer-union').text(response.union);
                    $('#customer-ward').text(response.ward);
                    $('#customer-avatar').attr('src', response.avatar);

                    // Clear previous family members list
                    $('#family-members-container').empty();

                    // Check if family members exist
                    if (response.family_members.length > 0) {
                        let familyTable = `
                        <table class="specific-user-table family-table">
                            <tbody>
                                <p class="family-info">পরিবারের অন্যান্য সদস্য তথ্য:</p>
                    `;

                        response.family_members.forEach((member, index) => {
                            familyTable += `
                                <tr>
                                    <td class="serial_no">ক্রমিক নং:</td>
                                    <td class="user-picture">${index + 1}</td>
                                </tr>
                                <tr>
                                    <td class="serial_no">নাম:</td>
                                    <td class="user-picture">${member.name}</td>
                                </tr>
                                <tr>
                                    <td class="user-picture">জেন্ডার:</td>
                                    <td class="user-number">${member.gender}</td>
                                </tr>
                                <tr>
                                    <td class="user-number">বয়স:</td>
                                    <td class="user-date">${calculateAge(member.date_of_birth)} বছর</td>
                                </tr>
                            `;
                        });

                        familyTable += `</tbody></table>`;

                        $('#family-members-container').html(familyTable);
                    } else {
                        $('#family-members-container').html('<p class="family-info">কোনো পরিবারের সদস্য পাওয়া যায়নি!</p>');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 404) {
                        $('#customer-details').hide();
                        $('#error-message').text(xhr.responseJSON.error);
                    }
                }
            });
        });

        // Function to calculate age from date of birth
        function calculateAge(dob) {
            let birthDate = new Date(dob);
            let today = new Date();
            let age = today.getFullYear() - birthDate.getFullYear();
            let monthDiff = today.getMonth() - birthDate.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            return age;
        }
    });
</script>

@endpush