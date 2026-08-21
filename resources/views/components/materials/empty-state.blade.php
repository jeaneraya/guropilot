@props([
    'title' => 'No teaching materials found',
    'subtitle' => 'Try adjusting your search or category filter, or create your first material for this class.',
    'classTitle' => 'Grade 4 – Rizal'
])

<div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-10 text-center shadow-2xs my-6 flex flex-col items-center justify-center max-w-lg mx-auto">
    <!-- Friendly Pastel Folder SVG Illustration -->
    <div class="w-24 h-24 rounded-3xl bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 flex items-center justify-center mb-5 shadow-2xs">
        <svg class="w-12 h-12" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11v6m3-3H9"/>
        </svg>
    </div>

    <h3 class="font-extrabold text-lg md:text-xl text-[#172033] dark:text-white leading-snug">
        {{ $title }}
    </h3>
    
    <p class="text-xs md:text-sm font-medium text-[#64748B] dark:text-slate-400 mt-2 max-w-sm leading-relaxed">
        {{ $subtitle }}
    </p>

    <button @click="$dispatch('open-create-material')" 
            class="mt-6 px-5 py-3 bg-[#159A9C] hover:bg-[#0E7476] text-white font-extrabold text-xs md:text-sm rounded-2xl shadow-xs transition-all flex items-center gap-2 cursor-pointer active:scale-95">
        <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
        </svg>
        <span>Create Material</span>
    </button>
</div>
