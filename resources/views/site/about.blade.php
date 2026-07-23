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

{{-- ============ 1. النبذة + صورة بأرقام عائمة ============ --}}
<section class="py-20 lg:py-24 relative overflow-hidden">
    <div class="absolute top-10 end-0 w-80 h-80 bg-primary/5 rounded-full blur-3xl"></div>

    <div class="relative container-x">
        <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">

            {{-- النص --}}
            <div data-aos="fade-left">
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

            {{-- الصورة + الأرقام العائمة --}}
            <div class="relative mx-6 sm:mx-10 lg:mx-6 my-8" data-aos="fade-right">
                {{-- زخارف خلفية --}}
                <div class="absolute -top-8 -end-8 w-40 h-40 bg-dots-dark rounded-3xl"></div>
                <div class="absolute -bottom-10 -start-10 w-44 h-44 rounded-full border-[14px] border-accent/10"></div>

                {{-- الصورة --}}
                <div class="relative rounded-[2.5rem] overflow-hidden aspect-[4/4.6] shadow-soft">
                    @if(file_exists(public_path('images/about-main.jpg')))
                        <img src="{{ asset('images/about-main.jpg') }}" alt="مؤسسة تكنو فاملي" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gradient-to-b from-primary via-primary-dark to-primary-darker relative">
                            <div class="absolute inset-0 bg-dots opacity-30"></div>
                            <div class="absolute inset-0 flex flex-col items-center justify-center gap-3 text-white/80">
                                <i class="fa-solid fa-house-laptop text-5xl"></i>
                                <span class="text-xs font-bold text-white/50" dir="ltr">images/about-main.jpg</span>
                            </div>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-primary-darker/30 to-transparent"></div>
                </div>

                {{-- بطاقات الأرقام العائمة --}}
                <div class="absolute top-8 -start-6 sm:-start-10 bg-white/95 backdrop-blur rounded-2xl shadow-soft px-4 py-3 flex items-center gap-3 hover:-translate-y-1 transition-transform duration-300"
                     data-aos="zoom-in" data-aos-delay="200">
                    <span class="w-10 h-10 rounded-xl bg-primary/10 text-primary grid place-items-center"><i class="fa-solid fa-layer-group"></i></span>
                    <div>
                        <span class="block text-xl font-black text-gray-800 leading-none">9</span>
                        <span class="text-[11px] text-gray-500 font-bold">برامج نوعية</span>
                    </div>
                </div>

                <div class="absolute top-1/3 -end-5 sm:-end-9 bg-white/95 backdrop-blur rounded-2xl shadow-soft px-4 py-3 flex items-center gap-3 hover:-translate-y-1 transition-transform duration-300"
                     data-aos="zoom-in" data-aos-delay="320">
                    <span class="w-10 h-10 rounded-xl bg-secondary/10 text-secondary-dark grid place-items-center"><i class="fa-solid fa-users"></i></span>
                    <div>
                        <span class="block text-xl font-black text-gray-800 leading-none">5</span>
                        <span class="text-[11px] text-gray-500 font-bold">فئات مستهدفة</span>
                    </div>
                </div>

                <div class="absolute bottom-1/4 -start-5 sm:-start-9 bg-white/95 backdrop-blur rounded-2xl shadow-soft px-4 py-3 flex items-center gap-3 hover:-translate-y-1 transition-transform duration-300"
                     data-aos="zoom-in" data-aos-delay="440">
                    <span class="w-10 h-10 rounded-xl bg-primary-dark/10 text-primary-dark grid place-items-center"><i class="fa-solid fa-calendar-check"></i></span>
                    <div>
                        <span class="block text-xl font-black text-gray-800 leading-none">3</span>
                        <span class="text-[11px] text-gray-500 font-bold">سنوات خطة استراتيجية</span>
                    </div>
                </div>

                {{-- الرقم الأكبر — بطاقة برتقالية --}}
                <div class="absolute -bottom-7 end-6 sm:end-10 bg-gradient-to-br from-accent to-accent-dark text-white rounded-2xl shadow-accent-glow px-5 py-4 flex items-center gap-3 hover:-translate-y-1 transition-transform duration-300"
                     data-aos="zoom-in" data-aos-delay="560">
                    <span class="w-11 h-11 rounded-xl bg-white/15 grid place-items-center text-lg"><i class="fa-solid fa-globe"></i></span>
                    <div>
                        <span class="block text-2xl font-black leading-none">10M+</span>
                        <span class="text-[11px] text-white/85 font-bold">مستفيد مستهدف</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ============ 2. الرؤية والرسالة — لوحان متمايلان + بوصلة مركزية ============ --}}
