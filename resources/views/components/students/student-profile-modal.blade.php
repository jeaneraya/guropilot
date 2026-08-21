<div x-data="{
        open: false,
        student: {
            name: 'Maria Cruz',
            id: '2026-0001',
            lrn: '123456789012',
            status: 'Active',
            attendance: '96%',
            grade: 91,
            gradeLabel: 'Very Good',
            avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=80',
            gender: 'Female',
            birthdate: 'May 14, 2016',
            parentName: 'Juanita Cruz',
            parentContact: '0917-555-0192',
            address: 'Brgy. San Jose, Quezon City'
        }
     }"
     @open-student-profile.window="open = true; if ($event.detail) student = $event.detail;"
     x-show="open"
     x-cloak
     class="fixed inset-0 z-50 overflow-y-auto"
     style="display: none;">

    <!-- Backdrop -->
    <div @click="open = false" 
         x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-slate-900/50 backdrop-blur-xs"></div>

    <!-- Slide-over / Modal Dialog -->
    <div class="flex min-h-full items-center justify-center p-4">
        <div x-show="open"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95 translate-y-2"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 translate-y-2"
             class="relative w-full max-w-xl bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 md:p-8 shadow-2xl overflow-hidden">
            
            <!-- Header -->
            <div class="flex items-start justify-between border-b border-[#E5ECEB]/80 dark:border-slate-800 pb-5 mb-6">
                <div class="flex items-center gap-4">
                    <img :src="student.avatar" :alt="student.name" class="w-16 h-16 rounded-full object-cover border-2 border-[#159A9C]">
                    <div>
                        <div class="flex items-center gap-2">
                            <h3 class="font-extrabold text-xl text-[#172033] dark:text-white" x-text="student.name"></h3>
                            <span class="px-2.5 py-0.5 rounded-full bg-[#DCFCE7] text-[#16A34A] text-[10px] font-extrabold uppercase" x-text="student.status"></span>
                        </div>
                        <p class="text-xs text-[#64748B] dark:text-slate-400 font-semibold mt-1">
                            LRN: <span x-text="student.lrn" class="font-mono text-[#172033] dark:text-slate-200"></span> • ID: <span x-text="student.id"></span>
                        </p>
                        <p class="text-xs text-[#159A9C] dark:text-teal-300 font-bold mt-0.5">Grade 4 – Rizal Advisory</p>
                    </div>
                </div>

                <button @click="open = false" class="w-8 h-8 rounded-xl bg-[#F4F9F8] dark:bg-slate-800 text-[#94A3B8] hover:text-[#172033] dark:hover:text-white flex items-center justify-center transition-colors">
                    ✕
                </button>
            </div>

            <!-- Profile Overview Cards Grid -->
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="bg-[#F4F9F8] dark:bg-slate-800/80 p-4 rounded-2xl border border-[#E5ECEB] dark:border-slate-700">
                    <span class="text-[10px] font-extrabold uppercase text-[#94A3B8] block">Term 1 Average</span>
                    <span class="text-2xl font-extrabold text-[#172033] dark:text-white mt-1 block" x-text="student.grade"></span>
                    <span class="text-xs font-bold text-[#159A9C] dark:text-teal-300" x-text="student.gradeLabel"></span>
                </div>

                <div class="bg-[#F4F9F8] dark:bg-slate-800/80 p-4 rounded-2xl border border-[#E5ECEB] dark:border-slate-700">
                    <span class="text-[10px] font-extrabold uppercase text-[#94A3B8] block">Monthly Attendance</span>
                    <span class="text-2xl font-extrabold text-[#2563EB] dark:text-blue-300 mt-1 block" x-text="student.attendance"></span>
                    <span class="text-xs font-bold text-slate-500">22 Days Present</span>
                </div>
            </div>

            <!-- Personal & Parent Information -->
            <div class="space-y-3 mb-6 bg-white dark:bg-slate-800/50 p-4 rounded-2xl border border-[#E5ECEB] dark:border-slate-700 text-xs font-semibold">
                <h4 class="font-extrabold text-sm text-[#172033] dark:text-white mb-2">Learner Information</h4>
                <div class="grid grid-cols-2 gap-3 text-[#64748B] dark:text-slate-300">
                    <div>Gender: <span class="text-[#172033] dark:text-white font-bold" x-text="student.gender || 'Female'"></span></div>
                    <div>Birthdate: <span class="text-[#172033] dark:text-white font-bold" x-text="student.birthdate || 'May 14, 2016'"></span></div>
                    <div>Guardian: <span class="text-[#172033] dark:text-white font-bold" x-text="student.parentName || 'Juanita Cruz'"></span></div>
                    <div>Contact: <span class="text-[#172033] dark:text-white font-bold" x-text="student.parentContact || '0917-555-0192'"></span></div>
                </div>
            </div>

            <!-- Quick Document Generators -->
            <div class="flex items-center justify-between gap-3 pt-4 border-t border-[#E5ECEB]/80 dark:border-slate-800">
                <button @click="open = false; activeTab = 'sf9'; $dispatch('toast', 'Opening SF9 Report Card for ' + student.name + '...')"
                        class="px-4 py-2.5 bg-[#DDF6EF] dark:bg-[#159A9C]/20 hover:bg-[#159A9C] hover:text-white text-[#159A9C] dark:text-teal-300 font-extrabold text-xs rounded-xl transition-all flex items-center gap-1.5 cursor-pointer">
                    <span>📄 Generate SF9 Card</span>
                </button>

                <button @click="open = false; activeTab = 'student-ids'; $dispatch('toast', 'Generating ID Card for ' + student.name + '...')"
                        class="px-4 py-2.5 bg-[#EEE9FF] dark:bg-purple-950/30 text-[#7C3AED] dark:text-purple-300 font-extrabold text-xs rounded-xl transition-all flex items-center gap-1.5 cursor-pointer">
                    <span>🪪 Student ID</span>
                </button>
            </div>

        </div>
    </div>
</div>
