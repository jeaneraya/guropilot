<div class="p-5 md:p-6 rounded-2xl bg-gradient-to-r from-[#DDF6EF] to-[#DDF6EF]/60 border border-[#E5ECEB] flex items-center justify-between gap-4">
    <div class="flex items-center gap-3.5 min-w-0">
        <div class="w-11 h-11 rounded-2xl bg-[#159A9C] text-white flex items-center justify-center shrink-0 shadow-xs">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="4" y="6" width="16" height="12" rx="4"/>
                <circle cx="9" cy="11" r="1.5" fill="currentColor"/>
                <circle cx="15" cy="11" r="1.5" fill="currentColor"/>
                <path d="M9 15c.83.67 2.17 1 3 1s2.17-.33 3-1"/>
            </svg>
        </div>
        <div class="min-w-0">
            <h4 class="font-bold text-sm md:text-base text-[#172033]">Teacher Assistant</h4>
            <p class="text-xs text-[#64748B] font-medium leading-relaxed truncate sm:whitespace-normal mt-0.5">
                Your AI teaching companion. Ask anything about lessons, activities, assessments, and more.
            </p>
        </div>
    </div>
    <button @click="assistantOpen = true" 
            class="px-4 py-2 bg-white hover:bg-slate-50 text-[#159A9C] font-bold text-xs rounded-xl shadow-2xs border border-[#E5ECEB] transition-colors shrink-0 cursor-pointer">
        Ask Now
    </button>
</div>
