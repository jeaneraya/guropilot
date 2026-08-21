<!-- ============================================================ -->
<!-- GUROPILOT — SF9 REPORT CARD SCHOOL RECORDS MODULE -->
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
            { grade: 'Grade 4 – Rizal', subject: 'Science', students: 32, year: 'School Year 2026–2027', iconBg: 'bg-[#DDF6EF] text-[#159A9C]' },
            { grade: 'Grade 5 – Bonifacio', subject: 'Mathematics', students: 28, year: 'School Year 2026–2027', iconBg: 'bg-[#EEE9FF] text-[#7C3AED]' },
            { grade: 'Grade 3 – Mabini', subject: 'English', students: 26, year: 'School Year 2026–2027', iconBg: 'bg-[#FDE9E7] text-[#E11D48]' },
            { grade: 'Grade 6 – Luna', subject: 'Araling Panlipunan', students: 30, year: 'School Year 2026–2027', iconBg: 'bg-[#FFF4D6] text-[#D97706]' }
        ],

        // School Year State
        syDropdownOpen: false,
        selectedSY: '2026–2027',
        schoolYears: ['2026–2027', '2025–2026', '2024–2025'],

        // Academic Term State
        selectedTerm: 'Term 1',
        terms: ['Term 1', 'Term 2', 'Term 3'],

        // Student Search & Filter State
        studentSearch: '',
        activeStatusFilter: 'all', // 'all', 'ready', 'review', 'incomplete'
        currentPage: 1,
        itemsPerPage: 8,

        // Expandable Performance Descriptors State
        descriptorsExpanded: false,

        // 32 Mock Students Dataset
        students: [
            { id: 1, name: 'Maria Cruz', lrn: '2026-0001', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 92, term1Avg: 91, term2Avg: 92, term3Avg: 93, finalGrade: 92, remarks: 'Passed' },
            { id: 2, name: 'Juan Santos', lrn: '2026-0002', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 88, term1Avg: 87, term2Avg: 88, term3Avg: 89, finalGrade: 88, remarks: 'Passed' },
            { id: 3, name: 'Ana Reyes', lrn: '2026-0003', grade: '4', section: 'Rizal', status: 'Needs Review', genAvg: 76, term1Avg: 75, term2Avg: 76, term3Avg: 77, finalGrade: 76, remarks: 'Passed' },
            { id: 4, name: 'Pedro Garcia', lrn: '2026-0004', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 94, term1Avg: 93, term2Avg: 94, term3Avg: 95, finalGrade: 94, remarks: 'Passed' },
            { id: 5, name: 'Sophia Lopez', lrn: '2026-0005', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 90, term1Avg: 89, term2Avg: 90, term3Avg: 91, finalGrade: 90, remarks: 'Passed' },
            { id: 6, name: 'Miguel Dela Cruz', lrn: '2026-0006', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 91, term1Avg: 90, term2Avg: 91, term3Avg: 92, finalGrade: 91, remarks: 'Passed' },
            { id: 7, name: 'Zoe Ramirez', lrn: '2026-0007', grade: '4', section: 'Rizal', status: 'Incomplete', genAvg: 72, term1Avg: 70, term2Avg: 72, term3Avg: 74, finalGrade: 72, remarks: 'Failed' },
            { id: 8, name: 'Kyle Villanueva', lrn: '2026-0008', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 89, term1Avg: 88, term2Avg: 89, term3Avg: 90, finalGrade: 89, remarks: 'Passed' },
            { id: 9, name: 'Gabriel Mendoza', lrn: '2026-0009', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 93, term1Avg: 92, term2Avg: 93, term3Avg: 94, finalGrade: 93, remarks: 'Passed' },
            { id: 10, name: 'Angelica Flores', lrn: '2026-0010', grade: '4', section: 'Rizal', status: 'Needs Review', genAvg: 82, term1Avg: 80, term2Avg: 82, term3Avg: 84, finalGrade: 82, remarks: 'Passed' },
            { id: 11, name: 'Christian Ramos', lrn: '2026-0011', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 95, term1Avg: 94, term2Avg: 95, term3Avg: 96, finalGrade: 95, remarks: 'Passed' },
            { id: 12, name: 'Samantha Bautista', lrn: '2026-0012', grade: '4', section: 'Rizal', status: 'Needs Review', genAvg: 78, term1Avg: 77, term2Avg: 78, term3Avg: 79, finalGrade: 78, remarks: 'Passed' },
            { id: 13, name: 'Joshua Aquino', lrn: '2026-0013', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 87, term1Avg: 86, term2Avg: 87, term3Avg: 88, finalGrade: 87, remarks: 'Passed' },
            { id: 14, name: 'Beatriz Navarro', lrn: '2026-0014', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 91, term1Avg: 90, term2Avg: 91, term3Avg: 92, finalGrade: 91, remarks: 'Passed' },
            { id: 15, name: 'Daniel Castillo', lrn: '2026-0015', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 85, term1Avg: 84, term2Avg: 85, term3Avg: 86, finalGrade: 85, remarks: 'Passed' },
            { id: 16, name: 'Patricia Alcantara', lrn: '2026-0016', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 92, term1Avg: 91, term2Avg: 92, term3Avg: 93, finalGrade: 92, remarks: 'Passed' },
            { id: 17, name: 'Ethan Morales', lrn: '2026-0017', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 89, term1Avg: 88, term2Avg: 89, term3Avg: 90, finalGrade: 89, remarks: 'Passed' },
            { id: 18, name: 'Chloe Corpuz', lrn: '2026-0018', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 93, term1Avg: 92, term2Avg: 93, term3Avg: 94, finalGrade: 93, remarks: 'Passed' },
            { id: 19, name: 'Liam Soriano', lrn: '2026-0019', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 86, term1Avg: 85, term2Avg: 86, term3Avg: 87, finalGrade: 86, remarks: 'Passed' },
            { id: 20, name: 'Alyssa Dimaculangan', lrn: '2026-0020', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 94, term1Avg: 93, term2Avg: 94, term3Avg: 95, finalGrade: 94, remarks: 'Passed' },
            { id: 21, name: 'Jacob Valenzuela', lrn: '2026-0021', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 88, term1Avg: 87, term2Avg: 88, term3Avg: 89, finalGrade: 88, remarks: 'Passed' },
            { id: 22, name: 'Hannah Tolentino', lrn: '2026-0022', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 92, term1Avg: 91, term2Avg: 92, term3Avg: 93, finalGrade: 92, remarks: 'Passed' },
            { id: 23, name: 'Lucas Evangeline', lrn: '2026-0023', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 90, term1Avg: 89, term2Avg: 90, term3Avg: 91, finalGrade: 90, remarks: 'Passed' },
            { id: 24, name: 'Jasmine Gonzaga', lrn: '2026-0024', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 89, term1Avg: 88, term2Avg: 89, term3Avg: 90, finalGrade: 89, remarks: 'Passed' },
            { id: 25, name: 'Noah Mercado', lrn: '2026-0025', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 93, term1Avg: 92, term2Avg: 93, term3Avg: 94, finalGrade: 93, remarks: 'Passed' },
            { id: 26, name: 'Kylie Pascual', lrn: '2026-0026', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 87, term1Avg: 86, term2Avg: 87, term3Avg: 88, finalGrade: 87, remarks: 'Passed' },
            { id: 27, name: 'Nathaniel Ocampo', lrn: '2026-0027', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 95, term1Avg: 94, term2Avg: 95, term3Avg: 96, finalGrade: 95, remarks: 'Passed' },
            { id: 28, name: 'Andrea Roxas', lrn: '2026-0028', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 90, term1Avg: 89, term2Avg: 90, term3Avg: 91, finalGrade: 90, remarks: 'Passed' },
            { id: 29, name: 'James Santiago', lrn: '2026-0029', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 92, term1Avg: 91, term2Avg: 92, term3Avg: 93, finalGrade: 92, remarks: 'Passed' },
            { id: 30, name: 'Camilla Salvador', lrn: '2026-0030', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 91, term1Avg: 90, term2Avg: 91, term3Avg: 92, finalGrade: 91, remarks: 'Passed' },
            { id: 31, name: 'Dominic Agoncillo', lrn: '2026-0031', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 88, term1Avg: 87, term2Avg: 88, term3Avg: 89, finalGrade: 88, remarks: 'Passed' },
            { id: 32, name: 'Erika Palma', lrn: '2026-0032', grade: '4', section: 'Rizal', status: 'Ready', genAvg: 94, term1Avg: 93, term2Avg: 94, term3Avg: 95, finalGrade: 94, remarks: 'Passed' }
        ],

        // Selected Learner State (Default: Maria Cruz)
        selectedLearner: null,

        // Official SF9 Report Modal State
        sf9ReportModalOpen: false,

        // Toast Feedback System
        toastMessage: '',
        toastVisible: false,
        showToast(msg) {
            this.toastMessage = msg;
            this.toastVisible = true;
            setTimeout(() => { this.toastVisible = false; }, 3200);
        },

        init() {
            // Default selected learner is Maria Cruz
            this.selectedLearner = this.students[0];
        },

        get filteredStudents() {
            return this.students.filter(s => {
                const matchesSearch = !this.studentSearch.trim() || 
                    s.name.toLowerCase().includes(this.studentSearch.toLowerCase()) || 
                    s.lrn.includes(this.studentSearch);
                let matchesStatus = true;
                if (this.activeStatusFilter === 'ready') matchesStatus = s.status === 'Ready';
                else if (this.activeStatusFilter === 'review') matchesStatus = s.status === 'Needs Review';
                else if (this.activeStatusFilter === 'incomplete') matchesStatus = s.status === 'Incomplete';
                return matchesSearch && matchesStatus;
            });
        },

        get paginatedStudents() {
            const start = (this.currentPage - 1) * this.itemsPerPage;
            return this.filteredStudents.slice(start, start + this.itemsPerPage);
        },

        // View Mode State: 'all' (All Students) vs 'individual' (Individual Student)
        viewMode: 'all',

        // Certificate Modal State
        certificateModalOpen: false,
        certStudentIndex: 0,
        get honorStudents() {
            return this.students.filter(s => s.genAvg >= 90);
        },

        // Editable State for Grades & Remarks
        isEditingGrades: false,
        isEditingRemarks: false,

        subjectGrades: [
            { key: 'filipino', name: 'Filipino', t1: 90, t2: 92, t3: 91, isSub: false },
            { key: 'english', name: 'English', t1: 92, t2: 93, t3: 94, isSub: false },
            { key: 'math', name: 'Mathematics', t1: 89, t2: 91, t3: 92, isSub: false },
            { key: 'science', name: 'Science', t1: 90, t2: 92, t3: 93, isSub: false },
            { key: 'ap', name: 'Araling Panlipunan (AP)', t1: 91, t2: 90, t3: 92, isSub: false },
            { key: 'gmrc', name: 'GMRC / Values Education', t1: 93, t2: 94, t3: 95, isSub: false },
            { key: 'epp', name: 'EPP / TLE', t1: 89, t2: 90, t3: 91, isSub: false },
            { key: 'mapeh', name: 'MAPEH', t1: 92, t2: 93, t3: 94, isSub: false },
            { key: 'music', name: 'Music and Arts', t1: 92, t2: 93, t3: 94, isSub: true },
            { key: 'pe', name: 'Physical Education and Health', t1: 92, t2: 93, t3: 94, isSub: true }
        ],

        learnerRemarks: {
            'Term 1': 'Demonstrated consistent progress in reading comprehension and group activities.',
            'Term 2': 'Continues to show excellence in Science experiments and collaborative projects.',
            'Term 3': 'Has demonstrated outstanding academic dedication and leadership.'
        },

        get term1GenAvg() {
            const mainSubjs = this.subjectGrades.filter(s => !s.isSub);
            const sum = mainSubjs.reduce((acc, s) => acc + (parseFloat(s.t1) || 0), 0);
            return Math.round(sum / mainSubjs.length);
        },
        get term2GenAvg() {
            const mainSubjs = this.subjectGrades.filter(s => !s.isSub);
            const sum = mainSubjs.reduce((acc, s) => acc + (parseFloat(s.t2) || 0), 0);
            return Math.round(sum / mainSubjs.length);
        },
        get term3GenAvg() {
            const mainSubjs = this.subjectGrades.filter(s => !s.isSub);
            const sum = mainSubjs.reduce((acc, s) => acc + (parseFloat(s.t3) || 0), 0);
            return Math.round(sum / mainSubjs.length);
        },
        get overallGenAvg() {
            return Math.round((this.term1GenAvg + this.term2GenAvg + this.term3GenAvg) / 3);
        },

        saveGrades() {
            this.isEditingGrades = false;
            if (this.selectedLearner) {
                this.selectedLearner.genAvg = this.overallGenAvg;
                this.selectedLearner.finalGrade = this.overallGenAvg;
                this.selectedLearner.term1Avg = this.term1GenAvg;
                this.selectedLearner.term2Avg = this.term2GenAvg;
                this.selectedLearner.term3Avg = this.term3GenAvg;
            }
            this.showToast('Successfully saved grade changes for ' + this.selectedTerm + '!');
        },
        cancelEditGrades() {
            this.isEditingGrades = false;
        },

        saveRemarks() {
            this.isEditingRemarks = false;
            this.showToast('Successfully saved teacher\'s remarks for ' + this.selectedTerm + '!');
        },
        cancelEditRemarks() {
            this.isEditingRemarks = false;
        },

        selectLearner(student) {
            this.selectedLearner = student;
            this.viewMode = 'individual';
            this.showToast('Opened performance report for ' + student.name);
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
                    SF9 Report Card
                </h1>
                <span class="px-3 py-1 rounded-full bg-[#EEE9FF] dark:bg-purple-950/40 text-[#7C3AED] dark:text-purple-300 text-xs font-extrabold">
                    DepEd Form 9
                </span>
            </div>
            
            <p class="text-xs md:text-sm text-[#64748B] dark:text-slate-400 font-medium mt-1">
                Learner's Performance Report
            </p>
            <p class="text-[11px] font-semibold text-[#159A9C] dark:text-teal-400 mt-1 flex items-center gap-1">
                <span>💡</span>
                <span>Your learners' grades and attendance are already organized. GuroPilot prepares the Learner's Performance Report for you.</span>
            </p>
        </div>

        <!-- Top Right Actions -->
        <div class="flex items-center gap-2.5 flex-wrap shrink-0">
            <button @click="showToast('Performance records refreshed from Grade Center.')" 
                    class="px-3.5 py-2.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:bg-slate-50 text-[#172033] dark:text-slate-200 font-bold text-xs rounded-2xl shadow-2xs transition-all flex items-center gap-2 cursor-pointer active:scale-95">
                <svg class="w-4 h-4 text-[#64748B]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                <span>Refresh Data</span>
            </button>

            <!-- Export SF9 Button -->
            <button @click="showToast('Export will be available when SF9 generation is connected.')" 
                    class="px-3.5 py-2.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:bg-slate-50 text-[#172033] dark:text-slate-200 font-bold text-xs rounded-2xl shadow-2xs transition-all flex items-center gap-2 cursor-pointer active:scale-95">
                <span>📥</span>
                <span>Export SF9</span>
            </button>

            <!-- Create Certificate Button -->
            <button @click="certificateModalOpen = true; certStudentIndex = 0;" 
                    class="px-3.5 py-2.5 bg-gradient-to-r from-[#EEE9FF] to-[#DDF6EF] hover:from-purple-200 hover:to-teal-200 dark:from-purple-950/60 dark:to-teal-950/60 border border-purple-300 dark:border-purple-800 text-[#7C3AED] dark:text-purple-300 font-extrabold text-xs rounded-2xl shadow-2xs transition-all flex items-center gap-2 cursor-pointer active:scale-95">
                <span>📜</span>
                <span>Create Certificate</span>
            </button>

            <!-- View SF9 Report Button -->
            <button @click="sf9ReportModalOpen = true" 
                    :disabled="!selectedLearner"
                    :class="selectedLearner ? 'bg-[#159A9C] hover:bg-[#0E7476] text-white shadow-2xs' : 'bg-slate-200 text-slate-400 cursor-not-allowed'"
                    class="px-5 py-2.5 font-extrabold text-xs rounded-2xl transition-all flex items-center gap-2 cursor-pointer active:scale-95">
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                <span>View SF9 Report</span>
            </button>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- CONTROLS BAR: CLASS SELECTOR | SCHOOL YEAR SELECTOR -->
    <!-- ============================================================ -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-4 shadow-2xs">
        
        <!-- 1. Class & Section Dropdown (Left) -->
        <div class="relative min-w-[260px]">
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
                        👥
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

        <!-- 2. Academic Term Selector Tabs (Center) -->
        <div>
            <label class="text-[10px] font-black uppercase tracking-wider text-[#64748B] dark:text-slate-400 block mb-1">
                Academic Term
            </label>
            <div class="flex items-center gap-1.5 bg-[#F4F9F8] dark:bg-slate-900 p-1.5 rounded-2xl border border-[#E5ECEB] dark:border-slate-800">
                <template x-for="t in terms" :key="t">
                    <button @click="selectedTerm = t; showToast('Switched to ' + t + ' view.');"
                            :class="selectedTerm === t 
                                ? 'bg-[#159A9C] text-white shadow-2xs font-extrabold' 
                                : 'text-[#64748B] dark:text-slate-400 hover:text-[#172033] dark:hover:text-white font-bold'"
                            class="px-4 py-1.5 rounded-xl text-xs transition-all cursor-pointer">
                        <span x-text="t"></span>
                    </button>
                </template>
            </div>
        </div>

        <!-- 3. School Year Selector Dropdown (Right) -->
        <div class="relative min-w-[200px]">
            <label class="text-[10px] font-black uppercase tracking-wider text-[#64748B] dark:text-slate-400 block mb-1">
                School Year
            </label>
            <button @click="syDropdownOpen = !syDropdownOpen"
                    @click.away="syDropdownOpen = false"
                    class="w-full px-3.5 py-2.5 bg-white dark:bg-slate-900 border-2 border-[#E5ECEB] dark:border-slate-800 hover:border-[#159A9C]/60 rounded-2xl flex items-center justify-between gap-2 transition-all cursor-pointer text-left shadow-2xs group">
                <div class="flex items-center gap-2">
                    <span class="text-base">📅</span>
                    <span class="font-extrabold text-xs text-[#172033] dark:text-white" x-text="selectedSY"></span>
                </div>
                <svg class="w-3.5 h-3.5 text-[#159A9C] transition-transform duration-200" 
                     :class="syDropdownOpen ? 'rotate-180' : ''" 
                     fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <!-- SY Options Dropdown -->
            <div x-show="syDropdownOpen"
                 x-transition:enter="transition ease-out duration-150"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="absolute right-0 mt-2 w-48 bg-white dark:bg-[#172033] border-2 border-[#E5ECEB] dark:border-slate-800 rounded-2xl shadow-xl z-30 p-2 space-y-1"
                 style="display: none;">
                <template x-for="sy in schoolYears" :key="sy">
                    <button @click="selectedSY = sy; syDropdownOpen = false;"
                            :class="selectedSY === sy ? 'bg-[#DDF6EF] text-[#159A9C] font-extrabold' : 'hover:bg-slate-50 dark:hover:bg-slate-800 text-[#172033] dark:text-slate-200 font-semibold'"
                            class="w-full text-left px-3 py-2 rounded-xl text-xs flex items-center justify-between transition-colors cursor-pointer">
                        <span x-text="sy"></span>
                        <span x-show="selectedSY === sy">✓</span>
                    </button>
                </template>
            </div>
        </div>

    </div>    <!-- ============================================================ -->
    <!-- VIEW MODE TAB MENU: ALL STUDENTS vs INDIVIDUAL STUDENTS -->
    <!-- ============================================================ -->
    <div class="bg-white dark:bg-[#111C38] border-2 border-[#E5ECEB] dark:border-slate-800 p-2.5 rounded-3xl shadow-2xs flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        
        <div class="flex items-center gap-2 bg-[#F4F9F8] dark:bg-slate-900 p-1.5 rounded-2xl border border-[#E5ECEB] dark:border-slate-800 w-full sm:w-auto">
            
            <!-- All Students Tab Button -->
            <button @click="viewMode = 'all'"
                    :class="viewMode === 'all' 
                        ? 'bg-[#159A9C] text-white shadow-md font-extrabold border-2 border-[#159A9C]' 
                        : 'bg-white dark:bg-slate-800 text-[#64748B] hover:text-[#172033] dark:hover:text-white font-bold border-2 border-[#E5ECEB] dark:border-slate-700 hover:border-[#159A9C]/40 shadow-2xs'"
                    class="flex-1 sm:flex-initial px-5 py-2 rounded-xl text-xs flex items-center justify-center gap-2.5 transition-all cursor-pointer group active:scale-95">
                <span class="w-6 h-6 rounded-lg flex items-center justify-center text-xs shrink-0"
                      :class="viewMode === 'all' ? 'bg-white/20 text-white' : 'bg-[#DDF6EF] text-[#159A9C]'">👥</span>
                <span>All Students</span>
                <span class="px-2 py-0.5 rounded-full text-[10px] font-black"
                      :class="viewMode === 'all' ? 'bg-white/20 text-white' : 'bg-slate-100 dark:bg-slate-700 text-[#159A9C]'">32</span>
            </button>

            <!-- Individual Students Tab Button -->
            <button @click="viewMode = 'individual'"
                    :class="viewMode === 'individual' 
                        ? 'bg-[#159A9C] text-white shadow-md font-extrabold border-2 border-[#159A9C]' 
                        : 'bg-white dark:bg-slate-800 text-[#64748B] hover:text-[#172033] dark:hover:text-white font-bold border-2 border-[#E5ECEB] dark:border-slate-700 hover:border-[#159A9C]/40 shadow-2xs'"
                    class="flex-1 sm:flex-initial px-5 py-2 rounded-xl text-xs flex items-center justify-center gap-2.5 transition-all cursor-pointer group active:scale-95">
                <span class="w-6 h-6 rounded-lg flex items-center justify-center text-xs shrink-0"
                      :class="viewMode === 'individual' ? 'bg-white/20 text-white' : 'bg-[#EEE9FF] text-[#7C3AED]'">👤</span>
                <span>Individual Students</span>
                <template x-if="selectedLearner">
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-black max-w-[120px] truncate"
                          :class="viewMode === 'individual' ? 'bg-white/20 text-white' : 'bg-[#DDF6EF] text-[#159A9C]'"
                          x-text="selectedLearner ? selectedLearner.name : ''"></span>
                </template>
            </button>

        </div>

        <div class="text-xs text-[#64748B] dark:text-slate-400 font-semibold px-2 flex items-center gap-1.5">
            <span>💡</span>
            <span x-text="viewMode === 'all' ? 'Showing class-wide performance table for all 32 learners.' : 'Showing detailed report card for ' + (selectedLearner ? selectedLearner.name : 'selected learner') + '.'"></span>
        </div>

    </div>

    <!-- ============================================================ -->
    <!-- VIEW MODE 1: ALL STUDENTS OVERVIEW WORKSPACE -->
    <!-- ============================================================ -->
    <div x-show="viewMode === 'all'" class="space-y-6">
        
        <!-- LEARNER SELECTION SECTION (COMPACT TABLE WITH FILTERS) -->
        <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-5 shadow-2xs space-y-4">
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div>
                    <h2 class="font-extrabold text-base text-[#172033] dark:text-white">Learners</h2>
                    <p class="text-xs text-[#64748B] dark:text-slate-400">Select a learner to view their performance report.</p>
                </div>

                <!-- Search Input Field -->
                <div class="relative w-full sm:w-64">
                    <svg class="w-3.5 h-3.5 text-[#94A3B8] absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" 
                           x-model="studentSearch"
                           placeholder="Search student..." 
                           class="w-full bg-[#F4F9F8] dark:bg-slate-900 border border-[#E5ECEB] dark:border-slate-800 pl-9 pr-3 py-1.5 rounded-xl text-xs font-semibold text-[#172033] dark:text-white placeholder-[#94A3B8] focus:outline-none focus:ring-2 focus:ring-[#159A9C]/40">
                </div>
            </div>

            <!-- Filter Pills -->
            <div class="flex items-center gap-1.5 flex-wrap">
                <button @click="activeStatusFilter = 'all'; currentPage = 1"
                        :class="activeStatusFilter === 'all' ? 'bg-[#172033] text-white font-extrabold shadow-2xs' : 'bg-[#F4F9F8] text-[#64748B] hover:bg-slate-200 dark:bg-slate-900 dark:text-slate-400 font-semibold'"
                        class="px-3.5 py-1.5 rounded-xl text-xs transition-all cursor-pointer">
                    All (32)
                </button>
                <button @click="activeStatusFilter = 'ready'; currentPage = 1"
                        :class="activeStatusFilter === 'ready' ? 'bg-[#159A9C] text-white font-extrabold shadow-2xs' : 'bg-[#DDF6EF]/60 text-[#159A9C] hover:bg-[#DDF6EF] font-semibold'"
                        class="px-3.5 py-1.5 rounded-xl text-xs transition-all cursor-pointer">
                    Ready (28)
                </button>
                <button @click="activeStatusFilter = 'review'; currentPage = 1"
                        :class="activeStatusFilter === 'review' ? 'bg-[#D97706] text-white font-extrabold shadow-2xs' : 'bg-[#FFF4D6] text-[#D97706] hover:bg-[#FFF4D6]/80 font-semibold'"
                        class="px-3.5 py-1.5 rounded-xl text-xs transition-all cursor-pointer">
                    Needs Review (3)
                </button>
                <button @click="activeStatusFilter = 'incomplete'; currentPage = 1"
                        :class="activeStatusFilter === 'incomplete' ? 'bg-[#E11D48] text-white font-extrabold shadow-2xs' : 'bg-[#FDE9E7] text-[#E11D48] hover:bg-[#FDE9E7]/80 font-semibold'"
                        class="px-3.5 py-1.5 rounded-xl text-xs transition-all cursor-pointer">
                    Incomplete (1)
                </button>
            </div>

            <!-- Learner Table -->
            <div class="overflow-x-auto rounded-2xl border border-[#E5ECEB] dark:border-slate-800">
                <table class="w-full text-left text-xs">
                    <thead class="bg-[#F4F9F8] dark:bg-slate-900 text-[#64748B] dark:text-slate-400 font-extrabold border-b border-[#E5ECEB] dark:border-slate-800">
                        <tr>
                            <th class="p-3 text-center w-10">#</th>
                            <th class="p-3">Learner's Name</th>
                            <th class="p-3">LRN</th>
                            <th class="p-3 text-center">Grade & Section</th>
                            <th class="p-3 text-center">Status</th>
                            <th class="p-3 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#E5ECEB] dark:divide-slate-800 font-semibold text-[#172033] dark:text-slate-200">
                        <template x-for="(s, index) in paginatedStudents" :key="s.id">
                            <tr :class="selectedLearner && selectedLearner.id === s.id ? 'bg-[#DDF6EF]/40 dark:bg-teal-950/20' : 'hover:bg-slate-50 dark:hover:bg-slate-900/60'"
                                class="transition-colors cursor-pointer"
                                @click="selectLearner(s)">
                                <td class="p-3 text-center text-[#94A3B8] font-bold" x-text="(currentPage - 1) * itemsPerPage + index + 1"></td>
                                <td class="p-3">
                                    <div class="flex items-center gap-2">
                                        <span class="font-extrabold text-[#172033] dark:text-white" x-text="s.name"></span>
                                        <span x-show="selectedLearner && selectedLearner.id === s.id" class="px-2 py-0.5 bg-[#159A9C] text-white text-[9px] font-black rounded-full">Selected</span>
                                    </div>
                                </td>
                                <td class="p-3 text-[#64748B] dark:text-slate-400 font-mono text-[11px]" x-text="s.lrn"></td>
                                <td class="p-3 text-center" x-text="'Grade ' + s.grade + ' – ' + s.section"></td>
                                <td class="p-3 text-center">
                                    <span x-show="s.status === 'Ready'" class="px-2.5 py-0.5 bg-[#DDF6EF] text-[#159A9C] text-[10px] font-extrabold rounded-full inline-flex items-center gap-1">
                                        ✓ Ready
                                    </span>
                                    <span x-show="s.status === 'Needs Review'" class="px-2.5 py-0.5 bg-[#FFF4D6] text-[#D97706] text-[10px] font-extrabold rounded-full inline-flex items-center gap-1">
                                        ⚠️ Needs Review
                                    </span>
                                    <span x-show="s.status === 'Incomplete'" class="px-2.5 py-0.5 bg-[#FDE9E7] text-[#E11D48] text-[10px] font-extrabold rounded-full inline-flex items-center gap-1">
                                        ○ Incomplete
                                    </span>
                                </td>
                                <td class="p-3 text-right">
                                    <button @click.stop="selectLearner(s)"
                                            class="px-3 py-1 bg-[#159A9C] text-white font-bold hover:bg-[#0E7476] rounded-lg transition-all text-[11px] cursor-pointer shadow-2xs">
                                        View Report →
                                    </button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>

            <!-- Pagination Bar -->
            <div class="flex items-center justify-between pt-1 text-xs font-semibold text-[#64748B] dark:text-slate-400">
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
    </div>

    <!-- ============================================================ -->
    <!-- VIEW MODE 2: INDIVIDUAL STUDENT PERFORMANCE WORKSPACE -->
    <!-- ============================================================ -->
    <div x-show="viewMode === 'individual'" class="space-y-6">
        <template x-if="selectedLearner">
            <div class="space-y-6">
                
                <!-- Learner Banner Header -->
            <div class="bg-gradient-to-r from-white via-[#F4F9F8] to-[#DDF6EF]/40 dark:from-[#111C38] dark:to-slate-900 border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 shadow-2xs flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-2xl bg-[#159A9C] text-white font-black text-xl flex items-center justify-center shadow-md shrink-0">
                        <span x-text="selectedLearner.name.split(' ').map(n => n[0]).join('')"></span>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h2 class="text-xl md:text-2xl font-extrabold text-[#172033] dark:text-white" x-text="selectedLearner.name"></h2>
                            <span class="px-2.5 py-0.5 bg-[#DDF6EF] text-[#159A9C] text-xs font-black rounded-full" x-text="'LRN: ' + selectedLearner.lrn"></span>
                        </div>
                        <p class="text-xs text-[#64748B] dark:text-slate-400 mt-1 font-medium" 
                           x-text="'Grade ' + selectedLearner.grade + ' – ' + selectedLearner.section + ' • School Year ' + selectedSY"></p>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <button @click="sf9ReportModalOpen = true" 
                            class="px-5 py-2.5 bg-[#159A9C] hover:bg-[#0E7476] text-white text-xs font-extrabold rounded-2xl shadow-2xs transition-all flex items-center gap-2 cursor-pointer active:scale-95">
                        <span>📜</span>
                        <span>View SF9 Report Card</span>
                    </button>
                </div>
            </div>

            <!-- 4 Compact Summary Metric Cards -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="p-4 bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl shadow-2xs flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-[#EEE9FF] dark:bg-purple-950/40 text-[#7C3AED] dark:text-purple-300 flex items-center justify-center font-bold text-lg shrink-0">
                        🏆
                    </div>
                    <div>
                        <span class="text-xl font-extrabold text-[#172033] dark:text-white tracking-tight" x-text="selectedLearner.genAvg"></span>
                        <p class="text-[11px] font-semibold text-[#64748B] dark:text-slate-400">General Average</p>
                    </div>
                </div>

                <div class="p-4 bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl shadow-2xs flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-[#DDF6EF] dark:bg-teal-950/40 text-[#159A9C] dark:text-teal-300 flex items-center justify-center font-bold text-lg shrink-0">
                        ⭐
                    </div>
                    <div>
                        <span class="text-xl font-extrabold text-[#172033] dark:text-white tracking-tight" x-text="selectedLearner.finalGrade"></span>
                        <p class="text-[11px] font-semibold text-[#64748B] dark:text-slate-400">Final Grade</p>
                    </div>
                </div>

                <div class="p-4 bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl shadow-2xs flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-[#EAF2FF] dark:bg-blue-950/40 text-[#2563EB] dark:text-blue-300 flex items-center justify-center font-bold text-lg shrink-0">
                        📚
                    </div>
                    <div>
                        <span class="text-xl font-extrabold text-[#172033] dark:text-white tracking-tight">8</span>
                        <p class="text-[11px] font-semibold text-[#64748B] dark:text-slate-400">Learning Areas</p>
                    </div>
                </div>

                <div class="p-4 bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl shadow-2xs flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-[#FFF4D6] dark:bg-amber-950/40 text-[#D97706] dark:text-amber-300 flex items-center justify-center font-bold text-lg shrink-0">
                        📋
                    </div>
                    <div>
                        <span class="text-base font-extrabold text-emerald-600 dark:text-emerald-400 block" x-text="selectedLearner.status"></span>
                        <p class="text-[11px] font-semibold text-[#64748B] dark:text-slate-400">Report Status</p>
                    </div>
                </div>
            </div>

            <!-- Workspace Layout: Left 8 Cols (Grade Table & Attendance) + Right 4 Cols (Actions & Status) -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                
                <!-- LEFT COLUMN — PERFORMANCE & ATTENDANCE (8 COLS) -->
                <div class="lg:col-span-8 space-y-6">
                    
                    <!-- 1. Learning Progress and Achievement Table -->
                    <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-5 shadow-2xs space-y-4">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                            <div>
                                <h3 class="font-extrabold text-base text-[#172033] dark:text-white flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-[#159A9C]"></span>
                                    Learning Progress and Achievement
                                </h3>
                                <div class="flex items-center gap-2 mt-0.5">
                                    <span class="text-xs text-[#64748B] font-semibold">Terms 1–3 Evaluation</span>
                                    <span x-show="isEditingGrades" class="px-2 py-0.5 bg-amber-100 text-amber-800 dark:bg-amber-950/60 dark:text-amber-300 text-[10px] font-bold rounded-full flex items-center gap-1">
                                        🔒 Scope: <span x-text="selectedTerm"></span> (Other Terms Locked)
                                    </span>
                                </div>
                            </div>

                            <!-- Edit / Save Action Buttons -->
                            <div class="flex items-center gap-2 shrink-0">
                                <template x-if="!isEditingGrades">
                                    <button @click="isEditingGrades = true" 
                                            class="px-3.5 py-1.5 bg-[#F4F9F8] dark:bg-slate-800 hover:bg-[#DDF6EF] border border-[#E5ECEB] text-[#159A9C] dark:text-teal-300 font-extrabold text-xs rounded-xl shadow-2xs transition-all flex items-center gap-1.5 cursor-pointer">
                                        <span>✏️</span>
                                        <span>Edit Grades</span>
                                    </button>
                                </template>

                                <template x-if="isEditingGrades">
                                    <div class="flex items-center gap-2">
                                        <button @click="cancelEditGrades()" 
                                                class="px-3 py-1.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 text-slate-600 dark:text-slate-300 font-bold text-xs rounded-xl transition-all cursor-pointer">
                                            Cancel
                                        </button>
                                        <button @click="saveGrades()" 
                                                class="px-4 py-1.5 bg-[#159A9C] hover:bg-[#0E7476] text-white font-extrabold text-xs rounded-xl shadow-2xs transition-all flex items-center gap-1.5 cursor-pointer">
                                            <span>💾</span>
                                            <span>Save Grades</span>
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="overflow-x-auto rounded-2xl border border-[#E5ECEB] dark:border-slate-800">
                            <table class="w-full text-left text-xs">
                                <thead class="bg-[#F4F9F8] dark:bg-slate-900 text-[#64748B] dark:text-slate-400 font-extrabold border-b border-[#E5ECEB] dark:border-slate-800">
                                    <tr>
                                        <th class="p-3">Learning Area</th>
                                        <th class="p-3 text-center" :class="selectedTerm === 'Term 1' ? 'bg-[#DDF6EF]/60 text-[#159A9C]' : ''">
                                            Term 1
                                            <span x-show="isEditingGrades && selectedTerm !== 'Term 1'" class="text-[9px] block text-slate-400 font-normal">🔒 Locked</span>
                                        </th>
                                        <th class="p-3 text-center" :class="selectedTerm === 'Term 2' ? 'bg-[#DDF6EF]/60 text-[#159A9C]' : ''">
                                            Term 2
                                            <span x-show="isEditingGrades && selectedTerm !== 'Term 2'" class="text-[9px] block text-slate-400 font-normal">🔒 Locked</span>
                                        </th>
                                        <th class="p-3 text-center" :class="selectedTerm === 'Term 3' ? 'bg-[#DDF6EF]/60 text-[#159A9C]' : ''">
                                            Term 3
                                            <span x-show="isEditingGrades && selectedTerm !== 'Term 3'" class="text-[9px] block text-slate-400 font-normal">🔒 Locked</span>
                                        </th>
                                        <th class="p-3 text-center">Final Grade</th>
                                        <th class="p-3 text-center">Remarks</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-[#E5ECEB] dark:divide-slate-800 font-semibold text-[#172033] dark:text-slate-200">
                                    <template x-for="subj in subjectGrades" :key="subj.key">
                                        <tr :class="subj.isSub ? 'bg-slate-50/70 dark:bg-slate-900/40 text-[11px]' : ''">
                                            <td class="p-3 font-bold" :class="subj.isSub ? 'pl-6 italic text-[#64748B]' : ''" x-text="subj.name"></td>

                                            <!-- Term 1 Grade Cell -->
                                            <td class="p-2 text-center" :class="selectedTerm === 'Term 1' ? 'bg-[#DDF6EF]/20' : ''">
                                                <template x-if="!isEditingGrades">
                                                    <span x-text="subj.t1"></span>
                                                </template>
                                                <template x-if="isEditingGrades">
                                                    <input type="number" 
                                                           min="50" max="100"
                                                           x-model.number="subj.t1"
                                                           :disabled="selectedTerm !== 'Term 1'"
                                                           :class="selectedTerm !== 'Term 1' ? 'opacity-40 bg-slate-100 dark:bg-slate-800 cursor-not-allowed border-slate-200' : 'bg-white dark:bg-slate-900 border-[#159A9C] font-black focus:ring-2 focus:ring-[#159A9C]/40'"
                                                           class="w-14 px-1.5 py-1 border rounded-lg text-center font-bold text-xs transition-all">
                                                </template>
                                            </td>

                                            <!-- Term 2 Grade Cell -->
                                            <td class="p-2 text-center" :class="selectedTerm === 'Term 2' ? 'bg-[#DDF6EF]/20' : ''">
                                                <template x-if="!isEditingGrades">
                                                    <span x-text="subj.t2"></span>
                                                </template>
                                                <template x-if="isEditingGrades">
                                                    <input type="number" 
                                                           min="50" max="100"
                                                           x-model.number="subj.t2"
                                                           :disabled="selectedTerm !== 'Term 2'"
                                                           :class="selectedTerm !== 'Term 2' ? 'opacity-40 bg-slate-100 dark:bg-slate-800 cursor-not-allowed border-slate-200' : 'bg-white dark:bg-slate-900 border-[#159A9C] font-black focus:ring-2 focus:ring-[#159A9C]/40'"
                                                           class="w-14 px-1.5 py-1 border rounded-lg text-center font-bold text-xs transition-all">
                                                </template>
                                            </td>

                                            <!-- Term 3 Grade Cell -->
                                            <td class="p-2 text-center" :class="selectedTerm === 'Term 3' ? 'bg-[#DDF6EF]/20' : ''">
                                                <template x-if="!isEditingGrades">
                                                    <span x-text="subj.t3"></span>
                                                </template>
                                                <template x-if="isEditingGrades">
                                                    <input type="number" 
                                                           min="50" max="100"
                                                           x-model.number="subj.t3"
                                                           :disabled="selectedTerm !== 'Term 3'"
                                                           :class="selectedTerm !== 'Term 3' ? 'opacity-40 bg-slate-100 dark:bg-slate-800 cursor-not-allowed border-slate-200' : 'bg-white dark:bg-slate-900 border-[#159A9C] font-black focus:ring-2 focus:ring-[#159A9C]/40'"
                                                           class="w-14 px-1.5 py-1 border rounded-lg text-center font-bold text-xs transition-all">
                                                </template>
                                            </td>

                                            <!-- Final Grade Cell (Calculated) -->
                                            <td class="p-3 text-center font-extrabold text-[#159A9C]">
                                                <span x-text="Math.round((subj.t1 + subj.t2 + subj.t3) / 3)"></span>
                                            </td>

                                            <!-- Remarks Cell -->
                                            <td class="p-3 text-center">
                                                <template x-if="!subj.isSub">
                                                    <span :class="Math.round((subj.t1 + subj.t2 + subj.t3) / 3) >= 75 ? 'bg-[#DDF6EF] text-[#159A9C]' : 'bg-[#FDE9E7] text-[#E11D48]'"
                                                          class="px-2 py-0.5 text-[10px] font-black rounded-full"
                                                          x-text="Math.round((subj.t1 + subj.t2 + subj.t3) / 3) >= 75 ? 'Passed' : 'Failed'"></span>
                                                </template>
                                                <template x-if="subj.isSub">
                                                    <span class="text-slate-400">-</span>
                                                </template>
                                            </td>
                                        </tr>
                                    </template>

                                    <!-- General Average Row -->
                                    <tr class="bg-[#DDF6EF]/60 dark:bg-teal-950/40 font-black text-[#172033] dark:text-white border-t-2 border-[#159A9C]">
                                        <td class="p-3 font-black text-[#159A9C]">General Average</td>
                                        <td class="p-3 text-center" x-text="term1GenAvg"></td>
                                        <td class="p-3 text-center" x-text="term2GenAvg"></td>
                                        <td class="p-3 text-center" x-text="term3GenAvg"></td>
                                        <td class="p-3 text-center text-lg text-[#159A9C]" x-text="overallGenAvg"></td>
                                        <td class="p-3 text-center">
                                            <span :class="overallGenAvg >= 75 ? 'bg-[#159A9C] text-white' : 'bg-rose-600 text-white'"
                                                  class="px-2.5 py-1 text-xs font-black rounded-full"
                                                  x-text="overallGenAvg >= 75 ? 'Passed' : 'Failed'"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- 2. Expandable Performance Descriptors Drawer -->
                    <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-4 shadow-2xs">
                        <button @click="descriptorsExpanded = !descriptorsExpanded" 
                                class="w-full flex items-center justify-between text-xs font-extrabold text-[#172033] dark:text-white cursor-pointer">
                            <span class="flex items-center gap-2">
                                <span>📊</span>
                                <span>Performance Descriptors Scale</span>
                            </span>
                            <span class="text-[#159A9C] font-bold" x-text="descriptorsExpanded ? 'Hide Scale ▲' : 'View Scale ▼'"></span>
                        </button>

                        <div x-show="descriptorsExpanded" x-collapse class="pt-3 space-y-2 text-xs">
                            <div class="grid grid-cols-3 gap-2 p-2 bg-[#F4F9F8] dark:bg-slate-900 rounded-xl font-semibold">
                                <div><strong class="text-[#159A9C]">90–100:</strong> Advancing (Passed)</div>
                                <div><strong class="text-blue-600">80–89:</strong> Benchmarking (Passed)</div>
                                <div><strong class="text-amber-600">75–79:</strong> Connecting (Passed)</div>
                            </div>
                            <div class="grid grid-cols-2 gap-2 p-2 bg-[#F4F9F8] dark:bg-slate-900 rounded-xl font-semibold">
                                <div><strong class="text-orange-600">65–74:</strong> Developing (Failed)</div>
                                <div><strong class="text-rose-600">0–64:</strong> Emerging (Failed)</div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- RIGHT COLUMN — TEACHER'S REMARKS & ATTENDANCE SUMMARY (4 COLS) -->
                <div class="lg:col-span-4 space-y-5">
                    
                    <!-- 1. Teacher's Remarks Card -->
                    <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-5 shadow-2xs space-y-4">
                        <div class="flex items-center justify-between">
                            <h3 class="font-extrabold text-sm text-[#172033] dark:text-white flex items-center gap-2">
                                <span>💬</span>
                                <span>Teacher's Remarks</span>
                            </h3>

                            <!-- Edit / Save Remarks Buttons -->
                            <div class="flex items-center gap-2 shrink-0">
                                <template x-if="!isEditingRemarks">
                                    <button @click="isEditingRemarks = true" 
                                            class="px-3 py-1 bg-[#F4F9F8] dark:bg-slate-800 hover:bg-[#DDF6EF] border border-[#E5ECEB] text-[#159A9C] dark:text-teal-300 font-extrabold text-xs rounded-xl shadow-2xs transition-all flex items-center gap-1.5 cursor-pointer">
                                        <span>✏️</span>
                                        <span>Edit Remarks</span>
                                    </button>
                                </template>

                                <template x-if="isEditingRemarks">
                                    <div class="flex items-center gap-2">
                                        <button @click="cancelEditRemarks()" 
                                                class="px-3 py-1 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 text-slate-600 dark:text-slate-300 font-bold text-xs rounded-xl transition-all cursor-pointer">
                                            Cancel
                                        </button>
                                        <button @click="saveRemarks()" 
                                                class="px-3.5 py-1 bg-[#159A9C] hover:bg-[#0E7476] text-white font-extrabold text-xs rounded-xl shadow-2xs transition-all flex items-center gap-1.5 cursor-pointer">
                                            <span>💾</span>
                                            <span>Save</span>
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <!-- Remarks List / Inputs -->
                        <div class="space-y-3 text-xs">
                            <template x-for="t in ['Term 1', 'Term 2', 'Term 3']" :key="t">
                                <div class="p-3 rounded-2xl border transition-all"
                                     :class="selectedTerm === t 
                                        ? 'bg-[#F4F9F8] dark:bg-slate-900 border-[#159A9C]/40' 
                                        : (isEditingRemarks ? 'bg-slate-100/70 dark:bg-slate-900/30 border-slate-200 dark:border-slate-800 opacity-60' : 'bg-[#F4F9F8] dark:bg-slate-900 border-slate-100 dark:border-slate-800')">
                                    
                                    <div class="flex items-center justify-between mb-1.5">
                                        <span class="font-black text-[#159A9C] text-[10px] uppercase tracking-wider" x-text="t"></span>
                                        
                                        <!-- Lock badge if other term is selected -->
                                        <span x-show="isEditingRemarks && selectedTerm !== t" class="text-[9px] font-bold text-slate-400 bg-slate-200 dark:bg-slate-800 px-2 py-0.5 rounded-full">
                                            🔒 Locked (<span x-text="selectedTerm"></span> Scope)
                                        </span>
                                        <span x-show="selectedTerm === t" class="text-[9px] font-bold text-[#159A9C] bg-[#DDF6EF] px-2 py-0.5 rounded-full">
                                            Active Scope
                                        </span>
                                    </div>

                                    <!-- Read Mode -->
                                    <template x-if="!isEditingRemarks">
                                        <p class="text-slate-700 dark:text-slate-300 font-medium leading-relaxed"
                                           x-text="'&quot;' + (learnerRemarks[t] || '') + '&quot;'"></p>
                                    </template>

                                    <!-- Edit Mode -->
                                    <template x-if="isEditingRemarks">
                                        <div>
                                            <textarea rows="2"
                                                      x-model="learnerRemarks[t]"
                                                      :disabled="selectedTerm !== t"
                                                      :class="selectedTerm !== t ? 'opacity-50 bg-slate-100 dark:bg-slate-800 cursor-not-allowed border-slate-200' : 'bg-white dark:bg-slate-900 border-[#159A9C] focus:ring-2 focus:ring-[#159A9C]/40'"
                                                      class="w-full p-2.5 border rounded-xl text-xs font-medium text-[#172033] dark:text-white placeholder-[#94A3B8] focus:outline-none transition-all"
                                                      placeholder="Enter remarks for this term..."></textarea>
                                        </div>
                                    </template>

                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- 2. Attendance Summary Card -->
                    <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-5 shadow-2xs space-y-3">
                        <h3 class="font-extrabold text-sm text-[#172033] dark:text-white flex items-center gap-2">
                            <span>📅</span>
                            <span>Attendance Summary</span>
                        </h3>

                        <div class="overflow-x-auto rounded-xl border border-[#E5ECEB] dark:border-slate-800 text-xs">
                            <table class="w-full text-left">
                                <thead class="bg-[#F4F9F8] dark:bg-slate-900 text-[#64748B] dark:text-slate-400 font-bold">
                                    <tr>
                                        <th class="p-2.5">Month</th>
                                        <th class="p-2.5 text-center">School Days</th>
                                        <th class="p-2.5 text-center">Present</th>
                                        <th class="p-2.5 text-center">Absent</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 dark:divide-slate-800 font-semibold text-[#172033] dark:text-slate-200">
                                    <tr>
                                        <td class="p-2.5">June</td>
                                        <td class="p-2.5 text-center">18</td>
                                        <td class="p-2.5 text-center text-[#159A9C] font-bold">18</td>
                                        <td class="p-2.5 text-center text-slate-400">0</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2.5">July</td>
                                        <td class="p-2.5 text-center">20</td>
                                        <td class="p-2.5 text-center text-[#159A9C] font-bold">19</td>
                                        <td class="p-2.5 text-center text-rose-500 font-bold">1</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2.5">August</td>
                                        <td class="p-2.5 text-center">21</td>
                                        <td class="p-2.5 text-center text-[#159A9C] font-bold">20</td>
                                        <td class="p-2.5 text-center text-rose-500 font-bold">1</td>
                                    </tr>
                                    <tr class="bg-[#DDF6EF]/40 dark:bg-teal-950/20 font-bold text-[#172033] dark:text-white">
                                        <td class="p-2.5 font-black text-[#159A9C]">Total</td>
                                        <td class="p-2.5 text-center">59</td>
                                        <td class="p-2.5 text-center text-[#159A9C] font-black">57</td>
                                        <td class="p-2.5 text-center text-rose-600 font-black">2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </template>
</div>

    <!-- ============================================================ -->
    <!-- OFFICIAL SF9 REPORT PREVIEW MODAL -->
    <!-- ============================================================ -->
    <div x-show="sf9ReportModalOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @keydown.escape.window="sf9ReportModalOpen = false"
         class="fixed inset-0 z-50 overflow-y-auto bg-slate-900/70 backdrop-blur-xs flex items-center justify-center p-3 md:p-6"
         style="display: none;">
        
        <div @click.away="sf9ReportModalOpen = false"
             class="bg-[#F4F9F8] dark:bg-[#111C38] w-full max-w-5xl max-h-[92vh] rounded-3xl shadow-2xl border border-[#E5ECEB] dark:border-slate-800 flex flex-col overflow-hidden relative">

            <!-- Modal Header -->
            <div class="px-6 py-4 bg-white dark:bg-[#172033] border-b border-[#E5ECEB] dark:border-slate-800 flex items-center justify-between shrink-0">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-[#EEE9FF] text-[#7C3AED] flex items-center justify-center font-bold text-lg">
                        📜
                    </div>
                    <div>
                        <h2 class="text-base md:text-lg font-extrabold text-[#172033] dark:text-white">Learner's Performance Report (School Form 9)</h2>
                        <p class="text-xs text-[#64748B] dark:text-slate-400" x-text="(selectedLearner ? selectedLearner.name : '') + ' • Grade ' + selectedClass.grade + ' • SY ' + selectedSY"></p>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <button @click="showToast('Export will be available when SF9 generation is connected.')" class="px-3.5 py-1.5 bg-[#159A9C] hover:bg-[#0E7476] text-white text-xs font-bold rounded-xl shadow-2xs">
                        Download PDF
                    </button>
                    <button @click="showToast('Export will be available when SF9 generation is connected.')" class="px-3 py-1.5 bg-slate-800 hover:bg-slate-900 text-white text-xs font-bold rounded-xl shadow-2xs">
                        Print
                    </button>
                    <button @click="sf9ReportModalOpen = false" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-500 hover:text-slate-800 dark:hover:text-white flex items-center justify-center cursor-pointer">
                        ✕
                    </button>
                </div>
            </div>

            <!-- Official Document Canvas -->
            <div class="p-6 md:p-10 overflow-auto flex-1 bg-[#F4F9F8] dark:bg-[#0B132B]">
                <div class="min-w-[800px] max-w-4xl mx-auto bg-white text-slate-900 border-2 border-slate-800 p-8 shadow-xl text-[10px] font-sans space-y-6">
                    
                    <!-- DepEd SF9 Header -->
                    <div class="text-center space-y-0.5 border-b-2 border-slate-900 pb-3">
                        <p class="uppercase font-bold tracking-widest text-[9px]">Republic of the Philippines • Department of Education</p>
                        <p class="text-[9px] font-semibold text-slate-600 uppercase">Region IV-A CALABARZON • Division of Cavite • District 1</p>
                        <h1 class="text-base font-black uppercase tracking-wider text-slate-900 mt-1">LEARNER'S PERFORMANCE REPORT (SF9)</h1>
                        <p class="text-[10px] font-bold text-slate-700" x-text="'School Year ' + selectedSY"></p>
                    </div>

                    <!-- Learner Metadata Grid -->
                    <table class="w-full border-collapse border border-slate-800 text-[10px]">
                        <tr>
                            <td class="p-1.5 border border-slate-800 font-bold bg-slate-100 w-24">Learner Name:</td>
                            <td class="p-1.5 border border-slate-800 font-black uppercase" x-text="selectedLearner ? selectedLearner.name : ''"></td>
                            <td class="p-1.5 border border-slate-800 font-bold bg-slate-100 w-16">LRN:</td>
                            <td class="p-1.5 border border-slate-800 font-mono font-bold" x-text="selectedLearner ? selectedLearner.lrn : ''"></td>
                        </tr>
                        <tr>
                            <td class="p-1.5 border border-slate-800 font-bold bg-slate-100">Grade & Section:</td>
                            <td class="p-1.5 border border-slate-800" x-text="selectedClass.grade"></td>
                            <td class="p-1.5 border border-slate-800 font-bold bg-slate-100">Age / Sex:</td>
                            <td class="p-1.5 border border-slate-800">10 / Female</td>
                        </tr>
                    </table>

                    <!-- Dear Parent Notice -->
                    <div class="p-3 bg-slate-50 border border-slate-300 rounded text-[9px] italic text-slate-700 leading-relaxed">
                        <strong>Dear Parent:</strong> This report card shows the ability and progress your child has made in the different learning areas as well as his/her core values. Should you desire further information, please feel free to consult with the class adviser.
                    </div>

                    <!-- Learning Progress Table -->
                    <div>
                        <h3 class="font-extrabold text-[11px] text-slate-900 mb-1 uppercase">Report on Learning Progress and Achievement</h3>
                        <table class="w-full border-collapse border border-slate-800 text-[9px]">
                            <thead>
                                <tr class="bg-slate-200 text-center font-bold">
                                    <th class="border border-slate-800 p-1 text-left w-56">LEARNING AREAS</th>
                                    <th class="border border-slate-800 p-1 w-14">TERM 1</th>
                                    <th class="border border-slate-800 p-1 w-14">TERM 2</th>
                                    <th class="border border-slate-800 p-1 w-14">TERM 3</th>
                                    <th class="border border-slate-800 p-1 w-20">FINAL GRADE</th>
                                    <th class="border border-slate-800 p-1 text-left">REMARKS</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-800">
                                <tr><td class="border border-slate-800 p-1 font-bold">Filipino</td><td class="border border-slate-800 p-1 text-center">90</td><td class="border border-slate-800 p-1 text-center">92</td><td class="border border-slate-800 p-1 text-center">91</td><td class="border border-slate-800 p-1 text-center font-bold">91</td><td class="border border-slate-800 p-1 font-bold text-teal-700">Passed</td></tr>
                                <tr><td class="border border-slate-800 p-1 font-bold">English</td><td class="border border-slate-800 p-1 text-center">92</td><td class="border border-slate-800 p-1 text-center">93</td><td class="border border-slate-800 p-1 text-center">94</td><td class="border border-slate-800 p-1 text-center font-bold">93</td><td class="border border-slate-800 p-1 font-bold text-teal-700">Passed</td></tr>
                                <tr><td class="border border-slate-800 p-1 font-bold">Mathematics</td><td class="border border-slate-800 p-1 text-center">89</td><td class="border border-slate-800 p-1 text-center">91</td><td class="border border-slate-800 p-1 text-center">92</td><td class="border border-slate-800 p-1 text-center font-bold">91</td><td class="border border-slate-800 p-1 font-bold text-teal-700">Passed</td></tr>
                                <tr><td class="border border-slate-800 p-1 font-bold">Science</td><td class="border border-slate-800 p-1 text-center">90</td><td class="border border-slate-800 p-1 text-center">92</td><td class="border border-slate-800 p-1 text-center">93</td><td class="border border-slate-800 p-1 text-center font-bold">92</td><td class="border border-slate-800 p-1 font-bold text-teal-700">Passed</td></tr>
                                <tr><td class="border border-slate-800 p-1 font-bold">Araling Panlipunan (AP)</td><td class="border border-slate-800 p-1 text-center">91</td><td class="border border-slate-800 p-1 text-center">90</td><td class="border border-slate-800 p-1 text-center">92</td><td class="border border-slate-800 p-1 text-center font-bold">91</td><td class="border border-slate-800 p-1 font-bold text-teal-700">Passed</td></tr>
                                <tr><td class="border border-slate-800 p-1 font-bold">GMRC / Values Education</td><td class="border border-slate-800 p-1 text-center">93</td><td class="border border-slate-800 p-1 text-center">94</td><td class="border border-slate-800 p-1 text-center">95</td><td class="border border-slate-800 p-1 text-center font-bold">94</td><td class="border border-slate-800 p-1 font-bold text-teal-700">Passed</td></tr>
                                <tr><td class="border border-slate-800 p-1 font-bold">EPP / TLE</td><td class="border border-slate-800 p-1 text-center">89</td><td class="border border-slate-800 p-1 text-center">90</td><td class="border border-slate-800 p-1 text-center">91</td><td class="border border-slate-800 p-1 text-center font-bold">90</td><td class="border border-slate-800 p-1 font-bold text-teal-700">Passed</td></tr>
                                <tr><td class="border border-slate-800 p-1 font-bold">MAPEH</td><td class="border border-slate-800 p-1 text-center">92</td><td class="border border-slate-800 p-1 text-center">93</td><td class="border border-slate-800 p-1 text-center">94</td><td class="border border-slate-800 p-1 text-center font-bold">93</td><td class="border border-slate-800 p-1 font-bold text-teal-700">Passed</td></tr>
                                <tr class="bg-slate-100 font-extrabold">
                                    <td class="border border-slate-800 p-1.5 uppercase text-slate-900">General Average</td>
                                    <td class="border border-slate-800 p-1.5 text-center" x-text="selectedLearner ? selectedLearner.term1Avg : ''"></td>
                                    <td class="border border-slate-800 p-1.5 text-center" x-text="selectedLearner ? selectedLearner.term2Avg : ''"></td>
                                    <td class="border border-slate-800 p-1.5 text-center" x-text="selectedLearner ? selectedLearner.term3Avg : ''"></td>
                                    <td class="border border-slate-800 p-1.5 text-center text-sm font-black text-teal-800" x-text="selectedLearner ? selectedLearner.genAvg : ''"></td>
                                    <td class="border border-slate-800 p-1.5 font-black text-teal-800" x-text="selectedLearner ? selectedLearner.remarks : ''"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Attendance Record Table -->
                    <div>
                        <h3 class="font-extrabold text-[11px] text-slate-900 mb-1 uppercase">Attendance Record</h3>
                        <table class="w-full border-collapse border border-slate-800 text-[9px] text-center">
                            <thead class="bg-slate-200 font-bold">
                                <tr>
                                    <th class="border border-slate-800 p-1 text-left">MONTH</th>
                                    <th class="border border-slate-800 p-1">JUNE</th>
                                    <th class="border border-slate-800 p-1">JULY</th>
                                    <th class="border border-slate-800 p-1">AUGUST</th>
                                    <th class="border border-slate-800 p-1 font-extrabold">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td class="border border-slate-800 p-1 text-left font-bold bg-slate-50">Days of School</td><td class="border border-slate-800 p-1">18</td><td class="border border-slate-800 p-1">20</td><td class="border border-slate-800 p-1">21</td><td class="border border-slate-800 p-1 font-bold">59</td></tr>
                                <tr><td class="border border-slate-800 p-1 text-left font-bold bg-slate-50">Days Present</td><td class="border border-slate-800 p-1 font-bold text-teal-700">18</td><td class="border border-slate-800 p-1 font-bold text-teal-700">19</td><td class="border border-slate-800 p-1 font-bold text-teal-700">20</td><td class="border border-slate-800 p-1 font-black text-teal-800">57</td></tr>
                                <tr><td class="border border-slate-800 p-1 text-left font-bold bg-slate-50">Days Absent</td><td class="border border-slate-800 p-1">0</td><td class="border border-slate-800 p-1 text-red-600 font-bold">1</td><td class="border border-slate-800 p-1 text-red-600 font-bold">1</td><td class="border border-slate-800 p-1 text-red-600 font-black">2</td></tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Certificate of Transfer & Signatures -->
                    <div class="border border-slate-800 p-4 rounded bg-slate-50 space-y-3">
                        <h4 class="font-extrabold text-[10px] text-slate-900 uppercase">Certificate of Transfer</h4>
                        <div class="grid grid-cols-2 gap-4 text-[9px]">
                            <div>
                                <p>Admitted to Grade: <strong>5</strong></p>
                                <p>Eligible for Admission to Grade: <strong>5</strong></p>
                            </div>
                            <div>
                                <p>Date: <strong>June 30, 2026</strong></p>
                                <p>Cancellation of Eligibility: <strong>N/A</strong></p>
                            </div>
                        </div>

                        <div class="pt-4 grid grid-cols-2 gap-8 text-center text-[9px]">
                            <div>
                                <p class="mb-3 text-slate-500">Class Adviser:</p>
                                <p class="font-extrabold underline">MARIA SANTOS</p>
                                <p class="text-slate-500">Master Teacher I</p>
                            </div>
                            <div>
                                <p class="mb-3 text-slate-500">School Head:</p>
                                <p class="font-extrabold underline">DR. ELENA RAMOS</p>
                                <p class="text-slate-500">School Principal II</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- ============================================================ -->
    <!-- CERTIFICATE PREVIEW MODAL -->
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
                        <h2 class="text-base md:text-lg font-extrabold text-[#172033] dark:text-white">Certificate of Recognition — Academic Excellence</h2>
                        <p class="text-xs text-[#64748B] dark:text-slate-400" x-text="selectedClass.grade + ' • SY ' + selectedSY"></p>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <button @click="showToast('Downloading certificate (PDF)...')" class="px-3.5 py-1.5 bg-[#159A9C] hover:bg-[#0E7476] text-white text-xs font-bold rounded-xl shadow-2xs cursor-pointer">
                        Download PDF
                    </button>
                    <button @click="showToast('Print command sent for certificate.')" class="px-3 py-1.5 bg-slate-800 hover:bg-slate-900 text-white text-xs font-bold rounded-xl shadow-2xs cursor-pointer">
                        Print
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
                    <span>Honor Student Certificate</span>
                    <span class="px-2.5 py-0.5 bg-[#7C3AED] text-white rounded-md text-[11px]" x-text="(certStudentIndex + 1) + ' of ' + honorStudents.length"></span>
                    <span class="text-slate-500 font-normal" x-text="'(' + (honorStudents[certStudentIndex]?.name || '') + ')'"></span>
                </div>

                <button @click="certStudentIndex = Math.min(honorStudents.length - 1, certStudentIndex + 1)"
                        :disabled="certStudentIndex === honorStudents.length - 1"
                        :class="certStudentIndex === honorStudents.length - 1 ? 'opacity-40 cursor-not-allowed' : 'hover:bg-slate-200 cursor-pointer'"
                        class="px-3 py-1 bg-white dark:bg-slate-800 rounded-lg font-bold border border-slate-300 dark:border-slate-700">
                    Next Student →
                </button>
            </div>

            <!-- Certificate Document Canvas -->
            <div class="p-6 md:p-10 overflow-auto flex-1 bg-[#F4F9F8] dark:bg-[#0B132B]">
                <div class="max-w-2xl mx-auto bg-purple-50/90 text-slate-900 border-8 border-double border-purple-700 p-8 md:p-12 shadow-2xl rounded-2xl text-center space-y-6 relative overflow-hidden font-serif">
                    
                    <div class="text-xs tracking-widest text-purple-900 uppercase font-sans font-bold">
                        Republic of the Philippines • Department of Education
                    </div>
                    <div class="text-[11px] text-purple-800 font-sans font-semibold">
                        Region IV-A CALABARZON • Division of Cavite • Rizal Elementary School
                    </div>

                    <div class="py-4">
                        <span class="text-3xl block mb-2">🏅</span>
                        <h1 class="text-2xl md:text-3xl font-black text-purple-950 tracking-wider uppercase">CERTIFICATE OF RECOGNITION</h1>
                        <p class="text-xs font-sans text-purple-800 uppercase tracking-widest mt-1">FOR ACADEMIC EXCELLENCE</p>
                    </div>

                    <div class="space-y-2 font-sans">
                        <p class="text-xs italic text-slate-600">This certificate is proudly awarded to</p>
                        <h2 class="text-2xl md:text-3xl font-extrabold text-[#172033] border-b-2 border-purple-600 inline-block px-8 py-1 uppercase tracking-wide"
                            x-text="honorStudents[certStudentIndex]?.name"></h2>
                        <p class="text-xs text-slate-700 max-w-md mx-auto pt-3 leading-relaxed">
                            For achieving outstanding academic performance and a General Average of <strong class="text-purple-800" x-text="honorStudents[certStudentIndex]?.genAvg"></strong> in <strong>Grade 4 – Rizal</strong> for School Year <strong>2026–2027</strong>.
                        </p>
                    </div>

                    <!-- Date & Signatures -->
                    <div class="pt-8 border-t border-purple-300 grid grid-cols-2 gap-8 text-center text-xs font-sans">
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
