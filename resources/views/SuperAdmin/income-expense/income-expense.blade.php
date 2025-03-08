@extends('SuperAdmin.layouts.app')

@section('content')
<div class="pb-5">
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
            <form action="{{ route('super-admin.income-expense.store') }}" method="POST" class="account-add-form">
                @csrf
                <input type="hidden" name="type" value="income">

                <label for="amount">এমাউন্ট</label>
                <input type="text" name="amount" placeholder="Amount.." required>

                <label for="invoice_id">ইনভোইস আইডি</label>
                <input type="text" name="invoice_id" placeholder="Invoice id.." required>

                <label for="date">তারিখ</label>
                <input type="date" name="date" required>

                <label for="purpose">উদ্দেশ্য</label>
                <input type="text" name="purpose" placeholder="purpose.." required>

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
                    @foreach ($incomes as $index => $income)
                    <tr>
                        <td>
                            <div class="center-item">{{ convertToBangla($index + 1) }}</div>
                        </td>
                        <td>
                            <div class="center-item">{{ convertToBangla(date('d-m-Y', strtotime($income->date))) }}</div>
                        </td>
                        <td>
                            <div class="center-item">{{ convertToBangla(number_format($income->amount, 2)) }}</div>
                        </td>
                        <td>
                            <div class="center-item">{{ ($income->invoice_id) }}</div>
                        </td>
                        <td>
                            <div class="center-item">{{ $income->purpose }}</div>
                        </td>
                    </tr>
                    @endforeach
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
            <form action="{{ route('super-admin.income-expense.store') }}" method="POST" class="account-add-form">
                @csrf
                <input type="hidden" name="type" value="expense">

                <label for="amount">এমাউন্ট</label>
                <input type="text" name="amount" placeholder="Amount.." required>

                <label for="invoice_id">ইনভোইস আইডি</label>
                <input type="text" name="invoice_id" placeholder="Invoice id.." required>

                <label for="date">তারিখ</label>
                <input type="date" name="date" required>

                <label for="purpose">উদ্দেশ্য</label>
                <input type="text" name="purpose" placeholder="purpose.." required>

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
                    @foreach ($expenses as $index => $expense)
                    <tr>
                        <td>
                            <div class="center-item">{{ convertToBangla($index + 1) }}</div>
                        </td>
                        <td>
                            <div class="center-item">{{ convertToBangla(date('d-m-Y', strtotime($expense->date))) }}</div>
                        </td>
                        <td>
                            <div class="center-item">{{ convertToBangla(number_format($expense->amount, 2)) }}</div>
                        </td>
                        <td>
                            <div class="center-item">{{ ($expense->invoice_id) }}</div>
                        </td>
                        <td>
                            <div class="center-item">{{ $expense->purpose }}</div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('styles')
@endpush
