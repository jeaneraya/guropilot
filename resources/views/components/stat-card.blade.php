@props([
    'number',
    'title',
    'subtitle',
    'iconBg' => 'bg-[#DDF6EF]',
    'iconColor' => 'text-[#159A9C]'
])

<div {{ $attributes->merge(['class' => 'bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-[18px] p-5 md:p-6 shadow-2xs hover:shadow-sm transition-all duration-200 flex flex-col justify-between min-w-0']) }}>
    <!-- Top Icon Container -->
    <div class="flex items-center justify-between mb-4">
        <div class="w-11 h-11 rounded-2xl {{ $iconBg }} {{ $iconColor }} flex items-center justify-center shrink-0">
            {{ $icon }}
        </div>
    </div>

    <!-- Bottom Metrics -->
    <div>
        <span class="block text-2xl md:text-3xl font-extrabold text-[#172033] dark:text-white tracking-tight leading-none mb-1">
            {{ $number }}
        </span>
        <h3 class="font-bold text-sm text-[#172033] dark:text-slate-100 leading-snug">
            {{ $title }}
        </h3>
        <p class="text-xs text-[#64748B] dark:text-slate-400 font-medium leading-tight mt-0.5">
            {{ $subtitle }}
        </p>
    </div>
</div>

