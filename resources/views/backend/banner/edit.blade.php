@extends('adminlte::page')

@section('content_header')
    <h1>Update banner</h1>
@stop

@section('content')
<x-massege/>
<a href="{{ route('banner.index') }}" class="btn btn-info">Show All banner</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update banner') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('banner.update',$banner->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label for="status"
                                class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                <select name="status" id="status" class="form-control">
                                    <option {{ $banner->status == 1 ? 'selected' : '' }} value="1">تعرضها</option>
                                    <option {{ $banner->status == 0 ? 'selected' : '' }} value="0">لا تعرضها</option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image"
                                class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input type="file" name="image" id="image" value="{{ $banner->image }}" class="form-control">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <img src="\assets\images\banner\{{ $banner->image }}" width="350px" height="150px" >
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update banner') }}
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