<section class="py-20 bg-primary-darker relative overflow-hidden">
    <div class="absolute inset-0 bg-dots opacity-20"></div>
    <div class="absolute -top-20 end-0 w-80 h-80 bg-accent/10 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-20 start-0 w-80 h-80 bg-primary/20 rounded-full blur-3xl"></div>

    <div class="relative container-x">
        <div class="text-center max-w-2xl mx-auto mb-14" data-aos="fade-up">
            <span class="text-accent font-bold tracking-wide">بوصلتنا</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mt-2">الرؤية والرسالة</h2>
        </div>

        <div class="relative grid lg:grid-cols-2 gap-6 lg:gap-20">
            {{-- بوصلة مركزية --}}
            <div class="hidden lg:grid absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-24 h-24 rounded-full bg-primary-darker border-2 border-dashed border-white/15 place-items-center z-10">
                <div class="w-14 h-14 rounded-full bg-gradient-to-br from-primary to-accent grid place-items-center text-white text-xl shadow-glow">
                    <i class="fa-solid fa-compass"></i>
                </div>
            </div>

            {{-- الرؤية --}}
            <div class="relative glass rounded-[2rem] p-8 lg:p-10 overflow-hidden lg:-rotate-1 hover:rotate-0 transition-transform duration-500" data-aos="fade-up">
                <i class="fa-solid fa-eye absolute -bottom-6 -start-4 text-[8rem] text-white/[0.04] pointer-events-none"></i>
                <div class="relative">
                    <div class="w-14 h-14 rounded-2xl bg-primary text-white grid place-items-center text-2xl shadow-glow mb-6">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <span class="block text-white/40 text-xs tracking-[0.3em] uppercase mb-1">Vision</span>
                    <h3 class="text-2xl font-black text-white mb-4">رؤيتنا</h3>
                    <p class="text-white/75 leading-8 text-lg">
                        {{ $settings->vision ?: 'تسهيل التربية بواسطة التقنية لإحداث أثر إيجابي مستمر، في كل بيت وفي كل فرد.' }}
                    </p>
                </div>
            </div>

            {{-- الرسالة --}}
            <div class="relative glass rounded-[2rem] p-8 lg:p-10 overflow-hidden lg:rotate-1 hover:rotate-0 transition-transform duration-500 lg:mt-12" data-aos="fade-up" data-aos-delay="120">
                <i class="fa-solid fa-bullseye absolute -bottom-6 -end-4 text-[8rem] text-white/[0.04] pointer-events-none"></i>
                <div class="relative">
                    <div class="w-14 h-14 rounded-2xl bg-accent text-white grid place-items-center text-2xl shadow-accent-glow mb-6">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <span class="block text-white/40 text-xs tracking-[0.3em] uppercase mb-1">Mission</span>
                    <h3 class="text-2xl font-black text-white mb-4">رسالتنا</h3>
                    <p class="text-white/75 leading-8 text-lg">
                        {{ $settings->mission ?: 'مؤسسة وقفية تقنية تعمل على تقديم التربية الأسرية من خلال التقنية للوصول لأكبر عدد من الأسر في العالم وتحقيق جودة الحياة الأسرية.' }}
                    </p>
                </div>
            </div>
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

        {{-- شبكة متصلة بفواصل — بدون كروت --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-px bg-gray-100 rounded-[2rem] overflow-hidden border border-gray-100" data-aos="fade-up" data-aos-delay="100">
            @foreach($goals as $goal)
            <div class="group relative p-8 lg:p-9 bg-white hover:bg-gradient-to-br hover:from-primary/[0.04] hover:to-accent/[0.04] transition-colors duration-300">
                {{-- رقم مفرّغ --}}
                <span class="block text-6xl font-black text-transparent leading-none mb-5 select-none group-hover:text-primary/10 transition-colors duration-300"
                      style="-webkit-text-stroke:1.5px rgba(19,184,195,.3)">
                    {{ $goal['num'] }}
                </span>
                <h3 class="font-extrabold text-gray-800 text-lg mb-2 group-hover:text-primary transition-colors duration-300">
                    {{ $goal['title'] }}
                </h3>
                <p class="text-gray-500 text-sm leading-6">{{ $goal['desc'] }}</p>
                {{-- خط سفلي متحرك --}}
                <div class="absolute bottom-0 start-0 h-0.5 w-0 bg-gradient-to-l from-primary to-accent group-hover:w-full transition-all duration-500"></div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============ 4. مسوّغات المشروع — صورة جانبية + قائمة ============ --}}
