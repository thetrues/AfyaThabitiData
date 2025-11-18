<x-app-layout>
    <!-- Page Header -->
    <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
        <div>
            <h1 class="page-title fw-medium fs-18 mb-2">Queries</h1>
            <div class="">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Queries</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Indicators</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-white btn-wave border-0 me-0 fw-normal waves-effect waves-light">
                <i class="ri-filter-3-fill me-2"></i>Filter
            </button>
            <a type="button" href="{{ route('query.add') }}" class="btn btn-primary btn-wave waves-effect waves-light">
                <i class="ri-upload-2-line me-2"></i> Add Query
            </a>
        </div>
    </div>
    <!-- Page Header Close -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        Queries List
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-basic" class="table table-bordered text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Keyword</th>
                                    <th>Category</th>
                                    <th>Last Excution</th>
                                    <th>Excution Count</th>
                                    <th>IsActive</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($queries as $query)
                                <tr>
                                    <td>{{ $query->name }}</td>
                                    <td>{{ $query->description }}</td>
                                    <td>{{ $query->keyword }}</td>
                                    <td>{{ $query->category->name ?? 'N/A' }}</td>
                                    <td>{{ $query->last_execution ? $query->last_execution->format('Y-m-d H:i:s') : 'Never' }}</td>
                                    <td>{{ $query->execution_count }}</td>
                                    <td>
                                        @if($query->is_active)
                                        <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('query.edit', $query->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('query.delete', $query->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>