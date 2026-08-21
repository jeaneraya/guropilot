<div x-data="{
        open: false
     }"
     @open-grade-settings.window="open = true"
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
             class="relative w-full max-w-md bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 md:p-8 shadow-2xl overflow-hidden">
            
            <!-- Header -->
            <div class="flex items-center justify-between border-b border-[#E5ECEB]/80 dark:border-slate-800 pb-4 mb-5">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#159A9C]"></span>
                        <h3 class="font-extrabold text-xl text-[#172033] dark:text-white">DepEd MATATAG Grade Weights</h3>
                    </div>
                    <p class="text-xs text-[#64748B] dark:text-slate-400 font-medium mt-1">
                        Grade 4 Science Weight Distribution
                    </p>
                </div>
                <button @click="open = false" class="w-8 h-8 rounded-xl bg-[#F4F9F8] dark:bg-slate-800 text-[#94A3B8] hover:text-[#172033] dark:hover:text-white flex items-center justify-center transition-colors">
                    ✕
                </button>
            </div>

            <!-- Grade Weights Breakdown -->
            <div class="space-y-3 mb-6 text-xs font-bold">
                <div class="flex items-center justify-between p-3 rounded-2xl bg-[#F4F9F8] dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700">
                    <span class="text-[#172033] dark:text-white">Written Works</span>
                    <span class="text-[#159A9C] dark:text-teal-300 font-extrabold">30%</span>
                </div>

                <div class="flex items-center justify-between p-3 rounded-2xl bg-[#F4F9F8] dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700">
                    <span class="text-[#172033] dark:text-white">Performance Tasks</span>
                    <span class="text-[#159A9C] dark:text-teal-300 font-extrabold">30%</span>
                </div>

                <div class="flex items-center justify-between p-3 rounded-2xl bg-[#F4F9F8] dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700">
                    <span class="text-[#172033] dark:text-white">Term Assessment</span>
                    <span class="text-[#159A9C] dark:text-teal-300 font-extrabold">40%</span>
                </div>

                <div class="pt-2 border-t border-slate-200 dark:border-slate-700 flex justify-between text-sm font-extrabold text-[#172033] dark:text-white">
                    <span>Total Weight</span>
                    <span class="text-[#159A9C]">100%</span>
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="flex items-center justify-end">
                <button @click="open = false" class="px-6 py-2.5 bg-[#159A9C] hover:bg-[#0E7476] text-white font-extrabold text-xs rounded-xl shadow-xs transition-all cursor-pointer">
                    Close
                </button>
            </div>

        </div>
    </div>
</div>
