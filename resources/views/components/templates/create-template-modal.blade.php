<div x-data="{
        open: false,
        selectedClass: 'Grade 4 – Rizal',
        creationOption: 'existing',
        templateName: 'Grade 4 Science Inquiry Template',
        classesList: [
            'Grade 4 – Rizal (Science)',
            'Grade 5 – Bonifacio (Mathematics)',
            'Grade 3 – Mabini (English)',
            'Grade 6 – Luna (Araling Panlipunan)',
            'Grade 4 – Aguinaldo (Filipino)'
        ]
     }"
     @open-create-template.window="open = true"
     x-show="open"
     x-cloak
     class="fixed inset-0 z-50 overflow-y-auto"
     style="display: none;">

    <!-- Backdrop -->
    <div @click="open = false" 
         x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-slate-900/50 backdrop-blur-xs"></div>

    <!-- Dialog -->
    <div class="flex min-h-full items-center justify-center p-4">
        <div x-show="open"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95 translate-y-2"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 translate-y-2"
             class="relative w-full max-w-lg bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 md:p-8 shadow-2xl overflow-hidden">
            
            <!-- Header -->
            <div class="flex items-center justify-between border-b border-[#E5ECEB]/80 dark:border-slate-800 pb-4 mb-6">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#159A9C]"></span>
                        <h3 class="font-extrabold text-xl text-[#172033] dark:text-white">Create a Template</h3>
                    </div>
                    <p class="text-xs md:text-sm text-[#64748B] dark:text-slate-400 font-medium mt-1">
                        Create a reusable lesson structure for one of your classes.
                    </p>
                </div>
                <button @click="open = false" class="w-9 h-9 rounded-2xl bg-[#F4F9F8] dark:bg-slate-800 text-[#94A3B8] hover:text-[#172033] dark:hover:text-white flex items-center justify-center transition-colors">
                    ✕
                </button>
            </div>

            <!-- Form Fields -->
            <div class="space-y-4 mb-6">
                <!-- Select Class -->
                <div>
                    <label class="block text-xs font-extrabold uppercase tracking-wider text-[#64748B] dark:text-slate-400 mb-1.5">
                        Target Class / Section
                    </label>
                    <select x-model="selectedClass" 
                            class="w-full bg-[#F4F9F8] dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 px-4 py-3 rounded-2xl text-xs font-semibold text-[#172033] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#159A9C]/40">
                        <template x-for="item in classesList" :key="item">
                            <option :value="item" x-text="item"></option>
                        </template>
                    </select>
                </div>

                <!-- Template Title -->
                <div>
                    <label class="block text-xs font-extrabold uppercase tracking-wider text-[#64748B] dark:text-slate-400 mb-1.5">
                        Template Name
                    </label>
                    <input type="text" 
                           x-model="templateName"
                           placeholder="e.g. Science Inquiry Template" 
                           class="w-full bg-[#F4F9F8] dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 px-4 py-3 rounded-2xl text-xs font-semibold text-[#172033] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#159A9C]/40">
                </div>

                <!-- Creation Options -->
                <div>
                    <label class="block text-xs font-extrabold uppercase tracking-wider text-[#64748B] dark:text-slate-400 mb-1.5">
                        Starting Method
                    </label>
                    <div class="grid grid-cols-2 gap-3 text-xs">
                        <button @click="creationOption = 'existing'"
                                :class="creationOption === 'existing' ? 'bg-[#DDF6EF]/40 dark:bg-teal-950/40 border-[#159A9C] dark:border-teal-400 text-[#172033] dark:text-white font-bold ring-2 ring-[#159A9C]/20' : 'bg-[#F4F9F8] dark:bg-slate-800 border-[#E5ECEB] dark:border-slate-700 text-[#64748B] dark:text-slate-400'"
                                class="p-3.5 rounded-2xl border text-left transition-all flex flex-col justify-between cursor-pointer">
                            <span class="text-xl mb-1">📚</span>
                            <span class="font-bold block leading-snug">From Existing Lesson</span>
                            <span class="text-[10px] text-[#64748B] dark:text-slate-400 mt-1 block">Convert past DLL into template</span>
                        </button>

                        <button @click="creationOption = 'blank'"
                                :class="creationOption === 'blank' ? 'bg-[#DDF6EF]/40 dark:bg-teal-950/40 border-[#159A9C] dark:border-teal-400 text-[#172033] dark:text-white font-bold ring-2 ring-[#159A9C]/20' : 'bg-[#F4F9F8] dark:bg-slate-800 border-[#E5ECEB] dark:border-slate-700 text-[#64748B] dark:text-slate-400'"
                                class="p-3.5 rounded-2xl border text-left transition-all flex flex-col justify-between cursor-pointer">
                            <span class="text-xl mb-1">📝</span>
                            <span class="font-bold block leading-snug">Blank Template</span>
                            <span class="text-[10px] text-[#64748B] dark:text-slate-400 mt-1 block">Build structure from scratch</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="flex items-center justify-end gap-3 pt-3 border-t border-[#E5ECEB]/80 dark:border-slate-800">
                <button @click="open = false" class="px-4 py-2.5 text-xs font-bold text-[#64748B] dark:text-slate-400 hover:text-[#172033] dark:hover:text-white cursor-pointer">
                    Cancel
                </button>
                <button @click="open = false; $dispatch('toast', 'Template ' + templateName + ' created successfully!')"
                        class="px-6 py-2.5 bg-[#159A9C] hover:bg-[#0E7476] text-white font-extrabold text-xs rounded-xl shadow-xs transition-all flex items-center gap-2 cursor-pointer">
                    <span>Create Template</span>
                    <span>→</span>
                </button>
            </div>

        </div>
    </div>
</div>
