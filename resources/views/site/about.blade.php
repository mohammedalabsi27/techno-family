@extends('layouts.app')

@section('title', 'من نحن - تكنو فاملي')

@section('content')

@include('site.partials.page-header', [
    'badge' => 'من نحن',
    'title' => 'التعريف بمؤسسة تكنو فاملي',
    'breadcrumb' => ['من نحن' => null],
    'image' => 'images/headers/about.jpg',
])

{{-- ============ نبذة ============ --}}
<section class="py-20">
    <div class="container-x grid lg:grid-cols-2 gap-14 items-center">
        <div class="relative" data-aos="fade-left">
            <div class="rounded-3xl overflow-hidden shadow-soft aspect-[4/3] bg-gradient-to-br from-primary/10 to-secondary/10 flex items-center justify-center">
                @if(file_exists(public_path('images/about.jpg')))
                    <img src="{{ asset('images/about.jpg') }}" alt="عن المؤسسة" class="w-full h-full object-cover">
                @else
                    <i class="fa-solid fa-laptop-code text-8xl text-primary/30"></i>
                @endif
            </div>
        </div>
        <div data-aos="fade-right">
            <span class="section-eyebrow">مؤسسة تقنية وقفية</span>
            <h2 class="section-title mb-6">مؤسسة وقفية لتطبيقات الأسرة</h2>
            <p class="text-gray-600 leading-8 mb-4">
                {{ $settings->about_short ?: 'مؤسسة وقفية متخصصة في التنمية المستدامة التقنية، تعمل على مبادرات تنموية لتحقيق جودة الحياة الأسرية، من خلال تسخير التقنية بجميع مجالاتها (مواقع ومنصات وتطبيقات وألعاب) لخدمة جميع أفراد الأسرة معرفياً ومهارياً وسلوكياً.' }}
            </p>
            <p class="text-gray-600 leading-8">
                وذلك تكاملاً مع رؤية المملكة 2030، وخاصة مستهدفات محور «مجتمع حيوي بنيانه متين»، المعني بتعزيز دور الأسرة في تنمية المجتمع والارتقاء بمهارات أبنائه.
            </p>
        </div>
    </div>
</section>

{{-- ============ الرؤية والرسالة ============ --}}
<section class="py-20 bg-gray-50">
    <div class="container-x grid md:grid-cols-2 gap-8">
        <div class="relative bg-white border border-gray-100 rounded-3xl p-10 shadow-sm hover:shadow-soft transition-all duration-300 overflow-hidden group" data-aos="fade-up">
            <div class="absolute -top-10 -end-10 w-40 h-40 bg-primary/5 rounded-full group-hover:scale-125 transition-transform duration-500"></div>
            <div class="relative">
                <div class="w-14 h-14 rounded-2xl bg-primary text-white grid place-items-center text-xl mb-6 shadow-soft">
                    <i class="fa-solid fa-eye"></i>
                </div>
                <h2 class="text-2xl font-extrabold text-primary-dark mb-4">رؤيتنا</h2>
                <p class="text-gray-600 leading-8">{{ $settings->vision ?: 'تسهيل التربية بواسطة التقنية لإحداث أثر إيجابي مستمر، في كل بيت وفي كل فرد.' }}</p>
            </div>
        </div>
        <div class="relative bg-white border border-gray-100 rounded-3xl p-10 shadow-sm hover:shadow-soft transition-all duration-300 overflow-hidden group" data-aos="fade-up" data-aos-delay="120">
            <div class="absolute -top-10 -end-10 w-40 h-40 bg-secondary/5 rounded-full group-hover:scale-125 transition-transform duration-500"></div>
            <div class="relative">
                <div class="w-14 h-14 rounded-2xl bg-secondary text-white grid place-items-center text-xl mb-6 shadow-soft">
                    <i class="fa-solid fa-bullseye"></i>
                </div>
                <h2 class="text-2xl font-extrabold text-primary-dark mb-4">رسالتنا</h2>
                <p class="text-gray-600 leading-8">{{ $settings->mission ?: 'مؤسسة وقفية تقنية تعمل على تقديم التربية الأسرية من خلال التقنية للوصول لأكبر عدد من الأسر في العالم وتحقيق جودة الحياة الأسرية.' }}</p>
            </div>
        </div>
    </div>
</section>

