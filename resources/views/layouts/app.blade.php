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
                    use App\Models\Facility;
                @endphp
                @if(!empty($filterParameters))
                <div class="alert alert-info d-flex align-items-center m-2" role="alert">
                    <strong>Current Filters Applied:</strong>
                        &nbsp; &nbsp;
                        @if(isset($filterParameters['region']))
                        <span class="text-dark">Region:</span> {{ $filterParameters['region'] ?? 'N/A' }}
                        &nbsp; &nbsp;
                        @endif
                        @if(isset($filterParameters['council']))
                        <span class="text-dark">Council:</span> {{ $filterParameters['council'] ?? 'N/A' }}
                        &nbsp; &nbsp;
                        @endif
                    @if(isset($filterParameters['facility']))
                    <span class="text-dark">Facility:</span> {{ Facility::getFacilityByHfrCode($filterParameters['facility'])->facility_name ?? 'N/A' }}
                    &nbsp; &nbsp;
                    @endif
                    <span class="text-dark">Start Date:</span> {{ $filterParameters['start_date'] ?? 'N/A' }}
                    &nbsp; &nbsp;
                    <span class="text-dark">End Date:</span> {{ $filterParameters['end_date'] ?? 'N/A' }}
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


                <!-- Filter Modal -->
                <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true" style="z-index:20050;">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="filterModalLabel">Filters</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-2" id="filterForm">
                                    <div class="col-md-4">
                                        <label for="region" class="form-label visually-hidden">Region</label>
                                        <select name="region" id="region" class="form-control" onchange="updateFacilities()">
                                            <option value="all">All Regions</option>
                                            @php $regions = App\Models\Facility::getRegions(); @endphp
                                            @foreach($regions as $region)
                                                <option value="{{ $region->snu_region }}">{{ $region->snu_region }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="council" class="form-label visually-hidden">Council</label>
                                        <select name="council" id="council" class="form-control" onchange="updateFacilitiesByRegionAndCouncil()">
                                            <option value="all">All Councils</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="facility" class="form-label visually-hidden">Facility</label>
                                        <select name="facility" id="facility" class="form-control">
                                            <option value="all">All Facilities</option>
                                            @php $facilities = App\Models\Facility::all(); @endphp
                                            @foreach($facilities as $facility)
                                                <option value="{{ $facility->hfr_code }}">{{ $facility->facility_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="start_date" class="form-label visually-hidden">Start Date</label>
                                        <input class="form-control" type="date" name="start_date" id="start_date" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="end_date" class="form-label visually-hidden">End Date</label>
                                        <input class="form-control" type="date" name="end_date" id="end_date" required>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="submitFilter(); var m = bootstrap.Modal.getInstance(document.getElementById('filterModal')); m && m.hide();">Apply</button>
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
                        region: formData.get('region'),
                        council: formData.get('council'),
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

     <script>

        //updateFacilities()
        function updateFacilities() {
             const region = document.getElementById('region').value;
             const facilitySelect = document.getElementById('facility');
             // Fetch facilities based on selected region
             fetch('/api/facilities-by-region?region=' + encodeURIComponent(region), {
                 headers: { 'X-Requested-With': 'XMLHttpRequest' }
             })
             .then(res => res.ok ? res.json() : Promise.reject(res))
             .then(data => {
                 facilitySelect.innerHTML = '<option value="all">All Facilities</option>';
                 (data || []).forEach(item => {
                     const opt = document.createElement('option');
                     opt.value = item.hfr_code;
                     opt.textContent = item.facility_name;
                     facilitySelect.appendChild(opt);
                 });
             })
             .catch(err => {
                 console.error('Failed to load facilities', err);
             });

             //fetch councils based on selected region
             const councilSelect = document.getElementById('council');
             //show loading indicator
             councilSelect.innerHTML = '<option>Loading...</option>';
             fetch('/api/councils-by-region?region=' + encodeURIComponent(region), {
                 headers: { 'X-Requested-With': 'XMLHttpRequest' }
             })
             .then(res => res.ok ? res.json() : Promise.reject(res))
             .then(data => {
                 councilSelect.innerHTML = '<option value="all">All Councils</option>';
                 (data || []).forEach(item => {
                     const val = item.psnu_council ?? item;
                     const opt = document.createElement('option');
                     opt.value = val;
                     opt.textContent = val;
                     councilSelect.appendChild(opt);
                 });
             })
             .catch(err => {
                 console.error('Failed to load councils', err);
             });
        }
//updateFacilitiesByRegionAndCouncil
        function updateFacilitiesByRegionAndCouncil() {
             const region = document.getElementById('region').value;
             const council = document.getElementById('council').value;
             const facilitySelect = document.getElementById('facility');
             //show loading indicator
             facilitySelect.innerHTML = '<option>Loading...</option>';
             // Fetch facilities based on selected region and council
             fetch('/api/facilities-by-region-and-council?region=' + encodeURIComponent(region) + '&council=' + encodeURIComponent(council), {
                 headers: { 'X-Requested-With': 'XMLHttpRequest' }
             })
             .then(res => res.ok ? res.json() : Promise.reject(res))
             .then(data => {
                 facilitySelect.innerHTML = '<option value="all">All Facilities</option>';
                 (data || []).forEach(item => {
                     const opt = document.createElement('option');
                     opt.value = item.hfr_code;
                     opt.textContent = item.facility_name;
                     facilitySelect.appendChild(opt);
                 });
             })
             .catch(err => {
                 console.error('Failed to load facilities', err);
             });
        }
    </script>

    
                <script>
                    // Ensure modal and backdrop sit above the sticky header if header has a high z-index
                    (function(){
                        var modal = document.getElementById('filterModal');
                        if (!modal) return;
                        modal.addEventListener('show.bs.modal', function () {
                            // wait for backdrop to be inserted
                            setTimeout(function(){
                                var backdrop = document.querySelector('.modal-backdrop');
                                if (backdrop) backdrop.style.zIndex = '20040';
                                modal.style.zIndex = '20050';
                            }, 0);
                        });
                    })();
                </script>

</body>

</html>