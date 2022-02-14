@extends('layouts.apps')
@section('users')
  <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ">
          <div class="heading_container ">
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{session('error')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                 @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            <h2 class="">
              {{ __('Login') }}
            </h2>
          </div>

          <form action="{{ route('proses_login') }}" method="POST">
              @csrf
            <div>
              <input type="text" placeholder="Email" name="email" />
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div>
              <input type="password" placeholder="{{ __('Password') }}" name="password" />
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="btn-box">
              <button>
                {{ __('Login') }}
              </button>
            </div>
          </form>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="{{ asset('./assets/images/contact-img.png') }}" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->
@endsection
