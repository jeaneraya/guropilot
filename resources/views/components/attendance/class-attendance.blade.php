@props([
    'selectedClass' => [
        'grade' => 'Grade 4 – Rizal',
        'subject' => 'Science',
        'students' => 35,
        'year' => 'SY 2026–2027'
    ]
])

<div x-data="{
        selectedDate: 'May 20, 2026 (Today)',
        searchQuery: '',
        filterMode: 'all', // 'all' or 'exceptions'
        actionsOpen: false,
        isModified: false,
        previousState: null,
        confirmMarkAllOpen: false,
        confirmUnsavedOpen: false,
        savedSuccessOpen: false,
        
        // 35 Mock Students Roster for Grade 4 - Rizal
        students: [
            { id: '2026-0001', name: 'Maria Cruz', lrn: '123456789012', status: 'Present', time: '7:45 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0002', name: 'Juan Santos', lrn: '123456789013', status: 'Present', time: '7:43 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0003', name: 'Ana Reyes', lrn: '123456789014', status: 'Present', time: '7:48 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0004', name: 'Pedro Garcia', lrn: '123456789015', status: 'Present', time: '7:50 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0005', name: 'Sophia Lopez', lrn: '123456789016', status: 'Present', time: '7:41 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0006', name: 'Gabriel Ramos', lrn: '123456789017', status: 'Present', time: '7:42 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0007', name: 'Patricia Diaz', lrn: '123456789018', status: 'Present', time: '7:46 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0008', name: 'Carlos Mendoza', lrn: '123456789019', status: 'Present', time: '7:40 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0009', name: 'Isabella Torres', lrn: '123456789020', status: 'Present', time: '7:44 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1517841905240-472988babdf9?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0010', name: 'Joshua Aquino', lrn: '123456789021', status: 'Present', time: '7:45 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0011', name: 'Chloe Delos Santos', lrn: '123456789022', status: 'Present', time: '7:49 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0012', name: 'Ethan Navarro', lrn: '123456789023', status: 'Present', time: '7:43 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0013', name: 'Jasmine Flores', lrn: '123456789024', status: 'Present', time: '7:47 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0014', name: 'Nathaniel Reyes', lrn: '123456789025', status: 'Present', time: '7:41 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0015', name: 'Samantha Castro', lrn: '123456789026', status: 'Present', time: '7:45 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1488426862026-3ee34a7d66df?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0016', name: 'Benjamin Villanueva', lrn: '123456789027', status: 'Present', time: '7:46 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0017', name: 'Camille Dela Cruz', lrn: '123456789028', status: 'Present', time: '7:44 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1517841905240-472988babdf9?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0018', name: 'Diego Pascual', lrn: '123456789029', status: 'Present', time: '7:42 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1501196354995-cbb51c65aaea?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0019', name: 'Andrea Soriano', lrn: '123456789030', status: 'Present', time: '7:48 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0020', name: 'Matthew Tan', lrn: '123456789031', status: 'Present', time: '7:45 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0021', name: 'Francesca Lim', lrn: '123456789032', status: 'Present', time: '7:43 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0022', name: 'Christian Ong', lrn: '123456789033', status: 'Present', time: '7:49 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0023', name: 'Stephanie Valenzuela', lrn: '123456789034', status: 'Present', time: '7:41 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0024', name: 'Kenneth Sy', lrn: '123456789035', status: 'Present', time: '7:47 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0025', name: 'Nicole Corpuz', lrn: '123456789036', status: 'Present', time: '7:44 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0026', name: 'Mark Bautista', lrn: '123456789037', status: 'Present', time: '7:46 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0027', name: 'Alyssa Roxas', lrn: '123456789038', status: 'Present', time: '7:40 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1488426862026-3ee34a7d66df?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0028', name: 'Daniel Rivera', lrn: '123456789039', status: 'Present', time: '7:45 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0029', name: 'Vanessa Ocampo', lrn: '123456789040', status: 'Present', time: '7:42 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0030', name: 'Timothy Santos', lrn: '123456789041', status: 'Present', time: '7:48 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0031', name: 'Erika Castillo', lrn: '123456789042', status: 'Present', time: '7:43 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0032', name: 'Justin Morales', lrn: '123456789043', status: 'Present', time: '7:49 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0033', name: 'Katrina Guzman', lrn: '123456789044', status: 'Present', time: '7:41 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0034', name: 'Aaron Tolentino', lrn: '123456789045', status: 'Present', time: '7:47 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0035', name: 'Bianca Alonzo', lrn: '123456789046', status: 'Present', time: '7:44 AM', remark: '', avatar: 'https://images.unsplash.com/photo-1517841905240-472988babdf9?w=100&auto=format&fit=crop&q=80' }
        ],

        // Dynamic Counters
        get totalCount() { return this.students.length; },
        get presentCount() { return this.students.filter(s => s.status === 'Present').length; },
        get absentCount() { return this.students.filter(s => s.status === 'Absent').length; },
        get lateCount() { return this.students.filter(s => s.status === 'Late').length; },
        get excusedCount() { return this.students.filter(s => s.status === 'Excused').length; },
        get exceptionCount() { return this.absentCount + this.lateCount + this.excusedCount; },

        // Filtered Students Array
        get visibleStudents() {
            return this.students.filter(s => {
                const query = this.searchQuery.toLowerCase().trim();
                const matchesSearch = query === '' || s.name.toLowerCase().includes(query) || s.lrn.includes(query) || s.id.toLowerCase().includes(query);
                const matchesFilter = this.filterMode === 'all' || (this.filterMode === 'exceptions' && s.status !== 'Present');
                return matchesSearch && matchesFilter;
            });
        },

        // Mark All Present Action with Bulk Confirmation Safety
        markAllPresent(force = false) {
            if (!force && this.exceptionCount > 0) {
                this.confirmMarkAllOpen = true;
                return;
            }
            this.confirmMarkAllOpen = false;
            // Save state for undo
            this.previousState = JSON.parse(JSON.stringify(this.students));
            this.students.forEach(s => {
                s.status = 'Present';
                if (!s.time) s.time = '7:45 AM';
            });
            this.isModified = true;
            this.$dispatch('toast-with-undo', { msg: '✓ All 35 students marked Present', type: 'undo' });
        },

        undoBulkAction() {
            if (this.previousState) {
                this.students = JSON.parse(JSON.stringify(this.previousState));
                this.previousState = null;
                this.$dispatch('toast', 'Bulk action undone.');
            }
        },

        setStatus(student, newStatus) {
            student.status = newStatus;
            if (newStatus === 'Absent') {
                student.time = '—';
            } else if (!student.time || student.time === '—') {
                student.time = '7:45 AM';
            }
            this.isModified = true;
        },

        handleBackClick() {
            if (this.isModified) {
                this.confirmUnsavedOpen = true;
            } else {
                this.$dispatch('back-to-classes');
            }
        },

        saveAttendance() {
            this.isModified = false;
            this.savedSuccessOpen = true;
        }
     }"
     @undo-last.window="undoBulkAction()"
     class="space-y-6">

    <!-- Header Controls & Class Title -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 shadow-2xs">
        <div>
            <!-- Back Button with Unsaved Guard -->
            <button @click="handleBackClick()" 
                    class="inline-flex items-center gap-1.5 text-xs font-bold text-[#159A9C] dark:text-teal-300 hover:underline mb-3 cursor-pointer">
                <span>← Back to Attendance</span>
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
                    <span x-text="totalCount + ' Students'"></span>
                </div>
                <span>•</span>
                <div class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-[#94A3B8]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span x-text="selectedDate"></span>
                </div>
            </div>
        </div>

        <!-- Top-Right Actions: Attendance History & Actions Dropdown -->
        <div class="flex flex-wrap items-center gap-3 shrink-0">
            <button @click="$dispatch('toast', 'Viewing Attendance History...')" 
                    class="px-4 py-2.5 bg-[#F4F9F8] dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 text-[#172033] dark:text-white font-extrabold text-xs rounded-2xl flex items-center gap-1.5 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors cursor-pointer">
                <span>🕒 Attendance History</span>
            </button>

            <!-- Actions Dropdown -->
            <div class="relative">
                <button @click="actionsOpen = !actionsOpen" 
                        @click.away="actionsOpen = false"
                        class="px-3.5 py-2.5 bg-[#F4F9F8] dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 text-[#172033] dark:text-white font-extrabold text-xs rounded-2xl flex items-center gap-1.5 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors cursor-pointer">
                    <span>Actions</span>
                    <span class="text-[10px]">▾</span>
                </button>

                <!-- Actions Menu Popover -->
                <div x-show="actionsOpen" 
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="absolute right-0 mt-2 w-48 bg-white dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 rounded-2xl shadow-xl z-20 py-2 text-xs font-semibold"
                     style="display: none;">
                    <button @click="actionsOpen = false; $dispatch('open-generate-sf2')" 
                            class="w-full text-left px-4 py-2 hover:bg-[#DDF6EF]/50 dark:hover:bg-slate-700 text-[#159A9C] dark:text-teal-300 flex items-center gap-2 cursor-pointer">
                        <span>📄 Generate SF2 Report</span>
                    </button>
                    <button @click="actionsOpen = false; $dispatch('toast', 'Exporting attendance to CSV...')" 
                            class="w-full text-left px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700 text-[#172033] dark:text-slate-200 flex items-center gap-2 cursor-pointer">
                        <span>📊 Export CSV / Excel</span>
                    </button>
                    <button @click="actionsOpen = false; window.print()" 
                            class="w-full text-left px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700 text-[#172033] dark:text-slate-200 flex items-center gap-2 cursor-pointer border-t border-slate-100 dark:border-slate-700">
                        <span>🖨️ Print Sheet</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- DYNAMIC TODAY'S SUMMARY STRIP CARD (Updates live via Alpine.js) -->
    <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 shadow-2xs">
        <div class="flex items-center justify-between mb-4 border-b border-[#E5ECEB]/60 dark:border-slate-800 pb-3">
            <h3 class="font-extrabold text-base text-[#172033] dark:text-white">Today's Attendance Summary</h3>
            <span class="text-xs font-semibold text-[#64748B] dark:text-slate-400" x-text="selectedDate"></span>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-5 gap-3 text-center">
            <!-- Total -->
            <div class="bg-[#F4F9F8] dark:bg-slate-800/80 p-3.5 rounded-2xl border border-[#E5ECEB] dark:border-slate-700">
                <span class="block text-2xl font-extrabold text-[#172033] dark:text-white" x-text="totalCount"></span>
                <span class="text-xs font-semibold text-[#64748B] dark:text-slate-400 block mt-0.5">Total</span>
            </div>

            <!-- Present -->
            <div class="bg-[#DCFCE7]/60 dark:bg-emerald-950/30 p-3.5 rounded-2xl border border-emerald-100 dark:border-emerald-900/50">
                <span class="block text-2xl font-extrabold text-[#16A34A] dark:text-emerald-400" x-text="presentCount"></span>
                <span class="text-xs font-bold text-[#16A34A] dark:text-emerald-400 block mt-0.5">✓ Present</span>
            </div>

            <!-- Absent -->
            <div class="bg-[#FDE9E7]/80 dark:bg-rose-950/30 p-3.5 rounded-2xl border border-rose-100 dark:border-rose-900/50">
                <span class="block text-2xl font-extrabold text-[#E11D48] dark:text-rose-400" x-text="absentCount"></span>
                <span class="text-xs font-bold text-[#E11D48] dark:text-rose-400 block mt-0.5">✕ Absent</span>
            </div>

            <!-- Late -->
            <div class="bg-[#FFF4D6]/80 dark:bg-amber-950/30 p-3.5 rounded-2xl border border-amber-100 dark:border-amber-900/50">
                <span class="block text-2xl font-extrabold text-[#D97706] dark:text-amber-400" x-text="lateCount"></span>
                <span class="text-xs font-bold text-[#D97706] dark:text-amber-400 block mt-0.5">◷ Late</span>
            </div>

            <!-- Excused -->
            <div class="bg-[#EAF2FF]/80 dark:bg-blue-950/30 p-3.5 rounded-2xl border border-blue-100 dark:border-blue-900/50 col-span-2 sm:col-span-1">
                <span class="block text-2xl font-extrabold text-[#2563EB] dark:text-blue-300" x-text="excusedCount"></span>
                <span class="text-xs font-bold text-[#2563EB] dark:text-blue-300 block mt-0.5">ℹ Excused</span>
            </div>
        </div>
    </div>

    <!-- PRIMARY BULK ACTION: ✓ MARK ALL PRESENT -->
    <div class="bg-gradient-to-r from-[#DDF6EF] to-[#EAF2FF] dark:from-[#159A9C]/25 dark:to-slate-800 border border-[#159A9C]/30 rounded-3xl p-6 shadow-2xs flex flex-col sm:flex-row items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-[#159A9C]"></span>
                <h3 class="font-extrabold text-base md:text-lg text-[#172033] dark:text-white">
                    Primary Workflow: Mark All Present
                </h3>
            </div>
            <p class="text-xs md:text-sm text-[#64748B] dark:text-slate-300 font-medium mt-1">
                <span x-show="exceptionCount === 0">Everyone is marked Present. Search for a student below only if you need to mark an exception.</span>
                <span x-show="exceptionCount > 0" x-text="'Current exceptions: ' + exceptionCount + ' student(s). Click button to reset everyone to Present.'"></span>
            </p>
        </div>

        <!-- Prominent Teal Primary Button -->
        <button @click="markAllPresent()" 
                class="px-6 py-3.5 bg-[#159A9C] hover:bg-[#0E7476] text-white font-extrabold text-sm rounded-2xl shadow-md transition-all flex items-center gap-2.5 shrink-0 cursor-pointer active:scale-95">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
            <span>✓ Mark All Present</span>
        </button>
    </div>

    <!-- PROMINENT SEARCH & FILTER CONTROLS -->
    <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 shadow-2xs space-y-6">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <!-- Search Field -->
            <div class="relative w-full sm:w-80">
                <svg class="w-4 h-4 text-[#159A9C] absolute left-4 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" 
                       x-model="searchQuery"
                       placeholder="Search student name or LRN..." 
                       class="w-full bg-[#F4F9F8] dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 pl-11 pr-4 py-3 rounded-2xl text-xs font-bold text-[#172033] dark:text-white placeholder-[#94A3B8] focus:outline-none focus:ring-2 focus:ring-[#159A9C]/40">
            </div>

            <!-- Filter Mode Pills: All Students vs Exceptions Only -->
            <div class="flex items-center bg-[#F4F9F8] dark:bg-slate-800 p-1 rounded-2xl border border-[#E5ECEB] dark:border-slate-700 shrink-0">
                <button @click="filterMode = 'all'" 
                        :class="filterMode === 'all' ? 'bg-white dark:bg-slate-700 text-[#172033] dark:text-white font-extrabold shadow-2xs' : 'text-[#64748B] dark:text-slate-400 font-semibold'"
                        class="px-4 py-2 rounded-xl text-xs transition-all cursor-pointer">
                    <span>All Students (35)</span>
                </button>
                <button @click="filterMode = 'exceptions'" 
                        :class="filterMode === 'exceptions' ? 'bg-[#FDE9E7] dark:bg-rose-950/50 text-[#E11D48] dark:text-rose-300 font-extrabold shadow-2xs' : 'text-[#64748B] dark:text-slate-400 font-semibold'"
                        class="px-4 py-2 rounded-xl text-xs transition-all flex items-center gap-1.5 cursor-pointer">
                    <span>Exceptions Only</span>
                    <span x-show="exceptionCount > 0" class="px-1.5 py-0.5 rounded-full bg-[#E11D48] text-white text-[10px] font-extrabold" x-text="exceptionCount"></span>
                </button>
            </div>
        </div>

        <!-- SEARCH RESULT QUICK EXCEPTION CARD (Triggered when searching a specific student) -->
        <div x-show="searchQuery.length > 0 && visibleStudents.length === 1" class="p-4 rounded-2xl bg-[#DDF6EF]/40 dark:bg-teal-950/30 border border-[#159A9C]/40 space-y-3">
            <template x-for="st in visibleStudents" :key="st.id">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-3">
                            <img :src="st.avatar" :alt="st.name" class="w-10 h-10 rounded-full object-cover border border-slate-300">
                            <div>
                                <h4 class="font-extrabold text-sm text-[#172033] dark:text-white" x-text="st.name"></h4>
                                <span class="text-xs text-[#64748B] dark:text-slate-400 font-medium" x-text="'ID: ' + st.id + ' • LRN: ' + st.lrn"></span>
                            </div>
                        </div>

                        <div>
                            <span class="text-xs font-extrabold px-3 py-1 rounded-full"
                                  :class="{
                                      'bg-[#DCFCE7] text-[#16A34A]': st.status === 'Present',
                                      'bg-[#FDE9E7] text-[#E11D48]': st.status === 'Absent',
                                      'bg-[#FFF4D6] text-[#D97706]': st.status === 'Late',
                                      'bg-[#EAF2FF] text-[#2563EB]': st.status === 'Excused'
                                  }"
                                  x-text="'Current: ' + st.status"></span>
                        </div>
                    </div>

                    <!-- 4 Large Comfort Buttons -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 text-xs font-bold">
                        <button @click="setStatus(st, 'Present')"
                                :class="st.status === 'Present' ? 'bg-[#16A34A] text-white shadow-xs' : 'bg-white dark:bg-slate-700 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-slate-600'"
                                class="py-2.5 px-3 rounded-xl transition-all flex items-center justify-center gap-1.5 cursor-pointer">
                            <span>✓</span> Present
                        </button>
                        <button @click="setStatus(st, 'Absent')"
                                :class="st.status === 'Absent' ? 'bg-[#E11D48] text-white shadow-xs' : 'bg-white dark:bg-slate-700 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-slate-600'"
                                class="py-2.5 px-3 rounded-xl transition-all flex items-center justify-center gap-1.5 cursor-pointer">
                            <span>✕</span> Absent
                        </button>
                        <button @click="setStatus(st, 'Late')"
                                :class="st.status === 'Late' ? 'bg-[#D97706] text-white shadow-xs' : 'bg-white dark:bg-slate-700 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-slate-600'"
                                class="py-2.5 px-3 rounded-xl transition-all flex items-center justify-center gap-1.5 cursor-pointer">
                            <span>◷</span> Late
                        </button>
                        <button @click="setStatus(st, 'Excused')"
                                :class="st.status === 'Excused' ? 'bg-[#2563EB] text-white shadow-xs' : 'bg-white dark:bg-slate-700 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-slate-600'"
                                class="py-2.5 px-3 rounded-xl transition-all flex items-center justify-center gap-1.5 cursor-pointer">
                            <span>ℹ</span> Excused
                        </button>
                    </div>
                </div>
            </template>
        </div>

        <!-- EXCEPTIONS ONLY EMPTY STATE (When exceptions filter is active but 0 exceptions exist) -->
        <div x-show="filterMode === 'exceptions' && visibleStudents.length === 0" class="p-8 text-center bg-[#DDF6EF]/30 dark:bg-slate-800/50 rounded-2xl border border-dashed border-[#159A9C]/30 my-4">
            <div class="w-12 h-12 rounded-2xl bg-[#DDF6EF] text-[#159A9C] flex items-center justify-center mx-auto mb-3">
                <span class="text-xl">✨</span>
            </div>
            <h4 class="font-extrabold text-sm text-[#172033] dark:text-white">No attendance exceptions</h4>
            <p class="text-xs text-[#64748B] dark:text-slate-400 font-medium mt-1">Everyone is marked Present. All 35 students are present.</p>
        </div>

        <!-- COMPACT ROSTER TABLE (35 Students List) -->
        <div class="overflow-x-auto rounded-2xl border border-[#E5ECEB] dark:border-slate-800">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#F4F9F8] dark:bg-slate-800/80 text-[#64748B] dark:text-slate-400 font-extrabold uppercase tracking-wider border-b border-[#E5ECEB] dark:border-slate-800">
                    <tr>
                        <th class="py-3 px-4">Student</th>
                        <th class="py-3 px-4">ID / LRN</th>
                        <th class="py-3 px-4">Current Status</th>
                        <th class="py-3 px-4 text-right">Change Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E5ECEB]/60 dark:divide-slate-800 font-semibold text-[#172033] dark:text-slate-200">
                    <template x-for="st in visibleStudents" :key="st.id">
                        <tr class="hover:bg-[#F4F9F8]/60 dark:hover:bg-slate-800/50 transition-colors">
                            <!-- Student Info -->
                            <td class="py-3.5 px-4">
                                <div class="flex items-center gap-3">
                                    <img :src="st.avatar" :alt="st.name" class="w-8 h-8 rounded-full object-cover border border-slate-200">
                                    <span class="font-extrabold text-xs text-[#172033] dark:text-white" x-text="st.name"></span>
                                </div>
                            </td>

                            <!-- ID / LRN -->
                            <td class="py-3.5 px-4 font-mono text-[11px] text-[#64748B] dark:text-slate-400" x-text="st.id + ' (' + st.lrn + ')'"></td>

                            <!-- Current Status Pill -->
                            <td class="py-3.5 px-4">
                                <span x-show="st.status === 'Present'" class="px-2.5 py-1 rounded-full bg-[#DCFCE7] dark:bg-emerald-950/40 text-[#16A34A] dark:text-emerald-400 font-extrabold text-[11px] inline-flex items-center gap-1">
                                    <span>✓</span> Present
                                </span>
                                <span x-show="st.status === 'Absent'" class="px-2.5 py-1 rounded-full bg-[#FDE9E7] dark:bg-rose-950/40 text-[#E11D48] dark:text-rose-400 font-extrabold text-[11px] inline-flex items-center gap-1">
                                    <span>✕</span> Absent
                                </span>
                                <span x-show="st.status === 'Late'" class="px-2.5 py-1 rounded-full bg-[#FFF4D6] dark:bg-amber-950/40 text-[#D97706] dark:text-amber-400 font-extrabold text-[11px] inline-flex items-center gap-1">
                                    <span>◷</span> Late
                                </span>
                                <span x-show="st.status === 'Excused'" class="px-2.5 py-1 rounded-full bg-[#EAF2FF] dark:bg-blue-950/40 text-[#2563EB] dark:text-blue-300 font-extrabold text-[11px] inline-flex items-center gap-1">
                                    <span>ℹ</span> Excused
                                </span>
                            </td>

                            <!-- Compact Status Action Selector -->
                            <td class="py-3.5 px-4 text-right">
                                <select :value="st.status" 
                                        @change="setStatus(st, $event.target.value)"
                                        class="bg-[#F4F9F8] dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 px-3 py-1.5 rounded-xl text-xs font-bold text-[#172033] dark:text-white focus:outline-none cursor-pointer">
                                    <option value="Present">✓ Present</option>
                                    <option value="Absent">✕ Absent</option>
                                    <option value="Late">◷ Late</option>
                                    <option value="Excused">ℹ Excused</option>
                                </select>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>

    </div>

    <!-- PRIMARY SAVE ATTENDANCE BOTTOM ACTION BAR -->
    <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-5 shadow-lg flex items-center justify-between gap-4 sticky bottom-4 z-30">
        <div class="flex items-center gap-3">
            <span class="w-3 h-3 rounded-full bg-[#159A9C]"></span>
            <span class="text-xs md:text-sm font-bold text-[#172033] dark:text-white">
                <span x-text="presentCount + ' Present'"></span> • <span x-text="exceptionCount + ' Exceptions'"></span>
            </span>
        </div>

        <div class="flex items-center gap-3">
            <button @click="handleBackClick()" class="px-4 py-2.5 text-xs font-bold text-[#64748B] dark:text-slate-400 hover:text-[#172033] dark:hover:text-white cursor-pointer">
                Cancel
            </button>
            <button @click="saveAttendance()" 
                    class="px-6 py-3 bg-[#159A9C] hover:bg-[#0E7476] text-white font-extrabold text-xs md:text-sm rounded-2xl shadow-md transition-all flex items-center gap-2 cursor-pointer active:scale-95">
                <span>Save Attendance</span>
                <span>→</span>
            </button>
        </div>
    </div>

    <!-- DIALOG: CONFIRM MARK ALL PRESENT SAFETY PROMPT -->
    <div x-show="confirmMarkAllOpen" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
        <div @click="confirmMarkAllOpen = false" class="fixed inset-0 bg-slate-900/50 backdrop-blur-xs"></div>
        <div class="flex min-h-full items-center justify-center p-4">
            <div class="relative w-full max-w-sm bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 shadow-2xl text-center">
                <span class="text-3xl mb-2 block">⚠️</span>
                <h3 class="font-extrabold text-base text-[#172033] dark:text-white">Mark everyone as Present?</h3>
                <p class="text-xs text-[#64748B] dark:text-slate-400 mt-2">This will reset your current exception status modifications for all 35 students.</p>
                <div class="mt-5 flex items-center justify-center gap-3">
                    <button @click="confirmMarkAllOpen = false" class="px-4 py-2 text-xs font-bold text-slate-500">Cancel</button>
                    <button @click="markAllPresent(true)" class="px-5 py-2 bg-[#159A9C] text-white font-extrabold text-xs rounded-xl shadow-xs">Yes, Mark All Present</button>
                </div>
            </div>
        </div>
    </div>

    <!-- DIALOG: UNSAVED CHANGES GUARD -->
    <div x-show="confirmUnsavedOpen" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
        <div @click="confirmUnsavedOpen = false" class="fixed inset-0 bg-slate-900/50 backdrop-blur-xs"></div>
        <div class="flex min-h-full items-center justify-center p-4">
            <div class="relative w-full max-w-sm bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 shadow-2xl text-center">
                <span class="text-3xl mb-2 block">⚠️</span>
                <h3 class="font-extrabold text-base text-[#172033] dark:text-white">Unsaved Attendance</h3>
                <p class="text-xs text-[#64748B] dark:text-slate-400 mt-2">You have attendance changes that haven't been saved.</p>
                <div class="mt-5 flex items-center justify-center gap-3">
                    <button @click="confirmUnsavedOpen = false" class="px-4 py-2 text-xs font-bold text-[#159A9C]">Continue Editing</button>
                    <button @click="confirmUnsavedOpen = false; isModified = false; $dispatch('back-to-classes')" class="px-4 py-2 bg-rose-500 text-white font-extrabold text-xs rounded-xl shadow-xs">Leave Without Saving</button>
                </div>
            </div>
        </div>
    </div>

    <!-- SUCCESS MODAL: ATTENDANCE SAVED -->
    <div x-show="savedSuccessOpen" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
        <div @click="savedSuccessOpen = false" class="fixed inset-0 bg-slate-900/50 backdrop-blur-xs"></div>
        <div class="flex min-h-full items-center justify-center p-4">
            <div class="relative w-full max-w-md bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 md:p-8 shadow-2xl text-center">
                <div class="w-16 h-16 rounded-3xl bg-[#DCFCE7] text-[#16A34A] flex items-center justify-center mx-auto mb-4 shadow-2xs">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>

                <h3 class="font-extrabold text-xl text-[#172033] dark:text-white leading-snug">
                    Attendance Saved!
                </h3>

                <p class="text-xs text-[#64748B] dark:text-slate-400 font-medium mt-2 leading-relaxed">
                    35 students recorded for <strong class="text-[#172033] dark:text-white" x-text="selectedClass.grade"></strong> on <span class="text-[#159A9C] font-bold" x-text="selectedDate"></span>.
                </p>

                <div class="bg-[#F4F9F8] dark:bg-slate-800 p-4 rounded-2xl border border-[#E5ECEB] dark:border-slate-700 my-5 text-xs font-bold text-[#64748B] dark:text-slate-300 flex justify-around">
                    <div>Present: <span class="text-[#16A34A] font-extrabold" x-text="presentCount"></span></div>
                    <div>Absent: <span class="text-[#E11D48] font-extrabold" x-text="absentCount"></span></div>
                    <div>Late: <span class="text-[#D97706] font-extrabold" x-text="lateCount"></span></div>
                </div>

                <button @click="savedSuccessOpen = false; $dispatch('back-to-classes')"
                        class="w-full py-3 bg-[#159A9C] hover:bg-[#0E7476] text-white font-extrabold text-xs rounded-2xl shadow-xs transition-all cursor-pointer">
                    Return to Classes
                </button>
            </div>
        </div>
    </div>

</div>
