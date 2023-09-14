@extends('adminlte::page')
@section('content_header')
    <a href="{{ route('contact.index') }}" class="btn btn-info">Show All Contact</a>
    <h1>Update Contact </h1>
@stop

@section('content')
    <x-massege />

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <form method="POST" action="{{ route('contact.update',$contact->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $contact->name }}" required autocomplete="name" autofocus>

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
                                        value="{{ $contact->phone }}" required autocomplete="name" autofocus>

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
                                        value="{{ $contact->email }}" required autocomplete="email">

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
                                    <select name="reason_for_communication" id="reason_for_communication" class="form-control">
                                        <option {{ $contact->reason_for_communication == 'استفسار' ? 'selected' : '' }} value="استفسار">استفسار</option>
                                        <option {{ $contact->reason_for_communication == 'استبدال' ? 'selected' : '' }} value="استبدال">استبدال</option>
                                        <option {{ $contact->reason_for_communication == 'استرجاع' ? 'selected' : '' }} value="استرجاع">استرجاع</option>
                                        <option {{ $contact->reason_for_communication == 'استعجال اوردر' ? 'selected' : '' }}  value="استعجال اوردر">استعجال اوردر</option>
                                        <option {{ $contact->reason_for_communication == 'اخري' ? 'selected' : '' }}  value="اخري">اخري</option>
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
                                        value="{{ $contact->massage }}" required autocomplete="massage">

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
                            {{ __('Update Massege') }}
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@stop
