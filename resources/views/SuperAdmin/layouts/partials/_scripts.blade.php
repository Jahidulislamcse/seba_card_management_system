    <!--   Core JS Files   -->
    <script src="{{ asset('backend/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('WardAdmin/assets/js/script.js')}}"></script>
    <script src="{{ asset('WardAdmin/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://kit.fontawesome.com/696233e01c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <!-- parsley -->
    <script src="{{ asset('libs/parsleyjs/parsley.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('libs/select2/js/select2.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('backend/js/plugin/datatables/datatables.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('libs/toastr/toastr.min.js') }}"></script>
    <!-- SweetAlert -->
    <script src="{{ asset('libs/sweetalert/sweetalert.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            // if ($("#basic-datatables").length) {
            //     $("#basic-datatables").DataTable({});
            // }
            if ($("form").length) {
                $('form').parsley();
            }

            $('#total-select-paginate').on('change', function () {
                var selectedTotal = $(this).val();

                // Get the current URL and query parameters
                var url = new URL(window.location.href);

                // Update or add the 'total' query parameter
                url.searchParams.set('total', selectedTotal);

                // Redirect to the new URL
                window.location.href = url.toString();
            });

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
    @if ($errors->any())
        <script>
            @foreach ($errors->all() as $error)
                toastr.error(@json($error));
            @endforeach
        </script>
    @endif


    @stack('scripts')
