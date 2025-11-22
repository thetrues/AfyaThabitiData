<x-app-layout>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">

    <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
        <div>
            <h1 class="page-title fw-medium fs-18 mb-2"> {{$query->name}}</h1>
            <div class="">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Queries</a></li>
                    </ol>
                </nav>
            </div>
        </div>
       
        <div class="d-flex gap-2">
        </div>

    </div>

    <!-- Start:: row-4 -->
    <div class="row">

        <div class="col-xl-12">

            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">{{ $query->name }}</div>
                </div>
                <div class="card-body">
                    <div id="loading-indicator" class="text-center py-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2 text-muted">Loading data...</p>
                    </div>
                    <div id="dataDisplay"></div>
                </div>
            </div>

            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">Query Details</div>
                </div>
                <div class="card-body">
                    <p>{{ $query->description }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End:: row-4 -->

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <!-- include commonjs.html"-->

    <!-- include custom_switcherjs.html"-->

    <!-- Jquery Cdn -->

    <!-- Datatables Cdn -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <!-- Internal Datatables JS -->
    <script src="../assets/js/datatables.js"></script>

    <!-- Custom JS -->
    <script src="../assets/js/custom.js"></script>

    <script>
        $(document).ready(function() {
            // Fetch data from the API
            //  $('#loading-indicator').show();
            $.ajax({
                url: '/api/data', // Replace with your API endpoint
                method: 'post',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    'id': '{{$query->id}}',
                    //'start_date': ,
                    //'end_date': 
                },
                success: function(response) {
                    $('#loading-indicator').hide();
                    console.log('Data fetched:', response.data);
                    // Generate columns dynamically from response
                    var columns = [];
                    if (response.data && response.data.length > 0) {
                        // Get column names from first row
                        Object.keys(response.data[0]).forEach(function(key) {
                            columns.push({
                                title: key.charAt(0).toUpperCase() + key.slice(1).replace(/_/g, ' '),
                                data: key
                            });
                        });
                    }

                    console.log('Columns:', columns);

                    // Initialize DataTable with dynamic columns and data
                    $('#dataDisplay').html('<table id="file-export" class="table table-bordered text-nowrap w-100"><thead><tr></tr></thead><tbody></tbody></table>');
                    $('#file-export').DataTable({
                        data: response.data,
                        columns: columns,
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ],
                        responsive: true,
                        destroy: true
                    });
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        });
    </script>

</x-app-layout>