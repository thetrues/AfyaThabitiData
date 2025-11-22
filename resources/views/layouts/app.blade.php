<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-width="default" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> AfyaThabiti </title>
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/brand-logos/favicon.ico')}}" type="image/x-icon">

    <!-- Choices JS -->
    <script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js')}}"></script>

    <!-- Main Theme Js -->
    <script src="{{ asset('assets/js/main.js')}}"></script>

    <!-- Bootstrap Css -->
    <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Style Css -->
    <link href="{{ asset('assets/css/styles.css')}}" rel="stylesheet">

    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.css')}}" rel="stylesheet">

    <!-- Node Waves Css -->
    <link href="{{ asset('assets/libs/node-waves/waves.min.css')}}" rel="stylesheet">

    <!-- Simplebar Css -->
    <link href="{{ asset('assets/libs/simplebar/simplebar.min.css')}}" rel="stylesheet">

    <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/libs/@simonwep/pickr/themes/nano.min.cs')}}s">

    <!-- Choices Css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/choices.js/public/assets/styles/choices.min.css')}}">

    <!-- FlatPickr CSS -->
    <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css')}}">

    <!-- Auto Complete CSS -->
    <link rel="stylesheet" href="{{ asset('assets/libs/@tarekraafat/autocomplete.js/css/autoComplete.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/libs/toastify-js/src/toastify.css')}}">

    <!-- Prism CSS -->
    <link rel="stylesheet" href="{{ asset('assets/libs/prismjs/themes/prism-coy.min.css')}}">

</head>

<body>



    <!-- Loader -->
    <div id="loader">
        <img src="assets/images/media/loader.svg" alt="">
    </div>
    <!-- Loader -->

    <div class="page">
        <!-- app-header -->
        @include('layouts.header')
        <!-- /app-header -->
        <!-- Start::app-sidebar -->
        @include('layouts.asidebar')
        <!-- End::app-sidebar -->

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">
                @php
                $filterParameters = session('filter_parameters', []);
                @endphp
                @if(!empty($filterParameters))
                <div class="alert alert-success d-flex align-items-center m-2" role="alert">
                    <strong>Current Filters Applied:</strong>
                    Facility: {{ $filterParameters['facility'] ?? 'N/A' }}
                    Start Date: {{ $filterParameters['start_date'] ?? 'N/A' }}
                    End Date: {{ $filterParameters['end_date'] ?? 'N/A' }}
                </div>
                @endif


                {{ $slot }}
            </div>
        </div>
        <!-- End::app-content -->

        <!-- Toasts if error -->
        @if(session('error'))
          <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="solid-dangerToast" class="toast colored-toast bg-danger text-fixed-white show" role="alert" aria-live="assertive"
                aria-atomic="true" data-bs-autohide="false">
                <div class="toast-header bg-danger text-fixed-white">
                   
                    <strong class="me-auto">Error</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('error') }}
                </div>
            </div>
        </div>
        @endif

           @if(session('success'))
          <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="solid-successToast" class="toast colored-toast bg-success text-fixed-white show" role="alert" aria-live="assertive"
                aria-atomic="true" data-bs-autohide="false">
                <div class="toast-header bg-success text-fixed-white">
                   
                    <strong class="me-auto">Success</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>
        @endif

       



        <!-- Footer Start -->
        <footer class="footer mt-auto py-3 bg-white text-center">
            <div class="container">
                <span class="text-muted"> Copyright © <span id="year"></span> <a
                        href="javascript:void(0);" class="text-dark fw-medium">Vertix</a>.
                    Designed with <span class="bi bi-heart-fill text-danger"></span> by <a href="javascript:void(0);">
                        <span class="fw-medium text-primary">Samweli Abdallah</span>
                    </a> All
                    rights
                    reserved
                </span>
            </div>
        </footer>
        <!-- Footer End -->

        <div class="modal fade" id="header-responsive-search" tabindex="-1" aria-labelledby="header-responsive-search" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="input-group">
                            <input type="text" class="form-control border-end-0" placeholder="Search Anything ..."
                                aria-label="Search Anything ..." aria-describedby="button-addon2">
                            <button class="btn btn-primary" type="button"
                                id="button-addon2"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow lh-1"><i class="ti ti-caret-up fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <!-- Scroll To Top -->

    <!-- Popper JS -->
    <script src="{{ asset('assets/libs/@popperjs/core/umd/popper.min.js')}}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Defaultmenu JS -->
    <script src="{{ asset('assets/js/defaultmenu.min.js')}}"></script>

    <!-- Node Waves JS-->
    <script src="{{ asset('assets/libs/node-waves/waves.min.js')}}"></script>

    <!-- Sticky JS -->
    <script src="{{ asset('assets/js/sticky.js')}}"></script>

    <!-- Simplebar JS -->
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ asset('assets/js/simplebar.js')}}"></script>

    <!-- Auto Complete JS -->
    <script src="{{ asset('assets/libs/@tarekraafat/autocomplete.js/autoComplete.min.js')}}"></script>

    <!-- Color Picker JS -->
    <script src="{{ asset('assets/libs/@simonwep/pickr/pickr.es5.min.js')}}"></script>

    <!-- Date & Time Picker JS -->
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>


    <!-- Apex Charts JS -->
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

    <!-- Ecommerce Dashboard -->
    <script src="{{ asset('assets/js/ecommerce-dashboard.js')}}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/custom.js')}}"></script>

    <script>
        function submitFilter() {
            const form = document.getElementById('filterForm');
            const formData = new FormData(form);

            fetch('{{ route("data.filter") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        facility: formData.get('facility'),
                        start_date: formData.get('start_date'),
                        end_date: formData.get('end_date')
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Success:', data);
                    // reload the page to reflect the applied filters
                    location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>

</body>

</html>