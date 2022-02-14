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
  position: fixed;
  top: 800px;
  right: 0;
  min-width: 100%;
  font-size: 100px;
  text-align: right;
  filter: alpha(opacity=0);
  opacity: 0;
  outline: none;
  background: white;
  cursor: pointer;
}
</style>
<div class="container mt-3">
    <div class="text-center mb-2">
        <h2>{{ __('Profile') }}</h2>
    </div>
    <div class="text-center">
        <img style="width: 150px; " src="{{ asset('uploads') }}/{{ $akun->display_picture_link }}"/>
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
<div class="d-flex justify-content-center">
    <div class="row mt-5">
        <div class="col-md-12">

                                                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                                            <input type="hidden" name="id_akun" value="{{ Auth::user()->account_id }}">
              @csrf
              <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="">{{ __('First Name') }}</label>
                          <input type="text" name="first_name" class="form-control" value="{{ $akun->first_name }}"/>
                            @if ($errors->has('first_name'))
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                            <div class="form-group">
                            <label for="">{{ __('Middle Name') }}</label>
                            <input type="text" name="middle_name" class="form-control" value="{{ $akun->middle_name }}"/>
                            @if ($errors->has('middle_name'))
                                <span class="text-danger">{{ $errors->first('middle_name') }}</span>
                            @endif
                            </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="">{{ __('Last Name') }}</label>
                          <input type="text" name="last_name" class="form-control" value="{{ $akun->last_name }}"/>
                            @if ($errors->has('last_name'))
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Email</label>
                          <input type="email" name="email" class="form-control" value="{{ $akun->email }}"/>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="">{{ __('Gender') }} (<b>{{ $akun->gender_desc }}</b>)</label>
                            <div class="form-group">
                                @foreach($gender as $genders)
                                <label class="form-check-label">
                                    <input class="form-check-inputs" type="radio" name="gender_id" id="gender_id" {{ $akun->gender_id == $genders->id ? 'checked' : ''}} value="{{ $genders->id }}">
                                    <span style="padding-left: 30px;display: inline; margin-bottom: 1px;">{{ $genders->gender_desc }}</span>
                                </label>
                                @endforeach
                            </div>
                            @if ($errors->has('gender_id'))
                                <span class="text-danger">{{ $errors->first('gender_id') }}</span>
                            @endif
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="">{{ __('Password') }}</label>
                          <input type="password" name="password" class="form-control"/>
                                <span class="text-danger">*{{ __('Leave it blank if not changed') }}</span>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="display_picture_link">{{ __('Display Picture') }}</label>
                            <div class="input-group">
                                <input class="form-control" type="text" readonly>
                                <label class="input-group-btn">
                                    <span class="btn btn-primary btn-file">
                                        {{ __('Search Picture') }}&hellip; <input type="file" name="display_picture_link">
                                    </span>
                                </label>
                            </div>
                            @if ($errors->has('display_picture_link'))
                                <span class="text-danger">{{ $errors->first('display_picture_link') }}</span>
                            @endif
                        </div>
                                <span class="text-danger">*{{ __('Leave it blank if not changed') }}</span>

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
                    </div>

              </div>

            <div class="btn-box">
              <button class="btn btn-sm btn-primary" type="submit">
                Edit Data
              </button>
            </div>
          </form>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
