@extends('layouts.apps')
@section('users')
  <script src="{{ asset('./assets/js/jquery-3.4.1.min.js') }}"></script>
<div class="container mt-3">
    <div class="text-center">
        <h2>{{ __('Account Maintenance') }}</h2>
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
            <div class="table-responsive">
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>No</th>
                        <th>{{ __('Complete Name') }}</th>
                        <th>Email</th>
                        <th>{{ __('Display Picture') }}</th>
                        <th>{{ __('Created Date') }}</th>
                        <th>Role</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($acc as $akun)
                        <tr>
                            <td scope="row">{{ $no++ }}</td>
                            <td>{{ $akun->first_name }} {{ $akun->middle_name }} {{ $akun->last_name }}</td>
                            <td>{{ $akun->email }}</td>
                            <td><img style="width: 50px;" src="{{ asset('uploads') }}/{{ $akun->display_picture_link }}"/></td>
                            <td>{{ $akun->modified_at }}</td>
                            <td>{{ $akun->role_desc}}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success btn-sm mb-2" data-toggle="modal" data-target="#modelId{{ $akun->account_id }}">
                                  {{ __('Edit') }} Role
                                </button>
                                <form action="{{ route('register.delete') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="account_id" value="{{ $akun->account_id }}">
                                    <button class="btn btn-sm btn-danger">{{ __('Delete') }}</button>
                                    </form>
                            </td>
                        </tr>


                         <!-- Modal Edit -->
                                <div class="modal fade" id="modelId{{ $akun->account_id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{ __('Edit') }} Role</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                    <div class="container">
                                                        <form action="{{ route('register.update') }}" method="POST">
                                                            <input type="hidden" name="id_akun" value="{{ $akun->account_id }}">
              @csrf
              <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Role</label>
                            <select class="form-control" name="role_id" id="role">
                            @foreach($role as $roles)
                        <option value="{{ $roles->id }}" {{ $akun->role_id == $roles->id ? 'selected' : ''}}>{{ $roles->role_desc }}</option>
                            @endforeach
                            </select>
                                <span class="text-danger">*{{ __('Leave it blank if not changed') }}</span>
                            @if ($errors->has('role_id'))
                                <span class="text-danger">{{ $errors->first('role_id') }}</span>
                            @endif
                        </div>
                    </div>
              </div>
            <div class="btn-box">
              <button class="btn btn-sm btn-primary" type="submit">
                {{ __('Edit') }} Role
              </button>
            </div>
          </form>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </tbody>
            </table>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