{{-- ============ الأهداف التفصيلية ============ --}}
<section class="py-20">
    <div class="container-x">
        <div class="text-center max-w-2xl mx-auto mb-14" data-aos="fade-up">
            <span class="section-eyebrow">غايتنا</span>
            <h2 class="section-title">الأهداف التفصيلية</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $goals = [
                    ['icon' => 'fa-mobile-screen-button', 'title' => 'التجديد التقني',    'desc' => 'التجديد في أساليب وطرق تقديم التربية الأسرية.'],
                    ['icon' => 'fa-code',                 'title' => 'قوالب تفاعلية',     'desc' => 'تحويل المحتوى التربوي إلى قوالب تقنية تفاعلية.'],
                    ['icon' => 'fa-users',                'title' => 'الوصول الواسع',     'desc' => 'الوصول إلى شرائح كبيرة ومتنوعة في الأسر.'],
                    ['icon' => 'fa-bullseye',             'title' => 'التخصصية التقنية',  'desc' => 'التخصصية في العمل الأسري التقني.'],
                    ['icon' => 'fa-handshake',            'title' => 'خدمة الجمعيات',     'desc' => 'خدمة الجمعيات الأسرية من خلال بناء خطط تقنية أسرية.'],
                ];
            @endphp
            @foreach($goals as $goal)
                <div class="card card-hover p-8 text-center group"
                     data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                    <div class="w-16 h-16 mx-auto rounded-2xl bg-accent/15 text-accent-dark grid place-items-center text-2xl mb-5 group-hover:bg-accent group-hover:text-white transition-colors duration-300">
                        <i class="fa-solid {{ $goal['icon'] }}"></i>
                    </div>
                    <h3 class="font-bold text-gray-800 mb-2">{{ $goal['title'] }}</h3>
                    <p class="text-gray-500 text-sm leading-6">{{ $goal['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============ مسوّغات المشروع ============ --}}
@php
    $justifications = [
        ['icon' => 'fa-magnifying-glass', 'title' => 'ندرة المؤسسات المتخصصة',     'desc' => 'ندرة المؤسسات التقنية المتخصصة في المجال الأسري.'],
        ['icon' => 'fa-link-slash',       'title' => 'ضعف الربط بين التقنية والأسرة','desc' => 'ضعف التوازن والربط بين التقنية ومتطلبات الأسرة.'],
        ['icon' => 'fa-shield-halved',    'title' => 'التحديات المتجددة',            'desc' => 'التحديات المتجددة تجاه استقرار الأسرة.'],
        ['icon' => 'fa-user-gear',        'title' => 'تفعيل دور الآباء والخبراء',   'desc' => 'تفعيل دور الآباء والخبراء وتمكينهم من تطوير الأسرة.'],
        ['icon' => 'fa-building-user',    'title' => 'تجسير الأدوار',               'desc' => 'تجسير الأدوار بين الجهات المهتمة بالأسرة.'],
        ['icon' => 'fa-flag',             'title' => 'مواكبة تطلعات الدولة',        'desc' => 'مواكبة تطلعات الدولة تجاه استقرار الأسرة ورؤية 2030.'],
    ];
@endphp
<section class="py-20 bg-gray-50">
    <div class="container-x">
        <div class="text-center max-w-2xl mx-auto mb-14" data-aos="fade-up">
            <span class="section-eyebrow">لماذا المشروع</span>
            <h2 class="section-title">مسوّغات المشروع</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($justifications as $j)
                <div class="flex gap-5 card p-6"
                     data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                    <div class="w-12 h-12 shrink-0 rounded-xl bg-primary/10 text-primary grid place-items-center text-lg">
                        <i class="fa-solid {{ $j['icon'] }}"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800 mb-1">{{ $j['title'] }}</h3>
                        <p class="text-gray-500 text-sm leading-6">{{ $j['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============ فريق العمل ============ --}}
@php
    $team = [
        ['icon' => 'fa-user-tie',         'title' => 'الإداريون',   'items' => ['إدارة المشروع', 'التوجيهات والاعتمادات', 'التخطيط', 'إعداد التقارير']],
        ['icon' => 'fa-microscope',       'title' => 'الباحثون',    'items' => ['التصنيف والتنظيم', 'الدراسة والتحليل', 'إعداد المحتوى', 'إعداد الوثيقة النهائية']],
        ['icon' => 'fa-laptop-code',      'title' => 'المبرمجون',   'items' => ['تحليل البيانات', 'رسم الهيكلة البرمجية', 'التصميم والبرمجة', 'الإطلاق التجريبي']],
        ['icon' => 'fa-server',           'title' => 'التقنيون',    'items' => ['إدارة قواعد البيانات', 'أتمتة النماذج', 'الدعم الفني', 'التسويق والتواصل']],
        ['icon' => 'fa-pen-nib',          'title' => 'المؤلفون',    'items' => ['الحقائب التدريبية', 'الأدلة الإجرائية']],
        ['icon' => 'fa-handshake-simple', 'title' => 'العلاقات',    'items' => ['الجهات ذات الصلة', 'الخبراء والباحثون', 'التجارب المماثلة', 'إعداد ملف التسويق']],
    ];
@endphp
<section class="py-20">
    <div class="container-x">
        <div class="text-center max-w-2xl mx-auto mb-14" data-aos="fade-up">
            <span class="section-eyebrow">كفاءات متكاملة</span>
            <h2 class="section-title">فريق العمل</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($team as $member)
                <div class="card card-hover p-8 group"
                     data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                    <div class="flex items-center gap-4 mb-5">
                        <div class="w-14 h-14 rounded-2xl bg-primary/10 text-primary grid place-items-center text-2xl group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                            <i class="fa-solid {{ $member['icon'] }}"></i>
                        </div>
                        <h3 class="font-extrabold text-gray-800 text-lg">{{ $member['title'] }}</h3>
                    </div>
                    <ul class="space-y-2">
                        @foreach($member['items'] as $item)
                            <li class="flex items-center gap-2 text-gray-500 text-sm">
                                <i class="fa-solid fa-angle-left text-xs text-accent"></i>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============ CTA ============ --}}
<section class="py-16">
    <div class="container-x">
        <div class="relative bg-gradient-to-l from-secondary to-primary rounded-3xl px-6 py-14 text-center text-white overflow-hidden" data-aos="fade-up">
            <div class="absolute inset-0 bg-dots opacity-30"></div>
            <div class="relative max-w-2xl mx-auto">
                <h2 class="text-2xl md:text-3xl font-extrabold mb-4">هل ترغب بمعرفة المزيد؟</h2>
                <p class="text-white/90 mb-8">تصفّح برامجنا التقنية أو تواصل معنا لأي استفسار أو فرصة شراكة.</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('programs.index') }}" class="btn-ghost btn-lg"><i class="fa-solid fa-layer-group"></i> تصفّح البرامج</a>
                    <a href="{{ route('contact.index') }}" class="btn-outline btn-lg">تواصل معنا</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection