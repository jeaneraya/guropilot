<div>
    <!-- Floating Action Button (FAB) at Bottom-Right -->
    <button @click="assistantOpen = true" 
            class="fixed bottom-6 right-6 z-40 w-14 h-14 rounded-full bg-[#159A9C] text-white shadow-xl hover:bg-[#0E7476] hover:scale-105 active:scale-95 transition-all duration-200 flex items-center justify-center cursor-pointer group">
        
        <!-- Robot Icon -->
        <svg class="w-7 h-7 transition-transform group-hover:rotate-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 2v2"/>
            <rect x="4" y="6" width="16" height="12" rx="4"/>
            <circle cx="9" cy="11" r="1.5" fill="currentColor"/>
            <circle cx="15" cy="11" r="1.5" fill="currentColor"/>
            <path d="M9 15c.83.67 2.17 1 3 1s2.17-.33 3-1"/>
            <path d="M2 12h2"/>
            <path d="M20 12h2"/>
        </svg>

        <!-- Red Notification Badge Dot -->
        <span class="absolute top-1 right-1 w-3.5 h-3.5 bg-rose-500 rounded-full ring-2 ring-white"></span>
    </button>

    <!-- Slide-over AI Assistant Panel -->
    <div x-show="assistantOpen" 
         class="fixed inset-0 z-50 overflow-hidden" 
         style="display: none;">
        
        <!-- Backdrop -->
        <div x-show="assistantOpen" 
             @click="assistantOpen = false" 
             x-transition:enter="transition-opacity ease-linear duration-300" 
             x-transition:enter-start="opacity-0" 
             x-transition:enter-end="opacity-100" 
             x-transition:leave="transition-opacity ease-linear duration-300" 
             x-transition:leave-start="opacity-100" 
             x-transition:leave-end="opacity-0" 
             class="fixed inset-0 bg-slate-900/40 backdrop-blur-xs">
        </div>

        <div class="fixed inset-y-0 right-0 max-w-full flex pl-10">
            <div x-show="assistantOpen" 
                 x-transition:enter="transform transition ease-in-out duration-300 sm:duration-500" 
                 x-transition:enter-start="translate-x-full" 
                 x-transition:enter-end="translate-x-0" 
                 x-transition:leave="transform transition ease-in-out duration-300 sm:duration-500" 
                 x-transition:leave-start="translate-x-0" 
                 x-transition:leave-end="translate-x-full" 
                 class="w-screen max-w-md bg-white shadow-2xl flex flex-col justify-between"
                 x-data="{
                     messages: [
                         { sender: 'ai', text: 'Mabuhay, Teacher Maria! 👋 Ako ang iyong GuroPilot Assistant. Ano ang maipaglilingkod ko sa iyo ngayon?' },
                         { sender: 'ai', text: 'Pwede kitang tulungan sa MATATAG Daily Lesson Log (DLL), HOTS questions, rubrics, o SF9 report card remarks.' }
                     ],
                     newMessage: '',
                     sendMsg() {
                         if (!this.newMessage.trim()) return;
                         this.messages.push({ sender: 'user', text: this.newMessage });
                         const userText = this.newMessage;
                         this.newMessage = '';
                         setTimeout(() => {
                             this.messages.push({ 
                                 sender: 'ai', 
                                 text: 'I\'m generated a sample MATATAG alignment for: \"' + userText + '\". Would you like me to insert this directly into your active lesson plan draft?' 
                             });
                         }, 800);
                     }
                 }">

                <!-- Panel Header -->
                <div class="p-4 md:p-5 bg-gradient-to-r from-[#159A9C] to-[#0E7476] text-white flex items-center justify-between shadow-md">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-2xl bg-white/20 backdrop-blur-md flex items-center justify-center text-white shrink-0">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="4" y="6" width="16" height="12" rx="4"/>
                                <circle cx="9" cy="11" r="1.5" fill="currentColor"/>
                                <circle cx="15" cy="11" r="1.5" fill="currentColor"/>
                                <path d="M9 15c.83.67 2.17 1 3 1s2.17-.33 3-1"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-base leading-tight">Teacher Assistant AI</h3>
                            <p class="text-xs text-teal-100 flex items-center gap-1.5 mt-0.5">
                                <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                                DepEd MATATAG Companion
                            </p>
                        </div>
                    </div>
                    <button @click="assistantOpen = false" class="p-2 rounded-full hover:bg-white/10 transition-colors text-white cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Chat Body -->
                <div class="flex-1 p-4 overflow-y-auto space-y-4 bg-[#F4F9F8]">
                    
                    <template x-for="(msg, index) in messages" :key="index">
                        <div :class="msg.sender === 'user' ? 'justify-end' : 'justify-start'" class="flex gap-3">
                            <div x-show="msg.sender === 'ai'" class="w-8 h-8 rounded-full bg-[#159A9C] text-white flex items-center justify-center text-xs shrink-0 mt-1">
                                🤖
                            </div>
                            <div :class="msg.sender === 'user' ? 'bg-[#159A9C] text-white rounded-2xl rounded-tr-xs' : 'bg-white text-[#172033] border border-[#E5ECEB] rounded-2xl rounded-tl-xs shadow-2xs'" 
                                 class="p-3.5 max-w-[85%] text-xs md:text-sm leading-relaxed">
                                <p x-text="msg.text"></p>
                            </div>
                        </div>
                    </template>

                    <!-- Suggested Quick Prompt Chips -->
                    <div class="pt-2">
                        <p class="text-[11px] font-bold text-[#94A3B8] uppercase tracking-wider mb-2">Suggested Prompts:</p>
                        <div class="flex flex-wrap gap-2">
                            <button @click="newMessage = 'Help me write a MATATAG DLL for Science Grade 4'; sendMsg()" 
                                    class="text-xs bg-white border border-[#E5ECEB] hover:border-[#159A9C] hover:text-[#159A9C] text-[#64748B] px-3 py-1.5 rounded-full transition-all text-left shadow-2xs">
                                💡 Generate Science DLL
                            </button>
                            <button @click="newMessage = 'Create 5 HOTS questions for Parts of a Plant'; sendMsg()" 
                                    class="text-xs bg-white border border-[#E5ECEB] hover:border-[#159A9C] hover:text-[#159A9C] text-[#64748B] px-3 py-1.5 rounded-full transition-all text-left shadow-2xs">
                                🎯 5 HOTS Questions
                            </button>
                            <button @click="newMessage = 'Draft positive remarks for SF9 Report Card'; sendMsg()" 
                                    class="text-xs bg-white border border-[#E5ECEB] hover:border-[#159A9C] hover:text-[#159A9C] text-[#64748B] px-3 py-1.5 rounded-full transition-all text-left shadow-2xs">
                                📝 SF9 Student Remarks
                            </button>
                        </div>
                    </div>

                </div>

                <!-- Input Footer -->
                <div class="p-4 bg-white border-t border-[#E5ECEB]">
                    <form @submit.prevent="sendMsg()" class="flex items-center gap-2">
                        <input type="text" 
                               x-model="newMessage" 
                               placeholder="Ask anything about lessons, activities..." 
                               class="flex-1 bg-[#F4F9F8] border border-[#E5ECEB] focus:border-[#159A9C] focus:bg-white text-xs md:text-sm px-4 py-2.5 rounded-xl outline-none transition-all">
                        <button type="submit" 
                                class="p-2.5 bg-[#159A9C] hover:bg-[#0E7476] text-white rounded-xl transition-colors cursor-pointer shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
