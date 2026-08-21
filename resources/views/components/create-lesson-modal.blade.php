<div x-show="lessonBuilderOpen" 
     class="fixed inset-0 z-50 overflow-y-auto" 
     style="display: none;"
     x-data="{
         step: 1,
         grade: 'Grade 4',
         subject: 'Science',
         topic: 'The Water Cycle and Evaporation',
         approach: 'Inquiry-Based',
         duration: 'Single Day DLL',
         taxonomies: ['Understand', 'Apply', 'Analyze'],
         framework: 'MATATAG DLL',
         materials: ['Presentation', 'Worksheet', 'Quiz', 'Activities'],
         completed: false,
         toggleTaxonomy(t) {
             if (this.taxonomies.includes(t)) {
                 this.taxonomies = this.taxonomies.filter(item => item !== t);
             } else {
                 this.taxonomies.push(t);
             }
         },
         toggleMaterial(m) {
             if (this.materials.includes(m)) {
                 this.materials = this.materials.filter(item => item !== m);
             } else {
                 this.materials.push(m);
             }
         },
         finishLesson() {
             this.completed = true;
         },
         resetBuilder() {
             this.step = 1;
             this.completed = false;
             this.lessonBuilderOpen = false;
         }
     }">
    
    <!-- Modal Backdrop -->
    <div x-show="lessonBuilderOpen" 
         @click="resetBuilder()"
         x-transition:enter="ease-out duration-200" 
         x-transition:enter-start="opacity-0" 
         x-transition:enter-end="opacity-100" 
         x-transition:leave="ease-in duration-150" 
         x-transition:leave-start="opacity-100" 
         x-transition:leave-end="opacity-0" 
         class="fixed inset-0 bg-slate-900/50 backdrop-blur-xs">
    </div>

    <!-- Modal Content -->
    <div class="min-h-screen px-4 py-8 flex items-center justify-center relative">
        <div x-show="lessonBuilderOpen" 
             x-transition:enter="ease-out duration-300" 
             x-transition:enter-start="opacity-0 scale-95" 
             x-transition:enter-end="opacity-100 scale-100" 
             x-transition:leave="ease-in duration-200" 
             x-transition:leave-start="opacity-100 scale-100" 
             x-transition:leave-end="opacity-0 scale-95" 
             class="w-full max-w-3xl bg-white rounded-3xl shadow-2xl border border-[#E5ECEB] overflow-hidden flex flex-col my-auto relative z-10">

            <!-- Header & Step Indicator -->
            <div class="px-6 pt-6 pb-4 border-b border-[#E5ECEB] bg-[#F4F9F8]/60 flex items-center justify-between">
                <div>
                    <span class="text-[11px] font-bold tracking-wider text-[#159A9C] uppercase bg-[#DDF6EF] px-2.5 py-0.5 rounded-md">
                        DepEd MATATAG Lesson Studio
                    </span>
                    <h2 class="text-xl font-extrabold text-[#172033] tracking-tight mt-1">Create MATATAG Lesson Plan</h2>
                </div>
                <button @click="resetBuilder()" class="p-2 text-[#94A3B8] hover:text-[#172033] hover:bg-slate-200/60 rounded-full transition-colors cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Progress Bar -->
            <div x-show="!completed" class="px-6 py-3 bg-white border-b border-[#E5ECEB]/60">
                <div class="flex items-center justify-between text-xs font-semibold text-[#64748B] mb-2">
                    <span :class="step === 1 ? 'text-[#159A9C] font-bold' : ''">Step 1: Lesson Info</span>
                    <span :class="step === 2 ? 'text-[#159A9C] font-bold' : ''">Step 2: Teaching Plan</span>
                    <span :class="step === 3 ? 'text-[#159A9C] font-bold' : ''">Step 3: Materials</span>
                </div>
                <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                    <div class="h-full bg-[#159A9C] transition-all duration-300 rounded-full"
                         :style="'width: ' + (step === 1 ? '33.3%' : (step === 2 ? '66.6%' : '100%'))">
                    </div>
                </div>
            </div>

            <!-- Modal Body (Steps Flow) -->
            <div class="p-6 md:p-8 space-y-6">
                
                <!-- SUCCESS STATE -->
                <div x-show="completed" class="text-center py-8 space-y-4">
                    <div class="w-16 h-16 rounded-full bg-[#DDF6EF] text-[#159A9C] flex items-center justify-center mx-auto text-2xl shadow-inner">
                        🎉
                    </div>
                    <h3 class="text-2xl font-extrabold text-[#172033]">Lesson Generated Successfully!</h3>
                    <p class="text-sm text-[#64748B] max-w-md mx-auto">
                        Your MATATAG-aligned <span class="font-semibold text-[#172033]" x-text="framework"></span> for 
                        <span class="font-semibold text-[#172033]" x-text="subject"></span> (<span x-text="grade"></span>) has been generated with AI assistance.
                    </p>
                    
                    <div class="p-4 bg-[#F4F9F8] rounded-2xl border border-[#E5ECEB] max-w-md mx-auto text-left text-xs space-y-2">
                        <div class="flex justify-between border-b border-[#E5ECEB] pb-2">
                            <span class="text-[#64748B]">Topic:</span>
                            <span class="font-bold text-[#172033]" x-text="topic"></span>
                        </div>
                        <div class="flex justify-between border-b border-[#E5ECEB] pb-2">
                            <span class="text-[#64748B]">Framework:</span>
                            <span class="font-bold text-[#159A9C]" x-text="framework"></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-[#64748B]">Included Materials:</span>
                            <span class="font-semibold text-[#172033]" x-text="materials.join(', ')"></span>
                        </div>
                    </div>

                    <div class="flex justify-center gap-3 pt-4">
                        <button @click="resetBuilder()" class="px-5 py-2.5 bg-white border border-[#E5ECEB] hover:bg-slate-50 text-[#172033] font-semibold text-xs rounded-xl shadow-2xs cursor-pointer">
                            Close & Go to Dashboard
                        </button>
                        <button @click="resetBuilder()" class="px-5 py-2.5 bg-[#159A9C] hover:bg-[#0E7476] text-white font-semibold text-xs rounded-xl shadow-md cursor-pointer flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            Preview Lesson Plan
                        </button>
                    </div>
                </div>

                <!-- STEP 1: Lesson Information -->
                <div x-show="!completed && step === 1" class="space-y-4">
                    <h3 class="font-bold text-base text-[#172033]">Step 1: Basic Lesson Information</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-[#64748B] uppercase tracking-wider mb-1">Grade Level</label>
                            <select x-model="grade" class="w-full bg-[#F4F9F8] border border-[#E5ECEB] focus:border-[#159A9C] text-xs md:text-sm p-3 rounded-xl outline-none font-medium">
                                <option>Grade 1</option>
                                <option>Grade 2</option>
                                <option>Grade 3</option>
                                <option selected>Grade 4</option>
                                <option>Grade 5</option>
                                <option>Grade 6</option>
                                <option>Grade 7</option>
                                <option>Grade 10</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-[#64748B] uppercase tracking-wider mb-1">Subject</label>
                            <select x-model="subject" class="w-full bg-[#F4F9F8] border border-[#E5ECEB] focus:border-[#159A9C] text-xs md:text-sm p-3 rounded-xl outline-none font-medium">
                                <option selected>Science</option>
                                <option>Mathematics</option>
                                <option>English</option>
                                <option>Filipino</option>
                                <option>Araling Panlipunan</option>
                                <option>MAPEH</option>
                                <option>TLE / EPP</option>
                                <option>Values Education</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-[#64748B] uppercase tracking-wider mb-1">Learning Competency / Topic</label>
                        <input type="text" x-model="topic" placeholder="e.g. Describe the changes in water during evaporation..." class="w-full bg-[#F4F9F8] border border-[#E5ECEB] focus:border-[#159A9C] text-xs md:text-sm p-3 rounded-xl outline-none font-medium">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-[#64748B] uppercase tracking-wider mb-1">Teaching Approach</label>
                            <select x-model="approach" class="w-full bg-[#F4F9F8] border border-[#E5ECEB] focus:border-[#159A9C] text-xs md:text-sm p-3 rounded-xl outline-none font-medium">
                                <option selected>Inquiry-Based</option>
                                <option>Constructivist</option>
                                <option>Integrative</option>
                                <option>Collaborative</option>
                                <option>Reflective</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-[#64748B] uppercase tracking-wider mb-1">Lesson Scope / Duration</label>
                            <select x-model="duration" class="w-full bg-[#F4F9F8] border border-[#E5ECEB] focus:border-[#159A9C] text-xs md:text-sm p-3 rounded-xl outline-none font-medium">
                                <option selected>Single Day DLL</option>
                                <option>Weekly Plan (5 Days)</option>
                                <option>Detailed Lesson Plan (DLP)</option>
                                <option>2-Week Learning Module</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- STEP 2: Teaching Plan (Bloom's Taxonomy & Frameworks) -->
                <div x-show="!completed && step === 2" class="space-y-5">
                    <h3 class="font-bold text-base text-[#172033]">Step 2: Pedagogical & Framework Plan</h3>

                    <!-- Bloom's Taxonomy -->
                    <div>
                        <label class="block text-xs font-bold text-[#64748B] uppercase tracking-wider mb-2">Bloom's Taxonomy Focus Targets</label>
                        <div class="flex flex-wrap gap-2">
                            <template x-for="t in ['Remember', 'Understand', 'Apply', 'Analyze', 'Evaluate', 'Create']" :key="t">
                                <button type="button"
                                        @click="toggleTaxonomy(t)"
                                        :class="taxonomies.includes(t) ? 'bg-[#159A9C] text-white border-[#159A9C]' : 'bg-[#F4F9F8] text-[#64748B] border-[#E5ECEB] hover:bg-slate-100'"
                                        class="px-3.5 py-2 rounded-xl text-xs font-semibold border transition-all cursor-pointer">
                                    <span x-text="t"></span>
                                </button>
                            </template>
                        </div>
                    </div>

                    <!-- Lesson Framework Selection Cards -->
                    <div>
                        <label class="block text-xs font-bold text-[#64748B] uppercase tracking-wider mb-2">Select DepEd Lesson Framework</label>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                            <template x-for="f in ['MATATAG DLL', 'Detailed Lesson Plan', 'ILAW Lesson Plan', 'ILAW Lesson Log', 'School Template', 'My Saved Template']" :key="f">
                                <div @click="framework = f"
                                     :class="framework === f ? 'border-[#159A9C] bg-[#DDF6EF]/40 text-[#159A9C] ring-2 ring-[#159A9C]/20' : 'border-[#E5ECEB] bg-white text-[#172033] hover:border-slate-300'"
                                     class="p-3.5 rounded-2xl border cursor-pointer transition-all text-left flex flex-col justify-between">
                                    <span class="text-xs font-bold block" x-text="f"></span>
                                    <span class="text-[10px] text-[#64748B] mt-1">Standard alignment</span>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- STEP 3: Teaching Materials Selection -->
                <div x-show="!completed && step === 3" class="space-y-4">
                    <h3 class="font-bold text-base text-[#172033]">Step 3: Materials to Auto-Generate</h3>
                    <p class="text-xs text-[#64748B]">Select the instructional assets you want GuroPilot to draft alongside your lesson plan:</p>

                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        <template x-for="m in ['Presentation', 'Worksheet', 'Quiz', 'Activities', 'Project', 'Assignment', 'Reading Material', 'Laboratory Activity', 'Educational Video']" :key="m">
                            <label @click="toggleMaterial(m)"
                                   :class="materials.includes(m) ? 'border-[#159A9C] bg-[#DDF6EF]/30 text-[#159A9C]' : 'border-[#E5ECEB] bg-white text-[#64748B] hover:border-slate-300'"
                                   class="p-3.5 rounded-2xl border cursor-pointer transition-all flex items-center gap-2.5">
                                <input type="checkbox" :checked="materials.includes(m)" class="w-4 h-4 rounded text-[#159A9C] accent-[#159A9C]">
                                <span class="text-xs font-semibold" x-text="m"></span>
                            </label>
                        </template>
                    </div>
                </div>

            </div>

            <!-- Modal Footer Controls -->
            <div x-show="!completed" class="px-6 py-4 bg-[#F4F9F8]/80 border-t border-[#E5ECEB] flex items-center justify-between">
                <button type="button" 
                        x-show="step > 1" 
                        @click="step--" 
                        class="px-4 py-2 bg-white border border-[#E5ECEB] text-[#64748B] font-semibold text-xs rounded-xl hover:bg-slate-50 transition-colors cursor-pointer">
                    ← Back
                </button>

                <div class="ml-auto flex items-center gap-3">
                    <button type="button" @click="resetBuilder()" class="px-4 py-2 text-[#64748B] font-semibold text-xs hover:text-[#172033] transition-colors cursor-pointer">
                        Cancel
                    </button>
                    
                    <button type="button" 
                            x-show="step < 3" 
                            @click="step++" 
                            class="px-5 py-2 bg-[#159A9C] hover:bg-[#0E7476] text-white font-semibold text-xs rounded-xl shadow-xs transition-colors cursor-pointer flex items-center gap-1.5">
                        <span>Next Step</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>

                    <button type="button" 
                            x-show="step === 3" 
                            @click="finishLesson()" 
                            class="px-5 py-2 bg-[#159A9C] hover:bg-[#0E7476] text-white font-bold text-xs rounded-xl shadow-md transition-colors cursor-pointer flex items-center gap-2">
                        <span>✨ Create My Lesson</span>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
