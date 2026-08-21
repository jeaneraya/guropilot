@props([
    'grade' => 'Grade 4 – Rizal',
    'subject' => 'Science',
    'studentsCount' => 32,
    'templatesCount' => 6,
    'iconBg' => 'bg-[#DDF6EF] dark:bg-[#159A9C]/20',
    'iconColor' => 'text-[#159A9C] dark:text-teal-300',
    'footerBg' => 'bg-[#DDF6EF]/50 dark:bg-[#159A9C]/10',
    'footerColor' => 'text-[#159A9C] dark:text-teal-300'
])

<div {{ $attributes->merge(['class' => 'bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 shadow-2xs hover:shadow-md transition-all duration-200 flex flex-col justify-between group cursor-pointer']) }}>
    <div>
        <!-- Top Icon Header & Three Dot Menu -->
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 rounded-2xl {{ $iconBg }} {{ $iconColor }} flex items-center justify-center shrink-0 shadow-2xs group-hover:scale-105 transition-transform">
                {{ $slot }}
            </div>
            
            <button @click.stop="" class="w-8 h-8 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 text-[#94A3B8] hover:text-[#172033] dark:hover:text-white flex items-center justify-center transition-colors">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                </svg>
            </button>
        </div>

        <!-- Grade & Section -->
        <h3 class="font-extrabold text-lg text-[#172033] dark:text-white group-hover:text-[#159A9C] dark:group-hover:text-teal-300 transition-colors leading-snug">
            {{ $grade }}
        </h3>
        <p class="text-xs md:text-sm font-semibold text-[#64748B] dark:text-slate-400 mt-0.5">
            {{ $subject }}
        </p>

        <!-- Stats Metadata -->
        <div class="flex flex-col gap-1.5 mt-4 pt-3 border-t border-[#E5ECEB]/60 dark:border-slate-800 text-xs font-medium text-[#64748B] dark:text-slate-400">
            <div class="flex items-center gap-1.5">
                <svg class="w-4 h-4 text-[#94A3B8] dark:text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                <span>{{ $studentsCount }} Students</span>
            </div>
            <div class="flex items-center gap-1.5">
                <svg class="w-4 h-4 text-[#94A3B8] dark:text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h3a1 1 0 011 1v6a1 1 0 01-1 1h-3a1 1 0 01-1-1v-6z"/>
                </svg>
                <span class="font-bold text-[#172033] dark:text-white">{{ $templatesCount }} Saved Templates</span>
            </div>
        </div>
    </div>

    <!-- Bottom Action Pill Footer -->
    <div class="mt-5 pt-1">
        <div class="w-full py-2.5 px-4 rounded-xl {{ $footerBg }} {{ $footerColor }} font-bold text-xs flex items-center justify-between group-hover:opacity-90 transition-all">
            <span>View Templates</span>
            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
        </div>
    </div>
</div>
