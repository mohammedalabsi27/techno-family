<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'تكنو فاملي | Techno Family')</title>
    <meta name="description" content="@yield('meta_description', 'المؤسسة الوقفية لتطبيقات الأسرة — مؤسسة وقفية متخصصة في التنمية المستدامة التقنية لتحقيق جودة الحياة الأسرية')">

    <link rel="icon" href="{{ asset('favicon.ico') }}">

    {{-- Font Awesome (أيقونات) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    {{-- الأصول عبر Vite (Tailwind + Swiper + AOS + Alpine) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="font-cairo text-gray-700 bg-white antialiased">

    @include('site.partials.header')

    <main>
        @yield('content')
    </main>

    @include('site.partials.footer')

    @stack('scripts')
</body>
</html>
