@extends('SuperAdmin.layouts.app')

@section('content')
<div>
    <div class="tab-btns">
        <button type="button" class="active-btn buttons">এড নতুন নো‌টিশ </button>
        <button type="button" class="buttons">নো‌টিশ তা‌লিকা</button>
    </div>
    <form accept="#" class="contents notice-form active_section">
        <label for="title">নো‌টিশ টাইটেল</label>
        <input type="text" name="title" id="title" placeholder="নো‌টিশ টাইটেল">

        <label for="date">তা‌রিখ এড</label>
        <input type="text" name="date" id="date" placeholder="তা‌রিখ এড">

        <label for="file">ফাইল এড</label>
        <input type="file" name="file" id="file" placeholder="ফাইল এড">

        <button class="button save-btn" type="submit">সাবমিট</button>
    </form>
    <div class="contents p-3">
        <p>একটি ত্রুটি সংশোধন মডিউল। ফলস্বরূপ, ত্রুটি সংশোধন মডিউল ব্যবহার করে শব্দ স্তরে OCR সিস্টেমের সামগ্রিক কর্মক্ষমতা 95.29%। এই কর্মক্ষমতা গণনা করা হয়েছিল 20,000 OCR স্বীকৃত শব্দের উপর ভিত্তি করে যা একটি একক ফন্টে</p>
        <div>
            <div>
                <p>একটি ত্রুটি সংশোধন মডিউল। ফলস্বরূপ, ত্রুটি সংশোধন মডিউল ব্যবহার করে শব্দ স্তরে OCR সিস্টেমের সামগ্রিক কর্মক্ষমতা 95.29%। এই কর্মক্ষমতা গণনা করা হয়েছিল 20,000 OCR স্বীকৃত শব্দের উপর ভিত্তি করে যা একটি একক ফন্টে</p>

            </div>
            <div>
                <p>একটি ত্রুটি সংশোধন মডিউল। ফলস্বরূপ, ত্রুটি সংশোধন মডিউল ব্যবহার করে শব্দ স্তরে OCR সিস্টেমের সামগ্রিক কর্মক্ষমতা 95.29%। এই কর্মক্ষমতা গণনা করা হয়েছিল 20,000 OCR স্বীকৃত শব্দের উপর ভিত্তি করে যা একটি একক ফন্টে</p>

            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')

@endpush

@push('scripts')
<script>

</script>
@endpush
