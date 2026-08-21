<!-- ============================================================ -->
<!-- GUROPILOT — SF2 ATTENDANCE SCHOOL RECORDS MODULE -->
<!-- ============================================================ -->

<div x-data="{
        // Class Selector Dropdown State
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

        // Month Selector State
        selectedMonth: 'June',
        months: ['May', 'June', 'July', 'August'],
        schoolYear: '2026–2027',

        // Academic Term State
        selectedTerm: 'Term 1',
        terms: ['Term 1', 'Term 2', 'Term 3'],

        // Student Search & Filter State
        studentSearch: '',
        activeStatusFilter: 'all', // 'all', 'present', 'absent', 'tardy', 'nls'
        currentPage: 1,
        itemsPerPage: 8,

        // 32 Mock Students Dataset
        students: [
            { id: 1, name: 'Maria Cruz', present: 18, absent: 0, tardy: 0, excused: 0, isNls: false, nlsReason: '' },
            { id: 2, name: 'Juan Santos', present: 18, absent: 0, tardy: 0, excused: 0, isNls: false, nlsReason: '' },
            { id: 3, name: 'Ana Reyes', present: 13, absent: 5, tardy: 0, excused: 0, isNls: true, nlsReason: 'Illness' },
            { id: 4, name: 'Pedro Garcia', present: 18, absent: 0, tardy: 0, excused: 0, isNls: false, nlsReason: '' },
            { id: 5, name: 'Sophia Lopez', present: 17, absent: 1, tardy: 0, excused: 0, isNls: false, nlsReason: '' },
            { id: 6, name: 'Miguel Dela Cruz', present: 18, absent: 0, tardy: 0, excused: 0, isNls: false, nlsReason: '' },
            { id: 7, name: 'Zoe Ramirez', present: 12, absent: 6, tardy: 0, excused: 0, isNls: true, nlsReason: 'Family-related' },
            { id: 8, name: 'Kyle Villanueva', present: 18, absent: 0, tardy: 0, excused: 0, isNls: false, nlsReason: '' },
            { id: 9, name: 'Gabriel Mendoza', present: 18, absent: 0, tardy: 0, excused: 0, isNls: false, nlsReason: '' },
            { id: 10, name: 'Angelica Flores', present: 16, absent: 2, tardy: 0, excused: 0, isNls: false, nlsReason: '' },
            { id: 11, name: 'Christian Ramos', present: 18, absent: 0, tardy: 0, excused: 0, isNls: false, nlsReason: '' },
            { id: 12, name: 'Samantha Bautista', present: 11, absent: 7, tardy: 0, excused: 0, isNls: true, nlsReason: 'Distance / Transport' },
            { id: 13, name: 'Joshua Aquino', present: 18, absent: 0, tardy: 0, excused: 0, isNls: false, nlsReason: '' },
            { id: 14, name: 'Beatriz Navarro', present: 18, absent: 0, tardy: 0, excused: 0, isNls: false, nlsReason: '' },
            { id: 15, name: 'Daniel Castillo', present: 16, absent: 1, tardy: 1, excused: 0, isNls: false, nlsReason: '' },
            { id: 16, name: 'Patricia Alcantara', present: 18, absent: 0, tardy: 0, excused: 0, isNls: false, nlsReason: '' },
            { id: 17, name: 'Ethan Morales', present: 18, absent: 0, tardy: 0, excused: 0, isNls: false, nlsReason: '' },
            { id: 18, name: 'Chloe Corpuz', present: 18, absent: 0, tardy: 0, excused: 0, isNls: false, nlsReason: '' },
            { id: 19, name: 'Liam Soriano', present: 16, absent: 1, tardy: 1, excused: 0, isNls: false, nlsReason: '' },
            { id: 20, name: 'Alyssa Dimaculangan', present: 18, absent: 0, tardy: 0, excused: 0, isNls: false, nlsReason: '' },
            { id: 21, name: 'Jacob Valenzuela', present: 18, absent: 0, tardy: 0, excused: 0, isNls: false, nlsReason: '' },
            { id: 22, name: 'Hannah Tolentino', present: 18, absent: 0, tardy: 0, excused: 0, isNls: false, nlsReason: '' },
            { id: 23, name: 'Lucas Evangeline', present: 18, absent: 0, tardy: 0, excused: 0, isNls: false, nlsReason: '' },
            { id: 24, name: 'Jasmine Gonzaga', present: 18, absent: 0, tardy: 0, excused: 0, isNls: false, nlsReason: '' },
            { id: 25, name: 'Noah Mercado', present: 18, absent: 0, tardy: 0, excused: 0, isNls: false, nlsReason: '' },
            { id: 26, name: 'Kylie Pascual', present: 16, absent: 2, tardy: 0, excused: 0, isNls: false, nlsReason: '' },
            { id: 27, name: 'Nathaniel Ocampo', present: 18, absent: 0, tardy: 0, excused: 0, isNls: false, nlsReason: '' },
            { id: 28, name: 'Andrea Roxas', present: 18, absent: 0, tardy: 0, excused: 0, isNls: false, nlsReason: '' },
            { id: 29, name: 'James Santiago', present: 18, absent: 0, tardy: 0, excused: 0, isNls: false, nlsReason: '' },
            { id: 30, name: 'Camilla Salvador', present: 18, absent: 0, tardy: 0, excused: 0, isNls: false, nlsReason: '' },
            { id: 31, name: 'Dominic Agoncillo', present: 17, absent: 0, tardy: 1, excused: 0, isNls: false, nlsReason: '' },
            { id: 32, name: 'Erika Palma', present: 18, absent: 0, tardy: 0, excused: 0, isNls: false, nlsReason: '' }
        ],

        // Selected Student Modal State
        studentModalOpen: false,
        selectedStudent: null,

        // NLS Modal State
        nlsModalOpen: false,

        // SF2 Report Modal State
        sf2ReportModalOpen: false,
        zoomLevel: 100,

        // Certificate Modal State
        certificateModalOpen: false,
        certStudentIndex: 0,
        get perfectStudents() {
            return this.students.filter(s => s.present === 18 && s.absent === 0 && s.tardy === 0);
        },

        // Toast Feedback System
        toastMessage: '',
        toastVisible: false,
        showToast(msg) {
            this.toastMessage = msg;
            this.toastVisible = true;
            setTimeout(() => { this.toastVisible = false; }, 3200);
        },

        // Helper filter function for students
        get filteredStudents() {
            return this.students.filter(s => {
                const matchesSearch = !this.studentSearch.trim() || s.name.toLowerCase().includes(this.studentSearch.toLowerCase());
                let matchesStatus = true;
                if (this.activeStatusFilter === 'perfect') matchesStatus = s.present === 18 && s.absent === 0 && s.tardy === 0;
                else if (this.activeStatusFilter === 'nls') matchesStatus = s.isNls;
                return matchesSearch && matchesStatus;
            });
        },

        get paginatedStudents() {
            const start = (this.currentPage - 1) * this.itemsPerPage;
            return this.filteredStudents.slice(start, start + this.itemsPerPage);
        },

        get totalPages() {
            return Math.ceil(this.filteredStudents.length / this.itemsPerPage) || 1;
        },

        openStudentModal(student) {
            this.selectedStudent = student;
            this.studentModalOpen = true;
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
    <!-- PAGE HEADER WITH BACK BUTTON -->
    <!-- ============================================================ -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 shadow-2xs">
        <div>
            <!-- Back to Classes Link -->
            <button @click="activeTab = 'classes'" 
                    class="inline-flex items-center gap-1.5 text-xs font-bold text-[#159A9C] dark:text-teal-300 hover:underline mb-2 cursor-pointer transition-colors">
                <span>← Back to Classes</span>
            </button>

            <div class="flex items-center gap-3">
                <h1 class="text-2xl md:text-3xl font-extrabold text-[#172033] dark:text-white tracking-tight">
                    SF2 Attendance
                </h1>
                <span class="px-3 py-1 rounded-full bg-[#DDF6EF] dark:bg-teal-950/40 text-[#159A9C] dark:text-teal-300 text-xs font-extrabold">
                    DepEd Form 2
                </span>
            </div>
            
            <p class="text-xs md:text-sm text-[#64748B] dark:text-slate-400 font-medium mt-1">
                Daily Attendance Report of Learners
            </p>
            <p class="text-[11px] font-semibold text-[#159A9C] dark:text-teal-400 mt-1 flex items-center gap-1">
                <span>💡</span>
                <span>SF2 is automatically prepared from your daily attendance records.</span>
            </p>
        </div>

        <!-- Top Right Actions -->
        <div class="flex items-center gap-3 shrink-0">
            <button @click="showToast('Attendance data refreshed from class logs.')" 
                    class="px-4 py-2.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:bg-slate-50 text-[#172033] dark:text-slate-200 font-bold text-xs rounded-2xl shadow-2xs transition-all flex items-center gap-2 cursor-pointer active:scale-95">
                <svg class="w-4 h-4 text-[#64748B]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                <span>Refresh Data</span>
            </button>

            <button @click="sf2ReportModalOpen = true" 
                    class="px-5 py-2.5 bg-[#159A9C] hover:bg-[#0E7476] text-white font-extrabold text-xs rounded-2xl shadow-2xs transition-all flex items-center gap-2 cursor-pointer active:scale-95">
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                <span>View SF2 Report</span>
            </button>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- CONTROLS BAR: CLASS SELECTOR | MONTH SELECTOR | TERM SELECTOR -->
    <!-- ============================================================ -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-4 shadow-2xs">
        
        <!-- 1. Class & Section Dropdown (Left) -->
        <div class="relative min-w-[240px]">
            <label class="text-[10px] font-black uppercase tracking-wider text-[#64748B] dark:text-slate-400 block mb-1">
                Class & Section
            </label>
            <button @click="classDropdownOpen = !classDropdownOpen"
                    @click.away="classDropdownOpen = false"
                    :class="classDropdownOpen ? 'border-[#159A9C] ring-2 ring-[#159A9C]/20' : 'border-[#E5ECEB] dark:border-slate-800 hover:border-[#159A9C]/60'"
                    class="w-full px-3.5 py-2.5 bg-white dark:bg-slate-900 border-2 rounded-2xl flex items-center justify-between gap-3 transition-all cursor-pointer text-left shadow-2xs group">
                
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-xl flex items-center justify-center font-bold text-xs shrink-0 shadow-2xs"
                         :class="selectedClass.iconBg">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
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
                                👥
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

        <!-- 2. Month Selector Tabs (Center) -->
        <div>
            <label class="text-[10px] font-black uppercase tracking-wider text-[#64748B] dark:text-slate-400 block mb-1">
                Report Month
            </label>
            <div class="flex items-center gap-1 bg-[#F4F9F8] dark:bg-slate-900 p-1.5 rounded-2xl border border-[#E5ECEB] dark:border-slate-800">
                <template x-for="m in months" :key="m">
                    <button @click="selectedMonth = m"
                            :class="selectedMonth === m 
                                ? 'bg-[#159A9C] text-white shadow-2xs font-extrabold' 
                                : 'text-[#64748B] dark:text-slate-400 hover:text-[#172033] dark:hover:text-white font-bold'"
                            class="px-3.5 py-1.5 rounded-xl text-xs transition-all cursor-pointer">
                        <span x-text="m"></span>
                    </button>
                </template>
            </div>
        </div>

        <!-- 3. Academic Term Selector Tabs (Right) -->
        <div>
            <label class="text-[10px] font-black uppercase tracking-wider text-[#64748B] dark:text-slate-400 block mb-1">
                Academic Term
            </label>
            <div class="flex items-center gap-1.5 bg-[#F4F9F8] dark:bg-slate-900 p-1.5 rounded-2xl border border-[#E5ECEB] dark:border-slate-800">
                <template x-for="t in terms" :key="t">
                    <button @click="selectedTerm = t"
                            :class="selectedTerm === t 
                                ? 'bg-[#159A9C] text-white shadow-2xs font-extrabold' 
                                : 'text-[#64748B] dark:text-slate-400 hover:text-[#172033] dark:hover:text-white font-bold'"
                            class="px-4 py-1.5 rounded-xl text-xs transition-all cursor-pointer">
                        <span x-text="t"></span>
                    </button>
                </template>
            </div>
        </div>

    </div>

    <!-- ============================================================ -->
    <!-- 4 COMPACT ATTENDANCE SUMMARY METRIC CARDS -->
    <!-- ============================================================ -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        
        <!-- Metric 1: Enrolled Learners -->
        <div class="p-4 bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl shadow-2xs flex items-center gap-3">
            <div class="w-10 h-10 rounded-2xl bg-[#DDF6EF] dark:bg-teal-950/40 text-[#159A9C] dark:text-teal-300 flex items-center justify-center font-bold text-lg shrink-0">
                👥
            </div>
            <div>
                <span class="text-xl font-extrabold text-[#172033] dark:text-white tracking-tight" x-text="selectedClass.students"></span>
                <p class="text-[11px] font-semibold text-[#64748B] dark:text-slate-400">Enrolled Learners</p>
            </div>
        </div>

        <!-- Metric 2: School Days -->
        <div class="p-4 bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl shadow-2xs flex items-center gap-3">
            <div class="w-10 h-10 rounded-2xl bg-[#EAF2FF] dark:bg-blue-950/40 text-[#2563EB] dark:text-blue-300 flex items-center justify-center font-bold text-lg shrink-0">
                📅
            </div>
            <div>
                <span class="text-xl font-extrabold text-[#172033] dark:text-white tracking-tight">18</span>
                <p class="text-[11px] font-semibold text-[#64748B] dark:text-slate-400" x-text="'Days in ' + selectedMonth + ' ' + schoolYear.split('–')[0]"></p>
            </div>
        </div>

        <!-- Metric 3: Attendance Rate -->
        <div class="p-4 bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl shadow-2xs flex items-center gap-3">
            <div class="w-10 h-10 rounded-2xl bg-[#EEE9FF] dark:bg-purple-950/40 text-[#7C3AED] dark:text-purple-300 flex items-center justify-center font-bold text-lg shrink-0">
                📈
            </div>
            <div>
                <span class="text-xl font-extrabold text-[#172033] dark:text-white tracking-tight">94.2%</span>
                <p class="text-[11px] font-semibold text-[#64748B] dark:text-slate-400">Attendance Rate</p>
            </div>
        </div>

        <!-- Metric 4: NLS Cases -->
        <div class="p-4 bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl shadow-2xs flex items-center gap-3">
            <div class="w-10 h-10 rounded-2xl bg-[#FDE9E7] dark:bg-rose-950/40 text-[#E11D48] dark:text-rose-300 flex items-center justify-center font-bold text-lg shrink-0">
                ⚠️
            </div>
            <div>
                <span class="text-xl font-extrabold text-[#172033] dark:text-white tracking-tight">3</span>
                <p class="text-[11px] font-semibold text-[#64748B] dark:text-slate-400">NLS Cases</p>
            </div>
        </div>

    </div>


    <!-- ============================================================ -->
    <!-- MAIN WORKSPACE: LEARNER TABLE (8 COLS) + SIDE STATUS CARDS (4 COLS) -->
    <!-- ============================================================ -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        
        <!-- ======================================================== -->
        <!-- LEFT — LEARNER ATTENDANCE TABLE (8 Cols) -->
        <!-- ======================================================== -->
        <div class="lg:col-span-8 bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-5 shadow-2xs space-y-4">
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <h2 class="font-extrabold text-base text-[#172033] dark:text-white">Learner Attendance</h2>
                
                <!-- Search Input Field -->
                <div class="relative w-full sm:w-60">
                    <svg class="w-3.5 h-3.5 text-[#94A3B8] absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" 
                           x-model="studentSearch"
                           placeholder="Search student..." 
                           class="w-full bg-[#F4F9F8] dark:bg-slate-900 border border-[#E5ECEB] dark:border-slate-800 pl-9 pr-3 py-1.5 rounded-xl text-xs font-semibold text-[#172033] dark:text-white placeholder-[#94A3B8] focus:outline-none focus:ring-2 focus:ring-[#159A9C]/40">
                </div>
            </div>

            <!-- Status Filter Pills -->
            <div class="flex items-center gap-1.5 flex-wrap">
                <button @click="activeStatusFilter = 'all'; currentPage = 1"
                        :class="activeStatusFilter === 'all' ? 'bg-[#172033] text-white font-extrabold shadow-2xs' : 'bg-[#F4F9F8] text-[#64748B] hover:bg-slate-200 dark:bg-slate-900 dark:text-slate-400 font-semibold'"
                        class="px-3.5 py-1.5 rounded-xl text-xs transition-all cursor-pointer">
                    All (<span x-text="students.length"></span>)
                </button>
                <button @click="activeStatusFilter = 'perfect'; currentPage = 1"
                        :class="activeStatusFilter === 'perfect' ? 'bg-[#159A9C] text-white font-extrabold shadow-2xs' : 'bg-[#DDF6EF]/60 text-[#159A9C] hover:bg-[#DDF6EF] font-semibold'"
                        class="px-3.5 py-1.5 rounded-xl text-xs transition-all cursor-pointer">
                    Perfect Attendance (<span x-text="students.filter(s => s.present === 18 && s.absent === 0 && s.tardy === 0).length"></span>)
                </button>
                <button @click="activeStatusFilter = 'nls'; currentPage = 1"
                        :class="activeStatusFilter === 'nls' ? 'bg-[#7C3AED] text-white font-extrabold shadow-2xs' : 'bg-[#EEE9FF] text-[#7C3AED] hover:bg-[#EEE9FF]/80 font-semibold'"
                        class="px-3.5 py-1.5 rounded-xl text-xs transition-all cursor-pointer">
                    NLS (<span x-text="students.filter(s => s.isNls).length"></span>)
                </button>
            </div>

            <!-- Learner Table -->
            <div class="overflow-x-auto rounded-2xl border border-[#E5ECEB] dark:border-slate-800">
                <table class="w-full text-left text-xs">
                    <thead class="bg-[#F4F9F8] dark:bg-slate-900 text-[#64748B] dark:text-slate-400 font-extrabold border-b border-[#E5ECEB] dark:border-slate-800">
                        <tr>
                            <th class="p-3 text-center w-10">#</th>
                            <th class="p-3">Learner's Name</th>
                            <th class="p-3 text-center">Present</th>
                            <th class="p-3 text-center">Absent</th>
                            <th class="p-3 text-center">Tardy</th>
                            <th class="p-3 text-center">Excused</th>
                            <th class="p-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#E5ECEB] dark:divide-slate-800 font-semibold text-[#172033] dark:text-slate-200">
                        <template x-for="(s, index) in paginatedStudents" :key="s.id">
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-900/60 transition-colors">
                                <td class="p-3 text-center text-[#94A3B8] font-bold" x-text="(currentPage - 1) * itemsPerPage + index + 1"></td>
                                <td class="p-3">
                                    <div class="flex items-center gap-2">
                                        <span class="font-extrabold" x-text="s.name"></span>
                                        <template x-if="s.isNls">
                                            <span class="px-1.5 py-0.5 bg-[#FDE9E7] text-[#E11D48] text-[9px] font-black rounded" title="Non-Learner for School">NLS</span>
                                        </template>
                                    </div>
                                </td>
                                <td class="p-3 text-center text-[#159A9C] font-bold" x-text="s.present"></td>
                                <td class="p-3 text-center" :class="s.absent > 0 ? 'text-[#E11D48] font-bold' : 'text-slate-400'" x-text="s.absent"></td>
                                <td class="p-3 text-center" :class="s.tardy > 0 ? 'text-[#D97706] font-bold' : 'text-slate-400'" x-text="s.tardy"></td>
                                <td class="p-3 text-center text-slate-400" x-text="s.excused"></td>
                                <td class="p-3 text-right">
                                    <button @click="openStudentModal(s)"
                                            class="px-2.5 py-1 bg-[#DDF6EF] hover:bg-[#159A9C] hover:text-white text-[#159A9C] font-bold rounded-lg transition-all cursor-pointer text-[11px]">
                                        View
                                    </button>
                                </td>
                            </tr>
                        </template>

                        <tr x-show="filteredStudents.length === 0">
                            <td colspan="7" class="p-8 text-center text-slate-400">
                                No learners found matching your criteria.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination Bar -->
            <div class="flex items-center justify-between pt-2 text-xs font-semibold text-[#64748B] dark:text-slate-400">
                <span x-text="'Showing ' + (((currentPage - 1) * itemsPerPage) + 1) + '–' + Math.min(currentPage * itemsPerPage, filteredStudents.length) + ' of ' + filteredStudents.length + ' learners'"></span>
                
                <div class="flex items-center gap-1">
                    <button @click="currentPage = Math.max(1, currentPage - 1)"
                            :disabled="currentPage === 1"
                            :class="currentPage === 1 ? 'opacity-40 cursor-not-allowed' : 'hover:bg-slate-100 dark:hover:bg-slate-800 cursor-pointer'"
                            class="px-2.5 py-1 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg">
                        ←
                    </button>
                    <span class="px-3 py-1 bg-[#159A9C] text-white rounded-lg font-bold" x-text="currentPage"></span>
                    <button @click="currentPage = Math.min(totalPages, currentPage + 1)"
                            :disabled="currentPage === totalPages"
                            :class="currentPage === totalPages ? 'opacity-40 cursor-not-allowed' : 'hover:bg-slate-100 dark:hover:bg-slate-800 cursor-pointer'"
                            class="px-2.5 py-1 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg">
                        →
                    </button>
                </div>
            </div>

        </div>

        <!-- ======================================================== -->
        <!-- RIGHT — SF2 STATUS & NLS CARDS (4 Cols) -->
        <!-- ======================================================== -->
        <div class="lg:col-span-4 space-y-5">
            
            <!-- 1. SF2 Status Validation Card -->
            <div class="p-5 bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl shadow-2xs space-y-3">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-xl bg-[#DDF6EF] text-[#159A9C] flex items-center justify-center font-bold text-sm">
                        ✓
                    </div>
                    <div>
                        <h3 class="font-extrabold text-sm text-[#172033] dark:text-white">SF2 Status</h3>
                        <span class="text-[10px] font-bold text-emerald-600 dark:text-emerald-400 block">Ready to Generate</span>
                    </div>
                </div>

                <div class="p-3 bg-[#DDF6EF]/40 dark:bg-teal-950/20 rounded-2xl border border-[#159A9C]/20 text-xs text-[#172033] dark:text-slate-300">
                    All attendance records are complete for <strong>June 2026</strong>.
                </div>

                <button @click="sf2ReportModalOpen = true" 
                        class="w-full py-2.5 bg-[#159A9C] hover:bg-[#0E7476] text-white text-xs font-extrabold rounded-xl shadow-2xs transition-all text-center cursor-pointer active:scale-95">
                    View SF2 Report →
                </button>

                <!-- Additional Action Buttons Below SF2 Report -->
                <div class="pt-3 border-t border-[#E5ECEB] dark:border-slate-800 space-y-2.5">
                    
                    <div class="grid grid-cols-2 gap-2">
                        <button @click="showToast('Print command sent for June 2026 SF2 Report.')" 
                                class="py-2 px-3 bg-[#F4F9F8] hover:bg-slate-200 dark:bg-slate-900 dark:hover:bg-slate-800 border border-[#E5ECEB] dark:border-slate-800 text-[#172033] dark:text-slate-200 text-xs font-bold rounded-xl transition-all flex items-center justify-center gap-1.5 cursor-pointer">
                            <span>🖨️</span>
                            <span>Print SF2</span>
                        </button>
                        <button @click="showToast('Exporting June 2026 SF2 Report...')" 
                                class="py-2 px-3 bg-[#F4F9F8] hover:bg-slate-200 dark:bg-slate-900 dark:hover:bg-slate-800 border border-[#E5ECEB] dark:border-slate-800 text-[#172033] dark:text-slate-200 text-xs font-bold rounded-xl transition-all flex items-center justify-center gap-1.5 cursor-pointer">
                            <span>📥</span>
                            <span>Export SF2</span>
                        </button>
                    </div>

                    <!-- Create Certificate Button for Perfect Attendance Learners -->
                    <button @click="certificateModalOpen = true; certStudentIndex = 0;"
                            class="w-full py-2.5 bg-gradient-to-r from-[#EEE9FF] via-[#DDF6EF] to-[#FFF4D6] hover:from-purple-200 hover:to-teal-200 dark:from-purple-950/60 dark:to-teal-950/60 border border-purple-300 dark:border-purple-800 text-[#7C3AED] dark:text-purple-300 text-xs font-extrabold rounded-xl shadow-2xs transition-all flex items-center justify-center gap-2 cursor-pointer active:scale-95">
                        <span>📜</span>
                        <span>Create Certificate</span>
                        <span class="px-2 py-0.5 bg-[#7C3AED] text-white rounded-full text-[10px] font-black" x-text="perfectStudents.length + ' Learners'"></span>
                    </button>
                </div>
            </div>

            <!-- 2. NLS / Non-Learners for School Card -->
            <div class="p-5 bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl shadow-2xs space-y-3">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-xl bg-[#FDE9E7] text-[#E11D48] flex items-center justify-center font-bold text-sm">
                        📋
                    </div>
                    <div>
                        <h3 class="font-extrabold text-sm text-[#172033] dark:text-white">NLS Information</h3>
                        <span class="text-[10px] font-bold text-[#E11D48] block">3 Learners Require Tagging</span>
                    </div>
                </div>

                <p class="text-xs text-[#64748B] dark:text-slate-400 leading-relaxed">
                    Tag reasons for learners absent for 5 consecutive days as required by DepEd SF2 standards.
                </p>

                <button @click="nlsModalOpen = true" 
                        class="w-full py-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:bg-slate-50 text-[#172033] dark:text-slate-200 text-xs font-bold rounded-xl transition-all cursor-pointer">
                    Review NLS Records →
                </button>
            </div>

        </div>

    </div>

    <!-- ============================================================ -->
    <!-- MODAL 1: LEARNER ATTENDANCE DETAIL MODAL -->
    <!-- ============================================================ -->
    <div x-show="studentModalOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @keydown.escape.window="studentModalOpen = false"
         class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4"
         style="display: none;">
        
        <div @click.away="studentModalOpen = false"
             class="bg-white dark:bg-[#111C38] w-full max-w-md rounded-3xl shadow-2xl border border-[#E5ECEB] dark:border-slate-800 overflow-hidden flex flex-col">
            
            <div class="px-6 py-4 bg-[#F4F9F8] dark:bg-[#172033] border-b border-[#E5ECEB] dark:border-slate-800 flex items-center justify-between">
                <div>
                    <h3 class="font-extrabold text-base text-[#172033] dark:text-white" x-text="selectedStudent ? selectedStudent.name : ''"></h3>
                    <p class="text-xs text-[#64748B] dark:text-slate-400" x-text="selectedClass.grade + ' • ' + selectedMonth + ' 2026'"></p>
                </div>
                <button @click="studentModalOpen = false" class="text-slate-400 hover:text-slate-700 font-bold">✕</button>
            </div>

            <div class="p-6 space-y-4 max-h-[70vh] overflow-y-auto">
                <div class="grid grid-cols-4 gap-2 text-center text-xs font-extrabold">
                    <div class="p-2 bg-[#DDF6EF] text-[#159A9C] rounded-xl">
                        <span class="block text-lg" x-text="selectedStudent ? selectedStudent.present : 0"></span>
                        <span class="text-[10px]">Present</span>
                    </div>
                    <div class="p-2 bg-[#FDE9E7] text-[#E11D48] rounded-xl">
                        <span class="block text-lg" x-text="selectedStudent ? selectedStudent.absent : 0"></span>
                        <span class="text-[10px]">Absent</span>
                    </div>
                    <div class="p-2 bg-[#FFF4D6] text-[#D97706] rounded-xl">
                        <span class="block text-lg" x-text="selectedStudent ? selectedStudent.tardy : 0"></span>
                        <span class="text-[10px]">Tardy</span>
                    </div>
                    <div class="p-2 bg-slate-100 text-slate-600 rounded-xl">
                        <span class="block text-lg" x-text="selectedStudent ? selectedStudent.excused : 0"></span>
                        <span class="text-[10px]">Excused</span>
                    </div>
                </div>

                <h4 class="font-extrabold text-xs text-[#172033] dark:text-white border-b border-slate-100 dark:border-slate-800 pb-1">
                    Daily Log History (June 2026)
                </h4>

                <div class="space-y-1.5 text-xs">
                    <div class="flex items-center justify-between p-2 bg-[#F4F9F8] dark:bg-slate-900 rounded-xl">
                        <span>June 1 (Mon)</span>
                        <span class="font-bold text-[#159A9C]">Present ✓</span>
                    </div>
                    <div class="flex items-center justify-between p-2 bg-[#F4F9F8] dark:bg-slate-900 rounded-xl">
                        <span>June 2 (Tue)</span>
                        <span class="font-bold text-[#159A9C]">Present ✓</span>
                    </div>
                    <div class="flex items-center justify-between p-2 bg-[#F4F9F8] dark:bg-slate-900 rounded-xl">
                        <span>June 3 (Wed)</span>
                        <span x-text="selectedStudent && selectedStudent.tardy > 0 ? 'Tardy (15m) ⚠️' : 'Present ✓'" 
                              :class="selectedStudent && selectedStudent.tardy > 0 ? 'font-bold text-[#D97706]' : 'font-bold text-[#159A9C]'"></span>
                    </div>
                    <div class="flex items-center justify-between p-2 bg-[#F4F9F8] dark:bg-slate-900 rounded-xl">
                        <span>June 4 (Thu)</span>
                        <span x-text="selectedStudent && selectedStudent.absent > 0 ? 'Absent ❌' : 'Present ✓'" 
                              :class="selectedStudent && selectedStudent.absent > 0 ? 'font-bold text-[#E11D48]' : 'font-bold text-[#159A9C]'"></span>
                    </div>
                    <div class="flex items-center justify-between p-2 bg-[#F4F9F8] dark:bg-slate-900 rounded-xl">
                        <span>June 5 (Fri)</span>
                        <span class="font-bold text-[#159A9C]">Present ✓</span>
                    </div>
                </div>
            </div>

            <div class="p-4 border-t border-[#E5ECEB] dark:border-slate-800 bg-[#F4F9F8] dark:bg-[#172033] flex justify-end">
                <button @click="studentModalOpen = false" class="px-4 py-2 bg-slate-200 dark:bg-slate-800 text-xs font-bold rounded-xl">Close</button>
            </div>

        </div>
    </div>

    <!-- ============================================================ -->
    <!-- MODAL 2: NLS RECORDS MODAL -->
    <!-- ============================================================ -->
    <div x-show="nlsModalOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @keydown.escape.window="nlsModalOpen = false"
         class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4"
         style="display: none;">
        
        <div @click.away="nlsModalOpen = false"
             class="bg-white dark:bg-[#111C38] w-full max-w-lg rounded-3xl shadow-2xl border border-[#E5ECEB] dark:border-slate-800 overflow-hidden flex flex-col">
            
            <div class="px-6 py-4 bg-[#FDE9E7] dark:bg-rose-950/40 border-b border-[#E5ECEB] dark:border-slate-800 flex items-center justify-between">
                <div>
                    <h3 class="font-extrabold text-base text-[#E11D48] dark:text-rose-300">NLS Records Management</h3>
                    <p class="text-xs text-slate-600 dark:text-slate-400">Tag reasons for Non-Learners for School</p>
                </div>
                <button @click="nlsModalOpen = false" class="text-slate-400 hover:text-slate-700 font-bold">✕</button>
            </div>

            <div class="p-6 space-y-4 text-xs">
                <template x-for="s in students.filter(item => item.isNls)" :key="s.id">
                    <div class="p-3 bg-[#F4F9F8] dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 flex items-center justify-between gap-4">
                        <div>
                            <p class="font-extrabold text-[#172033] dark:text-white" x-text="s.name"></p>
                            <p class="text-[10px] text-slate-500" x-text="s.absent + ' Consecutive Absences'"></p>
                        </div>

                        <select x-model="s.nlsReason" class="bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-700 rounded-xl px-3 py-1.5 text-xs font-bold">
                            <option value="Illness">Illness</option>
                            <option value="Family-related">Family-related</option>
                            <option value="Distance / Transport">Distance / Transport</option>
                            <option value="Employment">Employment</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </template>
            </div>

            <div class="p-4 border-t border-[#E5ECEB] dark:border-slate-800 bg-[#F4F9F8] dark:bg-[#172033] flex justify-end gap-2">
                <button @click="nlsModalOpen = false" class="px-4 py-2 bg-slate-200 dark:bg-slate-800 text-xs font-bold rounded-xl">Cancel</button>
                <button @click="nlsModalOpen = false; showToast('NLS reasons saved successfully.')" class="px-4 py-2 bg-[#159A9C] text-white text-xs font-bold rounded-xl shadow-xs">Save Changes</button>
            </div>

        </div>
    </div>

    <!-- ============================================================ -->
    <!-- MODAL 3: OFFICIAL SF2 REPORT PREVIEW OVERLAY -->
    <!-- ============================================================ -->
    <div x-show="sf2ReportModalOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @keydown.escape.window="sf2ReportModalOpen = false"
         class="fixed inset-0 z-50 overflow-y-auto bg-slate-900/70 backdrop-blur-xs flex items-center justify-center p-3 md:p-6"
         style="display: none;">
        
        <div @click.away="sf2ReportModalOpen = false"
             class="bg-[#F4F9F8] dark:bg-[#111C38] w-full max-w-6xl max-h-[92vh] rounded-3xl shadow-2xl border border-[#E5ECEB] dark:border-slate-800 flex flex-col overflow-hidden relative">

            <!-- Modal Header -->
            <div class="px-6 py-4 bg-white dark:bg-[#172033] border-b border-[#E5ECEB] dark:border-slate-800 flex items-center justify-between shrink-0">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-[#DDF6EF] dark:bg-teal-950/40 text-[#159A9C] dark:text-teal-300 flex items-center justify-center font-bold text-lg">
                        📋
                    </div>
                    <div>
                        <h2 class="text-base md:text-lg font-extrabold text-[#172033] dark:text-white">Daily Attendance Report of Learners (SF2)</h2>
                        <p class="text-xs text-[#64748B] dark:text-slate-400" x-text="selectedClass.grade + ' • ' + selectedMonth + ' 2026'"></p>
                    </div>
                </div>

                <!-- Export Actions -->
                <div class="flex items-center gap-2">
                    <button @click="showToast('Export will be available when SF2 generation is connected.')" class="px-3 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold rounded-xl shadow-2xs">
                        Download Excel
                    </button>
                    <button @click="showToast('Export will be available when SF2 generation is connected.')" class="px-3 py-1.5 bg-rose-600 hover:bg-rose-700 text-white text-xs font-bold rounded-xl shadow-2xs">
                        Download PDF
                    </button>
                    <button @click="showToast('Export will be available when SF2 generation is connected.')" class="px-3 py-1.5 bg-slate-800 hover:bg-slate-900 text-white text-xs font-bold rounded-xl shadow-2xs">
                        Print
                    </button>
                    <button @click="sf2ReportModalOpen = false" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-500 hover:text-slate-800 dark:hover:text-white flex items-center justify-center cursor-pointer">
                        ✕
                    </button>
                </div>
            </div>

            <!-- Controls Toolbar (Zoom / Page) -->
            <div class="px-6 py-2 bg-slate-100 dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 flex items-center justify-between text-xs shrink-0">
                <div class="flex items-center gap-2">
                    <span class="text-slate-500 font-bold">Zoom:</span>
                    <button @click="zoomLevel = Math.max(70, zoomLevel - 10)" class="px-2 py-0.5 bg-white dark:bg-slate-800 rounded border border-slate-300 dark:border-slate-700 font-bold">-</button>
                    <span class="font-extrabold text-[#172033] dark:text-white" x-text="zoomLevel + '%'"></span>
                    <button @click="zoomLevel = Math.min(130, zoomLevel + 10)" class="px-2 py-0.5 bg-white dark:bg-slate-800 rounded border border-slate-300 dark:border-slate-700 font-bold">+</button>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-slate-500 font-bold">Page:</span>
                    <span class="font-bold">1 / 1</span>
                </div>
            </div>

            <!-- Official Document Canvas -->
            <div class="p-6 md:p-10 overflow-auto flex-1 bg-[#F4F9F8] dark:bg-[#0B132B]">
                <div :style="'transform: scale(' + (zoomLevel / 100) + '); transform-origin: top center;'"
                     class="min-w-[900px] max-w-5xl mx-auto bg-white text-slate-900 border-2 border-slate-800 p-8 shadow-xl text-[10px] font-sans space-y-4">
                    
                    <!-- DepEd SF2 Header -->
                    <div class="text-center space-y-0.5 border-b-2 border-slate-900 pb-3">
                        <p class="uppercase font-bold tracking-widest text-[9px]">Republic of the Philippines • Department of Education</p>
                        <h1 class="text-sm font-black uppercase tracking-wider">DAILY ATTENDANCE REPORT OF LEARNERS (School Form 2)</h1>
                    </div>

                    <!-- Metadata Table -->
                    <table class="w-full border-collapse border border-slate-800 text-[10px]">
                        <tr>
                            <td class="p-1.5 border border-slate-800 font-bold bg-slate-100">School Name:</td>
                            <td class="p-1.5 border border-slate-800">EFILES NATIONAL HIGH SCHOOL</td>
                            <td class="p-1.5 border border-slate-800 font-bold bg-slate-100">School ID:</td>
                            <td class="p-1.5 border border-slate-800">301234</td>
                            <td class="p-1.5 border border-slate-800 font-bold bg-slate-100">District:</td>
                            <td class="p-1.5 border border-slate-800">District 1</td>
                        </tr>
                        <tr>
                            <td class="p-1.5 border border-slate-800 font-bold bg-slate-100">Grade & Section:</td>
                            <td class="p-1.5 border border-slate-800" x-text="selectedClass.grade"></td>
                            <td class="p-1.5 border border-slate-800 font-bold bg-slate-100">School Year:</td>
                            <td class="p-1.5 border border-slate-800" x-text="schoolYear"></td>
                            <td class="p-1.5 border border-slate-800 font-bold bg-slate-100">Month:</td>
                            <td class="p-1.5 border border-slate-800" x-text="selectedMonth + ' 2026'"></td>
                        </tr>
                    </table>

                    <!-- Official Grid Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse border border-slate-800 text-[9px]">
                            <thead>
                                <tr class="bg-slate-200 text-center font-bold">
                                    <th class="border border-slate-800 p-1 w-6">#</th>
                                    <th class="border border-slate-800 p-1 text-left w-40">LEARNER'S NAME</th>
                                    <template x-for="d in 18" :key="d">
                                        <th class="border border-slate-800 w-5 p-0.5" x-text="d"></th>
                                    </template>
                                    <th class="border border-slate-800 p-1 w-8">ABSENT</th>
                                    <th class="border border-slate-800 p-1 w-8">TARDY</th>
                                    <th class="border border-slate-800 p-1 text-left">REMARKS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="(s, idx) in students.slice(0, 15)" :key="s.id">
                                    <tr class="text-center">
                                        <td class="border border-slate-800 p-1 font-bold" x-text="idx + 1"></td>
                                        <td class="border border-slate-800 p-1 text-left font-bold" x-text="s.name"></td>
                                        <template x-for="d in 18" :key="d">
                                            <td class="border border-slate-800 p-0.5 font-bold" 
                                                :class="d === 3 && s.tardy > 0 ? 'text-amber-600 bg-amber-50' : (d === 4 && s.absent > 0 ? 'text-red-600 bg-red-50' : 'text-teal-700')"
                                                x-text="d === 3 && s.tardy > 0 ? 'T' : (d === 4 && s.absent > 0 ? 'A' : '✓')"></td>
                                        </template>
                                        <td class="border border-slate-800 p-1 font-bold text-red-600" x-text="s.absent"></td>
                                        <td class="border border-slate-800 p-1 font-bold text-amber-600" x-text="s.tardy"></td>
                                        <td class="border border-slate-800 p-1 text-left font-medium text-[8px]" x-text="s.nlsReason"></td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>

                    <!-- Signature Area -->
                    <div class="pt-6 grid grid-cols-3 gap-4 text-center text-[9px]">
                        <div>
                            <p class="mb-4 text-slate-500">Prepared by:</p>
                            <p class="font-extrabold underline">MARIA SANTOS</p>
                            <p class="text-slate-500">Class Adviser</p>
                        </div>
                        <div>
                            <p class="mb-4 text-slate-500">Checked by:</p>
                            <p class="font-extrabold underline">JUAN DELA CRUZ</p>
                            <p class="text-slate-500">Head Teacher III</p>
                        </div>
                        <div>
                            <p class="mb-4 text-slate-500">Noted by:</p>
                            <p class="font-extrabold underline">DR. ELENA RAMOS</p>
                            <p class="text-slate-500">School Principal II</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- ============================================================ -->
    <!-- MODAL 4: PERFECT ATTENDANCE CERTIFICATE PREVIEW MODAL -->
    <!-- ============================================================ -->
    <div x-show="certificateModalOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @keydown.escape.window="certificateModalOpen = false"
         class="fixed inset-0 z-50 overflow-y-auto bg-slate-900/70 backdrop-blur-xs flex items-center justify-center p-3 md:p-6"
         style="display: none;">
        
        <div @click.away="certificateModalOpen = false"
             class="bg-[#F4F9F8] dark:bg-[#111C38] w-full max-w-4xl max-h-[92vh] rounded-3xl shadow-2xl border border-[#E5ECEB] dark:border-slate-800 flex flex-col overflow-hidden relative">

            <!-- Modal Header -->
            <div class="px-6 py-4 bg-white dark:bg-[#172033] border-b border-[#E5ECEB] dark:border-slate-800 flex items-center justify-between shrink-0">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-[#EEE9FF] text-[#7C3AED] flex items-center justify-center font-bold text-lg">
                        📜
                    </div>
                    <div>
                        <h2 class="text-base md:text-lg font-extrabold text-[#172033] dark:text-white">Certificate of Recognition — Perfect Attendance</h2>
                        <p class="text-xs text-[#64748B] dark:text-slate-400" x-text="selectedClass.grade + ' • ' + selectedMonth + ' 2026'"></p>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <button @click="showToast('Downloading all 21 certificates (PDF)...')" class="px-3.5 py-1.5 bg-[#159A9C] hover:bg-[#0E7476] text-white text-xs font-bold rounded-xl shadow-2xs cursor-pointer">
                        Download All (PDF)
                    </button>
                    <button @click="showToast('Print command sent for 21 certificates.')" class="px-3 py-1.5 bg-slate-800 hover:bg-slate-900 text-white text-xs font-bold rounded-xl shadow-2xs cursor-pointer">
                        Print All
                    </button>
                    <button @click="certificateModalOpen = false" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-500 hover:text-slate-800 dark:hover:text-white flex items-center justify-center cursor-pointer">
                        ✕
                    </button>
                </div>
            </div>

            <!-- Student Navigator Bar -->
            <div class="px-6 py-2.5 bg-slate-100 dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 flex items-center justify-between text-xs shrink-0">
                <button @click="certStudentIndex = Math.max(0, certStudentIndex - 1)"
                        :disabled="certStudentIndex === 0"
                        :class="certStudentIndex === 0 ? 'opacity-40 cursor-not-allowed' : 'hover:bg-slate-200 cursor-pointer'"
                        class="px-3 py-1 bg-white dark:bg-slate-800 rounded-lg font-bold border border-slate-300 dark:border-slate-700">
                    ← Previous Student
                </button>

                <div class="flex items-center gap-2 font-bold text-[#172033] dark:text-white">
                    <span>Certificate</span>
                    <span class="px-2.5 py-0.5 bg-[#7C3AED] text-white rounded-md text-[11px]" x-text="(certStudentIndex + 1) + ' of ' + perfectStudents.length"></span>
                    <span class="text-slate-500 font-normal" x-text="'(' + (perfectStudents[certStudentIndex]?.name || '') + ')'"></span>
                </div>

                <button @click="certStudentIndex = Math.min(perfectStudents.length - 1, certStudentIndex + 1)"
                        :disabled="certStudentIndex === perfectStudents.length - 1"
                        :class="certStudentIndex === perfectStudents.length - 1 ? 'opacity-40 cursor-not-allowed' : 'hover:bg-slate-200 cursor-pointer'"
                        class="px-3 py-1 bg-white dark:bg-slate-800 rounded-lg font-bold border border-slate-300 dark:border-slate-700">
                    Next Student →
                </button>
            </div>

            <!-- Certificate Document Canvas -->
            <div class="p-6 md:p-10 overflow-auto flex-1 bg-[#F4F9F8] dark:bg-[#0B132B]">
                <div class="max-w-2xl mx-auto bg-amber-50/90 text-slate-900 border-8 border-double border-amber-600 p-8 md:p-12 shadow-2xl rounded-2xl text-center space-y-6 relative overflow-hidden font-serif">
                    
                    <!-- Decorative Corner Icons -->
                    <div class="text-xs tracking-widest text-amber-800 uppercase font-sans font-bold">
                        Republic of the Philippines • Department of Education
                    </div>
                    <div class="text-[11px] text-amber-700 font-sans font-semibold">
                        Region IV-A CALABARZON • Division of Cavite • Rizal Elementary School
                    </div>

                    <div class="py-4">
                        <span class="text-3xl block mb-2">📜</span>
                        <h1 class="text-2xl md:text-3xl font-black text-amber-900 tracking-wider uppercase">CERTIFICATE OF RECOGNITION</h1>
                        <p class="text-xs font-sans text-amber-700 uppercase tracking-widest mt-1">FOR PERFECT ATTENDANCE</p>
                    </div>

                    <div class="space-y-2 font-sans">
                        <p class="text-xs italic text-slate-600">This certificate is proudly awarded to</p>
                        <h2 class="text-2xl md:text-3xl font-extrabold text-[#172033] border-b-2 border-amber-600 inline-block px-8 py-1 uppercase tracking-wide"
                            x-text="perfectStudents[certStudentIndex]?.name"></h2>
                        <p class="text-xs text-slate-700 max-w-md mx-auto pt-3 leading-relaxed">
                            For outstanding dedication, punctuality, and achieving <strong>100% PERFECT ATTENDANCE</strong> during the month of <strong>June 2026</strong> in <strong>Grade 4 – Rizal</strong>.
                        </p>
                    </div>

                    <!-- Date & Signatures -->
                    <div class="pt-8 border-t border-amber-300 grid grid-cols-2 gap-8 text-center text-xs font-sans">
                        <div>
                            <p class="font-extrabold underline text-slate-900">MARIA SANTOS</p>
                            <p class="text-[10px] text-slate-500">Class Adviser</p>
                        </div>
                        <div>
                            <p class="font-extrabold underline text-slate-900">DR. ELENA RAMOS</p>
                            <p class="text-[10px] text-slate-500">School Principal II</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
