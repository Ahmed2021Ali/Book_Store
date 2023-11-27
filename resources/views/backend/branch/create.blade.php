<form method="POST" action="{{ route('branch.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="row mb-3">
        <label for="status"
               class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>

        <div class="col-md-6">
            <select name="status" id="status" class="form-control">
                <option value="1">تعرضها</option>
                <option value="0">لا تعرضها</option>
            </select>
            @error('type')
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="city"
               class="col-md-4 col-form-label text-md-end">{{ __('City ') }}</label>

        <div class="col-md-6">
            <input id="city" type="text"
                   class="form-control @error('city') is-invalid @enderror" name="city"
                   value="{{ old('city') }}" required autocomplete="city" autofocus>

            @error('city')
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="address_detail"
               class="col-md-4 col-form-label text-md-end">{{ __('Address detail') }}</label>

        <div class="col-md-6">
            <input id="address_detail" type="text"
                   class="form-control @error('address_detail') is-invalid @enderror" name="address_detail"
                   value="{{ old('address_detail') }}" required autocomplete="address_detail" autofocus>

            @error('address_detail')
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="branch_number"
               class="col-md-4 col-form-label text-md-end">{{ __('Branch Number') }}</label>

        <div class="col-md-6">
            <input id="branch_number" type="text"
                   class="form-control @error('branch_number') is-invalid @enderror" name="branch_number"
                   value="{{ old('branch_number') }}" required autocomplete="branch_number" autofocus>

            @error('branch_number')
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
            @enderror
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Add Branch') }}
            </button>
        </div>
    </div>
</form>

