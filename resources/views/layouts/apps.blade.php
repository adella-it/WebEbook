<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="{{ asset('./assets/images/favicon.png') }}" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Amazing E-Book</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('./assets/css/bootstrap.css') }}" />
  <!-- font awesome style -->
  <link href="{{ asset('./assets/css/font-awesome.min.css') }}" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="{{ asset('./assets/css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('./assets/css/responsive.css') }}" rel="stylesheet" />

</head>

<body>
<!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              Amazing E-Book
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>
                        @guest
                           <div class="collapse navbar-collapse" id="navbarSupportedContent">
                              <ul class="navbar-nav">
                                @if (Route::has('login'))
                                  <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                  </li>
                                @endif

                                @if (Route::has('register'))
                                <li class="nav-item">
                                  <a class="nav-link" href="{{ route('register') }}">{{ __('Signup') }}</a>
                                </li>
                                @endif
                                  <li class="nav-item dropdown">
                                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <img src="{{ __(app()->getLocale().'.png') }}" style="width: 20px;" class="flag-icon" alt=""> {{ app()->getLocale() }}
                                  </a>

                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(app()->getLocale() == 'id')
                                    <a href="{{ url('locale/en') }}" class="dropdown-item"><img style="width: 20px;" src="{{ __('en.png') }}"> {{ __('English') }}</a>
                                    @endif
                                    @if(app()->getLocale() == 'en')
                                    <a href="{{ url('locale/id') }}" class="dropdown-item"><img style="width: 20px;" src="{{ __('id.png') }}"> {{ __('Indonesian') }}</a>
                                    @endif
                                  </div>
                                </li>
                              </ul>
                            </div>
                        @else
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                              <ul class="navbar-nav">
                                <li class="nav-item active">
                                  <a class="nav-link pl-lg-0" href="{{ url('/') }}">{{ __('Home') }} <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="{{ route('profile') }}">{{ __('Profile') }}</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="{{ route('order') }}">{{ __('Cart') }}</a>
                                </li>
                                @if (Auth::user()->role_id == 1)
                                  <li class="nav-item">
                                    <a class="nav-link" href="{{ route('account_maintenance') }}">{{ __('Account Maintenance') }}</a>
                                  </li>
                                @endif
                                <li class="nav-item dropdown">
                                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <img src="{{ __(app()->getLocale().'.png') }}" style="width: 20px;" class="flag-icon" alt=""> {{ app()->getLocale() }}
                                  </a>

                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(app()->getLocale() == 'id')
                                    <a href="{{ url('locale/en') }}" class="dropdown-item"><img style="width: 20px;" src="{{ __('en.png') }}"> {{ __('English') }}</a>
                                    @endif
                                    @if(app()->getLocale() == 'en')
                                    <a href="{{ url('locale/id') }}" class="dropdown-item"><img style="width: 20px;" src="{{ __('id.png') }}"> {{ __('Indonesian') }}</a>
                                    @endif
                                  </div>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="{{ route('logout') }}">{{ __('Logout') }}</a>
                                </li>
                              </ul>
                            </div>
                        @endguest



        </nav>
      </div>
    </header>
    <!-- end header section -->
@yield('users')


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="{{ asset('./assets/js/jquery-3.4.1.min.js') }}"></script>
  <!-- bootstrap js -->
  <script src="{{ asset('./assets/js/bootstrap.js') }}"></script>
  <!-- custom js -->
  <script src="{{ asset('./assets/js/custom.js') }}"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>
