@props([
    'selectedClass' => [
        'grade' => 'Grade 4 – Rizal',
        'subject' => 'Science',
        'students' => 32,
        'attendanceRate' => '96%',
        'gradeProgress' => '88%',
        'materialsCount' => 12,
        'year' => 'School Year 2026–2027'
    ]
])

<div class="space-y-8">
    <!-- Header Controls & Class Title -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 md:p-8 shadow-2xs">
        <div>
            <!-- Back Button -->
            <button @click="$dispatch('back-to-classes-list')" 
                    class="inline-flex items-center gap-1.5 text-xs font-bold text-[#159A9C] dark:text-teal-300 hover:underline mb-3 cursor-pointer">
                <span>← Back to Classes</span>
            </button>

            <div class="flex flex-wrap items-center gap-3">
                <h1 class="text-2xl md:text-3xl font-extrabold text-[#172033] dark:text-white tracking-tight" x-text="selectedClass.grade"></h1>
                <span class="px-3 py-1 rounded-full bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 text-xs font-extrabold" x-text="selectedClass.subject"></span>
            </div>

            <div class="flex items-center gap-4 mt-2 text-xs font-semibold text-[#64748B] dark:text-slate-400">
                <div class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-[#94A3B8]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span x-text="selectedClass.students + ' Students'"></span>
                </div>
                <span>•</span>
                <div class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-[#94A3B8]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span x-text="selectedClass.year"></span>
                </div>
            </div>
        </div>

        <!-- Primary Action: + Create Lesson -->
        <div class="shrink-0">
            <button @click="lessonBuilderOpen = true; $dispatch('toast', 'Pre-selecting ' + selectedClass.grade + ' in Lesson Builder...')" 
                    class="px-5 py-3 bg-[#159A9C] hover:bg-[#0E7476] text-white font-extrabold text-xs md:text-sm rounded-2xl shadow-xs transition-all flex items-center gap-2 cursor-pointer active:scale-95">
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                </svg>
                <span>+ Create Lesson</span>
            </button>
        </div>
    </div>

    <!-- 4 Quick Navigation Cards Grid -->
    <div>
        <div class="flex items-center gap-2 mb-4">
            <span class="w-2.5 h-2.5 rounded-full bg-[#159A9C]"></span>
            <h2 class="font-extrabold text-lg md:text-xl text-[#172033] dark:text-white">Classroom Hub</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Card 1: Students -->
            <div @click="activeTab = 'students'" 
                 class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 shadow-2xs hover:shadow-md transition-all duration-200 flex flex-col justify-between group cursor-pointer">
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 flex items-center justify-center shrink-0 mb-4 shadow-2xs group-hover:scale-105 transition-transform">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <span class="block text-2xl font-extrabold text-[#172033] dark:text-white" x-text="selectedClass.students + ' Learners'"></span>
                    <h3 class="font-extrabold text-base text-[#172033] dark:text-white mt-1 group-hover:text-[#159A9C] dark:group-hover:text-teal-300 transition-colors">Students Roster</h3>
                    <p class="text-xs text-[#64748B] dark:text-slate-400 font-medium mt-1">View advisory student profiles, SF9, and learner records.</p>
                </div>
                <div class="mt-6 pt-2">
                    <div class="w-full py-2.5 px-4 rounded-xl bg-[#DDF6EF]/50 dark:bg-[#159A9C]/10 text-[#159A9C] dark:text-teal-300 font-extrabold text-xs flex items-center justify-between group-hover:opacity-90 transition-all">
                        <span>View student roster</span>
                        <span>→</span>
                    </div>
                </div>
            </div>

            <!-- Card 2: Attendance -->
            <div @click="activeTab = 'attendance'" 
                 class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 shadow-2xs hover:shadow-md transition-all duration-200 flex flex-col justify-between group cursor-pointer">
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-[#EAF2FF] dark:bg-blue-950/30 text-[#2563EB] dark:text-blue-300 flex items-center justify-center shrink-0 mb-4 shadow-2xs group-hover:scale-105 transition-transform">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <span class="block text-2xl font-extrabold text-[#172033] dark:text-white" x-text="selectedClass.attendanceRate"></span>
                    <h3 class="font-extrabold text-base text-[#172033] dark:text-white mt-1 group-hover:text-[#2563EB] dark:group-hover:text-blue-300 transition-colors">Daily Attendance</h3>
                    <p class="text-xs text-[#64748B] dark:text-slate-400 font-medium mt-1">Track daily presence, late arrivals, and generate SF2 forms.</p>
                </div>
                <div class="mt-6 pt-2">
                    <div class="w-full py-2.5 px-4 rounded-xl bg-[#EAF2FF]/50 dark:bg-blue-950/20 text-[#2563EB] dark:text-blue-300 font-extrabold text-xs flex items-center justify-between group-hover:opacity-90 transition-all">
                        <span>View attendance</span>
                        <span>→</span>
                    </div>
                </div>
            </div>

            <!-- Card 3: Grade Center -->
            <div @click="activeTab = 'grade-center'" 
                 class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 shadow-2xs hover:shadow-md transition-all duration-200 flex flex-col justify-between group cursor-pointer">
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-[#FFF4D6] dark:bg-amber-950/30 text-[#D97706] dark:text-amber-300 flex items-center justify-center shrink-0 mb-4 shadow-2xs group-hover:scale-105 transition-transform">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <span class="block text-2xl font-extrabold text-[#172033] dark:text-white" x-text="selectedClass.gradeProgress"></span>
                    <h3 class="font-extrabold text-base text-[#172033] dark:text-white mt-1 group-hover:text-[#D97706] dark:group-hover:text-amber-300 transition-colors">Grade Center</h3>
                    <p class="text-xs text-[#64748B] dark:text-slate-400 font-medium mt-1">Written works, performance tasks, and term grades.</p>
                </div>
                <div class="mt-6 pt-2">
                    <div class="w-full py-2.5 px-4 rounded-xl bg-[#FFF4D6]/50 dark:bg-amber-950/20 text-[#D97706] dark:text-amber-300 font-extrabold text-xs flex items-center justify-between group-hover:opacity-90 transition-all">
                        <span>View grades</span>
                        <span>→</span>
                    </div>
                </div>
            </div>

            <!-- Card 4: Teaching Materials -->
            <div @click="activeTab = 'materials'" 
                 class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 shadow-2xs hover:shadow-md transition-all duration-200 flex flex-col justify-between group cursor-pointer">
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-[#EEE9FF] dark:bg-purple-950/30 text-[#7C3AED] dark:text-purple-300 flex items-center justify-center shrink-0 mb-4 shadow-2xs group-hover:scale-105 transition-transform">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                        </svg>
                    </div>
                    <span class="block text-2xl font-extrabold text-[#172033] dark:text-white" x-text="selectedClass.materialsCount + ' Materials'"></span>
                    <h3 class="font-extrabold text-base text-[#172033] dark:text-white mt-1 group-hover:text-[#7C3AED] dark:group-hover:text-purple-300 transition-colors">Teaching Materials</h3>
                    <p class="text-xs text-[#64748B] dark:text-slate-400 font-medium mt-1">Class slide decks, worksheets, quizzes, and group tasks.</p>
                </div>
                <div class="mt-6 pt-2">
                    <div class="w-full py-2.5 px-4 rounded-xl bg-[#EEE9FF]/50 dark:bg-purple-950/20 text-[#7C3AED] dark:text-purple-300 font-extrabold text-xs flex items-center justify-between group-hover:opacity-90 transition-all">
                        <span>View materials</span>
                        <span>→</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
