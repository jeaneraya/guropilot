<div class="bg-white border border-[#E5ECEB] rounded-2xl p-5 md:p-6 shadow-2xs">
    <!-- Header -->
    <div class="flex items-center justify-between mb-5">
        <h3 class="font-bold text-base md:text-lg text-[#172033]">My Classroom Overview</h3>
        <button @click="activeTab = 'classes'" class="text-xs font-bold text-[#159A9C] hover:underline flex items-center gap-1 cursor-pointer">
            <span>View all</span>
            <span>→</span>
        </button>
    </div>

    <!-- Active Class Box -->
    <div @click="activeTab = 'classes'" 
         class="p-4 rounded-2xl bg-[#F4F9F8]/80 hover:bg-[#DDF6EF]/40 border border-[#E5ECEB] transition-all flex items-center justify-between gap-3 cursor-pointer group">
        <div class="flex items-center gap-3.5">
            <div class="w-10 h-10 rounded-2xl bg-[#DDF6EF] text-[#159A9C] flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
            <div>
                <h4 class="font-bold text-sm text-[#172033] group-hover:text-[#159A9C] transition-colors">Grade 4 – Rizal</h4>
                <p class="text-xs text-[#64748B] font-medium">32 Students</p>
            </div>
        </div>
        <svg class="w-5 h-5 text-[#94A3B8] group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>
    </div>

    <!-- Divider -->
    <div class="my-5 border-t border-[#E5ECEB]"></div>

    <!-- 3 Metrics Grid -->
    <div class="grid grid-cols-3 gap-2 text-center">
        <!-- Attendance -->
        <div class="p-2">
            <span class="block text-xs font-semibold text-[#64748B] mb-1">Attendance</span>
            <span class="text-lg md:text-xl font-extrabold text-[#22A06B]">96%</span>
        </div>
        <!-- Grades Encoded -->
        <div class="p-2 border-x border-[#E5ECEB]">
            <span class="block text-xs font-semibold text-[#64748B] mb-1">Grades Encoded</span>
            <span class="text-lg md:text-xl font-extrabold text-[#3B82F6]">88%</span>
        </div>
        <!-- Activities -->
        <div class="p-2">
            <span class="block text-xs font-semibold text-[#64748B] mb-1">Activities</span>
            <span class="text-lg md:text-xl font-extrabold text-[#D97706]">12</span>
        </div>
    </div>
</div>
