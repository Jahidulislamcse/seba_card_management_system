@extends('WardAdmin.layouts.app')

@section('content')
    <div>
        <form action="#" class="balance-form">
            <div>
                <label for="In">IN</label>
                <input class="input-check" type="radio" value="1" id="IN" name="option" value="IN">
            </div>
            <div>
                <label for="In">Out</label>
                <input class="input-check" type="radio" value="2" id="OUT" name="option" value="Out">
            </div>

            <button type="button" class="button">Submit</button>
        </form>

        <!-- table start -->
        <div class="user-table mt-3">
            <table class="table report-table  simple-table">
                <thead>
                    <tr>
                        <th>ক্রমিক নং</th>
                        <th>খাত</th>
                        <th>প‌রিমান</th>
                        <th>তা‌রিখ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>০১</td>
                        <td>Hospital</td>
                        <td>200</td>
                        <td>23/02/2025</td>
                    </tr>
                    <tr>
                        <td>০১</td>
                        <td>Hospital</td>
                        <td>200</td>
                        <td>23/02/2025</td>
                    </tr>
                    <tr>
                        <td>০১</td>
                        <td>Hospital</td>
                        <td>200</td>
                        <td>23/02/2025</td>
                    </tr>
                    <tr>
                        <td>০১</td>
                        <td>Hospital</td>
                        <td>200</td>
                        <td>23/02/2025</td>
                    </tr>
                    <tr>
                        <td>০১</td>
                        <td>Hospital</td>
                        <td>200</td>
                        <td>23/02/2025</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/NewMember.css') }}">
@endpush
@push('scripts')
@endpush
