@extends('WardAdmin.layouts.app')

@section('content')
    <div>
        <form action="#" class="p-2 pt-3">
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

            <button type="button" class="button">Submit</button>
        </form>

        <!-- table start -->
        <div class="user-table mt-3">
            <table class="table report-table  simple-table">
                <thead>
                    <tr>
                        <th>ক্রমিক নং</th>
                        <th>তা‌রিখ</th>
                        <th>কার্ড গ্রহণ</th>
                        <th>কার্ড এক্টিভ</th>
                        <th>কার্ড স্টক</th>
                        <th>মা‌নি এড</th>
                        <th>মা‌নি স্টক</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>০১</td>
                        <td>23/02/2025</td>
                        <td>5</td>
                        <td>active</td>
                        <td>2</td>
                        <td>5000</td>
                        <td>450</td>
                    </tr>
                    <tr>
                        <td>০১</td>
                        <td>23/02/2025</td>
                        <td>5</td>
                        <td>active</td>
                        <td>2</td>
                        <td>5000</td>
                        <td>450</td>
                    </tr>
                    <tr>
                        <td>০১</td>
                        <td>23/02/2025</td>
                        <td>5</td>
                        <td>active</td>
                        <td>2</td>
                        <td>5000</td>
                        <td>450</td>
                    </tr>
                    <tr>
                        <td>০১</td>
                        <td>23/02/2025</td>
                        <td>5</td>
                        <td>active</td>
                        <td>2</td>
                        <td>5000</td>
                        <td>450</td>
                    </tr>
                    <tr>
                        <td>০১</td>
                        <td>23/02/2025</td>
                        <td>5</td>
                        <td>active</td>
                        <td>2</td>
                        <td>5000</td>
                        <td>450</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- table start -->
    </div>
@endsection
@push('styles')
@endpush
@push('scripts')
@endpush
