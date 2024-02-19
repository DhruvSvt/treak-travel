<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>


<body class="text-left">

    <!-- ============ Compact Layout start ============= -->
    <!-- ============Deafult  Large SIdebar Layout start ============= -->
    <div class="auth-layout-wrap" style="background-image: url(assets/images/photo-wide-4.jpg)">
        <div class="auth-content">
            <div class="card o-hidden">
                <div class="row">
                    <div class="col-md-6">
                        <div class="p-4">
                            <div class="auth-logo text-center mb-4">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="">
                            </div>
                            <h1 class="mb-3 text-18">Sign In</h1>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input id="email" name="email" class="form-control form-control-rounded" type="email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" name="password" class="form-control form-control-rounded" type="password">
                                </div>
                                <button class="btn btn-rounded btn-primary btn-block mt-2">Sign In</button>

                            </form>

                            @error('email')
                                <div style="color: red">{{ $message }}</div>
                            @enderror


                        </div>
                    </div>
                    <div class="col-md-6 text-center "
                        style="background-size: cover;background-image: url(assets/images/photo-long-3.jpg">
                        <div class="pr-3 auth-right">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=============== End app-admin-wrap ================-->

    @include('includes.footer')


</body>

</html>
