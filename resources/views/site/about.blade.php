@extends('layouts.app')

@section('title', 'من نحن - تكنو فاملي')
@section('meta_description', 'تعرف على مؤسسة تكنو فاملي الوقفية لتطبيقات الأسرة — رؤيتنا ورسالتنا وأهدافنا في تسخير التقنية لخدمة الأسرة')

@section('content')

@include('site.partials.page-header', [
    'badge'      => 'من نحن',
    'title'      => 'التعريف بمؤسسة تكنو فاملي',
    'breadcrumb' => ['من نحن' => null],
    'image'      => 'images/headers/about.jpg',
])

{{-- ============ 1. النبذة + أرقام ============ --}}
<section class="py-20">
    <div class="container-x">
        <div class="grid lg:grid-cols-5 gap-12 items-center">

            {{-- النص — 3 أعمدة --}}
            <div class="lg:col-span-3" data-aos="fade-left">
                <span class="section-eyebrow">مؤسسة وقفية تقنية</span>
                <h2 class="section-title mb-6">نُسخِّر التقنية لخدمة الأسرة</h2>
                <p class="text-gray-600 leading-8 mb-4">
                    {{ $settings->about_short ?: 'مؤسسة وقفية متخصصة في التنمية المستدامة التقنية، تعمل على مبادرات تنموية لتحقيق جودة الحياة الأسرية، من خلال تسخير التقنية بجميع مجالاتها (مواقع ومنصات وتطبيقات وألعاب) لخدمة جميع أفراد الأسرة معرفياً ومهارياً وسلوكياً.' }}
                </p>
                <p class="text-gray-600 leading-8 mb-8">
                    وذلك تكاملاً مع رؤية المملكة 2030، وخاصة مستهدفات محور «مجتمع حيوي بنيانه متين»، المعني بتعزيز دور الأسرة في تنمية المجتمع والارتقاء بمهارات أبنائه.
                </p>
                @if($settings->waqf_license_number)
                <div class="inline-flex items-center gap-3 bg-primary/5 border border-primary/15 rounded-2xl px-5 py-3">
                    <i class="fa-solid fa-certificate text-primary text-xl"></i>
                    <div>
                        <span class="block text-xs text-gray-500">ترخيص وزارة التجارة</span>
                        <span class="font-bold text-primary-dark">{{ $settings->waqf_license_number }}</span>
                    </div>
                </div>
                @endif
            </div>

            {{-- الأرقام — 2 عمودان --}}
            <div class="lg:col-span-2 grid grid-cols-2 gap-4" data-aos="fade-right">
                @php
                $kpis = [
                    ['num'=>'9',    'unit'=>'برامج', 'label'=>'نوعية تقنية',      'color'=>'from-primary to-primary-dark',     'icon'=>'fa-layer-group'],
                    ['num'=>'5',    'unit'=>'فئات',  'label'=>'مستهدفة',          'color'=>'from-secondary to-secondary-dark', 'icon'=>'fa-users'],
                    ['num'=>'3',    'unit'=>'سنوات', 'label'=>'خطة استراتيجية',   'color'=>'from-accent to-accent-dark',       'icon'=>'fa-calendar-check'],
                    ['num'=>'10M',  'unit'=>'+',     'label'=>'مستفيد مستهدف',    'color'=>'from-primary-dark to-primary-darker','icon'=>'fa-globe'],
                ];
                @endphp
                @foreach($kpis as $i => $kpi)
                <div class="relative rounded-2xl bg-gradient-to-br {{ $kpi['color'] }} p-5 text-white overflow-hidden group
                            {{ $i === 3 ? 'col-span-2' : '' }}"
                     data-aos="zoom-in" data-aos-delay="{{ $i * 80 }}">
                    <div class="absolute -top-3 -end-3 w-16 h-16 rounded-full bg-white/10"></div>
                    <i class="fa-solid {{ $kpi['icon'] }} text-2xl text-white/40 mb-3 block"></i>
                    <div class="flex items-baseline gap-1">
                        <span class="text-3xl font-black">{{ $kpi['num'] }}</span>
                        <span class="text-sm font-bold text-white/80">{{ $kpi['unit'] }}</span>
                    </div>
                    <p class="text-white/70 text-xs mt-1">{{ $kpi['label'] }}</p>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</section>

