<form method="POST" action="{{ route('FAQ.update',$fAQ->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row mb-3">
        <label for="status"
               class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>

        <div class="col-md-6">
            <select name="status" id="status" class="form-control">
                <option {{ $fAQ->status == 1 ? 'selected' : '' }} value="1">تعرضها</option>
                <option {{ $fAQ->status == 0 ? 'selected' : '' }} value="0">لا تعرضها</option>
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
                   value="{{ $fAQ->question }}" required autocomplete="city" autofocus>

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
                   class="form-control @error('answer') is-invalid @enderror" name="answer"
                   value="{{ $fAQ->answer }}" required autocomplete="answer" autofocus>

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
                {{ __('Update FAQ') }}
            </button>
        </div>
    </div>
</form>

