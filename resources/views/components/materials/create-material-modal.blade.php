<div x-data="{
        open: false,
        selectedType: 'presentation',
        creationMode: 'existing',
        types: [
            { id: 'presentation', label: 'Presentation', icon: '🖥️', bg: 'bg-[#EEE9FF] dark:bg-purple-950/40', text: 'text-[#7C3AED] dark:text-purple-300', desc: 'Slide deck for MATATAG lessons' },
            { id: 'worksheet', label: 'Worksheet', icon: '📄', bg: 'bg-[#DDF6EF] dark:bg-teal-950/40', text: 'text-[#159A9C] dark:text-teal-300', desc: 'Printable or digital student activity' },
            { id: 'quiz', label: 'Quiz', icon: '📝', bg: 'bg-[#FFF4D6] dark:bg-amber-950/40', text: 'text-[#D97706] dark:text-amber-300', desc: 'Short formative assessment' },
            { id: 'activity', label: 'Group Activity', icon: '🎨', bg: 'bg-[#FDE9E7] dark:bg-rose-950/40', text: 'text-[#E11D48] dark:text-rose-300', desc: 'Collaborative task instruction' },
            { id: 'project', label: 'Project Guide', icon: '📊', bg: 'bg-[#EAF2FF] dark:bg-blue-950/40', text: 'text-[#2563EB] dark:text-blue-300', desc: 'Rubrics & project deliverables' },
            { id: 'assignment', label: 'Assignment', icon: '📌', bg: 'bg-[#EEE9FF] dark:bg-purple-950/40', text: 'text-[#7C3AED] dark:text-purple-300', desc: 'Take-home exercise or reading' },
            { id: 'reading', label: 'Reading Material', icon: '📖', bg: 'bg-[#DCFCE7] dark:bg-emerald-950/40', text: 'text-[#16A34A] dark:text-emerald-300', desc: 'Story or article text' },
            { id: 'game', label: 'Classroom Game', icon: '🎮', bg: 'bg-[#FFF4D6] dark:bg-amber-950/40', text: 'text-[#D97706] dark:text-amber-300', desc: 'Interactive review game' }
        ]
     }"
     @open-create-material.window="open = true"
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

    <!-- Modal Dialog -->
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
            <div class="flex items-center justify-between border-b border-[#E5ECEB]/80 dark:border-slate-800 pb-4 mb-6">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#159A9C]"></span>
                        <h3 class="font-extrabold text-xl text-[#172033] dark:text-white">Create a Teaching Material</h3>
                    </div>
                    <p class="text-xs md:text-sm text-[#64748B] dark:text-slate-400 font-medium mt-1">
                        Choose what you want to create for your class.
                    </p>
                </div>
                <button @click="open = false" class="w-9 h-9 rounded-2xl bg-[#F4F9F8] dark:bg-slate-800 text-[#94A3B8] hover:text-[#172033] dark:hover:text-white flex items-center justify-center transition-colors">
                    ✕
                </button>
            </div>

            <!-- Material Types Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-6">
                <template x-for="item in types" :key="item.id">
                    <button @click="selectedType = item.id"
                            :class="selectedType === item.id ? 'border-[#159A9C] dark:border-teal-400 ring-2 ring-[#159A9C]/20 dark:ring-teal-400/20 bg-[#DDF6EF]/30 dark:bg-teal-950/30' : 'border-[#E5ECEB] dark:border-slate-800 bg-white dark:bg-slate-800/40 hover:border-slate-300 dark:hover:border-slate-700'"
                            class="p-3.5 rounded-2xl border text-left transition-all flex flex-col justify-between group cursor-pointer">
                        <div>
                            <span class="text-2xl block mb-2" x-text="item.icon"></span>
                            <h4 class="font-extrabold text-xs md:text-sm text-[#172033] dark:text-white leading-tight" x-text="item.label"></h4>
                        </div>
                        <p class="text-[10px] text-[#64748B] dark:text-slate-400 font-medium mt-1.5 line-clamp-2" x-text="item.desc"></p>
                    </button>
                </template>
            </div>

            <!-- Creation Mode Selection -->
            <div class="bg-[#F4F9F8] dark:bg-slate-800/60 p-4 rounded-2xl border border-[#E5ECEB] dark:border-slate-700 mb-6">
                <h4 class="font-extrabold text-xs uppercase tracking-wider text-[#64748B] dark:text-slate-400 mb-3">Creation Option</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                    <button @click="creationMode = 'existing'"
                            :class="creationMode === 'existing' ? 'bg-white dark:bg-slate-700 border-[#159A9C] dark:border-teal-400 text-[#172033] dark:text-white font-bold shadow-xs' : 'bg-transparent border-transparent text-[#64748B] dark:text-slate-400 hover:bg-white/50 dark:hover:bg-slate-700/50'"
                            class="p-3 rounded-xl border text-left transition-all flex items-start gap-2.5 cursor-pointer">
                        <span class="text-base mt-0.5">📚</span>
                        <div>
                            <span class="block font-bold">Create from existing lesson</span>
                            <span class="block text-[10px] font-normal text-[#64748B] dark:text-slate-400 mt-0.5">Auto-generate from MATATAG DLL</span>
                        </div>
                    </button>

                    <button @click="creationMode = 'scratch'"
                            :class="creationMode === 'scratch' ? 'bg-white dark:bg-slate-700 border-[#159A9C] dark:border-teal-400 text-[#172033] dark:text-white font-bold shadow-xs' : 'bg-transparent border-transparent text-[#64748B] dark:text-slate-400 hover:bg-white/50 dark:hover:bg-slate-700/50'"
                            class="p-3 rounded-xl border text-left transition-all flex items-start gap-2.5 cursor-pointer">
                        <span class="text-base mt-0.5">✨</span>
                        <div>
                            <span class="block font-bold">Create from scratch</span>
                            <span class="block text-[10px] font-normal text-[#64748B] dark:text-slate-400 mt-0.5">Custom prompt or topic</span>
                        </div>
                    </button>
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="flex items-center justify-end gap-3 pt-2 border-t border-[#E5ECEB]/80 dark:border-slate-800">
                <button @click="open = false" class="px-4 py-2.5 text-xs font-bold text-[#64748B] dark:text-slate-400 hover:text-[#172033] dark:hover:text-white cursor-pointer">
                    Cancel
                </button>
                <button @click="open = false; $dispatch('toast', 'Generating material package with AI assistant...')"
                        class="px-6 py-2.5 bg-[#159A9C] hover:bg-[#0E7476] text-white font-extrabold text-xs rounded-xl shadow-xs transition-all flex items-center gap-2 cursor-pointer">
                    <span>Generate Material</span>
                    <span>→</span>
                </button>
            </div>

        </div>
    </div>
</div>
