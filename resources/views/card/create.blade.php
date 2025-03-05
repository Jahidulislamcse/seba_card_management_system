@extends('SuperAdmin.layouts.app')

@section('content')
    <div>
        <div class="tab-btns">
            <button type="button" class="active-btn buttons">সিঙ্গেল কার্ড সিলেক্ট করুন</button>
            <button type="button" class="buttons">মাল্টি কার্ড সিলেক্ট করুন</button>
        </div>

        <div class="content-area">
            <h4>সার্চ এডমিন</h4>

            <form class="search-card" id="search-form">
                <input type="number" name="card-number" id="card-number" placeholder="019.." required>
                <button type="button" id="search-button">Search</button> <!-- Type is "button" to prevent page reload -->
            </form>

            <div class="result-search-cards" id="search-results"></div>


            <!-- if you will search then it will worked -->
            {{-- <div class="result-search-card">
                <a href="#" class="result-user">
                    <img src="assets/img/profile.png" alt="">
                    <div>
                        <h4>MD Rahitul Islam Rimon</h4>
                        <p>01325365768</p>
                        <p>ANs92124</p>
                    </div>
                </a>
                <a href="#" class="result-user">
                    <img src="assets/img/profile.png" alt="">
                    <div>
                        <h4>MD Rahitul Islam Rimon</h4>
                        <p>01325365768</p>
                        <p>ANs92124</p>
                    </div>
                </a>
            </div> --}}



            <!-- single card search form -->
            <form class="card-add contents active_section" action="{{ route('cards.store') }}" method="POST">
                @csrf

                <input type="hidden" name="card_mode" value="single">
                <div>
                    <label for="assign_id">ওয়ার্ড এডমিন</label>
                    <select name="assign_id" class="form-control" required>
                        <option value="">ওয়ার্ড এডমিন</option>
                        @foreach ($ward_admins as $admin)
                            <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="card-number">কার্ড নাম্বার</label>
                    <input type="text" name="card_number" id="card_number" placeholder="কার্ড নাম্বার" required>
                </div>
                <div>
                    <label for="card-fee">কার্ড ফি</label>
                    <input type="text" name="price" id="price" placeholder="কার্ড ফি" required>
                </div>

                <button class="button save-btn" type="submit">Save</button>
            </form>

            <!-- multi card search form -->
            <form class="card-add contents" action="{{ route('cards.store') }}" method="POST">
                @csrf

                <input type="hidden" name="card_mode" value="multiple">
                <input type="hidden" name="generation_type" value="range">
                <div>
                    <label for="assign_id">ওয়ার্ড এডমিন</label>
                    <select name="assign_id" class="form-control" required>
                        <option value="">ওয়ার্ড এডমিন</option>
                        @foreach ($ward_admins as $admin)
                            <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="card-number">কার্ড শুরু নাম্বার</label>
                    <input type="text" name="start_card_number" id="start_card_number" placeholder="কার্ড নাম্বার"
                        required>
                </div>
                <div>
                    <label for="card-number">কার্ড শেষ নাম্বার</label>
                    <input type="text" name="end_card_number" id="end_card_number" placeholder="কার্ড নাম্বার" required>
                </div>
                <div>
                    <label for="card-fee">কার্ড ফি</label>
                    <input type="text" name="price" id="price" placeholder="কার্ড ফি" required>
                </div>

                <button class="button save-btn" type="submit">Save</button>
            </form>
        </div>



    </div>
@endsection
@push('styles')
    <script src="{{ asset('backend/js/core/jquery-3.7.1.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('SuperAdmin/assets/css/index.css') }}">

    <script>
        document.querySelector(".active_section").scrollIntoView({
            behavior: "smooth"
        });
    </script>

    <script>
        $(document).ready(function() {
            // Event listener for the button click
            $('#search-button').on('click', function() {
                let cardNumber = $('#card-number').val();
                alert(cardNumber);
                if (cardNumber) {
                    $.ajax({
                        url: '/cards/search', // The route to the server-side method
                        method: 'GET', // We are sending a GET request
                        data: {
                            card_number: cardNumber // Send the card number as data
                        },
                        success: function(response) {
                            if (response && response.customer) {
                                console.log(response
                                    .customer); // Corrected to log the correct object

                                $('#search-results').html(`
                                    <div style="font-family: Arial, sans-serif; padding: 10px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9; max-width: 300px;">
                                        <span style="display: block; font-size: 14px; color: #333; font-weight: bold; margin-bottom: 5px;">Name: ${response.customer.name}</span>
                                        <span style="display: block; font-size: 14px; color: #333; margin-bottom: 5px;">Phone: ${response.customer.phone}</span>
                                        <span style="display: block; font-size: 14px; color: #333;">Card Number: ${response.customer.card_number}</span>
                                    </div>
                            `);
                            } else {
                                // If no customer is found, display a "No customer found" message
                                $('#search-results').html(
                                    '<div style="font-family: Arial, sans-serif; padding: 10px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9; max-width: 300px;"> <span style ="display: block; font-size: 14px; color: #333; font-weight: bold; margin-bottom: 5px;" >This Number Does Not Exist </span></div>'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            // Display an error message if the AJAX request fails
                            $('#search-results').html(
                                '<p>Error occurred, please try again later.</p>');
                        }
                    });
                } else {
                    // If no card number is entered, show an error message
                    $('#search-results').html('<p>Please enter a card number.</p>');
                }
            });
        });
    </script>
@endpush
