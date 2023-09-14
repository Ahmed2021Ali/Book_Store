@extends('frontend.layouts.master')

@section('title', 'تواصل معانا')

@section('content_page')
    <main>

        <x-navbar-component message="تواصل معانا" />
        <section class="section-container py-5">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="contact__item h-100 d-flex align-items-center gap-2">
                        <div class="contact__icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <h6 class="contact__item-title m-0">اتصل بنا</h6>
                            <p class="contact__item-text m-0">01063888667</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="contact__item h-100 d-flex align-items-center gap-2">
                        <div class="contact__icon">
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                        <div>
                            <h6 class="contact__item-title m-0">راسلنا علي الايميل</h6>
                            <p class="contact__item-text m-0">eraasoft@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="contact__item h-100 d-flex align-items-center gap-2">
                        <div class="contact__icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <h6 class="contact__item-title m-0">العنوان</h6>
                            <p class="contact__item-text m-0">دعم فني على مدار اليوم للإجابة على اي استفسار لديك</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="contact__item h-100 d-flex align-items-center gap-2">
                        <div class="contact__icon">
                            <i class="fa-solid fa-comments"></i>
                        </div>
                        <div>
                            <h6 class="contact__item-title m-0">دعم متواصل</h6>
                            <p class="contact__item-text m-0">يمكنك استبدال واسترجاع المنتج في حالة عدم مطابقة المواصفات.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-container contact d-md-flex align-items-center mb-3">
            <div class="contact__side w-50">
                <h4 class="mb-3">يسعدنا تواصلك معنا في أى وقت</h4>
                <p>إذا كنت تواجه أي مشكلة أو ترغب في إسترجاع أو إستبدال المنتج لا تتردد أبدأ بالتواصل معنا في أي وقت. كل
                    ماعليك هو ملئ النموذج التالي ببيانات صحيحة وسنقوم بمراجعة طلبك في أسرع وقت.</p>
                <x-massege />
                <form class="contact__form" method="post" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="d-flex gap-3 mb-3">
                        <div class="w-50">
                            <label for="name">الاسم<span class="required">*</span></label>
                            <input class="contact__input @error('name') is-invalid @enderror" id="name" name="name"
                                value="" type="text">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="w-50">
                            <label for="phone">رقم الهاتف<span class="required">*</span></label>
                            <input class="contact__input @error('phone') is-invalid @enderror" name="phone" id="phone"
                                value="{{ old('phone') }}" type="nuumber">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email">البريد الالكتروني<span class="required">*</span></label>
                        <input class="contact__input @error('email') is-invalid @enderror" id="email" name="email"
                            value="" type="text">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="reason_for_communication">سبب التواصل<span class="required">*</span></label>
                        <select class="contact__input @error('reason_for_communication') is-invalid @enderror"
                            name="reason_for_communication" id="reason_for_communication">
                            <option value="">- اضغط هنا لاختيرا السبب -</option>
                            <option {{ old('reason_for_communication') == 'استفسار' ? 'selected' : '' }} value="استفسار">
                                استفسار</option>
                            <option {{ old('reason_for_communication') == 'استبدال' ? 'selected' : '' }} value="استبدال">
                                استبدال</option>
                            <option {{ old('reason_for_communication') == 'استرجاع' ? 'selected' : '' }} value="استرجاع">
                                استرجاع</option>
                            <option {{ old('reason_for_communication') == 'استعجال اوردر' ? 'selected' : '' }}
                                value="استعجال اوردر">استعجال اوردر</option>
                            <option {{ old('reason_for_communication') == 'اخري' ? 'selected' : '' }} value="اخري">اخري
                            </option>
                        </select>
                        @error('reason_for_communication')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="massage">نص الرسالة<span class="required">*</span></label>
                        <textarea class="contact__input @error('massage') is-invalid @enderror" name="massage" id="massage"
                            value="{{ old('massage') }}"></textarea>
                        @error('massage')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button class="primary-button w-100 rounded-2">ارسال الطلب</button>
                </form>

            </div>
            <div class="contact__side w-50 text-center">
                <img class="w-100" src="/assets/images/contact-1.png" alt="">
            </div>
        </section>

        <div class="section-container my-5 px-4">
            <div class="contact__map"></div>
        </div>
    </main>
@endsection

@section('js')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAR2EbiPFT4E-h-nNgR5J7dBtH815uDmbw"></script>
    <script src="/assets/js/contact.js"></script>
@endsection
