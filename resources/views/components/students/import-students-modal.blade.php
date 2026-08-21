<div x-data="{
        open: false,
        dragOver: false
     }"
     @open-import-modal.window="open = true"
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
             class="relative w-full max-w-md bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 md:p-8 shadow-2xl overflow-hidden text-center">
            
            <div class="w-16 h-16 rounded-3xl bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 flex items-center justify-center mx-auto mb-4 shadow-2xs">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                </svg>
            </div>

            <h3 class="font-extrabold text-lg text-[#172033] dark:text-white leading-snug">
                Import Class Roster from LIS
            </h3>

            <p class="text-xs text-[#64748B] dark:text-slate-400 font-medium mt-1 leading-relaxed">
                Upload your DepEd LIS SF1 file or Excel template (.xlsx, .csv).
            </p>

            <!-- Dropzone -->
            <div @dragover.prevent="dragOver = true"
                 @dragleave.prevent="dragOver = false"
                 @drop.prevent="dragOver = false; $dispatch('toast', 'File uploaded! Processing LIS roster...')"
                 :class="dragOver ? 'border-[#159A9C] bg-[#DDF6EF]/30' : 'border-dashed border-[#E5ECEB] dark:border-slate-700 bg-[#F4F9F8] dark:bg-slate-800/60'"
                 class="mt-5 p-6 rounded-2xl border-2 transition-all flex flex-col items-center justify-center cursor-pointer">
                <span class="text-2xl mb-2">📁</span>
                <span class="text-xs font-extrabold text-[#172033] dark:text-white">Drag and drop your LIS file here</span>
                <span class="text-[10px] text-[#94A3B8] font-medium mt-1">Supports DepEd SF1 (.xlsx, .csv) up to 10MB</span>
            </div>

            <div class="mt-6 flex items-center justify-center gap-3">
                <button @click="open = false" class="px-4 py-2.5 text-xs font-bold text-[#64748B] dark:text-slate-400 hover:text-[#172033] dark:hover:text-white cursor-pointer">
                    Cancel
                </button>
                <button @click="open = false; $dispatch('toast', 'Imported 32 students from SF1 file!')"
                        class="px-6 py-2.5 bg-[#159A9C] hover:bg-[#0E7476] text-white font-extrabold text-xs rounded-xl shadow-xs transition-all flex items-center gap-2 cursor-pointer">
                    <span>Import Roster</span>
                    <span>→</span>
                </button>
            </div>

        </div>
    </div>
</div>
