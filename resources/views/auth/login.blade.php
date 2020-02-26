<!doctype html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Login - CDR BILL COLLECTION SYSTEM</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="{{asset('assets/css/main.87c0748b313a1dda75f5.css')}}" rel="stylesheet">
</head>

<body>
<div class="app-container app-theme-white body-tabs-shadow">
    <div class="app-container">
        <div class="h-100">
            <div class="h-100 no-gutters row">
                <div class="d-none d-lg-block col-lg-4">
                    <div class="slider-light">
                        <div class="slick-slider">
                            <div>
                                <div
                                    class="position-relative h-100 d-flex justify-content-center align-items-center bg-plum-plate"
                                    tabindex="-1">
                                    <div class="slide-img-bg"
                                         style="background-image: url({{asset('assets/images/one.jpeg')}});"></div>

                                </div>
                            </div>
                            <div>
                                <div
                                    class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark"
                                    tabindex="-1">
                                    <div class="slide-img-bg"
                                         style="background-image: url({{asset('assets/images/two.jpeg')}});"></div>

                                </div>
                            </div>
                            <div>
                                <div
                                    class="position-relative h-100 d-flex justify-content-center align-items-center bg-sunny-morning"
                                    tabindex="-1">
                                    <div class="slide-img-bg"
                                         style="background-image: url({{asset('assets/images/three.jpeg')}});"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
                    <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                        <div class="app-logo"></div>
                        <h4 class="mb-0">
                            <span class="d-block">Welcome back,</span>
                            <span>Please sign in to your account.</span></h4>

                        <div class="divider row"></div>
                        <div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group"><label for="exampleEmail" class="">Email</label>

                                            <input id="email" placeholder="Email here..." type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" required
                                                   autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror


                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group"><label for="examplePassword" class="">Password</label>

                                            <input id="password"
                                                   placeholder="Password here..."
                                                   type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" required
                                                   autocomplete="current-password">


                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror


                                        </div>
                                    </div>
                                </div>
                                <div class="position-relative form-check"><input name="check" id="exampleCheck"
                                                                                 type="checkbox"
                                                                                 class="form-check-input"><label
                                        for="exampleCheck" class="form-check-label">Keep me logged in</label></div>
                                <div class="divider row"></div>
                                <div class="d-flex align-items-center">
                                    <div class="ml-auto"><a href="javascript:void(0);" class="btn-lg btn btn-link">Recover
                                            Password</a>
                                        <button class="btn btn-primary btn-lg">Login to Dashboard</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('assets/scripts/main.87c0748b313a1dda75f5.js')}}"></script>
</body>

</html>
