<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ getPageMeta('title') }} | {{  config('app.name') }}</title>
    @include('word-admin.layouts.partials._styles')

</head>
<body>
    <div class="container-fluid">
        @include('word-admin.layouts.partials._header')

        <div class="row">
            <div class="col-md-12">
                @include('word-admin.layouts.partials._breadcrumb')
                @yield('content')
            </div>
        </div>

        @include('word-admin.layouts.partials._footer')
    </div>
    @include('word-admin.layouts.partials._scripts')

</body>
</html>
