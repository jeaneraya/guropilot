<div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-2xl p-5 md:p-6 shadow-2xs">
    <!-- Header -->
    <div class="flex items-center justify-between mb-5">
        <div class="flex items-center gap-2.5">
            <div class="w-8 h-8 rounded-xl bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 flex items-center justify-center">
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <h3 class="font-bold text-base md:text-lg text-[#172033] dark:text-white">Recent Lessons</h3>
        </div>
        <button @click="activeTab = 'my-lessons'" class="text-xs font-bold text-[#159A9C] dark:text-teal-300 hover:underline flex items-center gap-1 cursor-pointer">
            <span>View all</span>
            <span>→</span>
        </button>
    </div>

    <!-- Lessons List (Non-dense, clean spacing) -->
    <div class="space-y-3">
        
        <!-- Lesson 1: The Water Cycle -->
        <div class="p-3.5 rounded-2xl hover:bg-[#F4F9F8] dark:hover:bg-slate-800/60 border border-transparent hover:border-[#E5ECEB] dark:hover:border-slate-700 transition-all flex items-center justify-between gap-3 group">
            <div class="flex items-center gap-3.5 min-w-0">
                <div class="w-10 h-10 rounded-2xl bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <h4 class="font-bold text-sm text-[#172033] dark:text-slate-100 truncate group-hover:text-[#159A9C] dark:group-hover:text-teal-300 transition-colors">The Water Cycle</h4>
                    <p class="text-xs text-[#64748B] dark:text-slate-400 font-medium truncate mt-0.5">Science • Grade 4 – Rizal</p>
                </div>
            </div>
            <div class="flex items-center gap-3 shrink-0">
                <span class="px-3 py-1 rounded-full bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 text-xs font-bold">DLL</span>
                <span class="text-xs font-medium text-[#94A3B8] dark:text-slate-400 hidden sm:inline">Aug 19, 2026</span>
                <button class="p-1 text-[#94A3B8] hover:text-[#172033] dark:hover:text-white rounded-lg transition-colors cursor-pointer">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Lesson 2: Parts of a Plant -->
        <div class="p-3.5 rounded-2xl hover:bg-[#F4F9F8] dark:hover:bg-slate-800/60 border border-transparent hover:border-[#E5ECEB] dark:hover:border-slate-700 transition-all flex items-center justify-between gap-3 group">
            <div class="flex items-center gap-3.5 min-w-0">
                <div class="w-10 h-10 rounded-2xl bg-[#DDF6EF] dark:bg-emerald-950/40 text-[#22A06B] dark:text-emerald-400 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <h4 class="font-bold text-sm text-[#172033] dark:text-slate-100 truncate group-hover:text-[#159A9C] dark:group-hover:text-teal-300 transition-colors">Parts of a Plant</h4>
                    <p class="text-xs text-[#64748B] dark:text-slate-400 font-medium truncate mt-0.5">Science • Grade 3 – Mabini</p>
                </div>
            </div>
            <div class="flex items-center gap-3 shrink-0">
                <span class="px-3 py-1 rounded-full bg-[#EEE9FF] dark:bg-purple-950/40 text-[#7C3AED] dark:text-purple-300 text-xs font-bold">ILAW Plan</span>
                <span class="text-xs font-medium text-[#94A3B8] dark:text-slate-400 hidden sm:inline">Aug 18, 2026</span>
                <button class="p-1 text-[#94A3B8] hover:text-[#172033] dark:hover:text-white rounded-lg transition-colors cursor-pointer">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Lesson 3: Fractions and Decimals -->
        <div class="p-3.5 rounded-2xl hover:bg-[#F4F9F8] dark:hover:bg-slate-800/60 border border-transparent hover:border-[#E5ECEB] dark:hover:border-slate-700 transition-all flex items-center justify-between gap-3 group">
            <div class="flex items-center gap-3.5 min-w-0">
                <div class="w-10 h-10 rounded-2xl bg-[#FDE9E7] dark:bg-rose-950/40 text-[#E11D48] dark:text-rose-400 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <h4 class="font-bold text-sm text-[#172033] dark:text-slate-100 truncate group-hover:text-[#159A9C] dark:group-hover:text-teal-300 transition-colors">Fractions and Decimals</h4>
                    <p class="text-xs text-[#64748B] dark:text-slate-400 font-medium truncate mt-0.5">Mathematics • Grade 5 – Bonifacio</p>
                </div>
            </div>
            <div class="flex items-center gap-3 shrink-0">
                <span class="px-3 py-1 rounded-full bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 text-xs font-bold">DLL</span>
                <span class="text-xs font-medium text-[#94A3B8] dark:text-slate-400 hidden sm:inline">Aug 17, 2026</span>
                <button class="p-1 text-[#94A3B8] hover:text-[#172033] dark:hover:text-white rounded-lg transition-colors cursor-pointer">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Lesson 4: Opinion Writing Basics -->
        <div class="p-3.5 rounded-2xl hover:bg-[#F4F9F8] dark:hover:bg-slate-800/60 border border-transparent hover:border-[#E5ECEB] dark:hover:border-slate-700 transition-all flex items-center justify-between gap-3 group">
            <div class="flex items-center gap-3.5 min-w-0">
                <div class="w-10 h-10 rounded-2xl bg-[#EEE9FF] dark:bg-purple-950/40 text-[#7C3AED] dark:text-purple-300 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <h4 class="font-bold text-sm text-[#172033] dark:text-slate-100 truncate group-hover:text-[#159A9C] dark:group-hover:text-teal-300 transition-colors">Opinion Writing Basics</h4>
                    <p class="text-xs text-[#64748B] dark:text-slate-400 font-medium truncate mt-0.5">English • Grade 4 – Rizal</p>
                </div>
            </div>
            <div class="flex items-center gap-3 shrink-0">
                <span class="px-3 py-1 rounded-full bg-[#FFF4D6] dark:bg-amber-950/40 text-[#D97706] dark:text-amber-400 text-xs font-bold">DLP</span>
                <span class="text-xs font-medium text-[#94A3B8] dark:text-slate-400 hidden sm:inline">Aug 16, 2026</span>
                <button class="p-1 text-[#94A3B8] hover:text-[#172033] dark:hover:text-white rounded-lg transition-colors cursor-pointer">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Lesson 5: Sources of Energy -->
        <div class="p-3.5 rounded-2xl hover:bg-[#F4F9F8] dark:hover:bg-slate-800/60 border border-transparent hover:border-[#E5ECEB] dark:hover:border-slate-700 transition-all flex items-center justify-between gap-3 group">
            <div class="flex items-center gap-3.5 min-w-0">
                <div class="w-10 h-10 rounded-2xl bg-[#FFF4D6] dark:bg-amber-950/40 text-[#D97706] dark:text-amber-400 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <h4 class="font-bold text-sm text-[#172033] dark:text-slate-100 truncate group-hover:text-[#159A9C] dark:group-hover:text-teal-300 transition-colors">Sources of Energy</h4>
                    <p class="text-xs text-[#64748B] dark:text-slate-400 font-medium truncate mt-0.5">Science • Grade 4 – Rizal</p>
                </div>
            </div>
            <div class="flex items-center gap-3 shrink-0">
                <span class="px-3 py-1 rounded-full bg-[#EEE9FF] dark:bg-purple-950/40 text-[#7C3AED] dark:text-purple-300 text-xs font-bold">ILAW Log</span>
                <span class="text-xs font-medium text-[#94A3B8] dark:text-slate-400 hidden sm:inline">Aug 15, 2026</span>
                <button class="p-1 text-[#94A3B8] hover:text-[#172033] dark:hover:text-white rounded-lg transition-colors cursor-pointer">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                    </svg>
                </button>
            </div>
        </div>

    </div>
</div>

