<div {{ $attributes->merge(['class' => 'bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-2xl p-5 md:p-6 shadow-2xs flex flex-col justify-between']) }}
     x-data="{
         filter: 'all',
         events: [
             {
                 title: 'Term 1 Examination',
                 category: 'Exam',
                 badgeBg: 'bg-[#FDE9E7] dark:bg-rose-950/50',
                 badgeText: 'text-[#E11D48] dark:text-rose-400',
                 date: 'Aug 22, 2026',
                 time: '8:00 AM - 12:00 PM',
                 location: 'Grade 4 - Rizal Room'
             },
             {
                 title: 'Submission of SF2 & Form 137',
                 category: 'Submission',
                 badgeBg: 'bg-[#FFF4D6] dark:bg-amber-950/50',
                 badgeText: 'text-[#D97706] dark:text-amber-400',
                 date: 'Aug 24, 2026',
                 time: 'Before 5:00 PM',
                 location: 'Principal Office / LIS Portal'
             },
             {
                 title: 'Faculty & Department Meeting',
                 category: 'Meeting',
                 badgeBg: 'bg-[#EEE9FF] dark:bg-purple-950/50',
                 badgeText: 'text-[#7C3AED] dark:text-purple-300',
                 date: 'Aug 26, 2026',
                 time: '3:00 PM - 4:30 PM',
                 location: 'AVR Hall & Zoom'
             },
             {
                 title: 'Parent-Teacher Conference (PTC)',
                 category: 'Event',
                 badgeBg: 'bg-[#DDF6EF] dark:bg-teal-950/50',
                 badgeText: 'text-[#159A9C] dark:text-teal-300',
                 date: 'Aug 28, 2026',
                 time: '1:00 PM - 4:00 PM',
                 location: 'Grade 4 Classrooms'
             },
             {
                 title: 'MATATAG Classroom Observation',
                 category: 'Observation',
                 badgeBg: 'bg-[#EEE9FF] dark:bg-purple-950/50',
                 badgeText: 'text-[#7C3AED] dark:text-purple-300',
                 date: 'Aug 29, 2026',
                 time: '9:30 AM - 10:30 AM',
                 location: 'Science Subject Class'
             },
             {
                 title: 'Deadline: Term 1 Grades Encoding',
                 category: 'Submission',
                 badgeBg: 'bg-[#FFF4D6] dark:bg-amber-950/50',
                 badgeText: 'text-[#D97706] dark:text-amber-400',
                 date: 'Aug 31, 2026',
                 time: '11:59 PM',
                 location: 'DepEd LIS Portal'
             }
         ],
         get filteredEvents() {
             if (this.filter === 'all') return this.events;
             return this.events.filter(e => e.category.toLowerCase() === this.filter.toLowerCase());
         }
     }">
    
    <div>
        <!-- Card Header -->
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-xl bg-[#DDF6EF] dark:bg-[#159A9C]/20 text-[#159A9C] dark:text-teal-300 flex items-center justify-center shrink-0">
                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-base md:text-lg text-[#172033] dark:text-white">Teacher Calendar</h3>
                </div>
            </div>
            <span class="text-xs font-bold text-[#159A9C] dark:text-teal-300 bg-[#DDF6EF] dark:bg-[#159A9C]/20 px-2.5 py-1 rounded-full shrink-0">
                August 2026
            </span>
        </div>

        <!-- Mini Date Selector Strip -->
        <div class="flex items-center justify-between gap-1 mb-4 p-2 bg-[#F4F9F8] dark:bg-slate-800/80 rounded-xl border border-[#E5ECEB]/70 dark:border-slate-700 text-center text-xs">
            <div class="flex-1 py-1.5 rounded-lg text-[#64748B] dark:text-slate-400 hover:bg-white dark:hover:bg-slate-700 transition-colors cursor-pointer">
                <span class="block text-[10px] uppercase font-bold text-[#94A3B8]">Mon</span>
                <span class="font-bold text-[#172033] dark:text-slate-200">18</span>
            </div>
            <div class="flex-1 py-1.5 rounded-lg text-[#64748B] dark:text-slate-400 hover:bg-white dark:hover:bg-slate-700 transition-colors cursor-pointer">
                <span class="block text-[10px] uppercase font-bold text-[#94A3B8]">Tue</span>
                <span class="font-bold text-[#172033] dark:text-slate-200">19</span>
            </div>
            <!-- Today Highlight -->
            <div class="flex-1 py-1.5 rounded-lg bg-[#159A9C] text-white shadow-2xs font-bold cursor-pointer">
                <span class="block text-[10px] uppercase opacity-90">Wed</span>
                <span class="text-sm">20</span>
            </div>
            <div class="flex-1 py-1.5 rounded-lg text-[#64748B] dark:text-slate-400 hover:bg-white dark:hover:bg-slate-700 transition-colors cursor-pointer">
                <span class="block text-[10px] uppercase font-bold text-[#94A3B8]">Thu</span>
                <span class="font-bold text-[#172033] dark:text-slate-200">21</span>
            </div>
            <div class="flex-1 py-1.5 rounded-lg text-[#64748B] dark:text-slate-400 hover:bg-white dark:hover:bg-slate-700 transition-colors cursor-pointer relative">
                <span class="block text-[10px] uppercase font-bold text-[#94A3B8]">Fri</span>
                <span class="font-bold text-[#172033] dark:text-slate-200">22</span>
                <span class="absolute top-1 right-1 w-1.5 h-1.5 rounded-full bg-rose-500"></span>
            </div>
            <div class="flex-1 py-1.5 rounded-lg text-[#64748B] dark:text-slate-400 hover:bg-white dark:hover:bg-slate-700 transition-colors cursor-pointer">
                <span class="block text-[10px] uppercase font-bold text-[#94A3B8]">Sat</span>
                <span class="font-bold text-[#172033] dark:text-slate-200">23</span>
            </div>
        </div>

        <!-- Category Filter Tabs -->
        <div class="flex items-center gap-1.5 mb-4 overflow-x-auto pb-1 text-xs">
            <button @click="filter = 'all'" 
                    :class="filter === 'all' ? 'bg-[#172033] dark:bg-teal-600 text-white' : 'bg-slate-100 dark:bg-slate-800 text-[#64748B] dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700'"
                    class="px-3 py-1.5 rounded-xl font-semibold transition-all shrink-0 cursor-pointer">
                All Events
            </button>
            <button @click="filter = 'exam'" 
                    :class="filter === 'exam' ? 'bg-[#E11D48] text-white' : 'bg-[#FDE9E7] dark:bg-rose-950/40 text-[#E11D48] dark:text-rose-400 hover:opacity-90'"
                    class="px-3 py-1.5 rounded-xl font-semibold transition-all shrink-0 cursor-pointer">
                Exams
            </button>
            <button @click="filter = 'submission'" 
                    :class="filter === 'submission' ? 'bg-[#D97706] text-white' : 'bg-[#FFF4D6] dark:bg-amber-950/40 text-[#D97706] dark:text-amber-400 hover:opacity-90'"
                    class="px-3 py-1.5 rounded-xl font-semibold transition-all shrink-0 cursor-pointer">
                Submissions
            </button>
            <button @click="filter = 'meeting'" 
                    :class="filter === 'meeting' ? 'bg-[#7C3AED] text-white' : 'bg-[#EEE9FF] dark:bg-purple-950/40 text-[#7C3AED] dark:text-purple-300 hover:opacity-90'"
                    class="px-3 py-1.5 rounded-xl font-semibold transition-all shrink-0 cursor-pointer">
                Meetings
            </button>
        </div>
    </div>

    <!-- Events List (Internal Scrollable Container matching Recent Lessons height) -->
    <div class="space-y-3 overflow-y-auto max-h-[310px] pr-1.5 focus:outline-none">
        <template x-for="(event, idx) in filteredEvents" :key="idx">
            <div class="p-3.5 rounded-2xl bg-[#F4F9F8]/80 dark:bg-slate-800/50 hover:bg-[#F4F9F8] dark:hover:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 transition-all flex items-start justify-between gap-3 group">
                <div class="space-y-1 min-w-0">
                    <div class="flex items-center gap-2">
                        <span :class="event.badgeBg + ' ' + event.badgeText" class="px-2.5 py-0.5 rounded-md text-[10px] font-bold uppercase tracking-wider" x-text="event.category"></span>
                        <span class="text-xs text-[#94A3B8] dark:text-slate-400 font-medium" x-text="event.date"></span>
                    </div>
                    <h4 class="font-bold text-xs md:text-sm text-[#172033] dark:text-slate-100 group-hover:text-[#159A9C] dark:group-hover:text-teal-300 transition-colors leading-snug" x-text="event.title"></h4>
                    <div class="flex items-center gap-3 text-[11px] text-[#64748B] dark:text-slate-400 font-medium">
                        <span class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 text-[#94A3B8] dark:text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span x-text="event.time"></span>
                        </span>
                        <span class="truncate" x-text="event.location"></span>
                    </div>
                </div>
            </div>
        </template>
    </div>

</div>

