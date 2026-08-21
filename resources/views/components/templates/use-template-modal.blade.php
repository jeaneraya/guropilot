<div x-data="{
        open: false,
        templateTitle: 'Science Inquiry Template'
     }"
     @open-use-template.window="open = true; templateTitle = $event.detail || 'Science Inquiry Template'"
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
                <span class="text-2xl">🚀</span>
            </div>

            <h3 class="font-extrabold text-lg text-[#172033] dark:text-white leading-snug">
                Using: <span x-text="templateTitle"></span>
            </h3>

            <p class="text-xs md:text-sm text-[#64748B] dark:text-slate-400 font-medium mt-2 leading-relaxed">
                This template will pre-fill your lesson creation form with inquiry-based learning structures.
            </p>

            <div class="mt-6 flex items-center justify-center gap-3">
                <button @click="open = false" class="px-4 py-2.5 text-xs font-bold text-[#64748B] dark:text-slate-400 hover:text-[#172033] dark:hover:text-white cursor-pointer">
                    Cancel
                </button>
                <button @click="open = false; lessonBuilderOpen = true; $dispatch('toast', 'Pre-filling Lesson Builder with ' + templateTitle + '...')"
                        class="px-6 py-2.5 bg-[#159A9C] hover:bg-[#0E7476] text-white font-extrabold text-xs rounded-xl shadow-xs transition-all flex items-center gap-2 cursor-pointer">
                    <span>Continue to Builder</span>
                    <span>→</span>
                </button>
            </div>

        </div>
    </div>
</div>
