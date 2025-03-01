<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ getPageMeta('title') }} | {{  config('app.name') }}</title>
    @include('WardAdmin.layouts.partials._styles')
</head>
<body>
    <div class="container">
        <div class="content">
            <!-- header start -->
            @include('WardAdmin.layouts.partials._header')
            <!-- header end -->

            @yield('content')

            <!-- footer start -->
            @include('WardAdmin.layouts.partials._footer')
            <!-- footer end -->
        </div>
    </div>

    @include('WardAdmin.layouts.partials._scripts')

    @stack('scripts')
</body>
</html>
