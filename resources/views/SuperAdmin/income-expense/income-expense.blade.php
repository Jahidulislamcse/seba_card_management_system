@extends('SuperAdmin.layouts.app')

@section('content')

<div class="tab-btns">
    <button type="button" class="buttons active-btn">আয় হিসাব</button>
    <button type="button" class="buttons">ব্যায় হিসাব</button>
</div>
<div class="contents active_section">
    <div class="tab-btns">
        <button type="button" class="income-btn active-btn">আয় এড করুন</button>
        <button type="button" class="income-btn">আয় লিস্ট</button>
    </div>

    <!-- আয় এড করুন -->
    <div class="income-content active_income">
        <form action="#" class="account-add-form">
            <p class="fw-bold m-0">আয় এড করুন</p>
            <label for="amount">এমাউন্ট</label>
            <input type="text" placeholder="Amount.." id="amount" required>

            <label for="Invoice_id">ইনভোইস আইডি</label>
            <input type="text" placeholder="Invoice id.." id="Invoice_id" required>

            <label for="date">তারিখ</label>
            <input type="date" placeholder="Amount.." id="date" required>

            <label for="purpose">উদ্দেশ্য</label>
            <input type="text" placeholder="purpose.." id="purpose" required>

            <button class="button save-btn">Submit</button>
        </form>
    </div>

    <!-- আয় লিস্ট -->
    <div class="income-content p-2 user-table">
        <table class="table user-manage-table">
            <thead>
                <tr>
                    <th>ক্রমিক নং</th>
                    <th>তারিখ</th>
                    <th>এমাউন্ট</th>
                    <th>ইনভোইস আইডি</th>
                    <th>উদ্দেশ্য</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="center-item">০১</div>
                    </td>
                    <td>
                        <div class="center-item">০২/২০/২০২৯</div>
                    </td>
                    <td>
                        <div class="center-item">৫,০০</div>
                    </td>
                    <td>
                        <div class="center-item">৪৩৫৪৩৭</div>
                    </td>
                    <td>
                        <div class="center-item">ব্যাবসা</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="center-item">০১</div>
                    </td>
                    <td>
                        <div class="center-item">০২/২০/২০২৯</div>
                    </td>
                    <td>
                        <div class="center-item">৫,০০</div>
                    </td>
                    <td>
                        <div class="center-item">৪৩৫৪৩৭</div>
                    </td>
                    <td>
                        <div class="center-item">ব্যাবসা</div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="contents">
    <div class="tab-btns">
        <button type="button" class="cost-btn active-btn">ব্যায় এড করুন</button>
        <button type="button" class="cost-btn">ব্যায় লিস্ট</button>
    </div>

    <!-- ব্যায় এড করুন -->
    <div class="cost-content active_cost">
        <form action="#" class="account-add-form">
            <p class="fw-bold m-0">ব্যায় এড করুন</p>
            <label for="amount">এমাউন্ট</label>
            <input type="text" placeholder="Amount.." id="amount" required>

            <label for="Invoice_id">ইনভোইস আইডি</label>
            <input type="text" placeholder="Invoice id.." id="Invoice_id" required>

            <label for="date">তারিখ</label>
            <input type="date" placeholder="Amount.." id="date" required>

            <label for="purpose">উদ্দেশ্য</label>
            <input type="text" placeholder="purpose.." id="purpose" required>

            <button class="button save-btn">Submit</button>
        </form>
    </div>

    <!-- ব্যায় লিস্ট -->
    <div class="cost-content p-2 user-table">
        <table class="table user-manage-table">
            <thead>
                <tr>
                    <th>ক্রমিক নং</th>
                    <th>তারিখ</th>
                    <th>এমাউন্ট</th>
                    <th>ইনভোইস আইডি</th>
                    <th>উদ্দেশ্য</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="center-item">০১</div>
                    </td>
                    <td>
                        <div class="center-item">০২/২০/২০২৯</div>
                    </td>
                    <td>
                        <div class="center-item">৫,০০</div>
                    </td>
                    <td>
                        <div class="center-item">৪৩৫৪৩৭</div>
                    </td>
                    <td>
                        <div class="center-item">ব্যাবসা</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="center-item">০১</div>
                    </td>
                    <td>
                        <div class="center-item">০২/২০/২০২৯</div>
                    </td>
                    <td>
                        <div class="center-item">৫,০০</div>
                    </td>
                    <td>
                        <div class="center-item">৪৩৫৪৩৭</div>
                    </td>
                    <td>
                        <div class="center-item">ব্যাবসা</div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('styles')
@endpush
