    <!--   Core JS Files   -->
    <script src="{{ asset('backend/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://kit.fontawesome.com/696233e01c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <!-- parsley -->
    {{-- <script src="{{ asset('libs/parsleyjs/parsley.min.js') }}"></script> --}}
    <!-- Select2 -->
    <script src="{{ asset('libs/select2/js/select2.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('backend/js/plugin/datatables/datatables.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('libs/toastr/toastr.min.js') }}"></script>
    <!-- SweetAlert -->
    <script src="{{ asset('libs/sweetalert/sweetalert.min.js') }}"></script>
    @if ($errors->any())
    <script>
            @foreach ($errors->all() as $error)
                toastr.error(@json($error));
            @endforeach
        </script>
    @endif
    <script>
        $(document).ready(function () {
            if ($("#basic-datatables").length) {
                $("#basic-datatables").DataTable({});
            }

        });
    </script>

    <script>
        if (typeof Swiper !== "undefined") {
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
        }
    </script>

    <script>
        toastr.options = {
            closeButton: true,
            progressBar: true
        };

        @if(Session::has('success'))
            toastr.success(@json(session('success')));
        @endif

        @if(Session::has('error'))
            toastr.error(@json(session('error')));
        @endif

        @if(Session::has('info'))
            toastr.info(@json(session('info')));
        @endif

        @if(Session::has('warning'))
            toastr.warning(@json(session('warning')));
        @endif
    </script>



    @stack('scripts')