{{-- ============ 2. الرؤية والرسالة — تصميم أفقي داكن ============ --}}
<section class="py-16 bg-primary-darker relative overflow-hidden">
    <div class="absolute inset-0 bg-dots opacity-30"></div>
    <div class="absolute -top-20 end-0 w-80 h-80 bg-accent/5 rounded-full blur-3xl"></div>

    <div class="relative container-x grid md:grid-cols-2 gap-px bg-white/5">

        {{-- الرؤية --}}
        <div class="bg-transparent p-10 md:border-e border-white/10" data-aos="fade-up">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-14 h-14 rounded-2xl bg-primary flex items-center justify-center text-white text-2xl shadow-glow shrink-0">
                    <i class="fa-solid fa-eye"></i>
                </div>
                <div>
                    <span class="block text-white/50 text-xs uppercase tracking-widest">Vision</span>
                    <h2 class="text-2xl font-black text-white">رؤيتنا</h2>
                </div>
            </div>
            <p class="text-white/75 leading-8 text-lg border-r-2 border-primary pr-5">
                {{ $settings->vision ?: 'تسهيل التربية بواسطة التقنية لإحداث أثر إيجابي مستمر، في كل بيت وفي كل فرد.' }}
            </p>
        </div>

        {{-- الرسالة --}}
        <div class="bg-transparent p-10" data-aos="fade-up" data-aos-delay="120">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-14 h-14 rounded-2xl bg-accent flex items-center justify-center text-white text-2xl shadow-accent-glow shrink-0">
                    <i class="fa-solid fa-bullseye"></i>
                </div>
                <div>
                    <span class="block text-white/50 text-xs uppercase tracking-widest">Mission</span>
                    <h2 class="text-2xl font-black text-white">رسالتنا</h2>
                </div>
            </div>
            <p class="text-white/75 leading-8 text-lg border-r-2 border-accent pr-5">
                {{ $settings->mission ?: 'مؤسسة وقفية تقنية تعمل على تقديم التربية الأسرية من خلال التقنية للوصول لأكبر عدد من الأسر في العالم وتحقيق جودة الحياة الأسرية.' }}
            </p>
        </div>
    </div>
</section>

{{-- ============ 3. الأهداف — أرقام كبيرة ============ --}}
@php
$goals = [
    ['num'=>'01', 'title'=>'التجديد التقني',   'desc'=>'التجديد في أساليب وطرق تقديم التربية الأسرية عبر أدوات تقنية مبتكرة.'],
    ['num'=>'02', 'title'=>'قوالب تفاعلية',    'desc'=>'تحويل المحتوى التربوي إلى قوالب تقنية تفاعلية جذابة وسهلة الوصول.'],
    ['num'=>'03', 'title'=>'الوصول الواسع',    'desc'=>'الوصول إلى شرائح كبيرة ومتنوعة في الأسر داخل المملكة والعالم العربي.'],
    ['num'=>'04', 'title'=>'التخصصية التقنية', 'desc'=>'التخصصية في العمل الأسري التقني وبناء مرجعية علمية موثوقة.'],
    ['num'=>'05', 'title'=>'خدمة الجمعيات',    'desc'=>'خدمة الجمعيات الأسرية من خلال بناء خطط تقنية أسرية متكاملة.'],
    ['num'=>'06', 'title'=>'الاستدامة',         'desc'=>'بناء نموذج وقفي مستدام يضمن استمرارية البرامج وتطويرها على المدى البعيد.'],
];
@endphp
<section class="py-20">
    <div class="container-x">
        <div class="text-center max-w-2xl mx-auto mb-14" data-aos="fade-up">
            <span class="section-eyebrow">غايتنا</span>
            <h2 class="section-title">الأهداف التفصيلية</h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($goals as $goal)
            <div class="group relative overflow-hidden rounded-2xl border border-gray-100 bg-white p-7 hover:border-primary/30 hover:shadow-soft transition-all duration-300"
                 data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                {{-- رقم خلفية كبير --}}
                <span class="absolute -top-3 -start-1 text-8xl font-black text-gray-50 select-none leading-none group-hover:text-primary/5 transition-colors duration-300">
                    {{ $goal['num'] }}
                </span>
                <div class="relative">
                    <span class="inline-block text-xs font-black text-primary/50 mb-3 tracking-widest">{{ $goal['num'] }}</span>
                    <h3 class="font-extrabold text-gray-800 text-lg mb-2 group-hover:text-primary transition-colors duration-300">
                        {{ $goal['title'] }}
                    </h3>
                    <p class="text-gray-500 text-sm leading-6">{{ $goal['desc'] }}</p>
                </div>
                {{-- خط سفلي متحرك --}}
                <div class="absolute bottom-0 start-0 h-0.5 w-0 bg-primary group-hover:w-full transition-all duration-500 rounded-full"></div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============ 4. مسوّغات المشروع — بطاقات ملونة ============ --}}
