@props([
    'grade' => 'Grade 4 – Rizal',
    'subject' => 'Science',
    'schoolYear' => 'School Year 2026–2027',
    'studentsCount' => 32,
    'attendanceRate' => '96%',
    'gradeProgress' => '88%',
    'iconBg' => 'bg-[#DDF6EF] dark:bg-[#159A9C]/20',
    'iconColor' => 'text-[#159A9C] dark:text-teal-300',
    'footerBg' => 'bg-[#DDF6EF]/50 dark:bg-[#159A9C]/10',
    'footerColor' => 'text-[#159A9C] dark:text-teal-300'
])

<div x-data="{ menuOpen: false }"
     {{ $attributes->merge(['class' => 'bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 shadow-2xs hover:shadow-md transition-all duration-200 flex flex-col justify-between group cursor-pointer relative']) }}>
    
    <div>
        <!-- Top Icon Header & Three-Dot Menu -->
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 rounded-2xl {{ $iconBg }} {{ $iconColor }} flex items-center justify-center shrink-0 shadow-2xs group-hover:scale-105 transition-transform">
                {{ $slot }}
            </div>

            <!-- More Menu Popover -->
            <div class="relative">
                <button @click.stop="menuOpen = !menuOpen" 
                        @click.away="menuOpen = false" 
                        class="w-8 h-8 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 text-[#94A3B8] hover:text-[#172033] dark:hover:text-white flex items-center justify-center transition-colors cursor-pointer">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="menuOpen" 
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="absolute right-0 mt-1 w-44 bg-white dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 rounded-2xl shadow-xl z-20 py-2 text-xs font-semibold"
                     style="display: none;">
                    <button @click.stop="menuOpen = false; $dispatch('open-class-details')" 
                            class="w-full text-left px-4 py-2 hover:bg-[#DDF6EF]/50 dark:hover:bg-slate-700 text-[#159A9C] dark:text-teal-300 flex items-center gap-2 cursor-pointer">
                        <span>🏫 Open Class</span>
                    </button>
                    <button @click.stop="menuOpen = false; $dispatch('open-edit-class', '{{ $grade }}')" 
                            class="w-full text-left px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700 text-[#172033] dark:text-slate-200 flex items-center gap-2 cursor-pointer">
                        <span>✏️ Edit Class</span>
                    </button>
                    <button @click.stop="menuOpen = false; activeTab = 'students'" 
                            class="w-full text-left px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700 text-[#172033] dark:text-slate-200 flex items-center gap-2 cursor-pointer">
                        <span>👥 View Students</span>
                    </button>
                    <button @click.stop="menuOpen = false; $dispatch('toast', 'Class {{ $grade }} archived')" 
                            class="w-full text-left px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700 text-[#172033] dark:text-slate-200 flex items-center gap-2 cursor-pointer">
                        <span>📦 Archive Class</span>
                    </button>
                    <button @click.stop="menuOpen = false; $dispatch('open-delete-class', '{{ $grade }}')" 
                            class="w-full text-left px-4 py-2 hover:bg-rose-50 dark:hover:bg-rose-950/30 text-rose-500 flex items-center gap-2 cursor-pointer border-t border-slate-100 dark:border-slate-700">
                        <span>🗑️ Delete Class</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Grade & Section -->
        <h3 class="font-extrabold text-lg md:text-xl text-[#172033] dark:text-white group-hover:text-[#159A9C] dark:group-hover:text-teal-300 transition-colors leading-snug">
            {{ $grade }}
        </h3>
        <p class="text-xs md:text-sm font-semibold text-[#159A9C] dark:text-teal-300 mt-0.5">
            {{ $subject }}
        </p>

        <!-- School Year & Students Sub-metadata -->
        <div class="space-y-1 mt-3 text-xs font-medium text-[#64748B] dark:text-slate-400">
            <div class="flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5 text-[#94A3B8]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>{{ $schoolYear }}</span>
            </div>
            <div class="flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5 text-[#94A3B8]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                <span>{{ $studentsCount }} Students</span>
            </div>
        </div>

        <!-- 3 Mini Statistic Pills inside card (Exact match to reference mockup) -->
        <div class="grid grid-cols-3 gap-2 mt-4 pt-4 border-t border-[#E5ECEB]/60 dark:border-slate-800 text-center">
            <!-- Students Pill -->
            <div class="bg-[#DDF6EF]/60 dark:bg-teal-950/30 p-2 rounded-2xl">
                <div class="flex items-center justify-center gap-1 text-[#159A9C] dark:text-teal-300 font-extrabold text-xs">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                    <span>{{ $studentsCount }}</span>
                </div>
                <span class="text-[9px] font-bold text-[#64748B] dark:text-slate-400 block mt-0.5">Students</span>
            </div>

            <!-- Attendance Pill -->
            <div class="bg-[#EAF2FF]/70 dark:bg-blue-950/30 p-2 rounded-2xl">
                <div class="flex items-center justify-center gap-1 text-[#2563EB] dark:text-blue-300 font-extrabold text-xs">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>{{ $attendanceRate }}</span>
                </div>
                <span class="text-[9px] font-bold text-[#64748B] dark:text-slate-400 block mt-0.5 truncate">Attendance</span>
            </div>

            <!-- Grade Progress Pill -->
            <div class="bg-[#FFF4D6]/70 dark:bg-amber-950/30 p-2 rounded-2xl">
                <div class="flex items-center justify-center gap-1 text-[#D97706] dark:text-amber-300 font-extrabold text-xs">
                    <span class="text-[10px]">⭐</span>
                    <span>{{ $gradeProgress }}</span>
                </div>
                <span class="text-[9px] font-bold text-[#64748B] dark:text-slate-400 block mt-0.5 truncate">Grade Prog.</span>
            </div>
        </div>
    </div>

    <!-- Bottom Action Pill Footer -->
    <div class="mt-5 pt-1">
        <div class="w-full py-2.5 px-4 rounded-xl {{ $footerBg }} {{ $footerColor }} font-extrabold text-xs flex items-center justify-between group-hover:opacity-90 transition-all">
            <span>Open Class</span>
            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
        </div>
    </div>
</div>
