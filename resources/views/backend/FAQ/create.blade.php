@extends('adminlte::page')
@section('content_header')
    <h1>Create FAQ</h1>
@stop

@section('content')
<x-massege/>
    <a href="{{ route('FAQ.index') }}" class="btn btn-info">Show All FAQ</a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add FAQ') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('FAQ.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="status"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>

                                <div class="col-md-6">
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">تعرضها</option>
                                        <option value="0">لا تعرضها</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="question"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Question ') }}</label>

                                <div class="col-md-6">
                                    <input id="question" type="text"
                                        class="form-control @error('question') is-invalid @enderror" name="question"
                                        value="{{ old('question') }}" required autocomplete="city" autofocus>

                                    @error('question')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="answer"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Answer ') }}</label>

                                <div class="col-md-6">
                                    <input id="answer" type="text"
                                        class="form-control @error('answer') is-invalid @enderror" name="question"
                                        value="{{ old('answer') }}" required autocomplete="answer" autofocus>

                                    @error('answer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add FAQ') }}
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