@extends('layouts.apps')
@section('users')
<div class="container mt-3">
    <div class="text-center">
        <h2>{{ __('Cart') }}</h2>
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
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">{{ __('Book Title') }}</th>
                                <th scope="col">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($ebook as $ebooks)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td scope="row">{{ $ebooks->title }}</td>
                                <td scope="row">
                                    <button data-toggle="modal" data-target="#modelId{{ $ebooks->order_id }}" class="btn btn-sm btn-primary mb-1">{{ __('Detail') }}</button>
                                    <form action="{{ route('order.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_order" value="{{ $ebooks->order_id }}">
                                    <button class="btn btn-sm btn-danger">{{ __('Delete') }}</button>
                                    </form>
                                     <div class="modal fade" id="modelId{{ $ebooks->order_id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ __('Detail') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <td>{{ __('Book Title') }}</td>
                                                            <td>{{ $ebooks->title }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ __('Author') }}</td>
                                                            <td>{{ $ebooks->author }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ __('Description') }}</td>
                                                            <td>{{ $ebooks->description}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ __('Rent Date') }}</td>
                                                            <td>{{ $ebooks->order_date }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                        </div>
                    </div>
                </div>
                                </td>
                            </tr>



                            @endforeach
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
