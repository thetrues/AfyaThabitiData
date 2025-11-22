<x-app-layout>
    <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
        <div>
            <h1 class="page-title fw-medium fs-18 mb-2">Edit User</h1>
            <div class="">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.list') }}">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">User Information</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                <small class="form-text text-muted">Leave blank to keep current password</small>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="region" class="form-label">Region</label>
                               <select class="form-select @error('region') is-invalid @enderror" id="region" name="region">
                                   @foreach($regions as $region)
                                        <option value="{{ $region }}" {{ old('region', $user->region) == $region ? 'selected' : '' }}>{{ $region }}</option>
                                      @endforeach
                               </select>
                                @error('region')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" value="Tanzania" readonly>
                                @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <h6 class="mb-3">User Permissions & Status</h6>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_admin" name="is_admin" value="1" {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_admin">Admin</label>
                                </div>
                            </div>
                            
                            <div class="col-md-3 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $user->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Active</label>
                                </div>
                            </div>
                            
                            <div class="col-md-3 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_verified" name="is_verified" value="1" {{ old('is_verified', $user->is_verified) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_verified">Verified</label>
                                </div>
                            </div>
                            
                            <div class="col-md-3 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_uploader" name="is_uploader" value="1" {{ old('is_uploader', $user->is_uploader) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_uploader">Uploader</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_query_admin" name="is_query_admin" value="1" {{ old('is_query_admin', $user->is_query_admin) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_query_admin">Query Admin</label>
                                </div>
                            </div>
                            
                            <div class="col-md-3 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="two_factor_enabled" name="two_factor_enabled" value="1" {{ old('two_factor_enabled', $user->two_factor_enabled) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="two_factor_enabled">Two Factor Enabled</label>
                                </div>
                            </div>
                            
                            <div class="col-md-3 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_banned" name="is_banned" value="1" {{ old('is_banned', $user->is_banned) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_banned">Banned</label>
                                </div>
                            </div>
                            
                            <div class="col-md-3 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_suspended" name="is_suspended" value="1" {{ old('is_suspended', $user->is_suspended) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_suspended">Suspended</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Update User</button>
                                <a href="{{ route('users.list') }}" class="btn btn-secondary ms-2">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
