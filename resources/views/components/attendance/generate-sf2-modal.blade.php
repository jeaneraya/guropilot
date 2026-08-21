<div x-data="{
        open: false
     }"
     @open-generate-sf2.window="open = true"
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
             class="relative w-full max-w-md bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 shadow-2xl overflow-hidden text-center">
            
            <div class="w-16 h-16 rounded-3xl bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 flex items-center justify-center mx-auto mb-4 shadow-2xs">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>

            <h3 class="font-extrabold text-lg text-[#172033] dark:text-white leading-snug">
                Generate SF2 Report
            </h3>

            <p class="text-xs text-[#64748B] dark:text-slate-400 font-medium mt-2 leading-relaxed">
                You are preparing the official DepEd School Form 2 (SF2) Daily Attendance Report for:
            </p>

            <div class="bg-[#F4F9F8] dark:bg-slate-800 p-3 rounded-2xl border border-[#E5ECEB] dark:border-slate-700 my-4 text-xs font-extrabold text-[#159A9C] dark:text-teal-300">
                Grade 4 – Rizal • Science • May 2026
            </div>

            <div class="flex items-center justify-center gap-3 mt-6">
                <button @click="open = false" class="px-4 py-2.5 text-xs font-bold text-[#64748B] dark:text-slate-400 hover:text-[#172033] dark:hover:text-white cursor-pointer">
                    Cancel
                </button>
                <button @click="open = false; activeTab = 'sf2'; $dispatch('toast', 'Opening SF2 Report for Grade 4 – Rizal...')"
                        class="px-6 py-2.5 bg-[#159A9C] hover:bg-[#0E7476] text-white font-extrabold text-xs rounded-xl shadow-xs transition-all flex items-center gap-2 cursor-pointer">
                    <span>Generate SF2</span>
                    <span>→</span>
                </button>
            </div>

        </div>
    </div>
</div>
