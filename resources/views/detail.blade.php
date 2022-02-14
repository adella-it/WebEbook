@extends('layouts.apps')
@section('users')
<div class="container mt-3">
    <div class="text-center">
        <h2>{{ __('Detail') }}</h2>
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
                                                            <td colspan="2">
                                                    <form action="{{ route('order.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id_buku" value="{{ $ebooks->ebook_id }}">
                                                    <button type="submit" class="btn btn-sm btn-primary">{{ __('Rent Book') }}..</button>
                                                    </form>
                                                            </td>
                                                        </tr>
                                                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
