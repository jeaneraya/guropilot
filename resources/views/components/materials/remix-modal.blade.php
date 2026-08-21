<div x-data="{
        open: false,
        materialTitle: '',
        materialType: '',
        selectedOption: 'easier',
        options: [
            { id: 'easier', icon: '⚡', title: 'Make it easier', desc: 'Simplify language & breakdown steps for struggling learners' },
            { id: 'challenging', icon: '🧠', title: 'Make it more challenging', desc: 'Add advanced problem solving & enrichment tasks' },
            { id: 'hots', icon: '❓', title: 'Add HOTS questions', desc: 'Include Bloom\'s Taxonomy Higher-Order Thinking Questions' },
            { id: 'filipino', icon: '🇵🇭', title: 'Translate to Filipino', desc: 'Convert text to DepEd MATATAG Filipino medium' },
            { id: 'cebuano', icon: '🌴', title: 'Translate to Cebuano', desc: 'Regional Mother Tongue / Localized translation' },
            { id: 'group', icon: '👥', title: 'Convert to group activity', desc: 'Transform into collaborative peer station task' },
            { id: 'grade5', icon: '🎓', title: 'Create a Grade 5 version', desc: 'Adapt curriculum standards for upper grade level' }
        ]
     }"
     @open-remix.window="open = true; materialTitle = $event.detail.title || 'Selected Material'; materialType = $event.detail.type || 'Material'"
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
             class="relative w-full max-w-lg bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 shadow-2xl overflow-hidden">
            
            <!-- Header -->
            <div class="flex items-center justify-between border-b border-[#E5ECEB]/80 dark:border-slate-800 pb-4 mb-5">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-[#EEE9FF] dark:bg-purple-950/40 text-[#7C3AED] dark:text-purple-300 flex items-center justify-center shrink-0">
                        <span class="text-lg">🪄</span>
                    </div>
                    <div>
                        <h3 class="font-extrabold text-lg text-[#172033] dark:text-white">Remix Material</h3>
                        <p class="text-xs text-[#64748B] dark:text-slate-400 font-medium truncate max-w-[260px]" x-text="materialTitle"></p>
                    </div>
                </div>
                <button @click="open = false" class="w-8 h-8 rounded-xl bg-[#F4F9F8] dark:bg-slate-800 text-[#94A3B8] hover:text-[#172033] dark:hover:text-white flex items-center justify-center transition-colors">
                    ✕
                </button>
            </div>

            <p class="text-xs text-[#64748B] dark:text-slate-400 font-medium mb-3">
                Select how you'd like AI to adapt this material for your students:
            </p>

            <!-- Remix Options List -->
            <div class="space-y-2 max-h-[320px] overflow-y-auto pr-1 mb-5">
                <template x-for="opt in options" :key="opt.id">
                    <button @click="selectedOption = opt.id"
                            :class="selectedOption === opt.id ? 'border-[#7C3AED] dark:border-purple-400 bg-[#EEE9FF]/40 dark:bg-purple-950/30 ring-2 ring-[#7C3AED]/20' : 'border-[#E5ECEB] dark:border-slate-800 bg-white dark:bg-slate-800/40 hover:border-slate-300 dark:hover:border-slate-700'"
                            class="w-full p-3 rounded-2xl border text-left transition-all flex items-start gap-3 cursor-pointer group">
                        <span class="text-xl shrink-0 mt-0.5" x-text="opt.icon"></span>
                        <div class="min-w-0">
                            <h4 class="font-extrabold text-xs text-[#172033] dark:text-white group-hover:text-[#7C3AED] dark:group-hover:text-purple-300 transition-colors" x-text="opt.title"></h4>
                            <p class="text-[11px] text-[#64748B] dark:text-slate-400 font-medium mt-0.5 truncate" x-text="opt.desc"></p>
                        </div>
                    </button>
                </template>
            </div>

            <!-- Footer Actions -->
            <div class="flex items-center justify-end gap-3 pt-3 border-t border-[#E5ECEB]/80 dark:border-slate-800">
                <button @click="open = false" class="px-4 py-2 text-xs font-bold text-[#64748B] dark:text-slate-400 hover:text-[#172033] dark:hover:text-white cursor-pointer">
                    Cancel
                </button>
                <button @click="open = false; $dispatch('toast', 'Remixing ' + materialTitle + ' with AI...')"
                        class="px-5 py-2.5 bg-[#7C3AED] hover:bg-[#6D28D9] text-white font-extrabold text-xs rounded-xl shadow-xs transition-all flex items-center gap-1.5 cursor-pointer">
                    <span>Apply Remix</span>
                    <span>🪄</span>
                </button>
            </div>

        </div>
    </div>
</div>
