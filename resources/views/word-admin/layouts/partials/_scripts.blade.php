    <!--   Core JS Files   -->
    <script src="{{ asset('backend/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/core/bootstrap.min.js') }}"></script>

    <!-- parsley -->
    <script src="{{ asset('libs/parsleyjs/parsley.min.js') }}"></script>
    <!-- Select2  -->
    <script src="{{ asset('libs/select2/js/select2.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('backend/js/plugin/datatables/datatables.min.js') }}"></script>

    <script src="{{ asset('libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('libs/sweetalert/sweetalert.min.js') }}"></script>

    <script>

        toastr.options =
            {
                "closeButton": true,
                "progressBar": true
            }
        @if(Session::has('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if(Session::has('error'))
            toastr.error("{{ session('error') }}");
        @endif
        @if(Session::has('info'))
            toastr.info("{{ session('info') }}");
        @endif
        @if(Session::has('warning'))
            toastr.warning("{{ session('warning') }}");
        @endif


    </script>
    @if ($errors->any())
            <script>
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}");
                @endforeach
            </script>
        @endif

    <script>
        $(document).ready(function() {
            $("#basic-datatables").DataTable({});

        });
    </script>
    @stack('scripts')