@php
$justifications = [
    ['icon'=>'fa-magnifying-glass', 'title'=>'ندرة المؤسسات المتخصصة',      'desc'=>'ندرة المؤسسات التقنية المتخصصة في المجال الأسري.',             'bg'=>'bg-primary/10',   'icolor'=>'text-primary'],
    ['icon'=>'fa-link-slash',       'title'=>'ضعف الربط بين التقنية والأسرة','desc'=>'ضعف التوازن والربط بين التقنية ومتطلبات الأسرة.',              'bg'=>'bg-rose-50',      'icolor'=>'text-rose-500'],
    ['icon'=>'fa-shield-halved',    'title'=>'التحديات المتجددة',             'desc'=>'التحديات المتجددة تجاه استقرار الأسرة.',                        'bg'=>'bg-orange-50',    'icolor'=>'text-orange-500'],
    ['icon'=>'fa-user-gear',        'title'=>'تفعيل دور الآباء والخبراء',    'desc'=>'تفعيل دور الآباء والخبراء وتمكينهم من تطوير الأسرة.',           'bg'=>'bg-secondary/10', 'icolor'=>'text-secondary-dark'],
    ['icon'=>'fa-building-user',    'title'=>'تجسير الأدوار',                'desc'=>'تجسير الأدوار بين الجهات المهتمة بالأسرة.',                     'bg'=>'bg-indigo-50',    'icolor'=>'text-indigo-500'],
    ['icon'=>'fa-flag',             'title'=>'مواكبة تطلعات الدولة',         'desc'=>'مواكبة تطلعات الدولة تجاه استقرار الأسرة ورؤية 2030.',          'bg'=>'bg-accent/10',    'icolor'=>'text-accent-dark'],
];
@endphp
<section class="py-20" style="background:linear-gradient(180deg,#f8fafc 0%,#fff 100%)">
    <div class="container-x">
        <div class="grid lg:grid-cols-5 gap-14 lg:gap-16 items-center">

            {{-- الصورة --}}
            <div class="lg:col-span-2 relative mx-4 lg:mx-0 lg:me-6" data-aos="fade-left">
                <div class="absolute -top-6 -start-6 w-32 h-32 bg-dots-dark rounded-3xl"></div>
                <div class="absolute -bottom-8 -end-8 w-36 h-36 rounded-full border-[12px] border-primary/10"></div>

                <div class="relative rounded-[2.5rem] overflow-hidden aspect-[3/4] shadow-soft">
                    @if(file_exists(public_path('images/justifications.jpg')))
                        <img src="{{ asset('images/justifications.jpg') }}" alt="مسوّغات المشروع" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gradient-to-b from-secondary via-accent-dark to-primary-darker relative">
                            <div class="absolute inset-0 bg-dots opacity-30"></div>
                            <div class="absolute inset-0 flex flex-col items-center justify-center gap-3 text-white/80">
                                <i class="fa-solid fa-scale-balanced text-5xl"></i>
                                <span class="text-xs font-bold text-white/50" dir="ltr">images/justifications.jpg</span>
                            </div>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-primary-darker/40 to-transparent"></div>
                </div>

                {{-- شارة عائمة --}}
                <div class="absolute -bottom-5 start-6 bg-white rounded-2xl shadow-soft px-5 py-3.5 flex items-center gap-3" data-aos="zoom-in" data-aos-delay="250">
                    <span class="w-10 h-10 rounded-xl bg-accent text-white grid place-items-center shadow-accent-glow"><i class="fa-solid fa-scale-balanced"></i></span>
                    <div>
                        <span class="block text-lg font-black text-gray-800 leading-none">6 مسوّغات</span>
                        <span class="text-[11px] text-gray-500 font-bold">تدفعنا للعمل</span>
                    </div>
                </div>
            </div>

            {{-- القائمة --}}
            <div class="lg:col-span-3" data-aos="fade-right">
                <span class="section-eyebrow">لماذا المشروع</span>
                <h2 class="section-title mb-10">مسوّغات المشروع</h2>

                <div class="grid sm:grid-cols-2 gap-x-8 gap-y-8">
                    @foreach($justifications as $j)
                    <div class="group flex items-start gap-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 70 }}">
                        <div class="shrink-0 w-12 h-12 rounded-xl {{ $j['bg'] }} {{ $j['icolor'] }} grid place-items-center text-lg group-hover:scale-110 transition-transform duration-300">
                            <i class="fa-solid {{ $j['icon'] }}"></i>
                        </div>
                        <div>
                            <h3 class="font-extrabold text-gray-800 mb-1 group-hover:text-primary transition-colors">{{ $j['title'] }}</h3>
                            <p class="text-gray-500 text-sm leading-6">{{ $j['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

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