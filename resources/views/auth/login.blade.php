<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - لوحة التحكم</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { DEFAULT: '#1a6881', dark: '#124a5c', light: '#22839f' },
                        secondary: { DEFAULT: '#13b8c3', light: '#4fd0d9' },
                        accent: { DEFAULT: '#f7ab56', dark: '#f39433' },
                    },
                    fontFamily: { cairo: ['Cairo', 'sans-serif'] },
                }
            }
        }
    </script>
    <style> body { font-family: 'Cairo', sans-serif; } </style>
</head>
<body class="font-cairo bg-gray-50">

    <div class="min-h-screen grid lg:grid-cols-2">

        {{-- ============ الجانب البصري ============ --}}
        <div class="hidden lg:flex relative bg-gradient-to-br from-primary via-primary-dark to-primary-dark items-center justify-center overflow-hidden">
            <div class="absolute -top-24 -start-24 w-96 h-96 bg-secondary/20 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -end-24 w-96 h-96 bg-accent/20 rounded-full blur-3xl"></div>

            <div class="relative text-center text-white px-12">
                <div class="w-24 h-24 mx-auto mb-8 rounded-3xl bg-white/10 backdrop-blur flex items-center justify-center border border-white/20">
                    <i class="fa-solid fa-people-roof text-4xl text-accent"></i>
                </div>
                <h1 class="text-3xl font-extrabold mb-4">وقف التميز الأسري</h1>
                <p class="text-white/70 leading-8 max-w-sm mx-auto">
                    لوحة التحكم الخاصة بإدارة محتوى الموقع — البرامج، القيم، الحقائب التدريبية، ورسائل التواصل.
                </p>
            </div>
        </div>

        {{-- ============ فورم تسجيل الدخول ============ --}}
        <div class="flex items-center justify-center p-8">
            <div class="w-full max-w-sm">

                <div class="text-center mb-10 lg:hidden">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-primary flex items-center justify-center">
                        <i class="fa-solid fa-people-roof text-2xl text-white"></i>
                    </div>
                    <h1 class="text-xl font-extrabold text-primary-dark">وقف التميز الأسري</h1>
                </div>

                <h2 class="text-2xl font-extrabold text-primary-dark mb-2">تسجيل الدخول</h2>
                <p class="text-gray-500 mb-8">مرحباً بعودتك، سجّل دخولك لإدارة الموقع</p>

                {{-- حالة الجلسة (مثل رابط إعادة تعيين كلمة المرور) --}}
                @if (session('status'))
                    <div class="mb-6 text-sm font-semibold text-green-600 bg-green-50 border border-green-200 rounded-xl px-4 py-3">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="block font-semibold text-gray-700 mb-2">البريد الإلكتروني</label>
                        <div class="relative">
                            <i class="fa-solid fa-envelope absolute top-1/2 -translate-y-1/2 start-4 text-gray-400"></i>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                                   class="w-full rounded-xl border-gray-300 focus:border-secondary focus:ring-secondary ps-11 pe-4 py-3" dir="ltr">
                        </div>
                        @error('email') <p class="text-red-500 text-sm mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password" class="block font-semibold text-gray-700 mb-2">كلمة المرور</label>
                        <div class="relative">
                            <i class="fa-solid fa-lock absolute top-1/2 -translate-y-1/2 start-4 text-gray-400"></i>
                            <input id="password" type="password" name="password" required autocomplete="current-password"
                                   class="w-full rounded-xl border-gray-300 focus:border-secondary focus:ring-secondary ps-11 pe-4 py-3" dir="ltr">
                        </div>
                        @error('password') <p class="text-red-500 text-sm mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2 text-sm text-gray-600 font-semibold">
                            <input type="checkbox" name="remember" class="rounded text-secondary focus:ring-secondary">
                            تذكرني
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-secondary hover:text-primary font-semibold">
                                نسيت كلمة المرور؟
                            </a>
                        @endif
                    </div>

                    <button type="submit"
                            class="w-full bg-primary hover:bg-primary-dark transition text-white font-bold py-3.5 rounded-xl shadow-lg">
                        تسجيل الدخول
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
