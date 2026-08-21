@props([
    'activeFilter' => 'all'
])

<div class="flex items-center gap-2 overflow-x-auto pb-2 focus:outline-none scrollbar-none">
    <button @click="$dispatch('filter-change', 'all')"
            :class="activeFilter === 'all' ? 'bg-[#DDF6EF] dark:bg-[#159A9C]/25 text-[#159A9C] dark:text-teal-300 font-extrabold border-[#159A9C]/30' : 'bg-white dark:bg-[#111C38] text-[#64748B] dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 border-[#E5ECEB] dark:border-slate-800'"
            class="px-4 py-2 rounded-2xl border text-xs font-semibold transition-all shrink-0 flex items-center gap-2 cursor-pointer shadow-2xs">
        <span class="w-2 h-2 rounded-full bg-[#159A9C]"></span>
        <span>All</span>
    </button>

    <button @click="$dispatch('filter-change', 'presentation')"
            :class="activeFilter === 'presentation' ? 'bg-[#DDF6EF] dark:bg-[#159A9C]/25 text-[#159A9C] dark:text-teal-300 font-extrabold border-[#159A9C]/30' : 'bg-white dark:bg-[#111C38] text-[#64748B] dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 border-[#E5ECEB] dark:border-slate-800'"
            class="px-4 py-2 rounded-2xl border text-xs font-semibold transition-all shrink-0 flex items-center gap-2 cursor-pointer shadow-2xs">
        <span>🖥️ Presentations</span>
    </button>

    <button @click="$dispatch('filter-change', 'worksheet')"
            :class="activeFilter === 'worksheet' ? 'bg-[#DDF6EF] dark:bg-[#159A9C]/25 text-[#159A9C] dark:text-teal-300 font-extrabold border-[#159A9C]/30' : 'bg-white dark:bg-[#111C38] text-[#64748B] dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 border-[#E5ECEB] dark:border-slate-800'"
            class="px-4 py-2 rounded-2xl border text-xs font-semibold transition-all shrink-0 flex items-center gap-2 cursor-pointer shadow-2xs">
        <span>📄 Worksheets</span>
    </button>

    <button @click="$dispatch('filter-change', 'quiz')"
            :class="activeFilter === 'quiz' ? 'bg-[#DDF6EF] dark:bg-[#159A9C]/25 text-[#159A9C] dark:text-teal-300 font-extrabold border-[#159A9C]/30' : 'bg-white dark:bg-[#111C38] text-[#64748B] dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 border-[#E5ECEB] dark:border-slate-800'"
            class="px-4 py-2 rounded-2xl border text-xs font-semibold transition-all shrink-0 flex items-center gap-2 cursor-pointer shadow-2xs">
        <span>📝 Quizzes</span>
    </button>

    <button @click="$dispatch('filter-change', 'activity')"
            :class="activeFilter === 'activity' ? 'bg-[#DDF6EF] dark:bg-[#159A9C]/25 text-[#159A9C] dark:text-teal-300 font-extrabold border-[#159A9C]/30' : 'bg-white dark:bg-[#111C38] text-[#64748B] dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 border-[#E5ECEB] dark:border-slate-800'"
            class="px-4 py-2 rounded-2xl border text-xs font-semibold transition-all shrink-0 flex items-center gap-2 cursor-pointer shadow-2xs">
        <span>🎨 Activities</span>
    </button>

    <button @click="$dispatch('filter-change', 'project')"
            :class="activeFilter === 'project' ? 'bg-[#DDF6EF] dark:bg-[#159A9C]/25 text-[#159A9C] dark:text-teal-300 font-extrabold border-[#159A9C]/30' : 'bg-white dark:bg-[#111C38] text-[#64748B] dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 border-[#E5ECEB] dark:border-slate-800'"
            class="px-4 py-2 rounded-2xl border text-xs font-semibold transition-all shrink-0 flex items-center gap-2 cursor-pointer shadow-2xs">
        <span>📊 Projects</span>
    </button>

    <button @click="$dispatch('filter-change', 'reading')"
            :class="activeFilter === 'reading' ? 'bg-[#DDF6EF] dark:bg-[#159A9C]/25 text-[#159A9C] dark:text-teal-300 font-extrabold border-[#159A9C]/30' : 'bg-white dark:bg-[#111C38] text-[#64748B] dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 border-[#E5ECEB] dark:border-slate-800'"
            class="px-4 py-2 rounded-2xl border text-xs font-semibold transition-all shrink-0 flex items-center gap-2 cursor-pointer shadow-2xs">
        <span>📖 Reading Materials</span>
    </button>
</div>
