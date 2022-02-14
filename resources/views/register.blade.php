@extends('layouts.apps')
@section('users')
  <script src="{{ asset('./assets/js/jquery-3.4.1.min.js') }}"></script>

<style>
    .form-check {
    position: relative;
    display: block;
}

.form-check.disabled .form-check-label {
    color: #868e96
}

.form-check-label {
    padding-left: 20px;
}
.form-check-inputs{
    margin-top:0px;
    margin-bottom:0px;
    margin-right: -30px;
}
.contact_section input[type=radio] {
    width: 17px;
    height: 15px;
    border: 0;
    border-radius: 25px;
    outline: none;
    padding-bottom: 20px;
    color: #101010;
    background: #f1f1f1;
}


.contact_section select {
    width: 100%;
    border: 0;
    height: 50px;
    border-radius: 25px;
    margin-bottom: 25px;
    padding-left: 25px;
    outline: none;
    color: #101010;
    background: #f1f1f1;
}
.btn-file input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  min-width: 100%;
  min-height: 100%;
  font-size: 100px;
  text-align: right;
  filter: alpha(opacity=0);
  opacity: 0;
  outline: none;
  background: white;
  cursor: inherit;
  display: block;
}
</style>
  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ">
          <div class="heading_container ">
            <h2 class="">
              {{ __('Register') }}
            </h2>
          </div>
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{Session::get('success')}}
                            </div>
                        @elseif(Session::has('failed'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{Session::get('failed')}}
                            </div>
                        @endif
          <form action="{{ route('register.create.user') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="">{{ __('First Name') }}</label>
                          <input type="text" name="firstname" class="form-control" value="{{ old('firstname') }}"/>
                            @if ($errors->has('firstname'))
                                <span class="text-danger">{{ $errors->first('firstname') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                            <div class="form-group">
                            <label for="">{{ __('Middle Name') }}</label>
                            <input type="text" name="middlename" class="form-control" value="{{ old('middlename') }}"/>
                            @if ($errors->has('middlename'))
                                <span class="text-danger">{{ $errors->first('middlename') }}</span>
                            @endif
                            </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="">{{ __('Last Name') }}</label>
                          <input type="text" name="lastname" class="form-control" value="{{ old('lastname') }}"/>
                            @if ($errors->has('lastname'))
                                <span class="text-danger">{{ $errors->first('lastname') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Email</label>
                          <input type="email" name="email" class="form-control" value="{{ old('email') }}"/>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="">{{ __('Gender') }}</label>
                            <div class="form-group">
                                @foreach($gender as $genders)
                                <label class="form-check-label">
                                    <input class="form-check-inputs" type="radio" name="gender"
                                        id="gender" value="{{ $genders->id }}">
                                    <span style="padding-left: 30px;display: inline; margin-bottom: 1px;">{{ $genders->gender_desc }}</span>
                                </label>
                                @endforeach
                            </div>
                             @if ($errors->has('gender'))
                                <span class="text-danger">{{ $errors->first('gender') }}</span>
                            @endif
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Role</label>
                            <select class="form-control" name="role" id="role">
                            <option checked value="">{{ __('Choose') }} Role</option>
                            @foreach($role as $roles)
                            <option value="{{ $roles->id }}">{{ $roles->role_desc }}</option>
                            @endforeach
                            </select>
                            @if ($errors->has('role'))
                                <span class="text-danger">{{ $errors->first('role') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="">{{ __('Password') }}</label>
                          <input type="password" name="password" class="form-control"/>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="display_pict">{{ __('Display Picture') }}</label>
                            <div class="input-group">
                                <input type="text" readonly>
                                <label class="input-group-btn">
                                    <span class="btn btn-primary btn-file">
                                        {{ __('Search Picture') }}&hellip; <input type="file" name="display_pict">
                                    </span>
                                </label>
                            </div>
                            @if ($errors->has('display_pict'))
                                <span class="text-danger">{{ $errors->first('display_pict') }}</span>
                            @endif
                        </div>
                    </div>

              </div>

            <div class="btn-box">
              <button type="submit">
                {{ __('Register') }}
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
  <script>
$(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          }
      });
  });

});
</script>

  <!-- end contact section -->
@endsection
