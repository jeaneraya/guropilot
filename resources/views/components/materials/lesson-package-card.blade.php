@props([
    'title' => 'The Water Cycle',
    'subject' => 'Science • Grade 4',
    'date' => 'Aug 19, 2026',
    'items' => ['Presentation', 'Worksheet', 'Quiz', 'Group Activity']
])

<div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-5 shadow-2xs hover:shadow-md transition-all flex flex-col md:flex-row md:items-center justify-between gap-4 group">
    <div class="space-y-1.5 min-w-0">
        <div class="flex items-center gap-2">
            <span class="px-2.5 py-0.5 rounded-md bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 text-[10px] font-extrabold uppercase tracking-wider">
                Lesson Package
            </span>
            <span class="text-xs text-[#94A3B8] dark:text-slate-400 font-medium">{{ $date }}</span>
        </div>
        <h4 class="font-extrabold text-base md:text-lg text-[#172033] dark:text-white group-hover:text-[#159A9C] dark:group-hover:text-teal-300 transition-colors">
            {{ $title }}
        </h4>
        <p class="text-xs font-semibold text-[#64748B] dark:text-slate-400">
            {{ $subject }}
        </p>

        <!-- Material Badges -->
        <div class="flex flex-wrap items-center gap-1.5 pt-1">
            @foreach($items as $item)
                <span class="px-2.5 py-1 rounded-xl bg-[#F4F9F8] dark:bg-slate-800 text-[#172033] dark:text-slate-200 text-xs font-semibold border border-[#E5ECEB] dark:border-slate-700">
                    {{ $item }}
                </span>
            @endforeach
        </div>
    </div>

    <!-- Action -->
    <div class="shrink-0 self-end md:self-center">
        <button @click="$dispatch('toast', 'Navigating to Lesson Studio for {{ $title }}...')"
                class="px-4 py-2.5 bg-[#DDF6EF] dark:bg-[#159A9C]/20 hover:bg-[#159A9C] hover:text-white text-[#159A9C] dark:text-teal-300 font-extrabold text-xs rounded-2xl transition-all flex items-center gap-1.5 cursor-pointer shadow-2xs">
            <span>View Lesson</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
        </button>
    </div>
</div>
