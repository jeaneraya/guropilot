@props([
    'grade' => 'Grade 4 – Rizal',
    'subject' => 'Science',
    'studentsCount' => 32,
    'iconBg' => 'bg-[#DDF6EF] dark:bg-[#159A9C]/20',
    'iconColor' => 'text-[#159A9C] dark:text-teal-300'
])

<div {{ $attributes->merge(['class' => 'bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 shadow-2xs hover:shadow-md transition-all duration-200 flex flex-col justify-between group cursor-pointer']) }}>
    <div>
        <div class="flex items-center gap-4 mb-4">
            <div class="w-14 h-14 rounded-2xl {{ $iconBg }} {{ $iconColor }} flex items-center justify-center shrink-0 shadow-2xs group-hover:scale-105 transition-transform">
                {{ $slot }}
            </div>

            <div class="min-w-0 flex-1">
                <h3 class="font-extrabold text-lg text-[#172033] dark:text-white group-hover:text-[#159A9C] dark:group-hover:text-teal-300 transition-colors leading-snug truncate">
                    {{ $grade }}
                </h3>
                <p class="text-xs md:text-sm font-semibold text-[#159A9C] dark:text-teal-300 mt-0.5 truncate">
                    {{ $subject }}
                </p>
                <div class="flex items-center gap-1.5 mt-2 text-xs font-medium text-[#64748B] dark:text-slate-400">
                    <svg class="w-3.5 h-3.5 text-[#94A3B8]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span>{{ $studentsCount }} Students</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Action Pill Link -->
    <div class="mt-2 pt-2 border-t border-[#E5ECEB]/60 dark:border-slate-800 flex items-center justify-end">
        <span class="font-bold text-xs text-[#159A9C] dark:text-teal-300 group-hover:underline flex items-center gap-1">
            <span>View Grades</span>
            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
        </span>
    </div>
</div>
