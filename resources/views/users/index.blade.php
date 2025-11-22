<x-app-layout>

 <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">

    <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
        <div>
            <h1 class="page-title fw-medium fs-18 mb-2"> Users</h1>
            <div class="">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Users List</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="ti ti-plus me-2"></i> Add New User</a>
        </div>

    </div>

  <!-- Start:: row-4 -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">Users Management</div>
                            </div>
                            <div class="card-body">
                                <div id="dataDisplay">
                                    <table id="dataTableExample" class="table table-bordered table-striped table-vcenter mb-0 text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th class="wd-10p">Name</th>
                                                <th class="wd-15p">Email</th>
                                                <th class="wd-10p">Admin</th>
                                                <th class="wd-10p">Active</th>
                                                <th class="wd-10p">Verified</th>
                                                <th class="wd-10p">Uploader</th>
                                                <th class="wd-10p">Region</th>
                                                <th class="wd-10p">Country</th>
                                                <th class="wd-10p">Created At</th>
                                                <th class="wd-15p">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <span class="badge {{ $user->is_admin ? 'bg-success' : 'bg-secondary' }}">
                                                        {{ $user->is_admin ? 'Yes' : 'No' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge {{ $user->is_active ? 'bg-success' : 'bg-danger' }}">
                                                        {{ $user->is_active ? 'Active' : 'Inactive' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge {{ $user->is_verified ? 'bg-success' : 'bg-warning' }}">
                                                        {{ $user->is_verified ? 'Verified' : 'Unverified' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge {{ $user->is_uploader ? 'bg-info' : 'bg-secondary' }}">
                                                        {{ $user->is_uploader ? 'Yes' : 'No' }}
                                                    </span>
                                                </td>
                                                <td>{{ $user->region ?? 'N/A' }}</td>
                                                <td>{{ $user->country ?? 'N/A' }}</td>
                                                <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">
                                                            <i class="fe fe-edit"></i> Edit
                                                        </a>
                                                        <form action="{{ route('users.delete', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                <i class="fe fe-trash"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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

</x-app-layout>
