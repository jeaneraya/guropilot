<div x-data="{
        // Class Selector State
        classDropdownOpen: false,
        selectedClass: {
            grade: 'Grade 4 – Rizal',
            subject: 'Science',
            students: 32,
            year: 'School Year 2026–2027',
            iconBg: 'bg-[#DDF6EF] text-[#159A9C]'
        },
        classes: [
            {
                grade: 'Grade 4 – Rizal',
                subject: 'Science',
                students: 32,
                year: 'School Year 2026–2027',
                iconBg: 'bg-[#DDF6EF] text-[#159A9C]'
            },
            {
                grade: 'Grade 5 – Bonifacio',
                subject: 'Mathematics',
                students: 28,
                year: 'School Year 2026–2027',
                iconBg: 'bg-[#EEE9FF] text-[#7C3AED]'
            },
            {
                grade: 'Grade 3 – Mabini',
                subject: 'English',
                students: 26,
                year: 'School Year 2026–2027',
                iconBg: 'bg-[#FDE9E7] text-[#E11D48]'
            },
            {
                grade: 'Grade 6 – Luna',
                subject: 'Araling Panlipunan',
                students: 30,
                year: 'School Year 2026–2027',
                iconBg: 'bg-[#FFF4D6] text-[#D97706]'
            }
        ],

        // Term Selector State (Term 1, Term 2, Term 3 only)
        selectedTerm: 'Term 1',
        terms: ['Term 1', 'Term 2', 'Term 3'],

        // Lesson Dropdown Selector State
        lessonDropdownOpen: false,
        lessonSearch: '',
        lessons: [
            {
                id: 1,
                title: 'The Water Cycle',
                icon: '🌊',
                subject: 'Science',
                week: 'Week 3',
                dates: 'Aug 19–23, 2026',
                hasDocs: true
            },
            {
                id: 2,
                title: 'Parts of a Plant',
                icon: '🌱',
                subject: 'Science',
                week: 'Week 2',
                dates: 'Aug 12–16, 2026',
                hasDocs: true
            },
            {
                id: 3,
                title: 'Forces and Motion',
                icon: '⚡',
                subject: 'Science',
                week: 'Week 1',
                dates: 'Aug 5–9, 2026',
                hasDocs: true
            },
            {
                id: 4,
                title: 'Rocks and Minerals',
                icon: '💎',
                subject: 'Science',
                week: 'Week 4',
                dates: 'Aug 26–30, 2026',
                hasDocs: false
            }
        ],

        selectedLesson: {
            id: 1,
            title: 'The Water Cycle',
            icon: '🌊',
            subject: 'Science',
            week: 'Week 3',
            dates: 'Aug 19–23, 2026',
            hasDocs: true
        },

        // Expandable secondary materials
        showMoreMaterials: false,

        // Modal Preview State
        previewOpen: false,
        previewType: 'dll',
        previewTitle: 'Daily Lesson Log (DLL)',
        previewIcon: '📄',
        previewFormat: 'DOCX',
        currentSlide: 1,
        showQuizAnswers: false,

        // Toast Feedback System
        toastMessage: '',
        toastVisible: false,
        showToast(msg) {
            this.toastMessage = msg;
            this.toastVisible = true;
            setTimeout(() => { this.toastVisible = false; }, 3200);
        },

        openPreview(type, title, icon, format) {
            this.previewType = type;
            this.previewTitle = title;
            this.previewIcon = icon;
            this.previewFormat = format;
            this.currentSlide = 1;
            this.showQuizAnswers = false;
            this.previewOpen = true;
        },

        closePreview() {
            this.previewOpen = false;
        },

        get filteredLessons() {
            if (!this.lessonSearch.trim()) return this.lessons;
            return this.lessons.filter(l => l.title.toLowerCase().includes(this.lessonSearch.toLowerCase()));
        }
     }"
     class="space-y-6 relative font-sans text-[#172033] dark:text-slate-100">

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
    <!-- MINIMAL PAGE HEADER -->
    <!-- ============================================================ -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 shadow-2xs">
        <div>
            <h1 class="text-2xl md:text-3xl font-extrabold text-[#172033] dark:text-white tracking-tight">
                Materials
            </h1>
            <p class="text-xs md:text-sm text-[#64748B] dark:text-slate-400 font-medium mt-1">
                Everything you need for your lessons, in one place.
            </p>
        </div>

        <!-- Quick Action Trigger -->
        <button @click="showToast('Document generation will be available once GuroPilot\'s generation service is connected.')" 
                class="px-4 py-2.5 bg-[#159A9C] hover:bg-[#0E7476] text-white font-bold text-xs rounded-2xl shadow-2xs transition-all flex items-center gap-2 shrink-0 cursor-pointer active:scale-95">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            <span>+ Generate Materials</span>
        </button>
    </div>

    <!-- ============================================================ -->
    <!-- TOP SELECTOR BAR: CLASS SELECTOR | LESSON SELECTOR | TERM SELECTOR -->
    <!-- ============================================================ -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-4 shadow-2xs">
        
        <!-- 1. Class & Section Dropdown (Left) -->
        <div class="relative min-w-[240px]">
            <label class="text-[10px] font-black uppercase tracking-wider text-[#64748B] dark:text-slate-400 block mb-1">
                Class & Section
            </label>
            <button @click="classDropdownOpen = !classDropdownOpen; lessonDropdownOpen = false;"
                    @click.away="classDropdownOpen = false"
                    :class="classDropdownOpen ? 'border-[#159A9C] ring-2 ring-[#159A9C]/20' : 'border-[#E5ECEB] dark:border-slate-800 hover:border-[#159A9C]/60'"
                    class="w-full px-3.5 py-2.5 bg-white dark:bg-slate-900 border-2 rounded-2xl flex items-center justify-between gap-3 transition-all cursor-pointer text-left shadow-2xs group">
                
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-xl flex items-center justify-center font-bold text-xs shrink-0 shadow-2xs"
                         :class="selectedClass.iconBg">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <div>
                        <span class="font-extrabold text-xs text-[#172033] dark:text-white block group-hover:text-[#159A9C] transition-colors" x-text="selectedClass.grade"></span>
                        <span class="text-[10px] font-semibold text-[#64748B] dark:text-slate-400 block" x-text="selectedClass.subject + ' • ' + selectedClass.students + ' Students'"></span>
                    </div>
                </div>

                <div class="w-6 h-6 rounded-lg bg-[#F4F9F8] dark:bg-slate-800 flex items-center justify-center text-[#159A9C] dark:text-teal-400 shrink-0 border border-[#E5ECEB] dark:border-slate-700 shadow-2xs group-hover:bg-[#159A9C] group-hover:text-white transition-all">
                    <svg class="w-3.5 h-3.5 transition-transform duration-200" 
                         :class="classDropdownOpen ? 'rotate-180' : ''" 
                         fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
            </button>

            <!-- Class Options Menu -->
            <div x-show="classDropdownOpen"
                 x-transition:enter="transition ease-out duration-150"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="absolute left-0 mt-2 w-72 bg-white dark:bg-[#172033] border-2 border-[#E5ECEB] dark:border-slate-800 rounded-2xl shadow-xl z-30 p-2 space-y-1"
                 style="display: none;">
                
                <div class="px-3 py-1.5 text-[10px] font-extrabold uppercase tracking-wider text-[#64748B] dark:text-slate-400 border-b border-slate-100 dark:border-slate-800 mb-1 flex items-center justify-between">
                    <span>Select Class Section</span>
                    <span class="text-[9px] bg-[#DDF6EF] text-[#159A9C] px-1.5 py-0.5 rounded font-bold">4 Classes</span>
                </div>

                <template x-for="item in classes" :key="item.grade">
                    <button @click="selectedClass = item; classDropdownOpen = false;"
                            :class="selectedClass.grade === item.grade ? 'bg-[#DDF6EF]/80 dark:bg-teal-950/40 border-l-4 border-[#159A9C]' : 'hover:bg-slate-50 dark:hover:bg-slate-800 border-l-4 border-transparent'"
                            class="w-full text-left px-3 py-2 rounded-xl text-xs flex items-center justify-between gap-3 transition-colors cursor-pointer group">
                        <div class="flex items-center gap-2.5">
                            <div class="w-7 h-7 rounded-lg flex items-center justify-center text-xs font-bold shrink-0 shadow-2xs" :class="item.iconBg">
                                📚
                            </div>
                            <div>
                                <p class="font-extrabold text-[#172033] dark:text-white group-hover:text-[#159A9C]" x-text="item.grade"></p>
                                <p class="text-[10px] font-medium text-[#64748B] dark:text-slate-400" x-text="item.subject + ' • ' + item.students + ' Students'"></p>
                            </div>
                        </div>
                        <div x-show="selectedClass.grade === item.grade" class="text-[#159A9C] font-bold text-xs shrink-0">
                            ✓
                        </div>
                    </button>
                </template>
            </div>
        </div>

        <!-- 2. Lesson / Topic Dropdown Selector (Center — Marked Red Box) -->
        <div class="relative flex-1">
            <label class="text-[10px] font-black uppercase tracking-wider text-[#64748B] dark:text-slate-400 block mb-1">
                Lesson / Topic
            </label>
            <button @click="lessonDropdownOpen = !lessonDropdownOpen; classDropdownOpen = false;"
                    @click.away="lessonDropdownOpen = false"
                    :class="lessonDropdownOpen ? 'border-[#159A9C] ring-2 ring-[#159A9C]/20' : 'border-[#159A9C]/40 hover:border-[#159A9C]'"
                    class="w-full px-4 py-2.5 bg-[#DDF6EF]/30 dark:bg-teal-950/20 border-2 rounded-2xl flex items-center justify-between gap-3 transition-all cursor-pointer text-left shadow-2xs group">
                
                <div class="flex items-center gap-3">
                    <span class="text-xl p-1 bg-white dark:bg-slate-800 rounded-xl shadow-2xs shrink-0" x-text="selectedLesson.icon"></span>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="font-black text-xs text-[#172033] dark:text-white group-hover:text-[#159A9C] transition-colors" x-text="selectedLesson.title"></span>
                            <span class="px-2 py-0.5 rounded-full bg-[#159A9C] text-white font-extrabold text-[10px]" x-text="selectedLesson.week"></span>
                        </div>
                        <span class="text-[11px] font-semibold text-[#64748B] dark:text-slate-400 block" x-text="selectedLesson.subject + ' • ' + selectedLesson.dates"></span>
                    </div>
                </div>

                <!-- Prominent Animated Chevron Indicator -->
                <div class="w-7 h-7 rounded-xl bg-[#159A9C] text-white flex items-center justify-center shrink-0 shadow-2xs group-hover:bg-[#0E7476] transition-all">
                    <svg class="w-4 h-4 transition-transform duration-200" 
                         :class="lessonDropdownOpen ? 'rotate-180' : ''" 
                         fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
            </button>

            <!-- Lesson Options Dropdown Menu -->
            <div x-show="lessonDropdownOpen"
                 x-transition:enter="transition ease-out duration-150"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="absolute left-0 right-0 mt-2 bg-white dark:bg-[#172033] border-2 border-[#159A9C]/40 rounded-2xl shadow-2xl z-30 p-3 space-y-2"
                 style="display: none;">
                
                <div class="flex items-center justify-between pb-1 border-b border-slate-100 dark:border-slate-800">
                    <span class="text-[10px] font-extrabold uppercase tracking-wider text-[#64748B] dark:text-slate-400">Select Lesson Topic</span>
                    <span class="text-[10px] font-extrabold text-[#159A9C]" x-text="filteredLessons.length + ' Available'"></span>
                </div>

                <!-- Search Input Field Inside Dropdown -->
                <div class="relative">
                    <svg class="w-3.5 h-3.5 text-[#94A3B8] absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" 
                           x-model="lessonSearch"
                           placeholder="Search lesson topic..." 
                           class="w-full bg-[#F4F9F8] dark:bg-slate-900 border border-[#E5ECEB] dark:border-slate-800 pl-9 pr-3 py-1.5 rounded-xl text-xs font-semibold text-[#172033] dark:text-white placeholder-[#94A3B8] focus:outline-none focus:ring-2 focus:ring-[#159A9C]/40">
                </div>

                <!-- Lessons Options List -->
                <div class="space-y-1 max-h-56 overflow-y-auto pr-1">
                    <template x-for="lesson in filteredLessons" :key="lesson.id">
                        <button @click="selectedLesson = lesson; lessonDropdownOpen = false;"
                                :class="selectedLesson.id === lesson.id 
                                    ? 'bg-[#DDF6EF] dark:bg-teal-950/50 border-l-4 border-[#159A9C]' 
                                    : 'hover:bg-slate-50 dark:hover:bg-slate-800 border-l-4 border-transparent'"
                                class="w-full text-left p-2.5 rounded-xl transition-all flex items-center justify-between gap-3 cursor-pointer group">
                            
                            <div class="flex items-center gap-2.5">
                                <span class="text-lg shrink-0 p-1 bg-white dark:bg-slate-800 rounded-lg shadow-2xs" x-text="lesson.icon"></span>
                                <div>
                                    <div class="flex items-center gap-1.5">
                                        <h4 class="font-extrabold text-xs text-[#172033] dark:text-white group-hover:text-[#159A9C]" x-text="lesson.title"></h4>
                                        <span class="text-[9px] font-bold px-1.5 py-0.2 bg-teal-100 dark:bg-teal-950 text-[#159A9C] rounded" x-text="lesson.week"></span>
                                    </div>
                                    <p class="text-[10px] font-medium text-[#64748B] dark:text-slate-400" x-text="lesson.subject + ' • ' + lesson.dates"></p>
                                </div>
                            </div>

                            <div x-show="selectedLesson.id === lesson.id" class="text-[#159A9C] font-bold text-xs shrink-0">
                                ✓
                            </div>
                        </button>
                    </template>
                </div>
            </div>
        </div>

        <!-- 3. Term Selector Tabs (Right) -->
        <div class="shrink-0">
            <label class="text-[10px] font-black uppercase tracking-wider text-[#64748B] dark:text-slate-400 block mb-1">
                Term
            </label>
            <div class="flex items-center gap-1.5 bg-[#F4F9F8] dark:bg-slate-900 p-1.5 rounded-2xl border border-[#E5ECEB] dark:border-slate-800">
                <template x-for="t in terms" :key="t">
                    <button @click="selectedTerm = t"
                            :class="selectedTerm === t 
                                ? 'bg-[#159A9C] text-white shadow-2xs font-extrabold' 
                                : 'text-[#64748B] dark:text-slate-400 hover:text-[#172033] dark:hover:text-white font-bold'"
                            class="px-4 py-2 rounded-xl text-xs transition-all cursor-pointer">
                        <span x-text="t"></span>
                    </button>
                </template>
            </div>
        </div>

    </div>

    <!-- ============================================================ -->
    <!-- MAIN WORKSPACE BELOW TOP BAR: 2 CLEAN EQUAL COLUMNS -->
    <!-- ============================================================ -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-start">

        <!-- ======================================================== -->
        <!-- COLUMN 1 — LESSON DOCUMENTS (50% Width) -->
        <!-- ======================================================== -->
        <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 shadow-2xs space-y-4">
            <div>
                <div class="flex items-center justify-between">
                    <h3 class="font-extrabold text-base text-[#172033] dark:text-white flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#159A9C]"></span>
                        Lesson Documents
                    </h3>
                    <span class="text-[11px] font-bold text-[#159A9C] px-2.5 py-0.5 bg-[#DDF6EF] rounded-full" x-text="selectedLesson.title"></span>
                </div>
                <p class="text-xs text-[#64748B] dark:text-slate-400 mt-1">
                    Official generated lesson documents for this lesson.
                </p>
            </div>

            <!-- Document Cards Container -->
            <div class="space-y-4">
                
                <!-- 1. Daily Lesson Log Card -->
                <div class="p-5 rounded-2xl bg-[#F4F9F8] dark:bg-slate-900/60 border border-[#E5ECEB] dark:border-slate-800 hover:border-[#159A9C]/40 transition-all flex flex-col justify-between space-y-4">
                    <div class="flex items-start gap-3.5">
                        <div class="w-11 h-11 rounded-2xl bg-[#DDF6EF] dark:bg-teal-950/40 text-[#159A9C] dark:text-teal-300 flex items-center justify-center font-bold text-xl shrink-0 shadow-2xs">
                            📄
                        </div>
                        <div>
                            <h4 class="font-extrabold text-sm text-[#172033] dark:text-white">Daily Lesson Log (DLL)</h4>
                            <span class="px-2.5 py-0.5 bg-[#DDF6EF] dark:bg-teal-950/40 text-[#159A9C] text-[10px] font-extrabold rounded-md inline-block mt-1">
                                I.L.A.W. Framework
                            </span>
                            <p class="text-xs text-[#64748B] dark:text-slate-400 mt-2 leading-relaxed">
                                DepEd-compliant Daily Lesson Log with curriculum standards, objectives, and UDL accommodations.
                            </p>
                        </div>
                    </div>

                    <!-- Card Actions -->
                    <div class="flex items-center gap-2 pt-3 border-t border-[#E5ECEB] dark:border-slate-800">
                        <button @click="openPreview('dll', 'Daily Lesson Log (DLL)', '📄', 'DOCX')" 
                                class="flex-1 py-2 bg-[#159A9C] hover:bg-[#0E7476] text-white font-bold text-xs rounded-xl shadow-2xs transition-all text-center cursor-pointer active:scale-95">
                            View
                        </button>
                        <button @click="showToast('Download will be available when document generation is connected.')" 
                                class="px-4 py-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:bg-slate-50 text-[#172033] dark:text-slate-200 font-bold text-xs rounded-xl transition-all cursor-pointer">
                            Download DOCX
                        </button>
                    </div>
                </div>

                <!-- 2. ILAW Lesson Plan Card -->
                <div class="p-5 rounded-2xl bg-[#F4F9F8] dark:bg-slate-900/60 border border-[#E5ECEB] dark:border-slate-800 hover:border-[#159A9C]/40 transition-all flex flex-col justify-between space-y-4">
                    <div class="flex items-start gap-3.5">
                        <div class="w-11 h-11 rounded-2xl bg-[#FDE9E7] dark:bg-rose-950/40 text-[#E11D48] dark:text-rose-300 flex items-center justify-center font-bold text-xl shrink-0 shadow-2xs">
                            📄
                        </div>
                        <div>
                            <h4 class="font-extrabold text-sm text-[#172033] dark:text-white">ILAW Lesson Plan</h4>
                            <span class="px-2.5 py-0.5 bg-[#FDE9E7] dark:bg-rose-950/40 text-[#E11D48] text-[10px] font-extrabold rounded-md inline-block mt-1">
                                ILAW • UDL-Informed
                            </span>
                            <p class="text-xs text-[#64748B] dark:text-slate-400 mt-2 leading-relaxed">
                                Detailed UDL lesson plan featuring Pre-Lesson, I DO, WE DO, and YOU DO instructional steps.
                            </p>
                        </div>
                    </div>

                    <!-- Card Actions -->
                    <div class="flex items-center gap-2 pt-3 border-t border-[#E5ECEB] dark:border-slate-800">
                        <button @click="openPreview('ilaw', 'ILAW Lesson Plan', '📄', 'DOCX')" 
                                class="flex-1 py-2 bg-[#159A9C] hover:bg-[#0E7476] text-white font-bold text-xs rounded-xl shadow-2xs transition-all text-center cursor-pointer active:scale-95">
                            View
                        </button>
                        <button @click="showToast('Download will be available when document generation is connected.')" 
                                class="px-4 py-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:bg-slate-50 text-[#172033] dark:text-slate-200 font-bold text-xs rounded-xl transition-all cursor-pointer">
                            Download DOCX
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <!-- ======================================================== -->
        <!-- COLUMN 2 — LEARNING MATERIALS (50% Width) -->
        <!-- ======================================================== -->
        <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 shadow-2xs space-y-4">
            <div>
                <h3 class="font-extrabold text-base text-[#172033] dark:text-white flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#159A9C]"></span>
                    Learning Materials
                </h3>
                <p class="text-xs text-[#64748B] dark:text-slate-400 mt-1">
                    Resources created to support this lesson.
                </p>
            </div>

            <!-- Primary Materials List (Compact Rows) -->
            <div class="space-y-3">
                
                <!-- Item 1: Presentation -->
                <div class="p-3.5 bg-[#F4F9F8] dark:bg-slate-900/60 border border-[#E5ECEB] dark:border-slate-800 rounded-2xl flex items-center justify-between gap-3 hover:bg-slate-50 dark:hover:bg-slate-900 transition-all">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-[#FFF4D6] dark:bg-amber-950/40 text-[#D97706] dark:text-amber-300 flex items-center justify-center font-bold text-base shrink-0">
                            📊
                        </div>
                        <div>
                            <h4 class="font-extrabold text-xs text-[#172033] dark:text-white">Presentation Slide Deck</h4>
                            <span class="text-[11px] font-semibold text-[#64748B] dark:text-slate-400">PowerPoint • 12 Slides</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 shrink-0">
                        <button @click="openPreview('presentation', 'The Water Cycle Presentation', '📊', 'PPTX')"
                                class="px-3 py-1.5 bg-[#159A9C] hover:bg-[#0E7476] text-white font-bold text-xs rounded-xl shadow-2xs transition-all cursor-pointer">
                            View
                        </button>
                        <button @click="showToast('Download will be available when document generation is connected.')"
                                class="px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-[#64748B] dark:text-slate-300 font-bold text-xs rounded-xl hover:text-[#172033] cursor-pointer">
                            PPTX
                        </button>
                    </div>
                </div>

                <!-- Item 2: Worksheet -->
                <div class="p-3.5 bg-[#F4F9F8] dark:bg-slate-900/60 border border-[#E5ECEB] dark:border-slate-800 rounded-2xl flex items-center justify-between gap-3 hover:bg-slate-50 dark:hover:bg-slate-900 transition-all">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-[#DDF6EF] dark:bg-teal-950/40 text-[#159A9C] dark:text-teal-300 flex items-center justify-center font-bold text-base shrink-0">
                            📝
                        </div>
                        <div>
                            <h4 class="font-extrabold text-xs text-[#172033] dark:text-white">Student Worksheet</h4>
                            <span class="text-[11px] font-semibold text-[#64748B] dark:text-slate-400">PDF • 2 Pages</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 shrink-0">
                        <button @click="openPreview('worksheet', 'The Water Cycle Worksheet', '📝', 'PDF')"
                                class="px-3 py-1.5 bg-[#159A9C] hover:bg-[#0E7476] text-white font-bold text-xs rounded-xl shadow-2xs transition-all cursor-pointer">
                            View
                        </button>
                        <button @click="showToast('Download will be available when document generation is connected.')"
                                class="px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-[#64748B] dark:text-slate-300 font-bold text-xs rounded-xl hover:text-[#172033] cursor-pointer">
                            PDF
                        </button>
                    </div>
                </div>

                <!-- Item 3: Quiz -->
                <div class="p-3.5 bg-[#F4F9F8] dark:bg-slate-900/60 border border-[#E5ECEB] dark:border-slate-800 rounded-2xl flex items-center justify-between gap-3 hover:bg-slate-50 dark:hover:bg-slate-900 transition-all">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-[#EEE9FF] dark:bg-purple-950/40 text-[#7C3AED] dark:text-purple-300 flex items-center justify-center font-bold text-base shrink-0">
                            ❓
                        </div>
                        <div>
                            <h4 class="font-extrabold text-xs text-[#172033] dark:text-white">Formative Quiz</h4>
                            <span class="text-[11px] font-semibold text-[#64748B] dark:text-slate-400">10 Multiple Choice Questions</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 shrink-0">
                        <button @click="openPreview('quiz', 'Water Cycle 10-Item Quiz', '❓', 'PDF')"
                                class="px-3 py-1.5 bg-[#159A9C] hover:bg-[#0E7476] text-white font-bold text-xs rounded-xl shadow-2xs transition-all cursor-pointer">
                            View
                        </button>
                        <button @click="showToast('Download will be available when document generation is connected.')"
                                class="px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-[#64748B] dark:text-slate-300 font-bold text-xs rounded-xl hover:text-[#172033] cursor-pointer">
                            PDF
                        </button>
                    </div>
                </div>

                <!-- Item 4: Activity Sheet -->
                <div class="p-3.5 bg-[#F4F9F8] dark:bg-slate-900/60 border border-[#E5ECEB] dark:border-slate-800 rounded-2xl flex items-center justify-between gap-3 hover:bg-slate-50 dark:hover:bg-slate-900 transition-all">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-[#FDE9E7] dark:bg-rose-950/40 text-[#E11D48] dark:text-rose-300 flex items-center justify-center font-bold text-base shrink-0">
                            📋
                        </div>
                        <div>
                            <h4 class="font-extrabold text-xs text-[#172033] dark:text-white">Group Activity Sheet</h4>
                            <span class="text-[11px] font-semibold text-[#64748B] dark:text-slate-400">PDF • Water Cycle in a Bag</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 shrink-0">
                        <button @click="openPreview('activity', 'Group Activity Sheet', '📋', 'PDF')"
                                class="px-3 py-1.5 bg-[#159A9C] hover:bg-[#0E7476] text-white font-bold text-xs rounded-xl shadow-2xs transition-all cursor-pointer">
                            View
                        </button>
                        <button @click="showToast('Download will be available when document generation is connected.')"
                                class="px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-[#64748B] dark:text-slate-300 font-bold text-xs rounded-xl hover:text-[#172033] cursor-pointer">
                            PDF
                        </button>
                    </div>
                </div>

            </div>

            <!-- Expandable Secondary Materials (+4 more materials) -->
            <div class="pt-2">
                <button @click="showMoreMaterials = !showMoreMaterials"
                        class="text-xs font-bold text-[#159A9C] dark:text-teal-300 hover:underline flex items-center gap-1 cursor-pointer">
                    <span x-text="showMoreMaterials ? 'Show less materials ▲' : '+ 4 more materials (Answer Key, Rubric, Notes) ▼'"></span>
                </button>

                <div x-show="showMoreMaterials" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 -translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="mt-3 space-y-2.5"
                     style="display: none;">
                    
                    <!-- Extra 1: Answer Key -->
                    <div class="p-3 bg-[#F4F9F8] dark:bg-slate-900 rounded-xl flex items-center justify-between text-xs">
                        <div class="flex items-center gap-2.5">
                            <span>🔑</span>
                            <span class="font-bold">Quiz Answer Key</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <button @click="openPreview('answer-key', 'Quiz Answer Key', '🔑', 'PDF')" class="text-[#159A9C] font-bold hover:underline">View</button>
                            <button @click="showToast('Download will be available when document generation is connected.')" class="text-slate-500 hover:text-slate-800">Download</button>
                        </div>
                    </div>

                    <!-- Extra 2: Rubric -->
                    <div class="p-3 bg-[#F4F9F8] dark:bg-slate-900 rounded-xl flex items-center justify-between text-xs">
                        <div class="flex items-center gap-2.5">
                            <span>📐</span>
                            <span class="font-bold">Group Activity Scoring Rubric</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <button @click="openPreview('rubric', 'Activity Rubric', '📐', 'PDF')" class="text-[#159A9C] font-bold hover:underline">View</button>
                            <button @click="showToast('Download will be available when document generation is connected.')" class="text-slate-500 hover:text-slate-800">Download</button>
                        </div>
                    </div>

                    <!-- Extra 3: Reading Material -->
                    <div class="p-3 bg-[#F4F9F8] dark:bg-slate-900 rounded-xl flex items-center justify-between text-xs">
                        <div class="flex items-center gap-2.5">
                            <span>📖</span>
                            <span class="font-bold">Reading Material: Water Cycle Diagram Guide</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <button @click="openPreview('reading', 'Reading Material Guide', '📖', 'PDF')" class="text-[#159A9C] font-bold hover:underline">View</button>
                            <button @click="showToast('Download will be available when document generation is connected.')" class="text-slate-500 hover:text-slate-800">Download</button>
                        </div>
                    </div>

                    <!-- Extra 4: Teacher Notes -->
                    <div class="p-3 bg-[#F4F9F8] dark:bg-slate-900 rounded-xl flex items-center justify-between text-xs">
                        <div class="flex items-center gap-2.5">
                            <span>📝</span>
                            <span class="font-bold">Teacher Misconception & Prep Notes</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <button @click="openPreview('notes', 'Teacher Prep Notes', '📝', 'DOCX')" class="text-[#159A9C] font-bold hover:underline">View</button>
                            <button @click="showToast('Download will be available when document generation is connected.')" class="text-slate-500 hover:text-slate-800">Download</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <!-- ============================================================ -->
    <!-- PREVIEW MODAL OVERLAY INCLUSION -->
    <!-- ============================================================ -->
    <x-materials.preview-modal />

</div>
