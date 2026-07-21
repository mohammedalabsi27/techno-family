@extends('layouts.app')

@section('title', 'تواصل معنا - وقف التميز الأسري')

@section('content')

@include('site.partials.page-header', [
    'badge' => 'نسعد بتواصلكم',
    'title' => 'تواصل معنا',
    'breadcrumb' => ['تواصل معنا' => null],
    'image' => 'images/headers/contact.jpg',
])

<section class="py-20">
    <div class="container-x grid lg:grid-cols-5 gap-10">

        {{-- بيانات التواصل --}}
        <div class="lg:col-span-2 space-y-5" data-aos="fade-up">
            <div>
                <span class="section-eyebrow">ابقَ على تواصل</span>
                <h2 class="text-2xl font-extrabold text-primary-dark mb-2">يسعدنا سماع صوتك</h2>
                <p class="text-gray-500 text-sm leading-7">راسلنا لأي استفسار عن برامجنا أو فرص الشراكة والدعم، وسنعاود التواصل معك قريباً.</p>
            </div>

            @if($settings->address ?? null)
                <div class="flex items-start gap-4 card p-5">
                    <div class="w-12 h-12 shrink-0 rounded-xl bg-primary/10 text-primary grid place-items-center"><i class="fa-solid fa-location-dot"></i></div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-1">العنوان</h4>
                        <p class="text-gray-500 text-sm">{{ $settings->address }}</p>
                    </div>
                </div>
            @endif
            @if($settings->phone ?? null)
                <div class="flex items-start gap-4 card p-5">
                    <div class="w-12 h-12 shrink-0 rounded-xl bg-secondary/10 text-secondary grid place-items-center"><i class="fa-solid fa-phone"></i></div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-1">الجوال</h4>
                        <a href="tel:{{ $settings->phone }}" class="text-gray-500 text-sm hover:text-secondary transition" dir="ltr">{{ $settings->phone }}</a>
                    </div>
                </div>
            @endif
            @if($settings->email ?? null)
                <div class="flex items-start gap-4 card p-5">
                    <div class="w-12 h-12 shrink-0 rounded-xl bg-accent/15 text-accent-dark grid place-items-center"><i class="fa-solid fa-envelope"></i></div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-1">البريد الإلكتروني</h4>
                        <a href="mailto:{{ $settings->email }}" class="text-gray-500 text-sm hover:text-secondary transition break-all">{{ $settings->email }}</a>
                    </div>
                </div>
            @endif

            @if(($settings->facebook_url ?? null) || ($settings->twitter_url ?? null) || ($settings->instagram_url ?? null) || ($settings->youtube_url ?? null))
                <div class="flex gap-3 pt-2">
                    @if($settings->facebook_url ?? null)<a href="{{ $settings->facebook_url }}" target="_blank" rel="noopener" class="w-11 h-11 grid place-items-center rounded-xl bg-primary/5 text-primary hover:bg-primary hover:text-white transition"><i class="fa-brands fa-facebook-f"></i></a>@endif
                    @if($settings->twitter_url ?? null)<a href="{{ $settings->twitter_url }}" target="_blank" rel="noopener" class="w-11 h-11 grid place-items-center rounded-xl bg-primary/5 text-primary hover:bg-primary hover:text-white transition"><i class="fa-brands fa-x-twitter"></i></a>@endif
                    @if($settings->instagram_url ?? null)<a href="{{ $settings->instagram_url }}" target="_blank" rel="noopener" class="w-11 h-11 grid place-items-center rounded-xl bg-primary/5 text-primary hover:bg-primary hover:text-white transition"><i class="fa-brands fa-instagram"></i></a>@endif
                    @if($settings->youtube_url ?? null)<a href="{{ $settings->youtube_url }}" target="_blank" rel="noopener" class="w-11 h-11 grid place-items-center rounded-xl bg-primary/5 text-primary hover:bg-primary hover:text-white transition"><i class="fa-brands fa-youtube"></i></a>@endif
                </div>
            @endif
        </div>

        {{-- نموذج التواصل --}}
        <div class="lg:col-span-3" data-aos="fade-up" data-aos-delay="120">
            <div class="card p-8 md:p-10">
                @if(session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl px-5 py-4 mb-6 flex items-center gap-2">
                        <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-5">
                        <div>
                            <label class="block font-semibold text-gray-700 mb-2">الاسم الكامل</label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                   class="w-full rounded-xl border-gray-300 focus:border-secondary focus:ring-secondary px-4 py-3">
                            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block font-semibold text-gray-700 mb-2">البريد الإلكتروني</label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                   class="w-full rounded-xl border-gray-300 focus:border-secondary focus:ring-secondary px-4 py-3">
                            @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div>
                        <label class="block font-semibold text-gray-700 mb-2">رقم الجوال <span class="text-gray-400 font-normal">(اختياري)</span></label>
                        <input type="text" name="phone" value="{{ old('phone') }}"
                               class="w-full rounded-xl border-gray-300 focus:border-secondary focus:ring-secondary px-4 py-3" dir="ltr">
                        @error('phone') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block font-semibold text-gray-700 mb-2">الرسالة</label>
                        <textarea name="message" rows="5" required
                                  class="w-full rounded-xl border-gray-300 focus:border-secondary focus:ring-secondary px-4 py-3">{{ old('message') }}</textarea>
                        @error('message') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                    <button type="submit" class="btn-primary btn-lg">
                        <i class="fa-solid fa-paper-plane"></i> إرسال الرسالة
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
