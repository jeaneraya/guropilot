<header class="sticky top-0 bg-[#F4F9F8]/90 dark:bg-[#0F172A]/90 backdrop-blur-md z-20 px-4 md:px-6 lg:px-8 py-3.5 border-b border-[#E5ECEB]/60 dark:border-slate-800 flex items-center justify-between transition-colors">
    
    <!-- Mobile Hamburger Toggle & Left Info -->
    <div class="flex items-center gap-3">
        <button @click="sidebarOpen = !sidebarOpen" 
                class="lg:hidden p-2 rounded-xl text-[#64748B] dark:text-slate-300 hover:bg-white dark:hover:bg-slate-800 hover:text-[#172033] dark:hover:text-white border border-[#E5ECEB] dark:border-slate-700 shadow-2xs transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    <!-- Right Controls: Dark/Light Toggle, Offline Badge, Notifications, User Profile -->
    <div class="flex items-center gap-2 sm:gap-3 md:gap-4 ml-auto">
        
        <!-- Offline Mode Pill Indicator -->
        <div class="hidden sm:flex items-center gap-2 bg-white dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 shadow-2xs px-3 py-1.5 rounded-full text-xs font-semibold text-[#64748B] dark:text-slate-300">
            <svg class="w-4 h-4 text-[#159A9C]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/>
            </svg>
            <span>Offline Mode</span>
            <span class="w-2 h-2 rounded-full bg-[#22A06B] animate-pulse"></span>
        </div>

        <!-- Dark / Light Mode Pill Toggle Button -->
        <button @click="darkMode = !darkMode" 
                class="flex items-center gap-2 bg-white dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 shadow-2xs px-3 py-1.5 rounded-full text-xs font-semibold text-[#64748B] dark:text-slate-200 hover:text-[#172033] dark:hover:text-white transition-all cursor-pointer group">
            <!-- Sun Icon (shown when darkMode is active) -->
            <svg x-show="darkMode" class="w-4 h-4 text-amber-400 group-hover:rotate-45 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
            <!-- Moon Icon (shown when lightMode is active) -->
            <svg x-show="!darkMode" class="w-4 h-4 text-[#159A9C] group-hover:-rotate-12 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
            </svg>
            <span class="hidden md:inline" x-text="darkMode ? 'Dark Mode' : 'Light Mode'"></span>
        </button>

        <!-- Notification Bell Icon -->
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" 
                    class="p-2 rounded-full bg-white dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 shadow-2xs text-[#64748B] dark:text-slate-300 hover:text-[#172033] dark:hover:text-white transition-colors relative cursor-pointer">
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
                <span class="absolute top-0 right-0 w-2 h-2 rounded-full bg-rose-500 ring-2 ring-white dark:ring-slate-900"></span>
            </button>

            <!-- Notifications Dropdown -->
            <div x-show="open" 
                 @click.outside="open = false"
                 x-transition:enter="transition ease-out duration-150"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-100"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="absolute right-0 mt-2 w-80 bg-white dark:bg-slate-800 rounded-2xl shadow-xl border border-[#E5ECEB] dark:border-slate-700 p-4 z-50">
                <div class="flex items-center justify-between pb-3 border-b border-[#E5ECEB] dark:border-slate-700">
                    <h3 class="font-bold text-sm text-[#172033] dark:text-white">Notifications</h3>
                    <span class="text-[11px] font-semibold text-[#159A9C] bg-[#DDF6EF] dark:bg-[#159A9C]/20 px-2 py-0.5 rounded-full">2 New</span>
                </div>
                <div class="py-2 space-y-3">
                    <div class="flex gap-3 text-xs">
                        <div class="w-7 h-7 rounded-full bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] flex items-center justify-center shrink-0 mt-0.5">
                            ✓
                        </div>
                        <div>
                            <p class="font-medium text-[#172033] dark:text-slate-200">DLL Science Grade 4 synced</p>
                            <p class="text-[11px] text-[#94A3B8]">10 minutes ago</p>
                        </div>
                    </div>
                    <div class="flex gap-3 text-xs">
                        <div class="w-7 h-7 rounded-full bg-[#FFF4D6] dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 flex items-center justify-center shrink-0 mt-0.5">
                            !
                        </div>
                        <div>
                            <p class="font-medium text-[#172033] dark:text-slate-200">SF2 Attendance report due tomorrow</p>
                            <p class="text-[11px] text-[#94A3B8]">2 hours ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Teacher Avatar & Profile Dropdown -->
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" 
                    class="flex items-center gap-2.5 bg-white dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 shadow-2xs hover:border-slate-300 dark:hover:border-slate-600 p-1.5 pr-3 rounded-full transition-all cursor-pointer">
                <!-- Maria Santos Teacher Avatar -->
                <img class="w-8 h-8 rounded-full object-cover ring-2 ring-[#159A9C]/20" 
                     src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=256&auto=format&fit=crop" 
                     alt="Teacher Maria Santos">
                
                <div class="text-left hidden sm:block">
                    <h2 class="text-xs font-bold text-[#172033] dark:text-slate-100 leading-tight">Teacher Maria Santos</h2>
                    <p class="text-[10px] text-[#64748B] dark:text-slate-400 font-medium leading-tight">Grade 4 • Adviser</p>
                </div>

                <svg class="w-4 h-4 text-[#94A3B8] transition-transform duration-150" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <!-- Profile Dropdown Menu -->
            <div x-show="open" 
                 @click.outside="open = false"
                 x-transition:enter="transition ease-out duration-150"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-100"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="absolute right-0 mt-2 w-56 bg-white dark:bg-slate-800 rounded-2xl shadow-xl border border-[#E5ECEB] dark:border-slate-700 p-2 z-50">
                
                <div class="px-3 py-2 border-b border-[#E5ECEB] dark:border-slate-700">
                    <p class="font-bold text-xs text-[#172033] dark:text-white">Maria Santos</p>
                    <p class="text-[11px] text-[#64748B] dark:text-slate-400">maria.santos@deped.gov.ph</p>
                </div>

                <div class="py-1 text-xs font-medium text-[#172033] dark:text-slate-200">
                    <button @click="darkMode = !darkMode" class="w-full text-left px-3 py-2 hover:bg-slate-50 dark:hover:bg-slate-700/60 rounded-xl transition-colors flex items-center justify-between">
                        <span class="flex items-center gap-2">
                            <svg x-show="darkMode" class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            <svg x-show="!darkMode" class="w-4 h-4 text-[#159A9C]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                            </svg>
                            <span>Theme Mode</span>
                        </span>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-md bg-slate-100 dark:bg-slate-700 text-[#159A9C] dark:text-teal-300" x-text="darkMode ? 'Dark' : 'Light'"></span>
                    </button>

                    <button @click="setTab('settings'); open = false" class="w-full text-left px-3 py-2 hover:bg-slate-50 dark:hover:bg-slate-700/60 rounded-xl transition-colors flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#64748B] dark:text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <span>My Profile</span>
                    </button>

                    <button @click="setTab('settings'); open = false" class="w-full text-left px-3 py-2 hover:bg-slate-50 dark:hover:bg-slate-700/60 rounded-xl transition-colors flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#64748B] dark:text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        </svg>
                        <span>Account Settings</span>
                    </button>
                </div>

                <div class="pt-1 border-t border-[#E5ECEB] dark:border-slate-700 text-xs font-medium">
                    <button class="w-full text-left px-3 py-2 text-rose-600 dark:text-rose-400 hover:bg-rose-50 dark:hover:bg-rose-950/40 rounded-xl transition-colors flex items-center gap-2">
                        <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        <span>Sign Out</span>
                    </button>
                </div>
            </div>
        </div>

    </div>
</header>
