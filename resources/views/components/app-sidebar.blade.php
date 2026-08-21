<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
       class="fixed top-0 left-0 bottom-0 w-[250px] bg-white dark:bg-[#0F172A] border-r border-[#E5ECEB] dark:border-slate-800 z-50 transition-transform duration-300 ease-in-out flex flex-col justify-between overflow-y-auto">
    
    <!-- Top Header & Nav Items -->
    <div class="p-5">
        
        <!-- Logo Section -->
        <div class="flex items-center gap-3 pb-5 mb-5 border-b border-[#E5ECEB]/70 dark:border-slate-800">
            <div class="w-10 h-10 rounded-2xl bg-[#159A9C] flex items-center justify-center text-white shadow-xs shrink-0">
                <!-- Friendly Robot / Education SVG Icon matching image -->
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2v2"/>
                    <rect x="4" y="6" width="16" height="12" rx="4"/>
                    <circle cx="9" cy="11" r="1.5" fill="currentColor"/>
                    <circle cx="15" cy="11" r="1.5" fill="currentColor"/>
                    <path d="M9 15c.83.67 2.17 1 3 1s2.17-.33 3-1"/>
                    <path d="M2 12h2"/>
                    <path d="M20 12h2"/>
                </svg>
            </div>
            <div class="min-w-0">
                <div class="flex items-center gap-1.5">
                    <h1 class="font-bold text-lg text-[#172033] dark:text-white tracking-tight leading-tight truncate">GuroPilot</h1>
                </div>
                <p class="text-[11px] text-[#64748B] dark:text-slate-400 font-medium leading-tight mt-0.5 truncate">Kasangga sa Paggawa ng Aralin</p>
                <span class="inline-block text-[10px] font-bold text-[#159A9C] dark:text-teal-300 tracking-wider uppercase mt-0.5 bg-[#DDF6EF] dark:bg-[#159A9C]/20 px-1.5 py-0.2 rounded-md">DepEd MATATAG</span>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="space-y-5 font-medium">
            
            <!-- Main / Home -->
            <div>
                <button @click="setTab('home'); sidebarOpen = false"
                        :class="activeTab === 'home' ? 'bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 font-semibold' : 'text-[#64748B] dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/60 hover:text-[#172033] dark:hover:text-white'"
                        class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all duration-150 group cursor-pointer">
                    <svg class="w-5 h-5 shrink-0 transition-transform group-hover:scale-105" :class="activeTab === 'home' ? 'text-[#159A9C] dark:text-teal-300' : 'text-[#94A3B8] dark:text-slate-400'" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span class="text-xs md:text-[13px] whitespace-nowrap truncate">Home</span>
                </button>
            </div>

            <!-- Lesson Studio -->
            <div>
                <p class="px-3 mb-2 text-[11px] font-bold tracking-wider text-[#94A3B8] dark:text-slate-500 uppercase">Lesson Studio</p>
                <div class="space-y-1">
                    <button @click="lessonBuilderOpen = true; sidebarOpen = false"
                            class="w-full flex items-center gap-3 px-3 py-2 rounded-xl text-[#64748B] dark:text-slate-300 hover:bg-[#DDF6EF]/60 dark:hover:bg-slate-800/60 hover:text-[#159A9C] dark:hover:text-teal-300 transition-all group cursor-pointer">
                        <svg class="w-4.5 h-4.5 text-[#159A9C] dark:text-teal-300 shrink-0" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-xs md:text-[13px] whitespace-nowrap truncate">Create Lesson</span>
                    </button>

                    <button @click="setTab('my-lessons'); sidebarOpen = false"
                            :class="activeTab === 'my-lessons' ? 'bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 font-semibold' : 'text-[#64748B] dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/60 hover:text-[#172033] dark:hover:text-white'"
                            class="w-full flex items-center gap-3 px-3 py-2 rounded-xl transition-all group cursor-pointer">
                        <svg class="w-4.5 h-4.5 shrink-0" :class="activeTab === 'my-lessons' ? 'text-[#159A9C] dark:text-teal-300' : 'text-[#94A3B8] dark:text-slate-400'" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        <span class="text-xs md:text-[13px] whitespace-nowrap truncate">My Lessons</span>
                    </button>

                    <button @click="setTab('materials'); sidebarOpen = false"
                            :class="activeTab === 'materials' ? 'bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 font-semibold' : 'text-[#64748B] dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/60 hover:text-[#172033] dark:hover:text-white'"
                            class="w-full flex items-center gap-3 px-3 py-2 rounded-xl transition-all group cursor-pointer">
                        <svg class="w-4.5 h-4.5 shrink-0" :class="activeTab === 'materials' ? 'text-[#159A9C] dark:text-teal-300' : 'text-[#94A3B8] dark:text-slate-400'" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                        </svg>
                        <span class="text-xs md:text-[13px] whitespace-nowrap truncate">Materials</span>
                    </button>

                    <button @click="setTab('templates'); sidebarOpen = false"
                            :class="activeTab === 'templates' ? 'bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 font-semibold' : 'text-[#64748B] dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/60 hover:text-[#172033] dark:hover:text-white'"
                            class="w-full flex items-center gap-3 px-3 py-2 rounded-xl transition-all group cursor-pointer">
                        <svg class="w-4.5 h-4.5 shrink-0" :class="activeTab === 'templates' ? 'text-[#159A9C] dark:text-teal-300' : 'text-[#94A3B8] dark:text-slate-400'" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h3a1 1 0 011 1v6a1 1 0 01-1 1h-3a1 1 0 01-1-1v-6z"/>
                        </svg>
                        <span class="text-xs md:text-[13px] whitespace-nowrap truncate">Templates</span>
                    </button>
                </div>
            </div>

            <!-- My Classroom -->
            <div>
                <p class="px-3 mb-2 text-[11px] font-bold tracking-wider text-[#94A3B8] dark:text-slate-500 uppercase">My Classroom</p>
                <div class="space-y-1">
                    <button @click="setTab('classes'); sidebarOpen = false"
                            :class="activeTab === 'classes' ? 'bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 font-semibold' : 'text-[#64748B] dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/60 hover:text-[#172033] dark:hover:text-white'"
                            class="w-full flex items-center gap-3 px-3 py-2 rounded-xl transition-all group cursor-pointer">
                        <svg class="w-4.5 h-4.5 shrink-0" :class="activeTab === 'classes' ? 'text-[#159A9C] dark:text-teal-300' : 'text-[#94A3B8] dark:text-slate-400'" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <span class="text-xs md:text-[13px] whitespace-nowrap truncate">Classes</span>
                    </button>

                    <button @click="setTab('students'); sidebarOpen = false"
                            :class="activeTab === 'students' ? 'bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 font-semibold' : 'text-[#64748B] dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/60 hover:text-[#172033] dark:hover:text-white'"
                            class="w-full flex items-center gap-3 px-3 py-2 rounded-xl transition-all group cursor-pointer">
                        <svg class="w-4.5 h-4.5 shrink-0" :class="activeTab === 'students' ? 'text-[#159A9C] dark:text-teal-300' : 'text-[#94A3B8] dark:text-slate-400'" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                        </svg>
                        <span class="text-xs md:text-[13px] whitespace-nowrap truncate">Students</span>
                    </button>

                    <button @click="setTab('attendance'); sidebarOpen = false"
                            :class="activeTab === 'attendance' ? 'bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 font-semibold' : 'text-[#64748B] dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/60 hover:text-[#172033] dark:hover:text-white'"
                            class="w-full flex items-center gap-3 px-3 py-2 rounded-xl transition-all group cursor-pointer">
                        <svg class="w-4.5 h-4.5 shrink-0" :class="activeTab === 'attendance' ? 'text-[#159A9C] dark:text-teal-300' : 'text-[#94A3B8] dark:text-slate-400'" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-xs md:text-[13px] whitespace-nowrap truncate">Attendance</span>
                    </button>

                    <button @click="setTab('grade-center'); sidebarOpen = false"
                            :class="activeTab === 'grade-center' ? 'bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 font-semibold' : 'text-[#64748B] dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/60 hover:text-[#172033] dark:hover:text-white'"
                            class="w-full flex items-center gap-3 px-3 py-2 rounded-xl transition-all group cursor-pointer">
                        <svg class="w-4.5 h-4.5 shrink-0" :class="activeTab === 'grade-center' ? 'text-[#159A9C] dark:text-teal-300' : 'text-[#94A3B8] dark:text-slate-400'" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        <span class="text-xs md:text-[13px] whitespace-nowrap truncate">Grade Center</span>
                    </button>
                </div>
            </div>

            <!-- School Records -->
            <div>
                <p class="px-3 mb-2 text-[11px] font-bold tracking-wider text-[#94A3B8] dark:text-slate-500 uppercase">School Records</p>
                <div class="space-y-1">
                    <button @click="setTab('sf2'); sidebarOpen = false"
                            :class="activeTab === 'sf2' ? 'bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 font-semibold' : 'text-[#64748B] dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/60 hover:text-[#172033] dark:hover:text-white'"
                            class="w-full flex items-center gap-3 px-3 py-2 rounded-xl transition-all group cursor-pointer">
                        <svg class="w-4.5 h-4.5 shrink-0" :class="activeTab === 'sf2' ? 'text-[#159A9C] dark:text-teal-300' : 'text-[#94A3B8] dark:text-slate-400'" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-xs md:text-[13px] whitespace-nowrap truncate">SF2 Attendance</span>
                    </button>

                    <button @click="setTab('sf9'); sidebarOpen = false"
                            :class="activeTab === 'sf9' ? 'bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 font-semibold' : 'text-[#64748B] dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/60 hover:text-[#172033] dark:hover:text-white'"
                            class="w-full flex items-center gap-3 px-3 py-2 rounded-xl transition-all group cursor-pointer">
                        <svg class="w-4.5 h-4.5 shrink-0" :class="activeTab === 'sf9' ? 'text-[#159A9C] dark:text-teal-300' : 'text-[#94A3B8] dark:text-slate-400'" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span class="text-xs md:text-[13px] whitespace-nowrap truncate">SF9 Report Card</span>
                    </button>

                    <button @click="setTab('sf10'); sidebarOpen = false"
                            :class="activeTab === 'sf10' ? 'bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 font-semibold' : 'text-[#64748B] dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/60 hover:text-[#172033] dark:hover:text-white'"
                            class="w-full flex items-center gap-3 px-3 py-2 rounded-xl transition-all group cursor-pointer">
                        <svg class="w-4.5 h-4.5 shrink-0" :class="activeTab === 'sf10' ? 'text-[#159A9C] dark:text-teal-300' : 'text-[#94A3B8] dark:text-slate-400'" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 012-2h2a2 2 0 012 2v1m-6 0h6"/>
                        </svg>
                        <span class="text-xs md:text-[13px] whitespace-nowrap truncate">SF10 Permanent Record</span>
                    </button>

                    <button @click="setTab('reports'); sidebarOpen = false"
                            :class="activeTab === 'reports' ? 'bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 font-semibold' : 'text-[#64748B] dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/60 hover:text-[#172033] dark:hover:text-white'"
                            class="w-full flex items-center gap-3 px-3 py-2 rounded-xl transition-all group cursor-pointer">
                        <svg class="w-4.5 h-4.5 shrink-0" :class="activeTab === 'reports' ? 'text-[#159A9C] dark:text-teal-300' : 'text-[#94A3B8] dark:text-slate-400'" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-xs md:text-[13px] whitespace-nowrap truncate">Other Reports</span>
                    </button>

                    <button @click="setTab('student-ids'); sidebarOpen = false"
                            :class="activeTab === 'student-ids' ? 'bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 font-semibold' : 'text-[#64748B] dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/60 hover:text-[#172033] dark:hover:text-white'"
                            class="w-full flex items-center gap-3 px-3 py-2 rounded-xl transition-all group cursor-pointer">
                        <svg class="w-4.5 h-4.5 shrink-0" :class="activeTab === 'student-ids' ? 'text-[#159A9C] dark:text-teal-300' : 'text-[#94A3B8] dark:text-slate-400'" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3m-3 3h3m-3 3h3M4 6h16a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2z"/>
                        </svg>
                        <span class="text-xs md:text-[13px] whitespace-nowrap truncate">Student IDs</span>
                    </button>
                </div>
            </div>

            <!-- Teacher Tools -->
            <div>
                <p class="px-3 mb-2 text-[11px] font-bold tracking-wider text-[#94A3B8] dark:text-slate-500 uppercase">Teacher Tools</p>
                <div class="space-y-1">
                    <button @click="assistantOpen = true; sidebarOpen = false"
                            class="w-full flex items-center gap-3 px-3 py-2 rounded-xl text-[#64748B] dark:text-slate-300 hover:bg-[#DDF6EF]/60 dark:hover:bg-slate-800/60 hover:text-[#159A9C] dark:hover:text-teal-300 transition-all group cursor-pointer">
                        <svg class="w-4.5 h-4.5 text-[#159A9C] dark:text-teal-300 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 2v2M4 6h16M5 6v12a2 2 0 002 2h10a2 2 0 002-2V6M9 11h.01M15 11h.01M9 15c1 1 5 1 6 0"/>
                        </svg>
                        <span class="text-xs md:text-[13px] whitespace-nowrap truncate">Teacher Assistant</span>
                    </button>
                </div>
            </div>

            <!-- Settings -->
            <div>
                <div class="space-y-1">
                    <button @click="setTab('settings'); sidebarOpen = false"
                            :class="activeTab === 'settings' ? 'bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 font-semibold' : 'text-[#64748B] dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/60 hover:text-[#172033] dark:hover:text-white'"
                            class="w-full flex items-center gap-3 px-3 py-2 rounded-xl transition-all group cursor-pointer">
                        <svg class="w-4.5 h-4.5 shrink-0" :class="activeTab === 'settings' ? 'text-[#159A9C] dark:text-teal-300' : 'text-[#94A3B8] dark:text-slate-400'" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="text-xs md:text-[13px] whitespace-nowrap truncate">Settings</span>
                    </button>
                </div>
            </div>

        </nav>
    </div>

    <!-- Bottom Upgrade Card -->
    <div class="p-4 m-3 rounded-2xl bg-gradient-to-br from-[#DDF6EF]/70 to-[#FFF4D6]/50 dark:from-slate-800 dark:to-slate-800/80 border border-[#E5ECEB] dark:border-slate-700 relative overflow-hidden">
        <div class="flex items-center gap-2 mb-1.5">
            <div class="w-6 h-6 rounded-lg bg-[#159A9C] text-white flex items-center justify-center shadow-xs">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l2.4 7.4H22l-6 4.6 2.3 7.2L12 16.6l-6.3 4.6 2.3-7.2-6-4.6h7.6z"/>
                </svg>
            </div>
            <h4 class="font-bold text-sm text-[#172033] dark:text-white">GuroPilot Pro</h4>
        </div>
        <p class="text-xs text-[#64748B] dark:text-slate-300 leading-relaxed">
            Unlock more features and templates.
        </p>
        <button class="w-full mt-3 py-2 px-3 bg-white dark:bg-slate-700 hover:bg-slate-50 dark:hover:bg-slate-600 text-[#159A9C] dark:text-teal-300 font-semibold text-xs rounded-xl shadow-2xs border border-[#E5ECEB] dark:border-slate-600 transition-colors text-center cursor-pointer">
            Upgrade Now
        </button>
    </div>

</aside>
