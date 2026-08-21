<div class="bg-[#FFFBEB]/80 dark:bg-[#111C38] border border-[#FFF4D6] dark:border-slate-800 rounded-2xl p-4 md:p-5 shadow-2xs transition-colors duration-200"
     x-data="{
         currentTip: 0,
         tips: [
             'Try adding Higher-Order Thinking Skills (HOTS) questions in your MATATAG DLL to encourage critical reasoning.',
             'Review student attendance in SF2 at the end of each week to catch learning gaps early.',
             'Use real-life contextual examples when teaching Grade 4 Science concepts to increase engagement.',
             'Save your frequently used lesson structures as Templates in Lesson Studio for 1-click re-use.'
         ],
         nextTip() {
             this.currentTip = (this.currentTip + 1) % this.tips.length;
         },
         prevTip() {
             this.currentTip = (this.currentTip - 1 + this.tips.length) % this.tips.length;
         }
     }">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        
        <!-- Left Tip Content -->
        <div class="flex items-start gap-3 min-w-0">
            <div class="w-8 h-8 rounded-xl bg-[#FFF4D6] dark:bg-amber-500/20 text-[#D97706] dark:text-amber-300 flex items-center justify-center shrink-0 mt-0.5">
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707-.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                </svg>
            </div>
            <div>
                <h4 class="font-bold text-xs md:text-sm text-[#172033] dark:text-white">Quick Tips for Today</h4>
                <p class="text-xs text-[#64748B] dark:text-slate-300 font-medium leading-snug mt-0.5" x-text="tips[currentTip]"></p>
            </div>
        </div>

        <!-- Carousel Navigation Controls -->
        <div class="flex items-center gap-3 shrink-0 self-end sm:self-center">
            <span class="text-xs text-[#94A3B8] dark:text-slate-400 font-medium" x-text="'Tip ' + (currentTip + 1) + ' of ' + tips.length"></span>
            <div class="flex items-center gap-1">
                <button @click="prevTip()" class="w-7 h-7 rounded-full bg-white dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 text-[#64748B] dark:text-slate-300 hover:text-[#172033] dark:hover:text-white flex items-center justify-center transition-colors cursor-pointer shadow-2xs">
                    ‹
                </button>
                <button @click="nextTip()" class="w-7 h-7 rounded-full bg-white dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 text-[#64748B] dark:text-slate-300 hover:text-[#172033] dark:hover:text-white flex items-center justify-center transition-colors cursor-pointer shadow-2xs">
                    ›
                </button>
            </div>
        </div>

    </div>
</div>
