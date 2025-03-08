<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ getPageMeta('title') }} | {{ config('app.name') }}</title>
    @include('SuperAdmin.layouts.partials._styles')
</head>

<body>

    <div class="container">
        <div class="content">
            <!-- header start -->
            @include('SuperAdmin.layouts.partials._header')
            <!-- header end -->
            @yield('content')

            <!-- footer start -->
            @include('SuperAdmin.layouts.partials._footer')
            <!-- footer end -->
        </div>
    </div>

    @include('SuperAdmin.layouts.partials._scripts')


</body>

</html>
