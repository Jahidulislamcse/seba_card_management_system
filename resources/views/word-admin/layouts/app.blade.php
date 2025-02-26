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

        <!--   Core JS Files   -->
        <script src="{{ asset('backend/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('backend/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('backend/js/plugin/datatables/datatables.min.js') }}"></script>
    @if (session('success'))
    <script>
        $(document).ready(function() {
            $.notify({
                icon: 'icon-bell',
                message: '{{ session('
                success ') }}',
            }, {
                type: 'success',
                placement: {
                    from: "bottom",
                    align: "right"
                },
                time: 1000,
            });

            $.notify({
                icon: 'icon-bell',
                message: '{{ session('
                errors ') }}',
            }, {
                type: 'errors',
                placement: {
                    from: "bottom",
                    align: "right"
                },
                time: 1000,
            });
        });
    </script>
    @endif
    <script>
        $(document).ready(function() {
            $("#basic-datatables").DataTable({});

        });
    </script>

    <script>
        $(document).ready(function() {
            const form = $('#search-filter-form');
            form.on('submit', function(e) {
                e.preventDefault();
                const url = form.attr('action'); // Form action URL
                const data = form.serialize(); // Serialize form data
                // console.log(data);

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: data,
                    success: function(response) {
                        $('#data-container').html(response); // Update the table
                    },
                    error: function() {
                        alert('Something went wrong. Please try again.');
                    },
                });
            });

            // Trigger form submit on dropdown change
            $('#per_page, #order_by').on('change', function() {
                form.submit();
            });
            $('#search').on('keyup', function() {
                form.submit();
            });

        });


        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            const url = $(this).attr('href');
            const formData = $('#search-filter-form').serialize(); // Serialize form data

            // Merge the pagination URL with the current form data
            const ajaxUrl = url.includes('?') ? `${url}&${formData}` : `${url}?${formData}`;

            $.get(ajaxUrl, function(response) {
                $('#data-container').html(response);
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
