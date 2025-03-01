@extends('word-admin.layouts.app')

@section('content')
    <!-- user table -->
    <div class="py-4">
        <div class="card shadow-lg rounded-lg overflow-hidden">
            <div class="card-header bg-success text-white text-center">
                <h5 class="mb-0">Card Request</h5>
            </div>
            <div class="card-body overflow-auto p-3" style="max-height: 70vh;">
                <form action="{{ route('ward_admin.cards.store') }}" id="cardForm" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Select Card Creation Mode</label>
                        <select name="card_mode" id="card_mode" class="form-control w-100" required>
                            <option value="single">Single Card</option>
                            <option value="multiple">Multiple Cards</option>
                        </select>
                    </div>

                    <!-- Single Card Section -->
                    <div id="single_card_section" class="form-group mb-3">
                        <label>Card Number (Min:6 & Max:6)</label>
                        <input type="text" id="card_number" name="card_number" class="form-control w-100" minlength="6"
                            maxlength="6" pattern="\d{6}" placeholder="Enter exactly 6 digits">
                    </div>

                    <!-- Multiple Card Section -->
                    <div id="multiple_card_section" class="d-none">
                        <div class="form-group mb-3">
                            <label>Select Generation Type</label>
                            <select name="generation_type" id="generation_type" class="form-control w-100">
                                <option value="">Select Type</option>
                                {{-- <option value="random">Random</option> --}}
                                <option value="range">Range</option>
                            </select>
                        </div>

                        <div id="random_cards" class="d-none">
                            <label>Random Card Numbers</label>
                            <div id="random_card_list" class="mb-2"></div>
                            <button type="button" id="add_random_card" class="btn btn-sm btn-outline-success">+ Add
                                Card</button>
                        </div>

                        <div id="range_cards" class="d-none">
                            <div class="form-group mb-3">
                                <label>Start Card Number</label>
                                <input type="text" name="start_card_number" id="start_card_number"
                                    class="form-control w-100" minlength="6" maxlength="6"
                                    placeholder="Start Number (6 digits)">
                            </div>
                            <div class="form-group mb-3">
                                <label>End Card Number</label>
                                <input type="text" name="end_card_number" id="end_card_number" class="form-control w-100"
                                    minlength="6" maxlength="6" placeholder="End Number (6 digits)">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Start Date</label>
                        <input type="date" name="start_date" class="form-control w-100" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>End Date</label>
                        <input type="date" name="end_date" class="form-control w-100" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success w-20 py-2 mb-2">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script>
        document.getElementById('card_mode').addEventListener('change', function() {
            let mode = this.value;
            document.getElementById('single_card_section').classList.toggle('d-none', mode !== 'single');
            document.getElementById('multiple_card_section').classList.toggle('d-none', mode !== 'multiple');
        });

        document.getElementById('generation_type').addEventListener('change', function() {
            let type = this.value;
            document.getElementById('random_cards').classList.toggle('d-none', type !== 'random');
            document.getElementById('range_cards').classList.toggle('d-none', type !== 'range');
        });
    </script>


    <!-- user table -->
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/MemberList.css') }}">
@endpush
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#card_mode').change(function() {
                var card_mode = $(this).val();
                if (card_mode == 'single') {
                    $('#single_card_section').removeClass('d-none');
                    $('#multiple_card_section').addClass('d-none');
                } else {
                    $('#single_card_section').addClass('d-none');
                    $('#multiple_card_section').removeClass('d-none');
                }
            });

            $('#generation_type').change(function() {
                var generation_type = $(this).val();
                if (generation_type == 'random') {
                    $('#random_cards').removeClass('d-none');
                    $('#range_cards').addClass('d-none');
                } else if (generation_type == 'range') {
                    $('#random_cards').addClass('d-none');
                    $('#range_cards').removeClass('d-none');
                } else {
                    $('#random_cards').addClass('d-none');
                    $('#range_cards').addClass('d-none');
                }
            });

            $('#add_random_card').click(function() {
                var random_card = Math.floor(100000 + Math.random() * 900000);
                $('#random_card_list').append(
                    '<input type="text" name="random_card[]" class="form-control" value="' +
                    random_card + '" readonly>');
            });
        });
    </script>
@endpush
