@extends('layouts.app')

@section('title', 'تبرع الآن - وقف التميز الأسري')

@section('content')

@include('site.partials.page-header', [
    'badge' => 'صدقة جارية',
    'title' => 'تبرع الآن',
    'breadcrumb' => ['تبرع الآن' => null],
])

<section class="py-20 relative overflow-hidden">
    <div class="absolute -top-24 -start-24 w-80 h-80 bg-secondary/5 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-24 -end-24 w-96 h-96 bg-accent/5 rounded-full blur-3xl"></div>

    <div class="relative container-x">

        {{-- مقدمة --}}
        <div class="max-w-3xl mx-auto text-center mb-14" data-aos="fade-up">
            <span class="section-eyebrow">﴿مَّثَلُ الَّذِينَ يُنفِقُونَ أَمْوَالَهُمْ فِي سَبِيلِ اللَّهِ كَمَثَلِ حَبَّةٍ أَنبَتَتْ سَبْعَ سَنَابِلَ﴾</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-primary-dark mt-3 mb-4">ساهم في وقفٍ يمتد أثره</h2>
            <p class="text-gray-500 leading-8">
                تبرعك يذهب لدعم البرامج الأسرية والتربوية والتعليمية التي يقدمها الوقف، ويُصرف ريعه في التنمية الأسرية والقيمية والاجتماعية.
                حوّل على أحد الحسابات البنكية أدناه، ثم سجّل بيانات تبرعك ليتم توثيقه.
            </p>
        </div>

        <div class="grid lg:grid-cols-5 gap-10 items-start">

            {{-- الحسابات البنكية --}}
            <div class="lg:col-span-3 space-y-5" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-2">
                    <span class="w-10 h-10 rounded-xl bg-primary text-white grid place-items-center"><i class="fa-solid fa-building-columns"></i></span>
                    <h3 class="text-xl font-extrabold text-primary-dark">الحسابات البنكية للوقف</h3>
                </div>

                @forelse($accounts as $account)
                    <div class="card p-6 group hover:shadow-lg transition-shadow" x-data="{ copied: null }">
                        <div class="flex items-center justify-between gap-4 mb-4">
                            <div class="flex items-center gap-3">
                                @if($account->logo)
                                    <img src="{{ Storage::url($account->logo) }}" alt="{{ $account->bank_name }}" class="w-12 h-12 rounded-xl object-contain bg-gray-50 p-1.5 border border-gray-100">
                                @else
                                    <span class="w-12 h-12 rounded-xl bg-secondary/10 text-secondary grid place-items-center text-xl"><i class="fa-solid fa-building-columns"></i></span>
                                @endif
                                <div>
                                    <h4 class="font-extrabold text-gray-800">{{ $account->bank_name }}</h4>
                                    @if($account->account_name)
                                        <p class="text-gray-400 text-xs">{{ $account->account_name }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="space-y-3">
                            @if($account->account_number)
                                <div class="flex items-center justify-between gap-3 bg-gray-50 rounded-xl px-4 py-3">
                                    <div class="min-w-0">
                                        <span class="block text-[11px] text-gray-400 font-semibold mb-0.5">رقم الحساب</span>
                                        <span class="block font-bold text-gray-700 text-sm tracking-wider truncate" dir="ltr">{{ $account->account_number }}</span>
                                    </div>
                                    <button type="button"
                                            @click="navigator.clipboard.writeText('{{ $account->account_number }}'); copied = 'acc'; setTimeout(() => copied = null, 2000)"
                                            class="shrink-0 w-9 h-9 grid place-items-center rounded-lg bg-white border border-gray-200 text-gray-400 hover:text-primary hover:border-primary transition"
                                            :class="copied === 'acc' && '!text-green-600 !border-green-300'">
                                        <i class="fa-solid" :class="copied === 'acc' ? 'fa-check' : 'fa-copy'"></i>
                                    </button>
                                </div>
                            @endif
                            @if($account->iban)
                                <div class="flex items-center justify-between gap-3 bg-primary/5 rounded-xl px-4 py-3 border border-primary/10">
                                    <div class="min-w-0">
                                        <span class="block text-[11px] text-primary/60 font-semibold mb-0.5">الآيبان IBAN</span>
                                        <span class="block font-bold text-primary-dark text-sm tracking-wider truncate" dir="ltr">{{ $account->iban }}</span>
                                    </div>
                                    <button type="button"
                                            @click="navigator.clipboard.writeText('{{ $account->iban }}'); copied = 'iban'; setTimeout(() => copied = null, 2000)"
                                            class="shrink-0 w-9 h-9 grid place-items-center rounded-lg bg-white border border-primary/20 text-primary hover:bg-primary hover:text-white transition"
                                            :class="copied === 'iban' && '!bg-green-500 !text-white !border-green-500'">
                                        <i class="fa-solid" :class="copied === 'iban' ? 'fa-check' : 'fa-copy'"></i>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="card p-10 text-center text-gray-400">
                        <i class="fa-solid fa-building-columns text-4xl mb-3 opacity-40"></i>
                        <p>سيتم إضافة الحسابات البنكية قريباً</p>
                    </div>
                @endforelse

                <div class="flex items-start gap-3 bg-accent/10 border border-accent/20 rounded-2xl px-5 py-4 text-sm text-gray-600">
                    <i class="fa-solid fa-circle-info text-accent-dark mt-0.5"></i>
                    <p>بعد إتمام التحويل، فضلاً سجّل بيانات تبرعك في النموذج المجاور ليتمكن فريق الوقف من توثيقه وإصدار ما يلزم.</p>
                </div>
            </div>

            {{-- نموذج تسجيل التبرع --}}
            <div class="lg:col-span-2" data-aos="fade-up" data-aos-delay="120">
                <div class="card p-8 sticky top-28" x-data="{ amount: '{{ old('amount', '') }}' }">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="w-10 h-10 rounded-xl bg-accent text-primary-dark grid place-items-center shadow-accent-glow"><i class="fa-solid fa-hand-holding-heart"></i></span>
                        <h3 class="text-xl font-extrabold text-primary-dark">سجّل تبرعك</h3>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl px-5 py-4 mb-6 flex items-start gap-2 text-sm">
                            <i class="fa-solid fa-circle-check mt-1"></i> {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('donate.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <div>
                            <label class="block font-semibold text-gray-700 mb-2 text-sm">مبلغ التبرع (ريال)</label>
                            <div class="grid grid-cols-4 gap-2 mb-3">
                                @foreach([50, 100, 500, 1000] as $preset)
                                    <button type="button" @click="amount = '{{ $preset }}'"
                                            class="py-2 rounded-xl border text-sm font-bold transition"
                                            :class="amount === '{{ $preset }}' ? 'bg-primary text-white border-primary' : 'border-gray-200 text-gray-600 hover:border-primary hover:text-primary'">
                                        {{ $preset }}
                                    </button>
                                @endforeach
                            </div>
                            <input type="number" name="amount" x-model="amount" min="1" step="any" required placeholder="أو أدخل مبلغاً آخر"
                                   class="w-full rounded-xl border-gray-300 focus:border-secondary focus:ring-secondary px-4 py-3">
                            @error('amount') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block font-semibold text-gray-700 mb-2 text-sm">الاسم الكامل</label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                   class="w-full rounded-xl border-gray-300 focus:border-secondary focus:ring-secondary px-4 py-3">
                            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block font-semibold text-gray-700 mb-2 text-sm">رقم الجوال</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" required dir="ltr"
                                   class="w-full rounded-xl border-gray-300 focus:border-secondary focus:ring-secondary px-4 py-3">
                            @error('phone') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block font-semibold text-gray-700 mb-2 text-sm">البريد الإلكتروني <span class="text-gray-400 font-normal">(اختياري)</span></label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   class="w-full rounded-xl border-gray-300 focus:border-secondary focus:ring-secondary px-4 py-3">
                            @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        @if($accounts->isNotEmpty())
                            <div>
                                <label class="block font-semibold text-gray-700 mb-2 text-sm">الحساب المحوَّل إليه <span class="text-gray-400 font-normal">(اختياري)</span></label>
                                <select name="bank_account_id"
                                        class="w-full rounded-xl border-gray-300 focus:border-secondary focus:ring-secondary px-4 py-3">
                                    <option value="">— اختر البنك —</option>
                                    @foreach($accounts as $account)
                                        <option value="{{ $account->id }}" @selected(old('bank_account_id') == $account->id)>{{ $account->bank_name }}</option>
                                    @endforeach
                                </select>
                                @error('bank_account_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                            </div>
                        @endif

                        <div>
                            <label class="block font-semibold text-gray-700 mb-2 text-sm">رقم الحوالة / مرجع التحويل <span class="text-gray-400 font-normal">(اختياري)</span></label>
                            <input type="text" name="transfer_reference" value="{{ old('transfer_reference') }}" dir="ltr"
                                   class="w-full rounded-xl border-gray-300 focus:border-secondary focus:ring-secondary px-4 py-3">
                            @error('transfer_reference') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block font-semibold text-gray-700 mb-2 text-sm">ملاحظة <span class="text-gray-400 font-normal">(اختياري)</span></label>
                            <textarea name="note" rows="2"
                                      class="w-full rounded-xl border-gray-300 focus:border-secondary focus:ring-secondary px-4 py-3">{{ old('note') }}</textarea>
                            @error('note') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <button type="submit" class="btn-primary btn-lg w-full justify-center">
                            <i class="fa-solid fa-hand-holding-heart"></i> تأكيد التبرع
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
