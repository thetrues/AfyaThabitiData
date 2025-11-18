<x-guest-layout>
    <div class="row justify-content-center authentication authentication-basic align-items-center h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                <div class="rounded my-4 bg-white basic-page">
                    <div class="basicpage-border"></div>
                    <div class="basicpage-border1"></div>
                    <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="card-body p-5">
                        <div class="mb-3 d-flex justify-content-center"> 
                            <a href="index.html"> 
                                <img src="assets/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo"> 
                                <img src="assets/images/brand-logos/desktop-dark.png" alt="logo" class="desktop-dark"> 
                            </a> 
                        </div>
                        <p class="h4 fw-semibold mb-2 text-center">Sign In</p>
                         <x-auth-session-status class="mb-4" :status="session('status')" />
                        <div class="row gy-3">
                            <div class="col-xl-12">
                                <label for="email" :value="__('Email')"  class="form-label text-default" >Email</label>
                                <input class="form-control" placeholder="user name"  type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                            </div>
                            <div class="col-xl-12 mb-2">
                                <label for="password" :value="__('Password')"  class="form-label text-default d-block">Password<a href="reset-password-basic.html" class="float-end  link-danger op-5 fw-medium fs-12">Forget password ?</a></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" placeholder="password" name="password" required autocomplete="current-password">
                                    <a href="javascript:void(0);" class="input-group-text text-muted" onclick="createpassword('signin-password',this)"><i class="ri-eye-off-line align-middle"></i></a>
                                </div>
                                <div class="mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label text-muted fw-normal fs-12" for="defaultCheck1">
                                            Remember password ?
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary">Sign In</button>
                        </div>
                        <div class="text-center">
                            <p class="text-muted mt-3 mb-0">Dont have an account? <a href="#" class="text-primary">Request One From Admin</a></p>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
</x-guest-layout>
