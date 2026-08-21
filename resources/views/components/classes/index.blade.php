<div x-data="{
        currentView: 'classes', // 'classes' or 'class-overview'
        viewMode: 'grid', // 'grid' or 'list'
        searchQuery: '',
        selectedClass: {
            grade: 'Grade 4 – Rizal',
            subject: 'Science',
            students: 32,
            attendanceRate: '96%',
            gradeProgress: '88%',
            materialsCount: 12,
            year: 'School Year 2026–2027',
            iconBg: 'bg-[#DDF6EF] dark:bg-[#159A9C]/20',
            iconColor: 'text-[#159A9C] dark:text-teal-300',
            footerBg: 'bg-[#DDF6EF]/50 dark:bg-[#159A9C]/10',
            footerColor: 'text-[#159A9C] dark:text-teal-300'
        },

        // Mock Classes Data
        classes: [
            {
                grade: 'Grade 4 – Rizal',
                subject: 'Science',
                students: 32,
                attendanceRate: '96%',
                gradeProgress: '88%',
                materialsCount: 12,
                year: 'School Year 2026–2027',
                iconBg: 'bg-[#DDF6EF] dark:bg-[#159A9C]/20',
                iconColor: 'text-[#159A9C] dark:text-teal-300',
                footerBg: 'bg-[#DDF6EF]/50 dark:bg-[#159A9C]/10',
                footerColor: 'text-[#159A9C] dark:text-teal-300'
            },
            {
                grade: 'Grade 5 – Bonifacio',
                subject: 'Mathematics',
                students: 28,
                attendanceRate: '95%',
                gradeProgress: '85%',
                materialsCount: 8,
                year: 'School Year 2026–2027',
                iconBg: 'bg-[#EEE9FF] dark:bg-purple-950/30',
                iconColor: 'text-[#7C3AED] dark:text-purple-300',
                footerBg: 'bg-[#EEE9FF]/50 dark:bg-purple-950/20',
                footerColor: 'text-[#7C3AED] dark:text-purple-300'
            },
            {
                grade: 'Grade 3 – Mabini',
                subject: 'English',
                students: 26,
                attendanceRate: '93%',
                gradeProgress: '90%',
                materialsCount: 15,
                year: 'School Year 2026–2027',
                iconBg: 'bg-[#FFF4D6] dark:bg-amber-950/30',
                iconColor: 'text-[#D97706] dark:text-amber-300',
                footerBg: 'bg-[#FFF4D6]/50 dark:bg-amber-950/20',
                footerColor: 'text-[#D97706] dark:text-amber-300'
            },
            {
                grade: 'Grade 6 – Luna',
                subject: 'Araling Panlipunan',
                students: 30,
                attendanceRate: '97%',
                gradeProgress: '87%',
                materialsCount: 10,
                year: 'School Year 2026–2027',
                iconBg: 'bg-[#FDE9E7] dark:bg-rose-950/30',
                iconColor: 'text-[#E11D48] dark:text-rose-300',
                footerBg: 'bg-[#FDE9E7]/50 dark:bg-rose-950/20',
                footerColor: 'text-[#E11D48] dark:text-rose-300'
            },
            {
                grade: 'Grade 4 – Aguinaldo',
                subject: 'English',
                students: 29,
                attendanceRate: '94%',
                gradeProgress: '82%',
                materialsCount: 7,
                year: 'School Year 2026–2027',
                iconBg: 'bg-[#EAF2FF] dark:bg-blue-950/30',
                iconColor: 'text-[#2563EB] dark:text-blue-300',
                footerBg: 'bg-[#EAF2FF]/50 dark:bg-blue-950/20',
                footerColor: 'text-[#2563EB] dark:text-blue-300'
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

        // Filtered Classes computation
        get filteredClasses() {
            return this.classes.filter(item => {
                const query = this.searchQuery.toLowerCase();
                return this.searchQuery === '' || 
                       item.grade.toLowerCase().includes(query) || 
                       item.subject.toLowerCase().includes(query);
            });
        },

        openClassDetails(item) {
            this.selectedClass = item;
            this.currentView = 'class-overview';
        }
     }"
     @back-to-classes-list.window="currentView = 'classes'"
     @open-class-details.window="currentView = 'class-overview'"
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
    <!-- PAGE 1 — MY CLASSES LANDING VIEW -->
    <!-- ============================================================ -->
    <div x-show="currentView === 'classes'" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="space-y-8">
        
        <!-- Header Banner with Soft Schoolhouse Illustration -->
        <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 md:p-8 flex items-center justify-between shadow-2xs relative overflow-hidden">
            <div class="z-10 max-w-xl">
                <h1 class="text-2xl md:text-3xl font-extrabold text-[#172033] dark:text-white tracking-tight leading-tight">
                    Classes
                </h1>
                <p class="text-xs md:text-sm text-[#64748B] dark:text-slate-400 font-medium mt-2 leading-relaxed">
                    Manage your classes and view a quick overview of each section.
                </p>
            </div>

            <!-- Soft Schoolhouse SVG Illustration matching image -->
            <div class="flex items-center gap-4 z-10 shrink-0">
                <div class="hidden sm:block w-24 h-20 text-[#159A9C]/40 dark:text-teal-400/40">
                    <svg viewBox="0 0 120 80" fill="none" class="w-full h-full">
                        <!-- Flagpole & Flag -->
                        <path d="M60 10 L60 25 M60 10 L72 15 L60 20" stroke="#159A9C" stroke-width="2.5" stroke-linecap="round" fill="#DDF6EF"/>
                        <!-- Roof -->
                        <path d="M30 40 L60 25 L90 40 Z" fill="#DDF6EF" stroke="#159A9C" stroke-width="2"/>
                        <!-- Main Building -->
                        <rect x="35" y="40" width="50" height="30" rx="4" fill="#F4F9F8" stroke="#159A9C" stroke-width="2"/>
                        <!-- Door -->
                        <rect x="53" y="55" width="14" height="15" rx="2" fill="#159A9C"/>
                        <!-- Windows -->
                        <rect x="42" y="48" width="8" height="8" rx="2" fill="#DDF6EF"/>
                        <rect x="70" y="48" width="8" height="8" rx="2" fill="#DDF6EF"/>
                        <!-- Trees -->
                        <circle cx="20" cy="55" r="12" fill="#DDF6EF" class="dark:opacity-30"/>
                        <circle cx="100" cy="55" r="12" fill="#DDF6EF" class="dark:opacity-30"/>
                    </svg>
                </div>

                <button @click="$dispatch('open-create-class')" 
                        class="px-5 py-3 bg-[#159A9C] hover:bg-[#0E7476] text-white font-extrabold text-xs md:text-sm rounded-2xl shadow-xs transition-all flex items-center gap-2 cursor-pointer active:scale-95">
                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Create Class</span>
                </button>
            </div>
        </div>

        <!-- Section: My Classes Header & Controls -->
        <div>
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#159A9C]"></span>
                    <h2 class="font-extrabold text-lg md:text-xl text-[#172033] dark:text-white">My Classes</h2>
                </div>

                <!-- Search & View Mode Controls -->
                <div class="flex items-center gap-3 shrink-0">
                    <!-- Unobtrusive Search Input -->
                    <div class="relative w-full sm:w-64">
                        <svg class="w-4 h-4 text-[#94A3B8] absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <input type="text" 
                               x-model="searchQuery"
                               placeholder="Search classes..." 
                               class="w-full bg-white dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 pl-10 pr-4 py-2 rounded-2xl text-xs font-semibold text-[#172033] dark:text-white placeholder-[#94A3B8] focus:outline-none focus:ring-2 focus:ring-[#159A9C]/40">
                    </div>

                    <!-- Grid vs List View Mode Toggle -->
                    <div class="flex items-center bg-white dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 p-1 rounded-2xl shrink-0 shadow-2xs">
                        <button @click="viewMode = 'grid'" 
                                :class="viewMode === 'grid' ? 'bg-[#DDF6EF] dark:bg-[#159A9C]/30 text-[#159A9C] dark:text-teal-300' : 'text-[#94A3B8] hover:text-[#172033] dark:hover:text-white'"
                                class="p-1.5 rounded-xl transition-all cursor-pointer"
                                title="Grid View">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                            </svg>
                        </button>
                        <button @click="viewMode = 'list'" 
                                :class="viewMode === 'list' ? 'bg-[#DDF6EF] dark:bg-[#159A9C]/30 text-[#159A9C] dark:text-teal-300' : 'text-[#94A3B8] hover:text-[#172033] dark:hover:text-white'"
                                class="p-1.5 rounded-xl transition-all cursor-pointer"
                                title="List View">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- GRID VIEW (3 Columns Desktop matching reference image) -->
            <div x-show="viewMode === 'grid' && filteredClasses.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Class 1: Grade 4 - Rizal -->
                <x-classes.class-card @click="openClassDetails(classes[0])"
                                      grade="Grade 4 – Rizal"
                                      subject="Science"
                                      schoolYear="School Year 2026–2027"
                                      :studentsCount="32"
                                      attendanceRate="96%"
                                      gradeProgress="88%"
                                      iconBg="bg-[#DDF6EF] dark:bg-[#159A9C]/20"
                                      iconColor="text-[#159A9C] dark:text-teal-300"
                                      footerBg="bg-[#DDF6EF]/50 dark:bg-[#159A9C]/10"
                                      footerColor="text-[#159A9C] dark:text-teal-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </x-classes.class-card>

                <!-- Class 2: Grade 5 - Bonifacio -->
                <x-classes.class-card @click="openClassDetails(classes[1])"
                                      grade="Grade 5 – Bonifacio"
                                      subject="Mathematics"
                                      schoolYear="School Year 2026–2027"
                                      :studentsCount="28"
                                      attendanceRate="95%"
                                      gradeProgress="85%"
                                      iconBg="bg-[#EEE9FF] dark:bg-purple-950/30"
                                      iconColor="text-[#7C3AED] dark:text-purple-300"
                                      footerBg="bg-[#EEE9FF]/50 dark:bg-purple-950/20"
                                      footerColor="text-[#7C3AED] dark:text-purple-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/>
                    </svg>
                </x-classes.class-card>

                <!-- Class 3: Grade 3 - Mabini -->
                <x-classes.class-card @click="openClassDetails(classes[2])"
                                      grade="Grade 3 – Mabini"
                                      subject="English"
                                      schoolYear="School Year 2026–2027"
                                      :studentsCount="26"
                                      attendanceRate="93%"
                                      gradeProgress="90%"
                                      iconBg="bg-[#FFF4D6] dark:bg-amber-950/30"
                                      iconColor="text-[#D97706] dark:text-amber-300"
                                      footerBg="bg-[#FFF4D6]/50 dark:bg-amber-950/20"
                                      footerColor="text-[#D97706] dark:text-amber-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </x-classes.class-card>

                <!-- Class 4: Grade 6 - Luna -->
                <x-classes.class-card @click="openClassDetails(classes[3])"
                                      grade="Grade 6 – Luna"
                                      subject="Araling Panlipunan"
                                      schoolYear="School Year 2026–2027"
                                      :studentsCount="30"
                                      attendanceRate="97%"
                                      gradeProgress="87%"
                                      iconBg="bg-[#FDE9E7] dark:bg-rose-950/30"
                                      iconColor="text-[#E11D48] dark:text-rose-300"
                                      footerBg="bg-[#FDE9E7]/50 dark:bg-rose-950/20"
                                      footerColor="text-[#E11D48] dark:text-rose-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </x-classes.class-card>

                <!-- Class 5: Grade 4 - Aguinaldo -->
                <x-classes.class-card @click="openClassDetails(classes[4])"
                                      grade="Grade 4 – Aguinaldo"
                                      subject="English"
                                      schoolYear="School Year 2026–2027"
                                      :studentsCount="29"
                                      attendanceRate="94%"
                                      gradeProgress="82%"
                                      iconBg="bg-[#EAF2FF] dark:bg-blue-950/30"
                                      iconColor="text-[#2563EB] dark:text-blue-300"
                                      footerBg="bg-[#EAF2FF]/50 dark:bg-blue-950/20"
                                      footerColor="text-[#2563EB] dark:text-blue-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                </x-classes.class-card>

            </div>

            <!-- LIST VIEW (Clean, spacious table) -->
            <div x-show="viewMode === 'list' && filteredClasses.length > 0" class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl overflow-hidden shadow-2xs" style="display: none;">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead class="bg-[#F4F9F8] dark:bg-slate-800/80 text-[#64748B] dark:text-slate-400 font-extrabold uppercase tracking-wider border-b border-[#E5ECEB] dark:border-slate-800">
                            <tr>
                                <th class="py-4 px-6">Class / Section</th>
                                <th class="py-4 px-6">Subject</th>
                                <th class="py-4 px-6">Students</th>
                                <th class="py-4 px-6">Attendance</th>
                                <th class="py-4 px-6">Grade Progress</th>
                                <th class="py-4 px-6 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#E5ECEB]/60 dark:divide-slate-800 font-semibold text-[#172033] dark:text-slate-200">
                            <template x-for="item in filteredClasses" :key="item.grade">
                                <tr class="hover:bg-[#F4F9F8]/60 dark:hover:bg-slate-800/50 transition-colors">
                                    <td class="py-4 px-6 font-extrabold text-sm" x-text="item.grade"></td>
                                    <td class="py-4 px-6 text-[#159A9C] dark:text-teal-300" x-text="item.subject"></td>
                                    <td class="py-4 px-6" x-text="item.students + ' Students'"></td>
                                    <td class="py-4 px-6">
                                        <span class="px-2.5 py-1 rounded-full bg-[#EAF2FF] dark:bg-blue-950/40 text-[#2563EB] dark:text-blue-300 font-extrabold" x-text="item.attendanceRate"></span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="px-2.5 py-1 rounded-full bg-[#FFF4D6] dark:bg-amber-950/40 text-[#D97706] dark:text-amber-300 font-extrabold" x-text="item.gradeProgress"></span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <button @click="openClassDetails(item)"
                                                class="px-4 py-2 bg-[#DDF6EF] dark:bg-[#159A9C]/20 hover:bg-[#159A9C] hover:text-white text-[#159A9C] dark:text-teal-300 font-extrabold rounded-xl transition-all cursor-pointer">
                                            Open Class →
                                        </button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Empty State Component when 0 results -->
            <div x-show="filteredClasses.length === 0" style="display: none;">
                <x-classes.class-empty-state />
            </div>

        </div>

    </div>

    <!-- ============================================================ -->
    <!-- PAGE 2 — CLASS OVERVIEW HUB VIEW -->
    <!-- ============================================================ -->
    <div x-show="currentView === 'class-overview'"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         style="display: none;">
        
        <x-classes.class-overview />


    </div>

    <!-- Modals -->
    <x-classes.create-class-modal />

</div>
