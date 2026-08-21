@props([
    'selectedClass' => [
        'grade' => 'Grade 4 – Rizal',
        'subject' => 'Science',
        'students' => 32,
        'year' => 'SY 2026–2027'
    ]
])

<div x-data="{
        searchQuery: '',
        perPage: 5,
        currentPage: 1,
        
        // Mock Students List
        studentsList: [
            { id: '2026-0001', name: 'Maria Cruz', lrn: '123456789012', status: 'Active', attendance: '96%', grade: 91, gradeLabel: 'Very Good', gradeColor: 'text-[#159A9C] dark:text-teal-300', updated: 'Aug 19, 2026 by Teacher', avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0002', name: 'Juan Santos', lrn: '123456789013', status: 'Active', attendance: '92%', grade: 86, gradeLabel: 'Very Good', gradeColor: 'text-[#22A06B] dark:text-emerald-400', updated: 'Aug 19, 2026 by Teacher', avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0003', name: 'Ana Reyes', lrn: '123456789014', status: 'Active', attendance: '98%', grade: 95, gradeLabel: 'Excellent', gradeColor: 'text-[#159A9C] dark:text-teal-300', updated: 'Aug 19, 2026 by Teacher', avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0004', name: 'Mark Bautista', lrn: '123456789015', status: 'Active', attendance: '94%', grade: 89, gradeLabel: 'Very Good', gradeColor: 'text-[#22A06B] dark:text-emerald-400', updated: 'Aug 18, 2026 by Teacher', avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&auto=format&fit=crop&q=80' },
            { id: '2026-0005', name: 'Sofia Garcia', lrn: '123456789016', status: 'SARDO Risk', attendance: '78%', grade: 79, gradeLabel: 'Fair', gradeColor: 'text-[#D97706] dark:text-amber-400', updated: 'Aug 18, 2026 by Teacher', avatar: 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&auto=format&fit=crop&q=80' }
        ],

        get filteredStudents() {
            return this.studentsList.filter(s => {
                const query = this.searchQuery.toLowerCase();
                return this.searchQuery === '' || s.name.toLowerCase().includes(query) || s.lrn.includes(query) || s.id.includes(query);
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

        <!-- Top-Right Actions: Search, Import, Add Student -->
        <div class="flex flex-wrap items-center gap-3 shrink-0">
            <!-- Search Input Field -->
            <div class="relative w-full sm:w-64">
                <svg class="w-4 h-4 text-[#94A3B8] absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" 
                       x-model="searchQuery"
                       placeholder="Search students by name or LRN..." 
                       class="w-full bg-[#F4F9F8] dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 pl-10 pr-4 py-2.5 rounded-2xl text-xs font-semibold text-[#172033] dark:text-white placeholder-[#94A3B8] focus:outline-none focus:ring-2 focus:ring-[#159A9C]/40">
            </div>

            <!-- Import Students Button -->
            <button @click="$dispatch('open-import-modal')" 
                    class="px-4 py-2.5 bg-[#F4F9F8] dark:bg-slate-800 hover:bg-[#DDF6EF]/60 dark:hover:bg-slate-700 border border-[#E5ECEB] dark:border-slate-700 text-[#159A9C] dark:text-teal-300 font-extrabold text-xs rounded-2xl transition-all flex items-center gap-1.5 cursor-pointer shadow-2xs">
                <span>☁ Import Students</span>
            </button>

            <!-- Add Student Primary Button -->
            <button @click="$dispatch('open-add-student-modal')" 
                    class="px-4 py-2.5 bg-[#159A9C] hover:bg-[#0E7476] text-white font-extrabold text-xs rounded-2xl shadow-xs transition-all flex items-center gap-1.5 cursor-pointer shrink-0">
                <span>+ Add Student</span>
                <span class="text-[10px]">∨</span>
            </button>
        </div>
    </div>

    <!-- 4 Metric Cards (Mini Stats Strip matching reference mockup) -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Card 1: Total Students -->
        <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-5 shadow-2xs flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
            <div>
                <span class="block text-2xl font-extrabold text-[#172033] dark:text-white leading-none">32</span>
                <span class="text-xs font-semibold text-[#64748B] dark:text-slate-400 mt-1 block">Total Students</span>
            </div>
        </div>

        <!-- Card 2: Active Students -->
        <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-5 shadow-2xs flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-[#DCFCE7] dark:bg-emerald-950/40 text-[#16A34A] dark:text-emerald-400 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div>
                <span class="block text-2xl font-extrabold text-[#172033] dark:text-white leading-none">31</span>
                <span class="text-xs font-semibold text-[#64748B] dark:text-slate-400 mt-1 block">Active Students</span>
            </div>
        </div>

        <!-- Card 3: Transferred Out -->
        <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-5 shadow-2xs flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-[#FFF4D6] dark:bg-amber-950/40 text-[#D97706] dark:text-amber-400 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </div>
            <div>
                <span class="block text-2xl font-extrabold text-[#172033] dark:text-white leading-none">1</span>
                <span class="text-xs font-semibold text-[#64748B] dark:text-slate-400 mt-1 block">Transferred Out</span>
            </div>
        </div>

        <!-- Card 4: Attendance Rate -->
        <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-5 shadow-2xs flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-[#EAF2FF] dark:bg-blue-950/40 text-[#2563EB] dark:text-blue-300 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div>
                <span class="block text-2xl font-extrabold text-[#172033] dark:text-white leading-none">96%</span>
                <span class="text-xs font-semibold text-[#64748B] dark:text-slate-400 mt-1 block">Attendance (This Month)</span>
            </div>
        </div>
    </div>

    <!-- Student Roster Table Container -->
    <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl overflow-hidden shadow-2xs">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#F4F9F8] dark:bg-slate-800/80 text-[#64748B] dark:text-slate-400 font-extrabold uppercase tracking-wider border-b border-[#E5ECEB] dark:border-slate-800">
                    <tr>
                        <th class="py-4 px-6">Student</th>
                        <th class="py-4 px-6">LRN</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6">Attendance (This Month)</th>
                        <th class="py-4 px-6">Term 1 Average</th>
                        <th class="py-4 px-6">Last Updated</th>
                        <th class="py-4 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E5ECEB]/60 dark:divide-slate-800 font-semibold text-[#172033] dark:text-slate-200">
                    <template x-for="std in filteredStudents" :key="std.id">
                        <tr class="hover:bg-[#F4F9F8]/60 dark:hover:bg-slate-800/50 transition-colors">
                            <!-- Student Avatar & Name -->
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <img :src="std.avatar" :alt="std.name" class="w-9 h-9 rounded-full object-cover border border-slate-200 dark:border-slate-700">
                                    <div>
                                        <h4 class="font-extrabold text-sm text-[#172033] dark:text-white leading-tight" x-text="std.name"></h4>
                                        <span class="text-[10px] text-[#94A3B8] dark:text-slate-400 font-medium" x-text="'ID: ' + std.id"></span>
                                    </div>
                                </div>
                            </td>

                            <!-- LRN -->
                            <td class="py-4 px-6 font-mono text-slate-600 dark:text-slate-300" x-text="std.lrn"></td>

                            <!-- Status -->
                            <td class="py-4 px-6">
                                <span :class="std.status === 'Active' ? 'bg-[#DCFCE7] dark:bg-emerald-950/40 text-[#16A34A] dark:text-emerald-400' : 'bg-[#FFF4D6] dark:bg-amber-950/40 text-[#D97706] dark:text-amber-400'"
                                      class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider"
                                      x-text="std.status"></span>
                            </td>

                            <!-- Attendance -->
                            <td class="py-4 px-6 font-bold" x-text="std.attendance"></td>

                            <!-- Average Grade -->
                            <td class="py-4 px-6">
                                <div>
                                    <span class="block font-extrabold text-sm" x-text="std.grade"></span>
                                    <span class="text-[10px] font-bold" :class="std.gradeColor" x-text="std.gradeLabel"></span>
                                </div>
                            </td>

                            <!-- Last Updated -->
                            <td class="py-4 px-6 text-[#94A3B8] dark:text-slate-400 text-[11px]" x-text="std.updated"></td>

                            <!-- Actions -->
                            <td class="py-4 px-6 text-right">
                                <div class="flex items-center justify-end gap-1">
                                    <!-- View Profile Icon -->
                                    <button @click="$dispatch('open-student-profile', std)" 
                                            title="View Student Profile"
                                            class="p-1.5 text-[#94A3B8] hover:text-[#159A9C] dark:hover:text-teal-300 rounded-xl transition-colors cursor-pointer">
                                        <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>

                                    <!-- Options Menu -->
                                    <button @click="$dispatch('toast', 'Options for ' + std.name)" 
                                            class="p-1.5 text-[#94A3B8] hover:text-[#172033] dark:hover:text-white rounded-xl transition-colors cursor-pointer">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                                        </svg>
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
            <span>Showing 1 to 5 of 32 students</span>
            <div class="flex items-center gap-3 self-end sm:self-center">
                <select x-model="perPage" class="bg-white dark:bg-slate-700 border border-[#E5ECEB] dark:border-slate-600 rounded-xl px-2.5 py-1 text-xs text-[#172033] dark:text-white">
                    <option value="5">5 per page</option>
                    <option value="10">10 per page</option>
                    <option value="20">20 per page</option>
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
