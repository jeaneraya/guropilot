<div x-data="{
        currentView: 'classes', // 'classes' or 'class-templates'
        selectedClass: {
            grade: 'Grade 4 – Rizal',
            subject: 'Science',
            students: 32,
            templatesCount: 6,
            year: 'SY 2026–2027',
            iconBg: 'bg-[#DDF6EF] dark:bg-[#159A9C]/20',
            iconColor: 'text-[#159A9C] dark:text-teal-300',
            footerBg: 'bg-[#DDF6EF]/50 dark:bg-[#159A9C]/10',
            footerColor: 'text-[#159A9C] dark:text-teal-300'
        },
        searchQuery: '',
        activeFilter: 'all',
        
        // Mock Classes Data
        classes: [
            {
                grade: 'Grade 4 – Rizal',
                subject: 'Science',
                students: 32,
                templatesCount: 6,
                year: 'SY 2026–2027',
                iconBg: 'bg-[#DDF6EF] dark:bg-[#159A9C]/20',
                iconColor: 'text-[#159A9C] dark:text-teal-300',
                footerBg: 'bg-[#DDF6EF]/50 dark:bg-[#159A9C]/10',
                footerColor: 'text-[#159A9C] dark:text-teal-300'
            },
            {
                grade: 'Grade 5 – Bonifacio',
                subject: 'Mathematics',
                students: 28,
                templatesCount: 4,
                year: 'SY 2026–2027',
                iconBg: 'bg-[#EEE9FF] dark:bg-purple-950/30',
                iconColor: 'text-[#7C3AED] dark:text-purple-300',
                footerBg: 'bg-[#EEE9FF]/50 dark:bg-purple-950/20',
                footerColor: 'text-[#7C3AED] dark:text-purple-300'
            },
            {
                grade: 'Grade 3 – Mabini',
                subject: 'English',
                students: 28,
                templatesCount: 8,
                year: 'SY 2026–2027',
                iconBg: 'bg-[#FFF4D6] dark:bg-amber-950/30',
                iconColor: 'text-[#D97706] dark:text-amber-300',
                footerBg: 'bg-[#FFF4D6]/50 dark:bg-amber-950/20',
                footerColor: 'text-[#D97706] dark:text-amber-300'
            },
            {
                grade: 'Grade 6 – Luna',
                subject: 'Araling Panlipunan',
                students: 26,
                templatesCount: 5,
                year: 'SY 2026–2027',
                iconBg: 'bg-[#FDE9E7] dark:bg-rose-950/30',
                iconColor: 'text-[#E11D48] dark:text-rose-300',
                footerBg: 'bg-[#FDE9E7]/50 dark:bg-rose-950/20',
                footerColor: 'text-[#E11D48] dark:text-rose-300'
            },
            {
                grade: 'Grade 4 – Aguinaldo',
                subject: 'English',
                students: 29,
                templatesCount: 3,
                year: 'SY 2026–2027',
                iconBg: 'bg-[#EAF2FF] dark:bg-blue-950/30',
                iconColor: 'text-[#2563EB] dark:text-blue-300',
                footerBg: 'bg-[#EAF2FF]/50 dark:bg-blue-950/20',
                footerColor: 'text-[#2563EB] dark:text-blue-300'
            }
        ],

        // Mock Saved Templates Data
        savedTemplates: [
            {
                id: 1,
                title: 'Science Inquiry Template',
                badge: 'MATATAG DLL',
                badgeBg: 'bg-[#DDF6EF] dark:bg-teal-950/40',
                badgeColor: 'text-[#159A9C] dark:text-teal-300',
                category: 'matatag',
                duration: '60 Minutes',
                approach: 'Inquiry-Based Learning',
                timesUsed: 8,
                iconBg: 'bg-[#DDF6EF] dark:bg-[#159A9C]/20',
                iconColor: 'text-[#159A9C] dark:text-teal-300',
                footerBg: 'bg-[#DDF6EF]/50 dark:bg-[#159A9C]/10',
                footerColor: 'text-[#159A9C] dark:text-teal-300'
            },
            {
                id: 2,
                title: '3-Day ILAW Lesson Template',
                badge: 'ILAW',
                badgeBg: 'bg-[#EEE9FF] dark:bg-purple-950/40',
                badgeColor: 'text-[#7C3AED] dark:text-purple-300',
                category: 'ilaw',
                duration: '3 Days',
                approach: 'Constructivist Approach',
                timesUsed: 5,
                iconBg: 'bg-[#EEE9FF] dark:bg-purple-950/30',
                iconColor: 'text-[#7C3AED] dark:text-purple-300',
                footerBg: 'bg-[#EEE9FF]/50 dark:bg-purple-950/20',
                footerColor: 'text-[#7C3AED] dark:text-purple-300'
            },
            {
                id: 3,
                title: '60-Minute Activity Lesson',
                badge: 'Activity-Based',
                badgeBg: 'bg-[#FFF4D6] dark:bg-amber-950/40',
                badgeColor: 'text-[#D97706] dark:text-amber-300',
                category: 'dlp',
                duration: '60 Minutes',
                approach: 'Collaborative Learning',
                timesUsed: 4,
                iconBg: 'bg-[#FFF4D6] dark:bg-amber-950/30',
                iconColor: 'text-[#D97706] dark:text-amber-300',
                footerBg: 'bg-[#FFF4D6]/50 dark:bg-amber-950/20',
                footerColor: 'text-[#D97706] dark:text-amber-300'
            },
            {
                id: 4,
                title: 'Quiz + Worksheet Template',
                badge: 'Assessment',
                badgeBg: 'bg-[#FDE9E7] dark:bg-rose-950/40',
                badgeColor: 'text-[#E11D48] dark:text-rose-300',
                category: 'dlp',
                duration: '1 Day',
                approach: 'Formative Assessment',
                timesUsed: 6,
                iconBg: 'bg-[#FDE9E7] dark:bg-rose-950/30',
                iconColor: 'text-[#E11D48] dark:text-rose-300',
                footerBg: 'bg-[#FDE9E7]/50 dark:bg-rose-950/20',
                footerColor: 'text-[#E11D48] dark:text-rose-300'
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

        // Computed filtered templates
        get filteredTemplates() {
            return this.savedTemplates.filter(item => {
                const matchesSearch = this.searchQuery === '' || item.title.toLowerCase().includes(this.searchQuery.toLowerCase());
                const matchesCategory = this.activeFilter === 'all' || item.category === this.activeFilter;
                return matchesSearch && matchesCategory;
            });
        },

        selectClass(item) {
            this.selectedClass = item;
            this.currentView = 'class-templates';
            this.searchQuery = '';
            this.activeFilter = 'all';
        }
     }"
     @template-filter-change.window="activeFilter = $event.detail"
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
    <!-- PAGE 1 — TEMPLATES CLASS SELECTION VIEW -->
    <!-- ============================================================ -->
    <div x-show="currentView === 'classes'" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="space-y-8">
        
        <!-- Header Banner with Soft Illustration -->
        <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 md:p-8 flex items-center justify-between shadow-2xs relative overflow-hidden">
            <div class="z-10 max-w-xl">
                <h1 class="text-2xl md:text-3xl font-extrabold text-[#172033] dark:text-white tracking-tight leading-tight">
                    Templates
                </h1>
                <p class="text-xs md:text-sm text-[#64748B] dark:text-slate-400 font-medium mt-2 leading-relaxed">
                    Choose a class to view and reuse your saved lesson templates.
                </p>
            </div>

            <!-- Soft Decorative Document Illustration -->
            <div class="flex items-center gap-4 z-10 shrink-0">
                <div class="hidden sm:block w-20 h-20 text-[#159A9C]/40 dark:text-teal-400/40">
                    <svg viewBox="0 0 100 100" fill="none" class="w-full h-full">
                        <rect x="20" y="20" width="60" height="65" rx="10" fill="#DDF6EF" class="dark:opacity-30"/>
                        <rect x="30" y="15" width="55" height="65" rx="10" fill="#EEE9FF" class="dark:opacity-20"/>
                        <path d="M40 35 L70 35" stroke="#159A9C" stroke-width="4" stroke-linecap="round"/>
                        <path d="M40 45 L65 45" stroke="#159A9C" stroke-width="3" stroke-linecap="round"/>
                        <path d="M40 55 L55 55" stroke="#159A9C" stroke-width="3" stroke-linecap="round"/>
                        <circle cx="72" cy="65" r="7" fill="#FFF4D6"/>
                    </svg>
                </div>

                <button @click="$dispatch('open-create-template')" 
                        class="px-5 py-3 bg-[#159A9C] hover:bg-[#0E7476] text-white font-extrabold text-xs md:text-sm rounded-2xl shadow-xs transition-all flex items-center gap-2 cursor-pointer active:scale-95">
                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Create Template</span>
                </button>
            </div>
        </div>

        <!-- Section: Your Classes Grid -->
        <div>
            <div class="flex items-center justify-between mb-5">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#159A9C]"></span>
                    <h2 class="font-extrabold text-lg md:text-xl text-[#172033] dark:text-white">Your Classes</h2>
                </div>
                <span class="text-xs font-semibold text-[#64748B] dark:text-slate-400">Select a class to view saved templates</span>
            </div>

            <!-- Responsive Cards Grid (5 Cards match image) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">
                
                <!-- Class 1: Grade 4 - Rizal -->
                <x-templates.class-template-card @click="selectClass(classes[0])"
                                                 grade="Grade 4 – Rizal"
                                                 subject="Science"
                                                 :studentsCount="32"
                                                 :templatesCount="6"
                                                 iconBg="bg-[#DDF6EF] dark:bg-[#159A9C]/20"
                                                 iconColor="text-[#159A9C] dark:text-teal-300"
                                                 footerBg="bg-[#DDF6EF]/50 dark:bg-[#159A9C]/10"
                                                 footerColor="text-[#159A9C] dark:text-teal-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </x-templates.class-template-card>

                <!-- Class 2: Grade 5 - Bonifacio -->
                <x-templates.class-template-card @click="selectClass(classes[1])"
                                                 grade="Grade 5 – Bonifacio"
                                                 subject="Mathematics"
                                                 :studentsCount="28"
                                                 :templatesCount="4"
                                                 iconBg="bg-[#EEE9FF] dark:bg-purple-950/30"
                                                 iconColor="text-[#7C3AED] dark:text-purple-300"
                                                 footerBg="bg-[#EEE9FF]/50 dark:bg-purple-950/20"
                                                 footerColor="text-[#7C3AED] dark:text-purple-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </x-templates.class-template-card>

                <!-- Class 3: Grade 3 - Mabini -->
                <x-templates.class-template-card @click="selectClass(classes[2])"
                                                 grade="Grade 3 – Mabini"
                                                 subject="English"
                                                 :studentsCount="28"
                                                 :templatesCount="8"
                                                 iconBg="bg-[#FFF4D6] dark:bg-amber-950/30"
                                                 iconColor="text-[#D97706] dark:text-amber-300"
                                                 footerBg="bg-[#FFF4D6]/50 dark:bg-amber-950/20"
                                                 footerColor="text-[#D97706] dark:text-amber-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </x-templates.class-template-card>

                <!-- Class 4: Grade 6 - Luna -->
                <x-templates.class-template-card @click="selectClass(classes[3])"
                                                 grade="Grade 6 – Luna"
                                                 subject="Araling Panlipunan"
                                                 :studentsCount="26"
                                                 :templatesCount="5"
                                                 iconBg="bg-[#FDE9E7] dark:bg-rose-950/30"
                                                 iconColor="text-[#E11D48] dark:text-rose-300"
                                                 footerBg="bg-[#FDE9E7]/50 dark:bg-rose-950/20"
                                                 footerColor="text-[#E11D48] dark:text-rose-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </x-templates.class-template-card>

                <!-- Class 5: Grade 4 - Aguinaldo -->
                <x-templates.class-template-card @click="selectClass(classes[4])"
                                                 grade="Grade 4 – Aguinaldo"
                                                 subject="English"
                                                 :studentsCount="29"
                                                 :templatesCount="3"
                                                 iconBg="bg-[#EAF2FF] dark:bg-blue-950/30"
                                                 iconColor="text-[#2563EB] dark:text-blue-300"
                                                 footerBg="bg-[#EAF2FF]/50 dark:bg-blue-950/20"
                                                 footerColor="text-[#2563EB] dark:text-blue-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                </x-templates.class-template-card>

            </div>
        </div>

    </div>

    <!-- ============================================================ -->
    <!-- PAGE 2 — CLASS TEMPLATE VIEW -->
    <!-- ============================================================ -->
    <div x-show="currentView === 'class-templates'"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="space-y-8"
         style="display: none;">
        
        <!-- Header Controls & Class Title -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 shadow-2xs">
            <div>
                <!-- Back Button -->
                <button @click="currentView = 'classes'" 
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

            <!-- Top-Right Actions: Search & Create Template Button -->
            <div class="flex items-center gap-3 shrink-0">
                <!-- Unobtrusive Search Field -->
                <div class="relative w-full sm:w-64">
                    <svg class="w-4 h-4 text-[#94A3B8] absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" 
                           x-model="searchQuery"
                           placeholder="Search templates..." 
                           class="w-full bg-[#F4F9F8] dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 pl-10 pr-4 py-2.5 rounded-2xl text-xs font-semibold text-[#172033] dark:text-white placeholder-[#94A3B8] focus:outline-none focus:ring-2 focus:ring-[#159A9C]/40">
                </div>

                <!-- Create Template Button -->
                <button @click="$dispatch('open-create-template')" 
                        class="px-4 py-2.5 bg-[#159A9C] hover:bg-[#0E7476] text-white font-extrabold text-xs rounded-2xl shadow-xs transition-all flex items-center gap-1.5 cursor-pointer shrink-0">
                    <span>+ Create Template</span>
                </button>
            </div>
        </div>

        <!-- Minimal Category Filter Pills -->
        <x-templates.template-filter />

        <!-- My Saved Templates Section -->
        <div>
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-extrabold text-lg text-[#172033] dark:text-white">My Saved Templates</h3>
                <span class="text-xs font-semibold text-[#64748B] dark:text-slate-400" x-text="filteredTemplates.length + ' template(s)'"></span>
            </div>

            <!-- Saved Templates Grid (4 Cards + 1 GuroPilot Recommended Card matching visual reference) -->
            <div x-show="filteredTemplates.length > 0" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5">
                <template x-for="item in filteredTemplates" :key="item.id">
                    <x-templates.template-card ::title="item.title"
                                                ::badge="item.badge"
                                                ::badgeBg="item.badgeBg"
                                                ::badgeColor="item.badgeColor"
                                                ::duration="item.duration"
                                                ::approach="item.approach"
                                                ::timesUsed="item.timesUsed"
                                                ::iconBg="item.iconBg"
                                                ::iconColor="item.iconColor"
                                                ::footerBg="item.footerBg"
                                                ::footerColor="item.footerColor">
                        <!-- Dynamic Icons per template -->
                        <template x-if="item.id === 1">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L5.594 15.12a2 2 0 01-1.022-.547m0 0L3.13 13.688A2 2 0 013 12.636V6.75A2.25 2.25 0 015.25 4.5h13.5A2.25 2.25 0 0121 6.75v5.886a2 2 0 01-.13 1.052l-.442 1.74z"/>
                            </svg>
                        </template>
                        <template x-if="item.id === 2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </template>
                        <template x-if="item.id === 3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </template>
                        <template x-if="item.id === 4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </template>
                    </x-templates.template-card>
                </template>

                <!-- Single GuroPilot Recommended Card (Exact match to reference mockup) -->
                <div class="bg-gradient-to-b from-[#EAF2FF]/80 to-[#DDF6EF]/40 dark:from-slate-800 dark:to-slate-800/90 border border-[#E5ECEB] dark:border-slate-700 rounded-3xl p-5 shadow-2xs flex flex-col justify-between relative overflow-hidden group">
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <h4 class="font-extrabold text-xs text-[#172033] dark:text-white">GuroPilot Recommended</h4>
                            <span class="text-amber-400 text-sm">⭐</span>
                        </div>

                        <p class="text-xs text-[#64748B] dark:text-slate-400 font-medium leading-relaxed">
                            Need inspiration?<br>Use a template created by other teachers.
                        </p>
                    </div>

                    <!-- Bottom Action & Soft Open-Book Illustration -->
                    <div class="mt-6 space-y-4">
                        <button @click="showToast('Browsing GuroPilot template library...')"
                                class="w-full py-2.5 px-3 bg-white dark:bg-slate-700 hover:bg-slate-50 dark:hover:bg-slate-600 text-[#159A9C] dark:text-teal-300 font-extrabold text-xs rounded-xl shadow-2xs border border-[#E5ECEB] dark:border-slate-600 transition-all flex items-center justify-center gap-1.5 cursor-pointer">
                            <span>Browse Templates</span>
                            <span>→</span>
                        </button>

                        <!-- Soft Open-Book SVG Illustration -->
                        <div class="w-24 h-14 mx-auto opacity-75 text-[#159A9C]/50 dark:text-teal-400/50">
                            <svg viewBox="0 0 100 60" fill="none" class="w-full h-full">
                                <path d="M10 45 C30 35 45 40 50 45 C55 40 70 35 90 45 L90 15 C70 5 55 10 50 15 C45 10 30 5 10 15 Z" fill="#DDF6EF"/>
                                <path d="M50 15 L50 45" stroke="#159A9C" stroke-width="2"/>
                                <path d="M20 25 C32 20 42 22 45 25" stroke="#159A9C" stroke-width="2" stroke-linecap="round"/>
                                <path d="M55 25 C58 22 68 20 80 25" stroke="#159A9C" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Empty State Component when filtered results are 0 -->
            <div x-show="filteredTemplates.length === 0" style="display: none;">
                <x-templates.template-empty-state />
            </div>
        </div>

    </div>

    <!-- Modals -->
    <x-templates.create-template-modal />
    <x-templates.use-template-modal />

</div>
