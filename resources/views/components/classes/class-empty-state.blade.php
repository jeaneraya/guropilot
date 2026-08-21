@props([
    'title' => 'No classes yet',
    'subtitle' => 'Create your first class to start managing your students, attendance, grades, and lessons.'
])

<div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-10 text-center shadow-2xs my-6 flex flex-col items-center justify-center max-w-lg mx-auto">
    <!-- Friendly Schoolhouse Illustration Icon -->
    <div class="w-20 h-20 rounded-3xl bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 flex items-center justify-center mb-5 shadow-2xs">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m0 0h4m-4 0V11h4v10"/>
        </svg>
    </div>

    <h3 class="font-extrabold text-lg text-[#172033] dark:text-white leading-snug">
        {{ $title }}
    </h3>
    
    <p class="text-xs md:text-sm font-medium text-[#64748B] dark:text-slate-400 mt-2 max-w-xs leading-relaxed">
        {{ $subtitle }}
    </p>

    <button @click="$dispatch('open-create-class')" 
            class="mt-6 px-5 py-2.5 bg-[#159A9C] hover:bg-[#0E7476] text-white font-extrabold text-xs rounded-2xl shadow-xs transition-all flex items-center gap-2 cursor-pointer active:scale-95">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
        </svg>
        <span>Create Class</span>
    </button>
</div>
