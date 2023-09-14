@extends('adminlte::page')
@section('content_header')
    <h1>Update Category</h1>
@stop

@section('content')
    <x-massege />
    <a href="{{ route('category.index') }}" class="btn btn-info">Show All Category</a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Category') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('category.update', $category->id ) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row mb-3">
                                <label for="title"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Title Of Category') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{ $category->title }}" required autocomplete="title" autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Category') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
