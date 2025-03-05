@extends('SuperAdmin.layouts.app')

@section('content')
<div>
    <div class="tab-btns">
        <button type="button" class="active-btn buttons">এড নতুন নো‌টিশ </button>
        <button type="button" class="buttons">নো‌টিশ তা‌লিকা</button>
    </div>
    <form action="{{ route('super-admin.notice.store') }}" method="POST" enctype="multipart/form-data" class="contents notice-form active_section">
        @csrf
        <label for="title">নো‌টিশ টাইটেল</label>
        <input type="text" name="title" id="title" placeholder="নো‌টিশ টাইটেল" required>

        <label for="date">তা‌রিখ এড</label>
        <input type="date" name="date" id="date" required>

        <label for="file">ফাইল এড</label>
        <input type="file" name="file" id="file" required>

        <button class="button save-btn" type="submit">সাবমিট</button>
    </form>

    <!-- Display Existing Notices -->
    <div class="contents p-3">
        <table width="100%" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>নো‌টিশ টাইটেল</th>
                    <th>তা‌রিখ</th>
                    <th>ডাউনলোড</th>
                    <th>অপসারণ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notices as $index => $notice)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $notice->title }}</td>
                    <td>{{ \Carbon\Carbon::parse($notice->date)->format('d M, Y') }}</td>
                    <td>
                        @if($notice->file)
                        <a href="{{ route('super-admin.notice.download', basename($notice->file)) }}">ডাউনলোড</a>
                        @else
                        N/A
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('super-admin.notice.destroy', $notice->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('আপনি কি এই নোটিশটি মুছে ফেলতে চান?')">মুছুন</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</div>

@endsection

@push('styles')

@endpush

@push('scripts')
<script>

</script>
@endpush
