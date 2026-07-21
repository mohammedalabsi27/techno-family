@extends('layouts.admin')

@section('title', 'إعدادات الموقع')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-4xl">
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
        @csrf @method('PUT')

        {{-- الشعار --}}
        <div>
            <h3 class="font-bold text-primary-dark mb-4">الشعار</h3>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">الشعار الرئيسي</label>
                    @if($settings->logo)
                        <img src="{{ Storage::url($settings->logo) }}" class="h-16 mb-3">
                    @endif
                    <input type="file" name="logo" accept="image/*" class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
                </div>
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">شعار الجوال (اختياري)</label>
                    @if($settings->mobile_logo)
                        <img src="{{ Storage::url($settings->mobile_logo) }}" class="h-16 mb-3">
                    @endif
                    <input type="file" name="mobile_logo" accept="image/*" class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
                </div>
            </div>
        </div>

        {{-- بيانات المؤسسة --}}
        <div>
            <h3 class="font-bold text-primary-dark mb-4">بيانات المؤسسة</h3>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">رقم ترخيص وزارة التجارة</label>
                    <input type="text" name="waqf_license_number" value="{{ old('waqf_license_number', $settings->waqf_license_number) }}" dir="ltr"
                           class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
                </div>
            </div>
            <div class="mt-6">
                <label class="block font-semibold text-gray-700 mb-2">نبذة مختصرة (تظهر بالفوتر)</label>
                <textarea name="about_short" rows="3" class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">{{ old('about_short', $settings->about_short) }}</textarea>
            </div>
        </div>

        {{-- الرؤية والرسالة --}}
        <div>
            <h3 class="font-bold text-primary-dark mb-4">الرؤية والرسالة</h3>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">الرؤية</label>
                    <textarea name="vision" rows="3" class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">{{ old('vision', $settings->vision) }}</textarea>
                </div>
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">الرسالة</label>
                    <textarea name="mission" rows="3" class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">{{ old('mission', $settings->mission) }}</textarea>
                </div>
            </div>
            <div class="mt-6">
                <label class="block font-semibold text-gray-700 mb-2">رابط الفيديو التعريفي (يوتيوب)</label>
                <input type="url" name="intro_video_url" value="{{ old('intro_video_url', $settings->intro_video_url) }}" dir="ltr"
                       class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
            </div>
        </div>

        {{-- بيانات التواصل --}}
        <div>
            <h3 class="font-bold text-primary-dark mb-4">بيانات التواصل</h3>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">العنوان</label>
                    <input type="text" name="address" value="{{ old('address', $settings->address) }}"
                           class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
                </div>
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">البريد الإلكتروني</label>
                    <input type="email" name="email" value="{{ old('email', $settings->email) }}" dir="ltr"
                           class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
                </div>
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">الجوال الرئيسي</label>
                    <input type="text" name="phone" value="{{ old('phone', $settings->phone) }}" dir="ltr"
                           class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
                </div>
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">جوال إضافي (اختياري)</label>
                    <input type="text" name="phone_secondary" value="{{ old('phone_secondary', $settings->phone_secondary) }}" dir="ltr"
                           class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
                </div>
            </div>
        </div>

        {{-- السوشيال ميديا --}}
        <div>
            <h3 class="font-bold text-primary-dark mb-4">روابط التواصل الاجتماعي</h3>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block font-semibold text-gray-700 mb-2"><i class="fa-brands fa-facebook text-primary"></i> فيسبوك</label>
                    <input type="url" name="facebook_url" value="{{ old('facebook_url', $settings->facebook_url) }}" dir="ltr"
                           class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
                </div>
                <div>
                    <label class="block font-semibold text-gray-700 mb-2"><i class="fa-brands fa-x-twitter text-primary"></i> إكس (تويتر)</label>
                    <input type="url" name="twitter_url" value="{{ old('twitter_url', $settings->twitter_url) }}" dir="ltr"
                           class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
                </div>
                <div>
                    <label class="block font-semibold text-gray-700 mb-2"><i class="fa-brands fa-instagram text-primary"></i> إنستغرام</label>
                    <input type="url" name="instagram_url" value="{{ old('instagram_url', $settings->instagram_url) }}" dir="ltr"
                           class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
                </div>
                <div>
                    <label class="block font-semibold text-gray-700 mb-2"><i class="fa-brands fa-youtube text-primary"></i> يوتيوب</label>
                    <input type="url" name="youtube_url" value="{{ old('youtube_url', $settings->youtube_url) }}" dir="ltr"
                           class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
                </div>
            </div>
        </div>

        <div>
            <button type="submit" class="bg-primary hover:bg-primary-dark transition text-white font-bold px-10 py-3 rounded-xl">
                حفظ الإعدادات
            </button>
        </div>
    </form>
</div>
@endsection
