@props([
    'title' => 'The Water Cycle Presentation',
    'type' => 'Presentation',
    'subject' => 'Science • Grade 4',
    'format' => 'PPTX',
    'date' => 'Aug 19, 2026',
    'iconBg' => 'bg-[#EEE9FF] dark:bg-purple-950/40',
    'iconColor' => 'text-[#7C3AED] dark:text-purple-300',
    'badgeBg' => 'bg-[#EEE9FF] dark:bg-purple-950/40',
    'badgeColor' => 'text-[#7C3AED] dark:text-purple-300',
    'isFavorite' => false,
    'lessonPackage' => 'The Water Cycle'
])

<div x-data="{ fav: {{ $isFavorite ? 'true' : 'false' }}, menuOpen: false }"
     {{ $attributes->merge(['class' => 'bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-5 shadow-2xs hover:shadow-md transition-all duration-200 flex flex-col justify-between group relative']) }}>
    
    <div>
        <!-- Top Icon & Actions Header -->
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-2xl {{ $iconBg }} {{ $iconColor }} flex items-center justify-center shrink-0 shadow-2xs group-hover:scale-105 transition-transform">
                {{ $slot }}
            </div>

            <div class="flex items-center gap-1">
                <!-- Star Favorite Button -->
                <button @click.stop="fav = !fav; $dispatch('toast', fav ? 'Added to favorites' : 'Removed from favorites')" 
                        class="w-8 h-8 rounded-xl hover:bg-amber-50 dark:hover:bg-amber-950/30 flex items-center justify-center transition-colors cursor-pointer"
                        :class="fav ? 'text-amber-400' : 'text-[#CBD5E1] dark:text-slate-600 hover:text-amber-400'">
                    <svg class="w-4.5 h-4.5" :fill="fav ? 'currentColor' : 'none'" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                </button>

                <!-- More Menu Popover -->
                <div class="relative">
                    <button @click.stop="menuOpen = !menuOpen" 
                            @click.away="menuOpen = false" 
                            class="w-8 h-8 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 text-[#94A3B8] hover:text-[#172033] dark:hover:text-white flex items-center justify-center transition-colors cursor-pointer">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                        </svg>
                    </button>

                    <!-- Dropdown Options -->
                    <div x-show="menuOpen" 
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="absolute right-0 mt-1 w-48 bg-white dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 rounded-2xl shadow-xl z-20 py-2 text-xs font-semibold"
                         style="display: none;">
                        <button @click="menuOpen = false; $dispatch('open-remix', { title: '{{ $title }}', type: '{{ $type }}' })" 
                                class="w-full text-left px-4 py-2 hover:bg-[#DDF6EF]/50 dark:hover:bg-slate-700 text-[#159A9C] dark:text-teal-300 flex items-center gap-2 cursor-pointer">
                            <span>🪄 Remix with AI</span>
                        </button>
                        <button @click="menuOpen = false; $dispatch('toast', 'Opening preview mode...')" 
                                class="w-full text-left px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700 text-[#172033] dark:text-slate-200 flex items-center gap-2 cursor-pointer">
                            <span>👁️ Quick Preview</span>
                        </button>
                        <button @click="menuOpen = false; $dispatch('toast', 'Material link copied to clipboard!')" 
                                class="w-full text-left px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700 text-[#172033] dark:text-slate-200 flex items-center gap-2 cursor-pointer">
                            <span>🔗 Copy Share Link</span>
                        </button>
                        <button @click="menuOpen = false; $dispatch('toast', 'Downloading material package...')" 
                                class="w-full text-left px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700 text-[#172033] dark:text-slate-200 flex items-center gap-2 cursor-pointer border-t border-slate-100 dark:border-slate-700">
                            <span>📥 Download ({{ $format }})</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Material Title & Subtitle -->
        <h4 class="font-extrabold text-base text-[#172033] dark:text-white leading-snug group-hover:text-[#159A9C] dark:group-hover:text-teal-300 transition-colors line-clamp-2">
            {{ $title }}
        </h4>
        
        <p class="text-xs font-semibold text-[#64748B] dark:text-slate-400 mt-1 truncate">
            {{ $subject }}
        </p>

        <!-- Format & Date Pills -->
        <div class="flex items-center justify-between gap-2 mt-4 pt-3 border-t border-[#E5ECEB]/60 dark:border-slate-800 text-[11px] font-bold">
            <span class="px-2.5 py-0.5 rounded-md {{ $badgeBg }} {{ $badgeColor }} uppercase tracking-wider">
                {{ $format }}
            </span>
            <span class="text-[#94A3B8] dark:text-slate-400 font-medium">
                {{ $date }}
            </span>
        </div>
    </div>

    <!-- Bottom Actions: Open Button & Download Icon -->
    <div class="flex items-center gap-2 mt-5 pt-1">
        <button @click="$dispatch('toast', 'Opening {{ $title }}...')"
                class="flex-1 py-2 px-4 bg-[#F4F9F8] dark:bg-slate-800 hover:bg-[#DDF6EF] dark:hover:bg-[#159A9C]/20 text-[#172033] dark:text-slate-200 hover:text-[#159A9C] dark:hover:text-teal-300 font-extrabold text-xs rounded-xl transition-all text-center cursor-pointer">
            Open
        </button>

        <!-- Download Action -->
        <button @click="$dispatch('toast', 'Downloading {{ $title }} ({{ $format }})...')" 
                title="Download Material"
                class="w-9 h-9 rounded-xl bg-[#F4F9F8] dark:bg-slate-800 hover:bg-[#DDF6EF] dark:hover:bg-[#159A9C]/20 text-[#64748B] dark:text-slate-300 hover:text-[#159A9C] dark:hover:text-teal-300 flex items-center justify-center transition-all shrink-0 cursor-pointer">
            <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
            </svg>
        </button>

        <!-- Contextual Remix Button -->
        <button @click="$dispatch('open-remix', { title: '{{ $title }}', type: '{{ $type }}' })"
                title="Remix with AI"
                class="w-9 h-9 rounded-xl bg-[#EEE9FF]/70 dark:bg-purple-950/30 hover:bg-[#EEE9FF] dark:hover:bg-purple-950/60 text-[#7C3AED] dark:text-purple-300 flex items-center justify-center transition-all shrink-0 cursor-pointer">
            <span class="text-xs">🪄</span>
        </button>
    </div>
</div>
