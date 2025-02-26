    <!--   Core JS Files   -->
    <script src="{{ asset('backend/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://kit.fontawesome.com/696233e01c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <!-- parsley -->
    <script src="{{ asset('libs/parsleyjs/parsley.min.js') }}"></script>
    <!-- Select2  -->
    <script src="{{ asset('libs/select2/js/select2.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('backend/js/plugin/datatables/datatables.min.js') }}"></script>

    <script src="{{ asset('libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('libs/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#basic-datatables").DataTable({});

        });
    </script>
    <script>
        var swiper = new Swiper(".FeedBackSwiper", {
            navigation: {
                nextEl: ".swiper-btn-next",
                prevEl: ".swiper-btn-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            keyboard: true
        });
    </script>
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


    @stack('scripts')
