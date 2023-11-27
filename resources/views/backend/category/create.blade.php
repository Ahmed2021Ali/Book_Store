<form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="row mb-3">
        <label for="title"
               class="col-md-4 col-form-label text-md-end">{{ __('Title Of Category') }}</label>

        <div class="col-md-6">
            <input id="title" type="text"
                   class="form-control @error('title') is-invalid @enderror" name="title"
                   value="{{ old('title') }}" required autocomplete="title" autofocus>

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
                {{ __('Add Category') }}
            </button>
        </div>
    </div>
</form>

