<x-layouts.app>
    
    <!-- HOME DASHBOARD VIEW -->
    <div x-show="activeTab === 'home'" class="space-y-6">
        
        <!-- Welcome Header & Create Lesson Primary Card -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
            
            <!-- Welcome Greeting & Plant Illustration (Cols 1-7) -->
            <div class="lg:col-span-7 bg-gradient-to-r from-white to-[#F4F9F8] dark:from-[#111C38] dark:to-[#0E172E] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 md:p-8 flex items-center justify-between shadow-2xs relative overflow-hidden">
                <div class="z-10 max-w-md">
                    <h1 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-[#172033] dark:text-white tracking-tight leading-tight">
                        Good morning, Teacher Maria! 👋
                    </h1>
                    <p class="text-sm md:text-base text-[#64748B] dark:text-slate-300 font-medium mt-2">
                        You're doing great today.
                    </p>
                </div>
                
                <!-- Soft Decorative Learning/Plant SVG Illustration -->
                <div class="w-24 md:w-32 h-24 md:h-32 text-[#159A9C]/40 dark:text-[#159A9C]/60 shrink-0 opacity-80 z-0">
                    <svg viewBox="0 0 200 200" fill="none" class="w-full h-full">
                        <circle cx="100" cy="150" r="30" fill="#DDF6EF" class="dark:opacity-30"/>
                        <path d="M100 150 C100 110 80 80 60 50 C90 70 100 110 100 150 Z" fill="#159A9C"/>
                        <path d="M100 150 C100 120 120 90 140 70 C120 90 100 130 100 150 Z" fill="#22A06B"/>
                        <path d="M100 150 L100 60" stroke="#0E7476" stroke-width="4" stroke-linecap="round"/>
                        <circle cx="140" cy="70" r="6" fill="#FFF4D6" class="dark:opacity-40"/>
                        <circle cx="60" cy="50" r="8" fill="#EEE9FF" class="dark:opacity-40"/>
                    </svg>
                </div>
            </div>

            <!-- Create a New Lesson Card (Primary Action - Cols 8-12) -->
            <div @click="lessonBuilderOpen = true" 
                 class="lg:col-span-5 bg-white dark:bg-[#111C38] hover:bg-[#F4F9F8]/60 dark:hover:bg-slate-800/80 border border-[#E5ECEB] dark:border-slate-800 hover:border-[#159A9C]/40 dark:hover:border-[#159A9C]/60 rounded-3xl p-6 shadow-2xs hover:shadow-md transition-all duration-200 cursor-pointer group flex items-center justify-between gap-4">
                <div class="flex items-center gap-4 min-w-0">
                    <div class="w-14 h-14 rounded-2xl bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 flex items-center justify-center shrink-0 shadow-2xs group-hover:scale-105 transition-transform">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-extrabold text-base md:text-lg text-[#172033] dark:text-white group-hover:text-[#159A9C] dark:group-hover:text-teal-300 transition-colors leading-snug">
                            Create a New Lesson
                        </h2>
                        <p class="text-xs md:text-sm text-[#64748B] dark:text-slate-300 font-medium leading-normal mt-1">
                            Start creating a MATATAG-aligned lesson with AI assistance.
                        </p>
                    </div>
                </div>
                <div class="w-8 h-8 rounded-full bg-slate-50 dark:bg-slate-800 group-hover:bg-[#159A9C] text-[#94A3B8] dark:text-slate-300 group-hover:text-white flex items-center justify-center transition-colors shrink-0">
                    <svg class="w-4 h-4 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>


        </div>

        <!-- 5 STATISTIC CARDS ROW (Exact match to reference mockup) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
            
            <!-- Card 1: My Classes -->
            <x-stat-card number="3" 
                         title="My Classes" 
                         subtitle="2 active today" 
                         iconBg="bg-[#DDF6EF]" 
                         iconColor="text-[#159A9C]">
                <x-slot:icon>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </x-slot:icon>
            </x-stat-card>

            <!-- Card 2: Students -->
            <x-stat-card number="86" 
                         title="Students" 
                         subtitle="Across all classes" 
                         iconBg="bg-[#EEE9FF]" 
                         iconColor="text-[#7C3AED]">
                <x-slot:icon>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                    </svg>
                </x-slot:icon>
            </x-stat-card>

            <!-- Card 3: Honor Students -->
            <x-stat-card number="12" 
                         title="Honor Students" 
                         subtitle="Term 3 Academic achievers" 
                         iconBg="bg-[#EEE9FF]" 
                         iconColor="text-[#7C3AED]">
                <x-slot:icon>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                </x-slot:icon>
            </x-stat-card>

            <!-- Card 4: SARDO (Student At Risk Of Dropping Out) -->
            <x-stat-card number="2" 
                         title="SARDO" 
                         subtitle="Students At Risk Of Dropping Out" 
                         iconBg="bg-[#FDE9E7]" 
                         iconColor="text-[#E11D48]">
                <x-slot:icon>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </x-slot:icon>
            </x-stat-card>


            <!-- Card 5: Pending Tasks -->
            <x-stat-card number="3" 
                         title="Pending Tasks" 
                         subtitle="Needs your attention" 
                         iconBg="bg-[#FFF4D6]" 
                         iconColor="text-[#D97706]">
                <x-slot:icon>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </x-slot:icon>
            </x-stat-card>

        </div>

        <!-- MAIN DASHBOARD CONTENT GRID (2 COLUMNS: LEFT 65%, RIGHT 35%) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
            
            <!-- Left Main Column (Cols 1-7) -->
            <div class="lg:col-span-7 space-y-6">
                <!-- Recent Lessons List Card -->
                <x-recent-lessons />

                <!-- Quick Tips for Today Banner -->
                <x-quick-tips />
            </div>

            <!-- Right Sidebar Column (Cols 8-12) -->
            <div class="lg:col-span-5">
                <!-- Teacher Calendar (Equal height & scrollable events list) -->
                <x-teacher-calendar />
            </div>




        </div>

    </div>

    <!-- MOCK SUB-VIEWS (FOR SECONDARY SIDEBAR LINKS) -->
    
    <!-- My Lessons View -->
    <div x-show="activeTab === 'my-lessons'" class="space-y-6" style="display: none;">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-[#172033]">My Lessons Studio</h1>
                <p class="text-xs text-[#64748B]">Manage your MATATAG DLLs, DLPs, and ILAW lesson plans</p>
            </div>
            <button @click="lessonBuilderOpen = true" class="px-4 py-2 bg-[#159A9C] text-white rounded-xl text-xs font-bold shadow-xs hover:bg-[#0E7476] transition-colors">
                + Create New Lesson
            </button>
        </div>
        <x-recent-lessons />
    </div>

    <!-- Teaching Materials View -->
    <div x-show="activeTab === 'materials'" class="space-y-6" style="display: none;">
        <x-materials.index />
    </div>

    <!-- Templates View -->
    <div x-show="activeTab === 'templates'" class="space-y-6" style="display: none;">
        <x-templates.index />
    </div>



    <!-- Classes Module View -->
    <div x-show="activeTab === 'classes'" class="space-y-6" style="display: none;">
        <x-classes.index />
    </div>

    <!-- Students Module View -->
    <div x-show="activeTab === 'students'" class="space-y-6" style="display: none;">
        <x-students.index />
    </div>

    <!-- Attendance Module View -->
    <div x-show="activeTab === 'attendance'" class="space-y-6" style="display: none;">
        <x-attendance.index />
    </div>

    <!-- Grade Center Module View -->
    <div x-show="activeTab === 'grade-center'" class="space-y-6" style="display: none;">
        <x-grade-center.index />
    </div>





    <!-- SF2 Attendance Module View -->
    <div x-show="activeTab === 'sf2'" class="space-y-6" style="display: none;">
        <x-school-records.sf2 />
    </div>

    <!-- SF9 Report Card Module View -->
    <div x-show="activeTab === 'sf9'" class="space-y-6" style="display: none;">
        <x-school-records.sf9 />
    </div>

    <!-- Other School Records Center View -->
    <div x-show="['sf10', 'reports', 'student-ids'].includes(activeTab)" class="space-y-6" style="display: none;">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-[#172033]">School Records Center</h1>
                <p class="text-xs text-[#64748B]">DepEd Official Forms and Permanent Records</p>
            </div>
        </div>
        <x-school-records />
    </div>

    <!-- Settings View -->
    <div x-show="activeTab === 'settings'" class="space-y-6" style="display: none;">
        <div>
            <h1 class="text-2xl font-bold text-[#172033]">Settings</h1>
            <p class="text-xs text-[#64748B]">Preferences and GuroPilot profile configurations</p>
        </div>
        <div class="bg-white border border-[#E5ECEB] rounded-2xl p-6 max-w-xl space-y-4">
            <div>
                <label class="block text-xs font-bold text-[#64748B] uppercase mb-1">Teacher Name</label>
                <input type="text" value="Teacher Maria Santos" class="w-full bg-[#F4F9F8] border border-[#E5ECEB] p-3 rounded-xl text-sm font-medium text-[#172033]">
            </div>
            <div>
                <label class="block text-xs font-bold text-[#64748B] uppercase mb-1">Advisory Grade & Section</label>
                <input type="text" value="Grade 4 – Rizal" class="w-full bg-[#F4F9F8] border border-[#E5ECEB] p-3 rounded-xl text-sm font-medium text-[#172033]">
            </div>
            <button class="px-5 py-2.5 bg-[#159A9C] text-white text-xs font-bold rounded-xl shadow-xs hover:bg-[#0E7476] transition-colors">
                Save Preferences
            </button>
        </div>
    </div>

</x-layouts.app>
