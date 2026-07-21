<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'لوحة التحكم') - تكنو فاملي</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { DEFAULT: '#13b8c3', dark: '#0e929b', light: '#4fd0d9' },
                        secondary: { DEFAULT: '#e89d42', light: '#f0b56e' },
                        accent: { DEFAULT: '#e89d42', dark: '#c97d22' },
                    },
                    fontFamily: { cairo: ['Cairo', 'sans-serif'] },
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Cairo', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-cairo bg-gray-50 text-gray-800" x-data="{ sidebarOpen: false }">

    <div class="min-h-screen flex">

        {{-- ============ Sidebar ============ --}}
        <aside :class="sidebarOpen ? 'translate-x-0' : 'translate-x-full lg:translate-x-0'"
               class="fixed lg:static inset-y-0 end-0 z-40 w-72 bg-primary-dark text-white transition-transform duration-300 flex flex-col">
            <div class="p-6 border-b border-white/10">
                <h2 class="font-extrabold text-lg">لوحة التحكم</h2>
                <p class="text-white/60 text-sm">تكنو فاملي</p>
            </div>

            <nav class="flex-1 overflow-y-auto py-4 space-y-1 px-3">
                @php
                    $links = [
                        ['route' => 'admin.dashboard', 'icon' => 'fa-gauge-high', 'label' => 'الرئيسية', 'match' => 'admin.dashboard'],
                        ['route' => 'admin.programs.index', 'icon' => 'fa-hands-holding-child', 'label' => 'البرامج', 'match' => 'admin.programs.*'],
                        ['route' => 'admin.core-values.index', 'icon' => 'fa-star', 'label' => 'القيم', 'match' => 'admin.core-values.*'],
                        ['route' => 'admin.roadmap-items.index', 'icon' => 'fa-map', 'label' => 'خارطة السير', 'match' => 'admin.roadmap-items.*'],
                        ['route' => 'admin.impact-items.index', 'icon' => 'fa-chart-line', 'label' => 'الأثر المتوقع', 'match' => 'admin.impact-items.*'],
                        ['route' => 'admin.training-bag-categories.index', 'icon' => 'fa-layer-group', 'label' => 'تصنيفات الحقائب', 'match' => 'admin.training-bag-categories.*'],
                        ['route' => 'admin.training-bags.index', 'icon' => 'fa-briefcase', 'label' => 'الحقائب التدريبية', 'match' => 'admin.training-bags.*'],
                        ['route' => 'admin.contact-messages.index', 'icon' => 'fa-envelope', 'label' => 'رسائل التواصل', 'match' => 'admin.contact-messages.*'],
                        ['route' => 'admin.settings.edit', 'icon' => 'fa-gear', 'label' => 'إعدادات الموقع', 'match' => 'admin.settings.*'],
                    ];
                @endphp
                @foreach($links as $link)
                    <a href="{{ route($link['route']) }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl transition font-semibold text-sm {{ request()->routeIs($link['match']) ? 'bg-secondary text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                        <i class="fa-solid {{ $link['icon'] }} w-5 text-center"></i>
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>

            <div class="p-4 border-t border-white/10">
                <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-4 py-3 rounded-xl text-white/70 hover:bg-white/10 hover:text-white transition text-sm font-semibold">
                    <i class="fa-solid fa-arrow-up-left-from-circle w-5 text-center"></i> عرض الموقع
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-white/70 hover:bg-red-500/20 hover:text-red-200 transition text-sm font-semibold">
                        <i class="fa-solid fa-right-from-bracket w-5 text-center"></i> تسجيل الخروج
                    </button>
                </form>
            </div>
        </aside>

        {{-- خلفية معتمة للجوال عند فتح القائمة --}}
        <div x-show="sidebarOpen" x-cloak @click="sidebarOpen = false" class="fixed inset-0 bg-black/40 z-30 lg:hidden"></div>

        {{-- ============ المحتوى ============ --}}
        <div class="flex-1 min-w-0">
            <header class="bg-white border-b sticky top-0 z-20 px-6 py-4 flex items-center justify-between">
                <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden text-xl text-primary">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <h1 class="font-extrabold text-lg text-primary-dark">@yield('title', 'لوحة التحكم')</h1>
                <div class="w-6 lg:hidden"></div>
            </header>

            <main class="p-6">
                @if(session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl px-5 py-3 mb-6 flex items-center gap-2">
                        <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>
