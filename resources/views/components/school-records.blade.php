<div class="bg-white border border-[#E5ECEB] rounded-2xl p-5 md:p-6 shadow-2xs">
    <!-- Header -->
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-2">
            <div class="w-6 h-6 rounded-lg bg-[#FFF4D6] text-[#D97706] flex items-center justify-center">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                </svg>
            </div>
            <h3 class="font-bold text-base md:text-lg text-[#172033]">School Records</h3>
        </div>
        <button @click="activeTab = 'sf2'" class="text-xs font-bold text-[#159A9C] hover:underline flex items-center gap-1 cursor-pointer">
            <span>View all</span>
            <span>→</span>
        </button>
    </div>

    <!-- 4 Option Boxes Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
        
        <!-- SF2 Attendance -->
        <button @click="activeTab = 'sf2'" 
                class="p-3.5 rounded-2xl bg-[#F4F9F8]/90 hover:bg-[#DDF6EF]/50 border border-[#E5ECEB] transition-all flex flex-col items-center text-center cursor-pointer group">
            <div class="w-10 h-10 rounded-2xl bg-[#DDF6EF] text-[#22A06B] flex items-center justify-center mb-2 shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <span class="font-bold text-xs text-[#172033]">SF2</span>
            <span class="text-[11px] text-[#64748B] font-medium leading-tight">Attendance</span>
        </button>

        <!-- SF9 Report Card -->
        <button @click="activeTab = 'sf9'" 
                class="p-3.5 rounded-2xl bg-[#F4F9F8]/90 hover:bg-[#FFF4D6]/60 border border-[#E5ECEB] transition-all flex flex-col items-center text-center cursor-pointer group">
            <div class="w-10 h-10 rounded-2xl bg-[#FFF4D6] text-[#D97706] flex items-center justify-center mb-2 shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
            <span class="font-bold text-xs text-[#172033]">SF9</span>
            <span class="text-[11px] text-[#64748B] font-medium leading-tight">Report Card</span>
        </button>

        <!-- SF10 Permanent Record -->
        <button @click="activeTab = 'sf10'" 
                class="p-3.5 rounded-2xl bg-[#F4F9F8]/90 hover:bg-[#EEE9FF]/60 border border-[#E5ECEB] transition-all flex flex-col items-center text-center cursor-pointer group">
            <div class="w-10 h-10 rounded-2xl bg-[#EEE9FF] text-[#7C3AED] flex items-center justify-center mb-2 shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 012-2h2a2 2 0 012 2v1m-6 0h6"/>
                </svg>
            </div>
            <span class="font-bold text-xs text-[#172033]">SF10</span>
            <span class="text-[11px] text-[#64748B] font-medium leading-tight">Permanent Record</span>
        </button>

        <!-- Reports & Analytics -->
        <button @click="activeTab = 'reports'" 
                class="p-3.5 rounded-2xl bg-[#F4F9F8]/90 hover:bg-[#DDF6EF]/60 border border-[#E5ECEB] transition-all flex flex-col items-center text-center cursor-pointer group">
            <div class="w-10 h-10 rounded-2xl bg-[#DDF6EF] text-[#159A9C] flex items-center justify-center mb-2 shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
            </div>
            <span class="font-bold text-xs text-[#172033]">Reports</span>
            <span class="text-[11px] text-[#64748B] font-medium leading-tight">& Analytics</span>
        </button>

    </div>
</div>
