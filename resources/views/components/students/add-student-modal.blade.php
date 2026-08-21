<div x-data="{
        open: false,
        name: '',
        lrn: '',
        gender: 'Female',
        birthdate: '',
        parentName: '',
        parentContact: ''
     }"
     @open-add-student-modal.window="open = true"
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
             class="relative w-full max-w-md bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-3xl p-6 md:p-8 shadow-2xl overflow-hidden">
            
            <!-- Header -->
            <div class="flex items-center justify-between border-b border-[#E5ECEB]/80 dark:border-slate-800 pb-4 mb-5">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#159A9C]"></span>
                        <h3 class="font-extrabold text-xl text-[#172033] dark:text-white">Add New Student</h3>
                    </div>
                    <p class="text-xs text-[#64748B] dark:text-slate-400 font-medium mt-1">
                        Register a new learner into Grade 4 – Rizal roster.
                    </p>
                </div>
                <button @click="open = false" class="w-8 h-8 rounded-xl bg-[#F4F9F8] dark:bg-slate-800 text-[#94A3B8] hover:text-[#172033] dark:hover:text-white flex items-center justify-center transition-colors">
                    ✕
                </button>
            </div>

            <!-- Form Fields -->
            <div class="space-y-3 mb-6">
                <div>
                    <label class="block text-xs font-extrabold uppercase tracking-wider text-[#64748B] dark:text-slate-400 mb-1">
                        Student Full Name
                    </label>
                    <input type="text" x-model="name" placeholder="e.g. Gabriel Ramos" class="w-full bg-[#F4F9F8] dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 px-3 py-2.5 rounded-2xl text-xs font-semibold text-[#172033] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#159A9C]/40">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-extrabold uppercase tracking-wider text-[#64748B] dark:text-slate-400 mb-1">
                            12-Digit LRN
                        </label>
                        <input type="text" x-model="lrn" placeholder="123456789017" class="w-full bg-[#F4F9F8] dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 px-3 py-2.5 rounded-2xl text-xs font-semibold text-[#172033] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#159A9C]/40">
                    </div>

                    <div>
                        <label class="block text-xs font-extrabold uppercase tracking-wider text-[#64748B] dark:text-slate-400 mb-1">
                            Gender
                        </label>
                        <select x-model="gender" class="w-full bg-[#F4F9F8] dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 px-3 py-2.5 rounded-2xl text-xs font-semibold text-[#172033] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#159A9C]/40">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-extrabold uppercase tracking-wider text-[#64748B] dark:text-slate-400 mb-1">
                            Parent / Guardian
                        </label>
                        <input type="text" x-model="parentName" placeholder="Guardian Name" class="w-full bg-[#F4F9F8] dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 px-3 py-2.5 rounded-2xl text-xs font-semibold text-[#172033] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#159A9C]/40">
                    </div>

                    <div>
                        <label class="block text-xs font-extrabold uppercase tracking-wider text-[#64748B] dark:text-slate-400 mb-1">
                            Contact Number
                        </label>
                        <input type="text" x-model="parentContact" placeholder="0917-000-0000" class="w-full bg-[#F4F9F8] dark:bg-slate-800 border border-[#E5ECEB] dark:border-slate-700 px-3 py-2.5 rounded-2xl text-xs font-semibold text-[#172033] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#159A9C]/40">
                    </div>
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="flex items-center justify-end gap-3 pt-3 border-t border-[#E5ECEB]/80 dark:border-slate-800">
                <button @click="open = false" class="px-4 py-2.5 text-xs font-bold text-[#64748B] dark:text-slate-400 hover:text-[#172033] dark:hover:text-white cursor-pointer">
                    Cancel
                </button>
                <button @click="open = false; $dispatch('toast', 'Student ' + (name || 'New Learner') + ' added successfully!')"
                        class="px-6 py-2.5 bg-[#159A9C] hover:bg-[#0E7476] text-white font-extrabold text-xs rounded-xl shadow-xs transition-all flex items-center gap-2 cursor-pointer">
                    <span>Add Student</span>
                    <span>→</span>
                </button>
            </div>

        </div>
    </div>
</div>