@php
$justifications = [
    ['icon'=>'fa-magnifying-glass', 'title'=>'ندرة المؤسسات المتخصصة',      'desc'=>'ندرة المؤسسات التقنية المتخصصة في المجال الأسري.',             'gradient'=>'from-primary/10 to-primary/5',   'icolor'=>'text-primary'],
    ['icon'=>'fa-link-slash',       'title'=>'ضعف الربط بين التقنية والأسرة','desc'=>'ضعف التوازن والربط بين التقنية ومتطلبات الأسرة.',              'gradient'=>'from-rose-50 to-rose-50/30',      'icolor'=>'text-rose-500'],
    ['icon'=>'fa-shield-halved',    'title'=>'التحديات المتجددة',             'desc'=>'التحديات المتجددة تجاه استقرار الأسرة.',                        'gradient'=>'from-orange-50 to-orange-50/30', 'icolor'=>'text-orange-500'],
    ['icon'=>'fa-user-gear',        'title'=>'تفعيل دور الآباء والخبراء',    'desc'=>'تفعيل دور الآباء والخبراء وتمكينهم من تطوير الأسرة.',           'gradient'=>'from-secondary/10 to-secondary/5','icolor'=>'text-secondary'],
    ['icon'=>'fa-building-user',    'title'=>'تجسير الأدوار',                'desc'=>'تجسير الأدوار بين الجهات المهتمة بالأسرة.',                     'gradient'=>'from-indigo-50 to-indigo-50/30', 'icolor'=>'text-indigo-500'],
    ['icon'=>'fa-flag',             'title'=>'مواكبة تطلعات الدولة',         'desc'=>'مواكبة تطلعات الدولة تجاه استقرار الأسرة ورؤية 2030.',          'gradient'=>'from-accent/10 to-accent/5',     'icolor'=>'text-accent-dark'],
];
@endphp
<section class="py-20" style="background:linear-gradient(180deg,#f8fafc 0%,#fff 100%)">
    <div class="container-x">
        <div class="text-center max-w-2xl mx-auto mb-14" data-aos="fade-up">
            <span class="section-eyebrow">لماذا المشروع</span>
            <h2 class="section-title">مسوّغات المشروع</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($justifications as $j)
            <div class="group rounded-2xl bg-gradient-to-br {{ $j['gradient'] }} border border-white p-6 hover:-translate-y-1 hover:shadow-soft transition-all duration-300"
                 data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                <div class="w-11 h-11 rounded-xl bg-white shadow-sm flex items-center justify-center {{ $j['icolor'] }} text-lg mb-4">
                    <i class="fa-solid {{ $j['icon'] }}"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">{{ $j['title'] }}</h3>
                <p class="text-gray-500 text-sm leading-6">{{ $j['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============ تحديات تواجه المشروع ============ --}}
<section class="py-20 bg-gray-900 relative overflow-hidden">
    <div class="absolute inset-0 bg-grid opacity-100"></div>
    <div class="absolute inset-0 bg-dots opacity-20"></div>
    <div class="absolute -start-20 top-0 w-72 h-72 bg-rose-500/5 rounded-full blur-3xl"></div>
    <div class="absolute -end-20 bottom-0 w-72 h-72 bg-orange-500/5 rounded-full blur-3xl"></div>

    <div class="relative container-x">
        <div class="text-center max-w-2xl mx-auto mb-14" data-aos="fade-up">
            <span class="text-orange-400 font-bold tracking-wide">الشفافية والواقعية</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mt-2">تحديات تواجه المشروع</h2>
            <p class="text-white/50 mt-3">نؤمن بالشفافية — هذه التحديات ندركها ونعمل على تجاوزها</p>
        </div>

        <div class="grid sm:grid-cols-2 gap-5">
            @php
            $challenges = [
                [
                    'num'   => '01',
                    'icon'  => 'fa-solid fa-code-branch',
                    'title' => 'تكييف التقنية وتسخيرها برمجياً',
                    'desc'  => 'يتطلب تحويل المحتوى التربوي الأسري إلى تقنية قابلة للتطبيق جهداً برمجياً وتقنياً متخصصاً مستمراً.',
                    'color' => 'border-primary/30 hover:border-primary',
                    'icolor'=> 'bg-primary/20 text-primary',
                    'ncolor'=> 'text-primary/40',
                ],
                [
                    'num'   => '02',
                    'icon'  => 'fa-solid fa-earth-americas',
                    'title' => 'اختلاف ثقافات وبيئات الأسر',
                    'desc'  => 'تنوع الأسر وبيئاتها الثقافية يستوجب مرونة عالية في تصميم المحتوى ليلائم مختلف الشرائح.',
                    'color' => 'border-secondary/30 hover:border-secondary',
                    'icolor'=> 'bg-secondary/20 text-secondary',
                    'ncolor'=> 'text-secondary/40',
                ],
                [
                    'num'   => '03',
                    'icon'  => 'fa-solid fa-clock-rotate-left',
                    'title' => 'الاستمرارية وطول الأمد',
                    'desc'  => 'البرامج التقنية الأسرية تحتاج التزاماً طويل الأمد للوصول إلى أثر حقيقي وقابل للقياس.',
                    'color' => 'border-orange-500/30 hover:border-orange-400',
                    'icolor'=> 'bg-orange-500/20 text-orange-400',
                    'ncolor'=> 'text-orange-500/40',
                ],
                [
                    'num'   => '04',
                    'icon'  => 'fa-solid fa-hand-holding-dollar',
                    'title' => 'توفر الدعم المالي واستمراره',
                    'desc'  => 'استمرار تمويل البرامج التقنية الوقفية يتطلب شراكات فاعلة ونموذج وقفي مستدام يضمن الديمومة.',
                    'color' => 'border-accent/30 hover:border-accent',
                    'icolor'=> 'bg-accent/20 text-accent',
                    'ncolor'=> 'text-accent/40',
                ],
            ];
            @endphp

            @foreach($challenges as $ch)
            <div class="group relative rounded-2xl border {{ $ch['color'] }} bg-white/3 p-7 transition-all duration-300 hover:bg-white/5"
                 data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">

                {{-- رقم كبير في الخلفية --}}
                <span class="absolute top-4 start-5 text-6xl font-black {{ $ch['ncolor'] }} select-none leading-none">
                    {{ $ch['num'] }}
                </span>

                <div class="relative flex gap-5 items-start">
                    <div class="w-12 h-12 rounded-xl {{ $ch['icolor'] }} flex items-center justify-center text-lg shrink-0 mt-1 group-hover:scale-110 transition-transform duration-300">
                        <i class="{{ $ch['icon'] }}"></i>
                    </div>
                    <div>
                        <h3 class="font-extrabold text-white text-lg mb-2">{{ $ch['title'] }}</h3>
                        <p class="text-white/55 text-sm leading-6">{{ $ch['desc'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============ 5. فريق العمل — نمط مختلف ============ --}}
@php
$team = [
    ['icon'=>'fa-user-tie',         'color'=>'bg-primary',    'title'=>'الإداريون',  'items'=>['إدارة المشروع','التوجيهات والاعتمادات','التخطيط','إعداد التقارير']],
    ['icon'=>'fa-microscope',       'color'=>'bg-secondary',  'title'=>'الباحثون',   'items'=>['التصنيف والتنظيم','الدراسة والتحليل','إعداد المحتوى','إعداد الوثيقة النهائية']],
    ['icon'=>'fa-laptop-code',      'color'=>'bg-primary-dark','title'=>'المبرمجون', 'items'=>['تحليل البيانات','رسم الهيكلة البرمجية','التصميم والبرمجة','الإطلاق التجريبي']],
    ['icon'=>'fa-server',           'color'=>'bg-accent-dark', 'title'=>'التقنيون',  'items'=>['إدارة قواعد البيانات','أتمتة النماذج','الدعم الفني','التسويق والتواصل']],
    ['icon'=>'fa-pen-nib',          'color'=>'bg-indigo-600', 'title'=>'المؤلفون',   'items'=>['الحقائب التدريبية','الأدلة الإجرائية']],
    ['icon'=>'fa-handshake-simple', 'color'=>'bg-rose-500',   'title'=>'العلاقات',   'items'=>['الجهات ذات الصلة','الخبراء والباحثون','التجارب المماثلة','إعداد ملف التسويق']],
];
@endphp
<section class="py-20 bg-primary-darker relative overflow-hidden">
    <div class="absolute inset-0 bg-dots opacity-20"></div>
    <div class="relative container-x">
        <div class="text-center max-w-2xl mx-auto mb-14" data-aos="fade-up">
            <span class="text-accent font-bold tracking-wide">كفاءات متكاملة</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mt-2">فريق العمل</h2>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($team as $member)
            <div class="glass rounded-2xl p-6 hover:bg-white/10 hover:-translate-y-1 transition-all duration-300 group"
                 data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">

                {{-- أيقونة + عنوان --}}
                <div class="flex items-center gap-4 mb-5">
                    <div class="w-12 h-12 rounded-xl {{ $member['color'] }} text-white flex items-center justify-center text-xl shrink-0 group-hover:scale-110 transition-transform duration-300">
                        <i class="fa-solid {{ $member['icon'] }}"></i>
                    </div>
                    <h3 class="font-extrabold text-white text-lg">{{ $member['title'] }}</h3>
                </div>

                {{-- المهام كـ tags --}}
                <div class="flex flex-wrap gap-2">
                    @foreach($member['items'] as $item)
                    <span class="text-xs bg-white/10 text-white/70 rounded-full px-3 py-1 border border-white/10">
                        {{ $item }}
                    </span>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============ 6. CTA ============ --}}
<section class="py-16">
    <div class="container-x">
        <div class="relative rounded-3xl overflow-hidden" data-aos="fade-up">
            <div class="absolute inset-0 bg-gradient-to-l from-primary-dark via-primary to-primary-light"></div>
            <div class="absolute inset-0 bg-dots opacity-20"></div>
            <div class="absolute -bottom-16 -start-10 w-72 h-72 bg-accent/20 rounded-full blur-3xl"></div>
            <div class="relative px-6 py-16 text-center text-white max-w-2xl mx-auto">
                <i class="fa-solid fa-layer-group text-4xl text-accent mb-5 block"></i>
                <h2 class="text-2xl md:text-3xl font-extrabold mb-4">تصفّح برامجنا التقنية</h2>
                <p class="text-white/80 mb-8">9 برامج نوعية تخدم الأسرة والمجتمع موزعة على 3 سنوات.</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('programs.index') }}" class="btn-ghost btn-lg">
                        <i class="fa-solid fa-layer-group"></i> تصفّح البرامج
                    </a>
                    <a href="{{ route('contact.index') }}" class="btn-outline btn-lg">تواصل معنا</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection