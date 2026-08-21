@props([
    'title' => 'Science Inquiry Template',
    'badge' => 'MATATAG DLL',
    'badgeBg' => 'bg-[#DDF6EF] dark:bg-teal-950/40',
    'badgeColor' => 'text-[#159A9C] dark:text-teal-300',
    'duration' => '60 Minutes',
    'approach' => 'Inquiry-Based Learning',
    'timesUsed' => 8,
    'iconBg' => 'bg-[#DDF6EF] dark:bg-[#159A9C]/20',
    'iconColor' => 'text-[#159A9C] dark:text-teal-300',
    'footerBg' => 'bg-[#DDF6EF]/50 dark:bg-[#159A9C]/10',
    'footerColor' => 'text-[#159A9C] dark:text-teal-300'
])

<div x-data="{ menuOpen: false }"
     {{ $attributes->merge(['class' => 'bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-5 shadow-2xs hover:shadow-md transition-all duration-200 flex flex-col justify-between group relative']) }}>
    
    <div>
        <!-- Top Icon & Menu Header -->
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-2xl {{ $iconBg }} {{ $iconColor }} flex items-center justify-center shrink-0 shadow-2xs group-hover:scale-105 transition-transform">
                {{ $slot }}
            </div>

            <!-- More Menu Popover -->
            <div class="relative">
                <button @click.stop="menuOpen = !menuOpen" 
                        @click.away="menuOpen = false" 
                        class="w-8 h-8 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 text-[#94A3B8] hover:text-[#172033] dark:hover:text-white flex items-center justify-center transition-colors cursor-pointer">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="menuOpen" 
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="absolute right-0 mt-1 w-44 bg-white dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 rounded-2xl shadow-xl z-20 py-2 text-xs font-semibold"
                     style="display: none;">
                    <button @click="menuOpen = false; $dispatch('open-use-template', '{{ $title }}')" 
                            class="w-full text-left px-4 py-2 hover:bg-[#DDF6EF]/50 dark:hover:bg-slate-700 text-[#159A9C] dark:text-teal-300 flex items-center gap-2 cursor-pointer">
                        <span>🚀 Use Template</span>
                    </button>
                    <button @click="menuOpen = false; $dispatch('toast', 'Editing {{ $title }}...')" 
                            class="w-full text-left px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700 text-[#172033] dark:text-slate-200 flex items-center gap-2 cursor-pointer">
                        <span>✏️ Edit Template</span>
                    </button>
                    <button @click="menuOpen = false; $dispatch('toast', 'Duplicated {{ $title }}')" 
                            class="w-full text-left px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700 text-[#172033] dark:text-slate-200 flex items-center gap-2 cursor-pointer">
                        <span>📋 Duplicate</span>
                    </button>
                    <button @click="menuOpen = false; $dispatch('toast', 'Template saved to favorites')" 
                            class="w-full text-left px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700 text-[#172033] dark:text-slate-200 flex items-center gap-2 cursor-pointer">
                        <span>⭐ Save as Favorite</span>
                    </button>
                    <button @click="menuOpen = false; $dispatch('toast', 'Template removed')" 
                            class="w-full text-left px-4 py-2 hover:bg-rose-50 dark:hover:bg-rose-950/30 text-rose-500 flex items-center gap-2 cursor-pointer border-t border-slate-100 dark:border-slate-700">
                        <span>🗑️ Delete</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Template Name -->
        <h4 class="font-extrabold text-base text-[#172033] dark:text-white leading-snug group-hover:text-[#159A9C] dark:group-hover:text-teal-300 transition-colors">
            {{ $title }}
        </h4>

        <!-- Framework Badge -->
        <div class="mt-3">
            <span class="px-2.5 py-1 rounded-full {{ $badgeBg }} {{ $badgeColor }} text-[11px] font-extrabold tracking-wide inline-block">
                {{ $badge }}
            </span>
        </div>

        <!-- Duration & Approach Metadata -->
        <div class="space-y-1.5 mt-4 text-xs font-medium text-[#64748B] dark:text-slate-400">
            <div class="flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5 text-[#94A3B8]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>{{ $duration }}</span>
            </div>
            <div class="flex items-center gap-1.5 truncate">
                <svg class="w-3.5 h-3.5 text-[#94A3B8] shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                </svg>
                <span class="truncate">{{ $approach }}</span>
            </div>
        </div>

        <!-- Usage Stats -->
        <div class="mt-4 pt-3 border-t border-[#E5ECEB]/60 dark:border-slate-800 text-xs font-semibold text-[#94A3B8] dark:text-slate-500 flex items-center gap-1.5">
            <svg class="w-3.5 h-3.5 text-[#94A3B8]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            <span>Used {{ $timesUsed }} times</span>
        </div>
    </div>

    <!-- Bottom Action Pill Button -->
    <div class="mt-5 pt-1">
        <button @click="$dispatch('open-use-template', '{{ $title }}')"
                class="w-full py-2.5 px-4 rounded-xl {{ $footerBg }} {{ $footerColor }} font-extrabold text-xs flex items-center justify-between group-hover:opacity-90 transition-all cursor-pointer">
            <span>Use Template</span>
            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
        </button>
    </div>
</div>
