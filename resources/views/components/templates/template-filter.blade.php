@props([
    'activeFilter' => 'all'
])

<div class="flex items-center gap-2 overflow-x-auto pb-1 focus:outline-none scrollbar-none">
    <button @click="$dispatch('template-filter-change', 'all')"
            :class="activeFilter === 'all' ? 'bg-[#DDF6EF] dark:bg-[#159A9C]/25 text-[#159A9C] dark:text-teal-300 font-extrabold border-[#159A9C]/30' : 'bg-white dark:bg-[#111C38] text-[#64748B] dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 border-[#E5ECEB] dark:border-slate-800'"
            class="px-4 py-2 rounded-2xl border text-xs font-semibold transition-all shrink-0 flex items-center gap-2 cursor-pointer shadow-2xs">
        <span class="w-2 h-2 rounded-full bg-[#159A9C]"></span>
        <span>All Templates</span>
    </button>

    <button @click="$dispatch('template-filter-change', 'matatag')"
            :class="activeFilter === 'matatag' ? 'bg-[#DDF6EF] dark:bg-[#159A9C]/25 text-[#159A9C] dark:text-teal-300 font-extrabold border-[#159A9C]/30' : 'bg-white dark:bg-[#111C38] text-[#64748B] dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 border-[#E5ECEB] dark:border-slate-800'"
            class="px-4 py-2 rounded-2xl border text-xs font-semibold transition-all shrink-0 flex items-center gap-2 cursor-pointer shadow-2xs">
        <span>📘 MATATAG DLL</span>
    </button>

    <button @click="$dispatch('template-filter-change', 'ilaw')"
            :class="activeFilter === 'ilaw' ? 'bg-[#EEE9FF] dark:bg-purple-950/40 text-[#7C3AED] dark:text-purple-300 font-extrabold border-[#7C3AED]/30' : 'bg-white dark:bg-[#111C38] text-[#64748B] dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 border-[#E5ECEB] dark:border-slate-800'"
            class="px-4 py-2 rounded-2xl border text-xs font-semibold transition-all shrink-0 flex items-center gap-2 cursor-pointer shadow-2xs">
        <span>💡 ILAW</span>
    </button>

    <button @click="$dispatch('template-filter-change', 'dlp')"
            :class="activeFilter === 'dlp' ? 'bg-[#FFF4D6] dark:bg-amber-950/40 text-[#D97706] dark:text-amber-300 font-extrabold border-[#D97706]/30' : 'bg-white dark:bg-[#111C38] text-[#64748B] dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 border-[#E5ECEB] dark:border-slate-800'"
            class="px-4 py-2 rounded-2xl border text-xs font-semibold transition-all shrink-0 flex items-center gap-2 cursor-pointer shadow-2xs">
        <span>📝 DLP / Activity-Based</span>
    </button>
</div>
