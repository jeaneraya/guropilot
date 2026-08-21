@props([
    'selectedClass' => [
        'grade' => 'Grade 4 – Rizal',
        'subject' => 'Science',
        'students' => 32,
        'year' => 'SY 2026–2027'
    ]
])

<div x-data="{
        activeSubTab: 'grades', // 'grades', 'assessments', 'summary'
        selectedTerm: 'Term 1',
        searchQuery: '',
        statusFilter: 'all', // 'all', 'passing', 'needs_attention'
        
        // Mock 32 Students Grade Data
        studentsGrades: [
            { id: '2026-0001', name: 'Maria Cruz', ww: '18 / 20', pt: '27 / 30', qa: '27 / 30', final: 90, remark: 'Very Good', color: 'text-[#159A9C] dark:text-teal-300', bg: 'bg-[#DDF6EF] dark:bg-teal-950/40', avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0002', name: 'Juan Santos', ww: '16 / 20', pt: '25 / 30', qa: '26 / 30', final: 86, remark: 'Very Good', color: 'text-[#159A9C] dark:text-teal-300', bg: 'bg-[#DDF6EF] dark:bg-teal-950/40', avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0003', name: 'Ana Reyes', ww: '14 / 20', pt: '21 / 30', qa: '24 / 30', final: 78, remark: 'Good', color: 'text-[#D97706] dark:text-amber-400', bg: 'bg-[#FFF4D6] dark:bg-amber-950/40', avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0004', name: 'Pedro Garcia', ww: '17 / 20', pt: '28 / 30', qa: '28 / 30', final: 93, remark: 'Excellent', color: 'text-[#16A34A] dark:text-emerald-400', bg: 'bg-[#DCFCE7] dark:bg-emerald-950/40', avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0005', name: 'Sophia Lopez', ww: '19 / 20', pt: '29 / 30', qa: '29 / 30', final: 97, remark: 'Excellent', color: 'text-[#16A34A] dark:text-emerald-400', bg: 'bg-[#DCFCE7] dark:bg-emerald-950/40', avatar: 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0006', name: 'Carlos Mendoza', ww: '12 / 20', pt: '19 / 30', qa: '20 / 30', final: 72, remark: 'Needs Attention', color: 'text-[#E11D48] dark:text-rose-400', bg: 'bg-[#FDE9E7] dark:bg-rose-950/40', avatar: 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=100&auto=format&fit=crop&q=80' }
        ],

        get filteredGrades() {
            return this.studentsGrades.filter(s => {
                const query = this.searchQuery.toLowerCase();
                const matchesSearch = this.searchQuery === '' || s.name.toLowerCase().includes(query) || s.id.includes(query);
                let matchesStatus = true;
                if (this.statusFilter === 'passing') matchesStatus = s.final >= 75;
                if (this.statusFilter === 'needs_attention') matchesStatus = s.final < 75;
                return matchesSearch && matchesStatus;
            });
        }
     }"
     class="space-y-6">

    <!-- Header Controls & Class Title -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 shadow-2xs">
        <div>
            <!-- Back Button -->
            <button @click="$dispatch('back-to-classes')" 
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

        <!-- Top-Right Actions: Term Dropdown, Grade Settings & Export Grades -->
        <div class="flex flex-wrap items-center gap-3 shrink-0">
            <!-- Term Selector -->
            <select x-model="selectedTerm" class="bg-[#F4F9F8] dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 px-4 py-2.5 rounded-2xl text-xs font-bold text-[#172033] dark:text-white focus:outline-none cursor-pointer">
                <option value="Term 1">Term 1 ▾</option>
                <option value="Term 2">Term 2</option>
                <option value="Term 3">Term 3</option>
            </select>

            <!-- Grade Settings Button -->
            <button @click="$dispatch('open-grade-settings')" 
                    title="Grade Weights & Settings"
                    class="p-2.5 bg-[#F4F9F8] dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 text-[#172033] dark:text-white rounded-2xl hover:bg-slate-100 transition-colors cursor-pointer">
                <svg class="w-4 h-4 text-[#94A3B8]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                </svg>
            </button>

            <!-- Export Grades Button -->
            <button @click="$dispatch('toast', 'Exporting ' + selectedTerm + ' grade sheet...')" 
                    class="px-4 py-2.5 bg-white dark:bg-slate-800 hover:bg-[#DDF6EF]/60 border border-[#E5ECEB] dark:border-slate-700 text-[#159A9C] dark:text-teal-300 font-extrabold text-xs rounded-2xl transition-all flex items-center gap-1.5 cursor-pointer shadow-2xs">
                <span>⤓ Export Grades</span>
            </button>
        </div>
    </div>

    <!-- COMPACT GRADE SUMMARY CARDS STRIP -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-5 shadow-2xs flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
            </div>
            <div>
                <span class="block text-2xl font-extrabold text-[#172033] dark:text-white leading-none">88.6</span>
                <span class="text-xs font-bold text-[#159A9C] dark:text-teal-300 mt-1 block">Term Average (Very Good)</span>
            </div>
        </div>

        <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-5 shadow-2xs flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-[#DCFCE7] dark:bg-emerald-950/40 text-[#16A34A] dark:text-emerald-400 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div>
                <span class="block text-2xl font-extrabold text-[#172033] dark:text-white leading-none">29</span>
                <span class="text-xs font-semibold text-[#64748B] dark:text-slate-400 mt-1 block">Passing (90.6%)</span>
            </div>
        </div>

        <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-5 shadow-2xs flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-[#FDE9E7] dark:bg-rose-950/40 text-[#E11D48] dark:text-rose-400 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <div>
                <span class="block text-2xl font-extrabold text-[#172033] dark:text-white leading-none">3</span>
                <span class="text-xs font-semibold text-[#E11D48] dark:text-rose-400 mt-1 block">Needs Attention (9.4%)</span>
            </div>
        </div>

        <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-5 shadow-2xs flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-[#EEE9FF] dark:bg-purple-950/40 text-[#7C3AED] dark:text-purple-300 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
            </div>
            <div>
                <span class="block text-2xl font-extrabold text-[#172033] dark:text-white leading-none">6</span>
                <span class="text-xs font-semibold text-[#64748B] dark:text-slate-400 mt-1 block" x-text="'Assessments (' + selectedTerm + ')'"></span>
            </div>
        </div>
    </div>

    <!-- SUB-NAVIGATION TABS (Grades, Assessments, Grade Summary) -->
    <div class="flex items-center justify-between border-b border-[#E5ECEB] dark:border-slate-800 pb-1">
        <div class="flex items-center gap-6">
            <button @click="activeSubTab = 'grades'" 
                    :class="activeSubTab === 'grades' ? 'border-[#159A9C] text-[#159A9C] dark:text-teal-300 font-extrabold' : 'border-transparent text-[#64748B] dark:text-slate-400 font-semibold hover:text-[#172033]'"
                    class="py-2 border-b-2 text-xs md:text-sm transition-all cursor-pointer">
                Grades Overview
            </button>
            <button @click="activeSubTab = 'assessments'; $dispatch('toast', 'Viewing ' + selectedTerm + ' Assessment Breakdown...')" 
                    :class="activeSubTab === 'assessments' ? 'border-[#159A9C] text-[#159A9C] dark:text-teal-300 font-extrabold' : 'border-transparent text-[#64748B] dark:text-slate-400 font-semibold hover:text-[#172033]'"
                    class="py-2 border-b-2 text-xs md:text-sm transition-all cursor-pointer">
                Assessments
            </button>
            <button @click="activeSubTab = 'summary'; $dispatch('toast', 'Viewing Class Term Summary...')" 
                    :class="activeSubTab === 'summary' ? 'border-[#159A9C] text-[#159A9C] dark:text-teal-300 font-extrabold' : 'border-transparent text-[#64748B] dark:text-slate-400 font-semibold hover:text-[#172033]'"
                    class="py-2 border-b-2 text-xs md:text-sm transition-all cursor-pointer">
                Term Summary
            </button>
        </div>


        <!-- Create Assessment Quick Button -->
        <button @click="$dispatch('open-create-assessment')" 
                class="px-3.5 py-1.5 bg-[#159A9C] hover:bg-[#0E7476] text-white font-extrabold text-xs rounded-xl shadow-2xs transition-all flex items-center gap-1 cursor-pointer">
            <span>+ Create Assessment</span>
        </button>
    </div>

    <!-- SEARCH & STATUS FILTERS BAR -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-2xl p-3 shadow-2xs">
        <div class="relative w-full sm:w-64">
            <svg class="w-4 h-4 text-[#94A3B8] absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <input type="text" 
                   x-model="searchQuery"
                   placeholder="Search student..." 
                   class="w-full bg-[#F4F9F8] dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 pl-10 pr-4 py-2 rounded-2xl text-xs font-semibold text-[#172033] dark:text-white placeholder-[#94A3B8] focus:outline-none focus:ring-2 focus:ring-[#159A9C]/40">
        </div>

        <select x-model="statusFilter" class="bg-[#F4F9F8] dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 px-3 py-2 rounded-2xl text-xs font-bold text-[#172033] dark:text-white focus:outline-none cursor-pointer">
            <option value="all">Grade Status ▾ (All)</option>
            <option value="passing">Passing (≥ 75)</option>
            <option value="needs_attention">Needs Attention (< 75)</option>
        </select>
    </div>

    <!-- MAIN STUDENT GRADE TABLE (Matching reference mockup image) -->
    <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl overflow-hidden shadow-2xs">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#F4F9F8] dark:bg-slate-800/80 text-[#64748B] dark:text-slate-400 font-extrabold uppercase tracking-wider border-b border-[#E5ECEB] dark:border-slate-800">
                    <tr>
                        <th class="py-4 px-6">Student</th>
                        <th class="py-4 px-6 text-center">Written Works <br><span class="text-[10px] font-normal text-slate-400">(30%)</span></th>
                        <th class="py-4 px-6 text-center">Performance Tasks <br><span class="text-[10px] font-normal text-slate-400">(30%)</span></th>
                        <th class="py-4 px-6 text-center">Term Assessment <br><span class="text-[10px] font-normal text-slate-400">(40%)</span></th>
                        <th class="py-4 px-6 text-center">Term Grade <br><span class="text-[10px] font-normal text-slate-400">(100%)</span></th>
                        <th class="py-4 px-6">Remarks</th>
                        <th class="py-4 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E5ECEB]/60 dark:divide-slate-800 font-semibold text-[#172033] dark:text-slate-200">
                    <template x-for="st in filteredGrades" :key="st.id">
                        <tr class="hover:bg-[#F4F9F8]/60 dark:hover:bg-slate-800/50 transition-colors">
                            <!-- Student Info -->
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <img :src="st.avatar" :alt="st.name" class="w-9 h-9 rounded-full object-cover border border-slate-200 dark:border-slate-700">
                                    <div>
                                        <h4 class="font-extrabold text-xs text-[#172033] dark:text-white leading-tight" x-text="st.name"></h4>
                                        <span class="text-[10px] text-[#94A3B8] font-medium" x-text="'ID: ' + st.id"></span>
                                    </div>
                                </div>
                            </td>

                            <!-- Written Works (30%) -->
                            <td class="py-4 px-6 text-center font-mono font-bold text-slate-600 dark:text-slate-300" x-text="st.ww"></td>

                            <!-- Performance Tasks (30%) -->
                            <td class="py-4 px-6 text-center font-mono font-bold text-slate-600 dark:text-slate-300" x-text="st.pt"></td>

                            <!-- Term Assessment (40%) -->
                            <td class="py-4 px-6 text-center font-mono font-bold text-slate-600 dark:text-slate-300" x-text="st.qa"></td>

                            <!-- Final Grade (Auto-calculated UI) -->
                            <td class="py-4 px-6 text-center">
                                <span class="font-extrabold text-base px-3 py-1 rounded-xl block w-14 mx-auto"
                                      :class="st.bg + ' ' + st.color"
                                      x-text="st.final"></span>
                            </td>

                            <!-- Remarks -->
                            <td class="py-4 px-6">
                                <span class="font-bold text-xs" :class="st.color" x-text="st.remark"></span>
                            </td>

                            <!-- Actions -->
                            <td class="py-4 px-6 text-right">
                                <div class="flex items-center justify-end gap-1">
                                    <button @click="$dispatch('open-grade-details', st)" 
                                            class="px-2.5 py-1 bg-[#F4F9F8] dark:bg-slate-800 hover:bg-[#DDF6EF] text-[#159A9C] font-extrabold rounded-lg transition-colors text-[11px] cursor-pointer">
                                        View Details
                                    </button>
                                    <button @click="$dispatch('open-edit-scores', st)" 
                                            class="p-1.5 text-[#94A3B8] hover:text-[#172033] dark:hover:text-white rounded-xl transition-colors cursor-pointer"
                                            title="Edit Scores">
                                        ✏️
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>

        <!-- Pagination Controls Footer -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 bg-[#F4F9F8] dark:bg-slate-800/80 border-t border-[#E5ECEB] dark:border-slate-800 text-xs font-semibold text-[#64748B] dark:text-slate-400">
            <span>Showing 1 to 6 of 32 students</span>
            <div class="flex items-center gap-3 self-end sm:self-center">
                <select class="bg-white dark:bg-slate-700 border border-[#E5ECEB] dark:border-slate-600 rounded-xl px-2.5 py-1 text-xs text-[#172033] dark:text-white">
                    <option value="5">5 per page</option>
                    <option value="10">10 per page</option>
                </select>

                <div class="flex items-center gap-1">
                    <button class="w-7 h-7 rounded-xl bg-white dark:bg-slate-700 border border-[#E5ECEB] dark:border-slate-600 flex items-center justify-center text-slate-400 cursor-not-allowed">‹</button>
                    <button class="w-7 h-7 rounded-xl bg-[#159A9C] text-white flex items-center justify-center font-bold">1</button>
                    <button class="w-7 h-7 rounded-xl bg-white dark:bg-slate-700 border border-[#E5ECEB] dark:border-slate-600 flex items-center justify-center text-slate-600 dark:text-slate-300 hover:bg-slate-100">2</button>
                    <button class="w-7 h-7 rounded-xl bg-white dark:bg-slate-700 border border-[#E5ECEB] dark:border-slate-600 flex items-center justify-center text-slate-600 dark:text-slate-300 hover:bg-slate-100">3</button>
                    <span class="px-1 text-slate-400">...</span>
                    <button class="w-7 h-7 rounded-xl bg-white dark:bg-slate-700 border border-[#E5ECEB] dark:border-slate-600 flex items-center justify-center text-slate-600 dark:text-slate-300 hover:bg-slate-100">7</button>
                    <button class="w-7 h-7 rounded-xl bg-white dark:bg-slate-700 border border-[#E5ECEB] dark:border-slate-600 flex items-center justify-center text-slate-600 dark:text-slate-300 hover:bg-slate-100">›</button>
                </div>
            </div>
        </div>
    </div>
</div>
