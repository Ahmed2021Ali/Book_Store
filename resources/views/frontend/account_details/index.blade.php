@extends('frontend.layouts.master')

@section('title','الملف الشخصي')

@section('content_page')
    <main>
        <x-navbar-component  message=" حسابي" />

        <section class="section-container profile my-3 my-md-5 py-5 d-md-flex gap-5">
            <div class="profile__right">
                <div class="profile__user mb-3 d-flex gap-3 align-items-center">
                    <div class="profile__user-img rounded-circle overflow-hidden">
                        <img class="w-100" src="/assets/images/users/vector-users-icon.jpg" alt="" />
                    </div>
                    <div class="profile__user-name">{{ Auth::user()->name }}</div>
                </div>
                <x-me.sidbar-profile-component />
            </div>
            <div class="profile__left mt-4 mt-md-0 w-100">
                <div class="profile__tab-content active">
                    <form class="profile__form border p-3" method="post" action="{{ route('profile.update') }}">
                        @csrf
                        @method('put')
                        <div class="w-100">
                            <label class="fw-bold mb-2" for="displayed-name">
                                أسم العرض<span class="required">*</span>
                            </label>
                            <input type="text" value="{{ Auth::user()->name }}" name="name" class="form__input"
                                id="displayed-name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="w-100 mb-3">
                            <label class="fw-bold mb-2" for="email">
                                البريد الالكتروني<span class="required">*</span>
                            </label>
                            <input type="email" value="{{ Auth::user()->email }}" class="form__input" name="email"
                                id="email" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                        </div>

                        {{--                          <div class="w-100 mb-3">
                            <label class="fw-bold mb-2" for="image">
                                تحديث الصورة الشخصية<span></span>
                            </label>
                            <input type="file" value="" class="form__input" name = "image" id="image" />
                        </div>  --}}

                        <button class="primary-button">تعديل</button>
                    </form>
                    <form method="post" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')
                        <fieldset>
                            <legend class="fw-bolder">تغيير كلمة المرور</legend>
                            <div class="w-100 mb-3">
                                <label class="fw-bold mb-2" for="current_password">
                                    كلمة المرور الحالية (اترك الحقل فارغاً إذا كنت لا تودّ
                                    تغييرها)
                                </label>
                                <input type="password" class="form__input" name="current_password" id="current_password" autocomplete="current-password" />
                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                            </div>
                            <div class="w-100 mb-3">
                                <label class="fw-bold mb-2" for="password">
                                    كلمة المرور الجديدة (اترك الحقل فارغاً إذا كنت لا تودّ
                                    تغييرها)
                                </label>
                                <input type="password" class="form__input" name="password" id="password" autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />

                            </div>
                            <div class="w-100 mb-3">
                                <label class="fw-bold mb-2" for="password_confirmation">
                                    تأكيد كلمة المرور الجديدة
                                </label>
                                <input type="password" class="form__input" name="password_confirmation" id="password_confirmation" autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />

                            </div>
                            <button class="primary-button">تغيير كلمة المرور</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
