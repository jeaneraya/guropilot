<div x-data="{
        open: false,
        studentStatuses: {
            'Maria Cruz': 'Present',
            'Juan Santos': 'Present',
            'Ana Reyes': 'Absent',
            'Pedro Garcia': 'Late',
            'Sophia Lopez': 'Present'
        },
        students: [
            { name: 'Maria Cruz', id: '2026-0001', avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=80' },
            { name: 'Juan Santos', id: '2026-0002', avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=80' },
            { name: 'Ana Reyes', id: '2026-0003', avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&auto=format&fit=crop&q=80' },
            { name: 'Pedro Garcia', id: '2026-0004', avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&auto=format&fit=crop&q=80' },
            { name: 'Sophia Lopez', id: '2026-0005', avatar: 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&auto=format&fit=crop&q=80' }
        ]
     }"
     @open-take-attendance-modal.window="open = true"
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

    <!-- Dialog -->
    <div class="flex min-h-full items-center justify-center p-4">
        <div x-show="open"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95 translate-y-2"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 translate-y-2"
             class="relative w-full max-w-2xl bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 md:p-8 shadow-2xl overflow-hidden">
            
            <!-- Header -->
            <div class="flex items-center justify-between border-b border-[#E5ECEB]/80 dark:border-slate-800 pb-4 mb-5">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#159A9C]"></span>
                        <h3 class="font-extrabold text-xl text-[#172033] dark:text-white">Take Attendance — Grade 4 Rizal</h3>
                    </div>
                    <p class="text-xs text-[#64748B] dark:text-slate-400 font-medium mt-1">
                        May 20, 2026 (Today) • Mark status for each learner.
                    </p>
                </div>
                <button @click="open = false" class="w-8 h-8 rounded-xl bg-[#F4F9F8] dark:bg-slate-800 text-[#94A3B8] hover:text-[#172033] dark:hover:text-white flex items-center justify-center transition-colors">
                    ✕
                </button>
            </div>

            <!-- Student List with Status Toggle Buttons -->
            <div class="space-y-3 mb-6 max-h-96 overflow-y-auto pr-1 scrollbar-none">
                <template x-for="st in students" :key="st.id">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-3.5 rounded-2xl bg-[#F4F9F8] dark:bg-slate-800/60 border border-[#E5ECEB] dark:border-slate-700">
                        <div class="flex items-center gap-3">
                            <img :src="st.avatar" :alt="st.name" class="w-9 h-9 rounded-full object-cover border border-slate-200 dark:border-slate-700">
                            <div>
                                <h4 class="font-extrabold text-xs text-[#172033] dark:text-white" x-text="st.name"></h4>
                                <span class="text-[10px] text-[#94A3B8]" x-text="'ID: ' + st.id"></span>
                            </div>
                        </div>

                        <!-- 4 Large Tap-Friendly Status Toggle Buttons -->
                        <div class="grid grid-cols-4 gap-1.5 shrink-0 text-[11px] font-bold">
                            <button @click="studentStatuses[st.name] = 'Present'"
                                    :class="studentStatuses[st.name] === 'Present' ? 'bg-[#16A34A] text-white font-extrabold shadow-2xs' : 'bg-white dark:bg-slate-700 text-[#64748B] border border-slate-200 dark:border-slate-600'"
                                    class="py-2 px-2.5 rounded-xl transition-all flex items-center justify-center gap-1 cursor-pointer">
                                <span>✓</span> Present
                            </button>

                            <button @click="studentStatuses[st.name] = 'Absent'"
                                    :class="studentStatuses[st.name] === 'Absent' ? 'bg-[#E11D48] text-white font-extrabold shadow-2xs' : 'bg-white dark:bg-slate-700 text-[#64748B] border border-slate-200 dark:border-slate-600'"
                                    class="py-2 px-2.5 rounded-xl transition-all flex items-center justify-center gap-1 cursor-pointer">
                                <span>✕</span> Absent
                            </button>

                            <button @click="studentStatuses[st.name] = 'Late'"
                                    :class="studentStatuses[st.name] === 'Late' ? 'bg-[#D97706] text-white font-extrabold shadow-2xs' : 'bg-white dark:bg-slate-700 text-[#64748B] border border-slate-200 dark:border-slate-600'"
                                    class="py-2 px-2.5 rounded-xl transition-all flex items-center justify-center gap-1 cursor-pointer">
                                <span>◷</span> Late
                            </button>

                            <button @click="studentStatuses[st.name] = 'Excused'"
                                    :class="studentStatuses[st.name] === 'Excused' ? 'bg-[#2563EB] text-white font-extrabold shadow-2xs' : 'bg-white dark:bg-slate-700 text-[#64748B] border border-slate-200 dark:border-slate-600'"
                                    class="py-2 px-2.5 rounded-xl transition-all flex items-center justify-center gap-1 cursor-pointer">
                                <span>ℹ</span> Excused
                            </button>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Footer Actions -->
            <div class="flex items-center justify-end gap-3 pt-3 border-t border-[#E5ECEB]/80 dark:border-slate-800">
                <button @click="open = false" class="px-4 py-2.5 text-xs font-bold text-[#64748B] dark:text-slate-400 hover:text-[#172033] dark:hover:text-white cursor-pointer">
                    Cancel
                </button>
                <button @click="open = false; $dispatch('toast', 'Attendance saved! 32 students recorded for May 20, 2026.')"
                        class="px-6 py-2.5 bg-[#159A9C] hover:bg-[#0E7476] text-white font-extrabold text-xs rounded-xl shadow-xs transition-all flex items-center gap-2 cursor-pointer">
                    <span>Save Attendance</span>
                    <span>→</span>
                </button>
            </div>

        </div>
    </div>
</div>
