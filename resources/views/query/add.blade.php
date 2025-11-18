<x-app-layout>

    <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
        <div>
            <h1 class="page-title fw-medium fs-18 mb-2"> Add Query</h1>
            <div class="">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Add Query</a></li>

                    </ol>
                </nav>
            </div>
        </div>
        <div class="d-flex gap-2">

        </div>
    </div>
    <!-- Page Header Close -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Add Query
                    </div>
                    <div class="prism-toggle">
                        
                    </div>
                </div>
                <form action="{{ route('query.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="row gy-4">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <label for="input-label" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="input">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <label for="input-label" class="form-label">Name</label>
                            <select name="query_category" id="" class="form-control">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <label for="input-label" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="text-area" rows="3"></textarea>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <label for="input-placeholder" class="form-label">SQL Statement</label>
                            <textarea class="form-control" name="sql_statement" id="text-area" rows="5"></textarea>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <label for="parameter_1" class="form-label">Parameter 1</label>
                            <input type="text" name="parameter_1" class="form-control" id="parameter_1" placeholder="StartDate">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <label for="parameter_1_type" class="form-label">Parameter 1 Type</label>
                            <select name="parameter_1_type" id="parameter_1_type" class="form-control">
                                <option value="date">Date</option>
                                <option value="text">Text</option>
                                <option value="number">Number</option>
                            </select>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <label for="parameter_2" class="form-label">Parameter 2</label>
                            <input type="text" name="parameter_2" class="form-control" id="parameter_2" placeholder="EndDate">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <label for="parameter_2_type" class="form-label">Parameter 2 Type</label>
                            <select name="parameter_2_type" id="" class="form-control">
                                <option value="date">Date</option>
                                <option value="text">Text</option>
                                <option value="number">Number</option>
                            </select>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <label for="input-tel" class="form-label">Parameter 3</label>
                            <input type="text" name="parameter_3" class="form-control" id="input-tel">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <label for="parameter_3_type" class="form-label">Parameter 3 Type</label>
                            <select name="parameter_3_type" id="" class="form-control">
                                <option value="text">Text</option>
                                <option value="number">Number</option>
                                <option value="date">Date</option>
                            </select>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <label for="input-week" class="form-label">Parameter 4</label>
                            <input type="text" name="parameter_4" class="form-control" id="input-week">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <label for="input-month" class="form-label">Parameter 4 Type</label>
                            <select name="parameter_4_type" id="" class="form-control">
                                <option value="text">Text</option>
                                <option value="number">Number</option>
                                <option value="date">Date</option>
                            </select>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <label for="input-time" class="form-label">Has External Query Dependencies </label>
                            <select name="has_dependencies" id="" class="form-control">
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <label for="keyword" class="form-label">Keyword</label>
                            <input type="text" name="keyword" class="form-control" id="keyword">
                        </div>


                    </div>
                </div>
                <div class="card-footer  border-top-0 my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div></div>
                   <div>
                     <button type="reset" class="btn btn-default btn-wave waves-effect waves-light">Reset</button>
                    <button class="btn btn-primary btn-wave waves-effect waves-light">Submit</button>
                   </div>

                </div>
            </div>
            </form>
        </div>
    </div>

</x-app-layout>