@extends('adminlte::page')
@section('content_header')
    <a href="{{ route('contact.index') }}" class="btn btn-info">Show All Contact</a>
    <h1>Create Contact </h1>
@stop

@section('content')
    <x-massege />

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <form method="POST" action="{{ route('contact.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="number"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" required autocomplete="name" autofocus>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="type"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Reason for communication') }}</label>

                                <div class="col-md-6">
                                    <select name="reason_for_communication" id="reason_for_communication"
                                        class="form-control">
                                        <option value="">- اضغط هنا لاختيرا السبب -</option>
                                        <option value="استفسار">استفسار</option>
                                        <option value="استبدال">استبدال</option>
                                        <option value="استرجاع">استرجاع</option>
                                        <option value="استعجال اوردر">استعجال اوردر</option>
                                        <option value="اخري">اخري</option>
                                    </select>
                                    @error('reason_for_communication')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="massage"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Massage') }}</label>

                                <div class="col-md-6">
                                    <input id="massage" type="text"
                                        class="form-control @error('massage') is-invalid @enderror" name="massage"
                                        value="{{ old('massage') }}" required autocomplete="massage">

                                    @error('massage')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Massege') }}
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@stop
