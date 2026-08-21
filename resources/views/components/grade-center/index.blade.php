<div x-data="{
        currentView: 'classes', // 'classes' or 'class-grade-center'
        selectedClass: {
            grade: 'Grade 4 – Rizal',
            subject: 'Science',
            students: 32,
            year: 'SY 2026–2027'
        },

        // Mock Classes Data
        classes: [
            {
                grade: 'Grade 4 – Rizal',
                subject: 'Science',
                students: 32,
                year: 'SY 2026–2027',
                iconBg: 'bg-[#DDF6EF] dark:bg-[#159A9C]/20',
                iconColor: 'text-[#159A9C] dark:text-teal-300'
            },
            {
                grade: 'Grade 5 – Bonifacio',
                subject: 'Mathematics',
                students: 28,
                year: 'SY 2026–2027',
                iconBg: 'bg-[#EEE9FF] dark:bg-purple-950/30',
                iconColor: 'text-[#7C3AED] dark:text-purple-300'
            },
            {
                grade: 'Grade 3 – Mabini',
                subject: 'English',
                students: 26,
                year: 'SY 2026–2027',
                iconBg: 'bg-[#FFF4D6] dark:bg-amber-950/30',
                iconColor: 'text-[#D97706] dark:text-amber-300'
            },
            {
                grade: 'Grade 6 – Luna',
                subject: 'Araling Panlipunan',
                students: 30,
                year: 'SY 2026–2027',
                iconBg: 'bg-[#FDE9E7] dark:bg-rose-950/30',
                iconColor: 'text-[#E11D48] dark:text-rose-300'
            },
            {
                grade: 'Grade 4 – Aguinaldo',
                subject: 'English',
                students: 29,
                year: 'SY 2026–2027',
                iconBg: 'bg-[#EAF2FF] dark:bg-blue-950/30',
                iconColor: 'text-[#2563EB] dark:text-blue-300'
            }
        ],

        // Toast Feedback System
        toastMessage: '',
        toastVisible: false,
        showToast(msg) {
            this.toastMessage = msg;
            this.toastVisible = true;
            setTimeout(() => { this.toastVisible = false; }, 3000);
        },

        selectClass(item) {
            this.selectedClass = item;
            this.currentView = 'class-grade-center';
        }
     }"
     @back-to-classes.window="currentView = 'classes'"
     @toast.window="showToast($event.detail)"
     class="space-y-8 relative">

    <!-- Toast Notification Banner -->
    <div x-show="toastVisible" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-2"
         class="fixed top-5 right-5 z-50 bg-[#172033] dark:bg-slate-800 text-white px-5 py-3 rounded-2xl shadow-xl border border-slate-700 flex items-center gap-3 text-xs font-bold"
         style="display: none;">
        <span class="text-teal-400">✨</span>
        <span x-text="toastMessage"></span>
    </div>

    <!-- ============================================================ -->
    <!-- PAGE 1 — GRADE CENTER LANDING VIEW -->
    <!-- ============================================================ -->
    <div x-show="currentView === 'classes'" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="space-y-8">
        
        <!-- Header Banner -->
        <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 md:p-8 flex items-center justify-between shadow-2xs relative overflow-hidden">
            <div class="z-10 max-w-xl">
                <h1 class="text-2xl md:text-3xl font-extrabold text-[#172033] dark:text-white tracking-tight leading-tight">
                    Grade Center
                </h1>
                <p class="text-xs md:text-sm text-[#64748B] dark:text-slate-400 font-medium mt-2 leading-relaxed">
                    Choose a class to view and manage student grades.
                </p>
            </div>

            <!-- Header Action: + Create Assessment Button -->
            <div class="flex items-center gap-4 z-10 shrink-0">
                <button @click="$dispatch('open-create-assessment')" 
                        class="px-5 py-3 bg-[#159A9C] hover:bg-[#0E7476] text-white font-extrabold text-xs md:text-sm rounded-2xl shadow-xs transition-all flex items-center gap-2 cursor-pointer active:scale-95">
                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Create Assessment</span>
                </button>
            </div>
        </div>

        <!-- Section: Your Classes Grid (5 Cards + 1 Create New Class Card matching image) -->
        <div>
            <div class="flex items-center justify-between mb-5">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#159A9C]"></span>
                    <h2 class="font-extrabold text-lg md:text-xl text-[#172033] dark:text-white">Your Classes</h2>
                </div>
                <span class="text-xs font-semibold text-[#64748B] dark:text-slate-400">Select a class to manage grade center</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Class 1: Grade 4 - Rizal -->
                <x-grade-center.class-card @click="selectClass(classes[0])"
                                           grade="Grade 4 – Rizal"
                                           subject="Science"
                                           :studentsCount="32"
                                           iconBg="bg-[#DDF6EF] dark:bg-[#159A9C]/20"
                                           iconColor="text-[#159A9C] dark:text-teal-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </x-grade-center.class-card>

                <!-- Class 2: Grade 5 - Bonifacio -->
                <x-grade-center.class-card @click="selectClass(classes[1])"
                                           grade="Grade 5 – Bonifacio"
                                           subject="Mathematics"
                                           :studentsCount="28"
                                           iconBg="bg-[#EEE9FF] dark:bg-purple-950/30"
                                           iconColor="text-[#7C3AED] dark:text-purple-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/>
                    </svg>
                </x-grade-center.class-card>

                <!-- Class 3: Grade 3 - Mabini -->
                <x-grade-center.class-card @click="selectClass(classes[2])"
                                           grade="Grade 3 – Mabini"
                                           subject="English"
                                           :studentsCount="26"
                                           iconBg="bg-[#FFF4D6] dark:bg-amber-950/30"
                                           iconColor="text-[#D97706] dark:text-amber-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </x-grade-center.class-card>

                <!-- Class 4: Grade 6 - Luna -->
                <x-grade-center.class-card @click="selectClass(classes[3])"
                                           grade="Grade 6 – Luna"
                                           subject="Araling Panlipunan"
                                           :studentsCount="30"
                                           iconBg="bg-[#FDE9E7] dark:bg-rose-950/30"
                                           iconColor="text-[#E11D48] dark:text-rose-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </x-grade-center.class-card>

                <!-- Class 5: Grade 4 - Aguinaldo -->
                <x-grade-center.class-card @click="selectClass(classes[4])"
                                           grade="Grade 4 – Aguinaldo"
                                           subject="English"
                                           :studentsCount="29"
                                           iconBg="bg-[#EAF2FF] dark:bg-blue-950/30"
                                           iconColor="text-[#2563EB] dark:text-blue-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                </x-grade-center.class-card>

                <!-- Card 6: Create New Class Card (Exact match to reference mockup) -->
                <div @click="activeTab = 'classes'; setTimeout(() => $dispatch('open-create-class'), 100)"
                     class="bg-white dark:bg-[#111C38] border-2 border-dashed border-[#159A9C]/40 dark:border-teal-500/40 rounded-3xl p-6 shadow-2xs hover:bg-[#DDF6EF]/30 dark:hover:bg-slate-800/60 transition-all duration-200 flex flex-col justify-between group cursor-pointer">
                    <div>
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-14 h-14 rounded-2xl bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-extrabold text-lg text-[#172033] dark:text-white group-hover:text-[#159A9C] dark:group-hover:text-teal-300 transition-colors">
                                    Create New Class
                                </h3>
                                <p class="text-xs text-[#64748B] dark:text-slate-400 font-medium mt-1 leading-snug">
                                    Add a new class and start managing grades.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-2 pt-2 border-t border-[#E5ECEB]/60 dark:border-slate-800 flex items-center justify-end">
                        <span class="font-bold text-xs text-[#159A9C] dark:text-teal-300 group-hover:underline flex items-center gap-1">
                            <span>Create Class</span>
                            <span>→</span>
                        </span>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- ============================================================ -->
    <!-- PAGE 2 — CLASS GRADE CENTER VIEW -->
    <!-- ============================================================ -->
    <div x-show="currentView === 'class-grade-center'"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         style="display: none;">
        
        <x-grade-center.class-grade-center />

    </div>

    <!-- Modals -->
    <x-grade-center.create-assessment-modal />
    <x-grade-center.grade-settings-modal />

</div>
