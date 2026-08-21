<!-- ============================================================ -->
<!-- GUROPILOT — MATERIAL PREVIEW MODALS COMPONENT -->
<!-- ============================================================ -->

<div x-show="previewOpen" 
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-150"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     @keydown.escape.window="closePreview()"
     class="fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-3 md:p-6"
     style="display: none;">

    <div @click.away="closePreview()"
         class="bg-[#F4F9F8] dark:bg-[#111C38] w-full max-w-4xl max-h-[90vh] rounded-3xl shadow-2xl border border-[#E5ECEB] dark:border-slate-800 flex flex-col overflow-hidden relative">

        <!-- ========================================== -->
        <!-- MODAL HEADER -->
        <!-- ========================================== -->
        <div class="px-6 py-4 bg-white dark:bg-[#172033] border-b border-[#E5ECEB] dark:border-slate-800 flex items-center justify-between shrink-0">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-2xl flex items-center justify-center text-lg font-bold shrink-0"
                     :class="{
                        'bg-[#DDF6EF] text-[#159A9C] dark:bg-teal-950/40 dark:text-teal-300': previewType === 'dll',
                        'bg-[#FDE9E7] text-[#E11D48] dark:bg-rose-950/40 dark:text-rose-300': previewType === 'ilaw',
                        'bg-[#FFF4D6] text-[#D97706] dark:bg-amber-950/40 dark:text-amber-300': previewType === 'presentation',
                        'bg-[#DDF6EF] text-[#159A9C] dark:bg-teal-950/40 dark:text-teal-300': previewType === 'worksheet',
                        'bg-[#EEE9FF] text-[#7C3AED] dark:bg-purple-950/40 dark:text-purple-300': previewType === 'quiz',
                        'bg-[#FDE9E7] text-[#E11D48] dark:bg-rose-950/40 dark:text-rose-300': previewType === 'activity',
                        'bg-[#EAF2FF] text-[#2563EB] dark:bg-blue-950/40 dark:text-blue-300': !['dll','ilaw','presentation','worksheet','quiz','activity'].includes(previewType)
                     }">
                    <span x-text="previewIcon"></span>
                </div>
                <div>
                    <h2 class="text-lg font-extrabold text-[#172033] dark:text-white tracking-tight" x-text="previewTitle"></h2>
                    <p class="text-xs font-semibold text-[#64748B] dark:text-slate-400" x-text="selectedClass.subject + ' • ' + selectedClass.grade + ' • ' + selectedTerm + ' • ' + selectedLesson.week"></p>
                </div>
            </div>

            <!-- Top Header Actions -->
            <div class="flex items-center gap-2">
                <button @click="showToast('Download will be available when document generation is connected.')"
                        class="px-3.5 py-1.5 bg-[#159A9C] hover:bg-[#0E7476] text-white text-xs font-bold rounded-xl shadow-2xs transition-all flex items-center gap-1.5 cursor-pointer active:scale-95">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                    <span x-text="'Download ' + previewFormat"></span>
                </button>

                <button @click="closePreview()" 
                        class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-500 hover:text-slate-800 dark:hover:text-white flex items-center justify-center cursor-pointer transition-colors">
                    ✕
                </button>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- MODAL BODY / DOCUMENT CANVAS -->
        <!-- ========================================== -->
        <div class="p-4 md:p-8 overflow-y-auto flex-1 bg-[#F4F9F8] dark:bg-[#0B132B]">

            <!-- 1. DLL PREVIEW (Daily Lesson Log) -->
            <template x-if="previewType === 'dll'">
                <div class="max-w-3xl mx-auto bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-2xl p-6 md:p-10 shadow-sm font-sans text-[#172033] dark:text-slate-200 text-xs leading-relaxed space-y-6">
                    
                    <!-- DepEd Header -->
                    <div class="text-center space-y-1 pb-4 border-b-2 border-slate-900 dark:border-slate-600">
                        <p class="text-[10px] uppercase font-bold tracking-widest text-[#64748B] dark:text-slate-400">Republic of the Philippines • Department of Education</p>
                        <p class="text-[11px] font-bold text-slate-700 dark:text-slate-300">Region IV-A CALABARZON • Division of Cavite • District 1</p>
                        <h1 class="text-base font-black text-[#172033] dark:text-white uppercase tracking-wide pt-1">DAILY LESSON LOG (DLL)</h1>
                        <p class="text-[11px] font-bold text-[#159A9C] dark:text-teal-400">I.L.A.W. Framework Standard Format</p>
                    </div>

                    <!-- Metadata Grid Table -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 bg-[#F4F9F8] dark:bg-slate-900/60 p-4 rounded-xl border border-[#E5ECEB] dark:border-slate-800">
                        <div>
                            <span class="block text-[10px] font-bold uppercase text-[#64748B] dark:text-slate-400">School</span>
                            <span class="font-extrabold text-[#172033] dark:text-white">Rizal Elementary School</span>
                        </div>
                        <div>
                            <span class="block text-[10px] font-bold uppercase text-[#64748B] dark:text-slate-400">Grade & Section</span>
                            <span class="font-extrabold text-[#172033] dark:text-white" x-text="selectedClass.grade"></span>
                        </div>
                        <div>
                            <span class="block text-[10px] font-bold uppercase text-[#64748B] dark:text-slate-400">Learning Area</span>
                            <span class="font-extrabold text-[#172033] dark:text-white" x-text="selectedClass.subject"></span>
                        </div>
                        <div>
                            <span class="block text-[10px] font-bold uppercase text-[#64748B] dark:text-slate-400">Term & Week</span>
                            <span class="font-extrabold text-[#172033] dark:text-white" x-text="selectedTerm + ' • ' + selectedLesson.week"></span>
                        </div>
                    </div>

                    <!-- I. Intentions & Standards -->
                    <div class="space-y-3">
                        <h3 class="font-black text-sm text-[#172033] dark:text-white border-b border-[#E5ECEB] dark:border-slate-800 pb-1 flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#159A9C]"></span>
                            I. OBJECTIVES & CURRICULUM STANDARDS
                        </h3>
                        <div class="space-y-2 pl-3">
                            <p><strong class="text-slate-800 dark:text-slate-200">Content Standard:</strong> Learners demonstrate understanding that water changes state and moves continuously through the water cycle.</p>
                            <p><strong class="text-slate-800 dark:text-slate-200">Performance Standard:</strong> Learners create a labeled diagram or working model illustrating evaporation, condensation, and precipitation.</p>
                            <p><strong class="text-slate-800 dark:text-slate-200">Learning Competency:</strong> Describe the changes in water as it undergoes evaporation, condensation, and precipitation (S4ES-IVc-3).</p>
                        </div>
                    </div>

                    <!-- II. Learning Objectives -->
                    <div class="space-y-3">
                        <h3 class="font-black text-sm text-[#172033] dark:text-white border-b border-[#E5ECEB] dark:border-slate-800 pb-1 flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#159A9C]"></span>
                            II. SPECIFIC LEARNING OBJECTIVES
                        </h3>
                        <ol class="list-decimal list-inside space-y-1.5 pl-3 text-slate-700 dark:text-slate-300">
                            <li><strong>Knowledge:</strong> Identify and define the four main stages of the water cycle (Evaporation, Condensation, Precipitation, Collection).</li>
                            <li><strong>Skill:</strong> Construct a simple water cycle model using a Ziploc bag and warm water.</li>
                            <li><strong>Attitude:</strong> Appreciate the importance of water conservation in daily life.</li>
                        </ol>
                    </div>

                    <!-- III. Learner Context & UDL -->
                    <div class="space-y-3">
                        <h3 class="font-black text-sm text-[#172033] dark:text-white border-b border-[#E5ECEB] dark:border-slate-800 pb-1 flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#159A9C]"></span>
                            III. LEARNER CONTEXT & UDL ACCOMMODATIONS
                        </h3>
                        <div class="bg-[#DDF6EF]/40 dark:bg-teal-950/20 p-3.5 rounded-xl border border-[#159A9C]/20 space-y-1 text-slate-700 dark:text-slate-300">
                            <p><strong>Class Profile:</strong> 32 Students (18 Visual, 9 Kinesthetic, 5 Auditory). 2 Struggling Readers.</p>
                            <p><strong>UDL Accommodations:</strong> Visual word wall with bilingual terms (English/Filipino), hands-on Ziploc bag experiment, and oral summary option.</p>
                        </div>
                    </div>

                    <!-- IV. Learning Experience (I.L.A.W. Flow) -->
                    <div class="space-y-3">
                        <h3 class="font-black text-sm text-[#172033] dark:text-white border-b border-[#E5ECEB] dark:border-slate-800 pb-1 flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#159A9C]"></span>
                            IV. LEARNING EXPERIENCE (I.L.A.W. FRAMEWORK)
                        </h3>
                        
                        <div class="space-y-3 pl-3">
                            <div class="p-3 bg-white dark:bg-slate-900 border-l-4 border-teal-500 rounded-r-xl shadow-2xs">
                                <span class="font-extrabold text-teal-700 dark:text-teal-300 uppercase text-[11px] block">I — Interact (Pre-Lesson & Hook)</span>
                                <p class="mt-1">Show ice water in a clear cup. Ask learners: <em>"Where did the water drops on the outside of the cup come from?"</em> Activate prior knowledge on evaporation.</p>
                            </div>

                            <div class="p-3 bg-white dark:bg-slate-900 border-l-4 border-indigo-500 rounded-r-xl shadow-2xs">
                                <span class="font-extrabold text-indigo-700 dark:text-indigo-300 uppercase text-[11px] block">L — Learn (I DO / Direct Instruction)</span>
                                <p class="mt-1">Present slide deck explaining heat energy from the sun causing Evaporation, cooling air causing Condensation into clouds, and weight causing Precipitation.</p>
                            </div>

                            <div class="p-3 bg-white dark:bg-slate-900 border-l-4 border-amber-500 rounded-r-xl shadow-2xs">
                                <span class="font-extrabold text-amber-700 dark:text-amber-300 uppercase text-[11px] block">A — Apply (WE DO / Guided Practice & Group Activity)</span>
                                <p class="mt-1">In groups of 4, students complete the "Water Cycle in a Bag" experiment. Tape bag to a sunny window and observe condensation forming.</p>
                            </div>

                            <div class="p-3 bg-white dark:bg-slate-900 border-l-4 border-rose-500 rounded-r-xl shadow-2xs">
                                <span class="font-extrabold text-rose-700 dark:text-rose-300 uppercase text-[11px] block">W — Wrap-Up (YOU DO ALONE / Assessment & Reflection)</span>
                                <p class="mt-1">Students complete a 10-item formative quiz and a 3-2-1 Exit Ticket reflection.</p>
                            </div>
                        </div>
                    </div>

                    <!-- V. Assessment & Ways Forward -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="p-3.5 bg-[#F4F9F8] dark:bg-slate-900/60 rounded-xl border border-[#E5ECEB] dark:border-slate-800">
                            <h4 class="font-extrabold text-[#172033] dark:text-white mb-1.5">V. Assessment</h4>
                            <p class="text-[#64748B] dark:text-slate-400">10-item multiple choice quiz + group activity rubric evaluating scientific accuracy and team participation.</p>
                        </div>
                        <div class="p-3.5 bg-[#F4F9F8] dark:bg-slate-900/60 rounded-xl border border-[#E5ECEB] dark:border-slate-800">
                            <h4 class="font-extrabold text-[#172033] dark:text-white mb-1.5">VI. Ways Forward</h4>
                            <p class="text-[#64748B] dark:text-slate-400">Remediation sheet for scores below 75%; Water conservation poster challenge for fast finishers.</p>
                        </div>
                    </div>

                    <!-- Signatures Area -->
                    <div class="pt-6 border-t border-slate-300 dark:border-slate-700 grid grid-cols-3 gap-4 text-center text-[10px]">
                        <div>
                            <p class="text-[#64748B] dark:text-slate-400 mb-6">Prepared by:</p>
                            <p class="font-extrabold text-[#172033] dark:text-white underline">MARIA SANTOS</p>
                            <p class="text-[#64748B] dark:text-slate-400">Master Teacher I</p>
                        </div>
                        <div>
                            <p class="text-[#64748B] dark:text-slate-400 mb-6">Checked by:</p>
                            <p class="font-extrabold text-[#172033] dark:text-white underline">JUAN DELA CRUZ</p>
                            <p class="text-[#64748B] dark:text-slate-400">Head Teacher III</p>
                        </div>
                        <div>
                            <p class="text-[#64748B] dark:text-slate-400 mb-6">Noted by:</p>
                            <p class="font-extrabold text-[#172033] dark:text-white underline">DR. ELENA RAMOS</p>
                            <p class="text-[#64748B] dark:text-slate-400">School Principal II</p>
                        </div>
                    </div>

                </div>
            </template>

            <!-- 2. ILAW LESSON PLAN PREVIEW -->
            <template x-if="previewType === 'ilaw'">
                <div class="max-w-3xl mx-auto bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-2xl p-6 md:p-10 shadow-sm font-sans text-[#172033] dark:text-slate-200 text-xs leading-relaxed space-y-6">
                    
                    <!-- DepEd Header -->
                    <div class="text-center space-y-1 pb-4 border-b-2 border-slate-900 dark:border-slate-600">
                        <p class="text-[10px] uppercase font-bold tracking-widest text-[#64748B] dark:text-slate-400">Republic of the Philippines • Department of Education</p>
                        <h1 class="text-base font-black text-[#172033] dark:text-white uppercase tracking-wide pt-1">ILAW LESSON PLAN (UDL-INFORMED)</h1>
                        <div class="inline-block px-3 py-1 bg-[#FDE9E7] dark:bg-rose-950/40 text-[#E11D48] dark:text-rose-300 font-extrabold rounded-full text-[10px]">
                            AI-Assisted & Teacher-Verified
                        </div>
                    </div>

                    <!-- AI Declaration Disclaimer -->
                    <div class="bg-[#FFF4D6] dark:bg-amber-950/30 p-3 rounded-xl border border-[#D97706]/30 text-slate-700 dark:text-amber-200 text-[11px] flex items-start gap-2">
                        <span class="text-base">🤖</span>
                        <div>
                            <strong>Declaration of AI Assistance:</strong> Initial lesson design generated via GuroPilot AI, reviewed and customized for Grade 4 – Rizal learning standards.
                        </div>
                    </div>

                    <!-- Detailed Overview Table -->
                    <table class="w-full border-collapse border border-slate-200 dark:border-slate-800 text-[11px]">
                        <tr class="bg-slate-50 dark:bg-slate-900">
                            <td class="p-2.5 border border-slate-200 dark:border-slate-800 font-bold">Grade Level & Section:</td>
                            <td class="p-2.5 border border-slate-200 dark:border-slate-800" x-text="selectedClass.grade"></td>
                            <td class="p-2.5 border border-slate-200 dark:border-slate-800 font-bold">Subject Area:</td>
                            <td class="p-2.5 border border-slate-200 dark:border-slate-800" x-text="selectedClass.subject"></td>
                        </tr>
                        <tr>
                            <td class="p-2.5 border border-slate-200 dark:border-slate-800 font-bold">Term & Week:</td>
                            <td class="p-2.5 border border-slate-200 dark:border-slate-800" x-text="selectedTerm + ' • ' + selectedLesson.week"></td>
                            <td class="p-2.5 border border-slate-200 dark:border-slate-800 font-bold">Duration:</td>
                            <td class="p-2.5 border border-slate-200 dark:border-slate-800">60 Minutes</td>
                        </tr>
                    </table>

                    <!-- Detailed Instructional Steps -->
                    <div class="space-y-4">
                        <h3 class="font-extrabold text-sm text-[#172033] dark:text-white">INSTRUCTIONAL FLOW (GRADUAL RELEASE OF RESPONSIBILITY)</h3>
                        
                        <div class="space-y-3">
                            <div class="p-4 bg-[#F4F9F8] dark:bg-slate-900/60 rounded-xl border border-[#E5ECEB] dark:border-slate-800">
                                <span class="font-black text-[#159A9C] dark:text-teal-300 uppercase tracking-wider block mb-1">Pre-Lesson (5 Mins) — Hook</span>
                                <p>Activate prior interest using a 1-minute video clip of rain. Ask students to describe where rain comes from. Write responses on whiteboard.</p>
                            </div>

                            <div class="p-4 bg-[#F4F9F8] dark:bg-slate-900/60 rounded-xl border border-[#E5ECEB] dark:border-slate-800">
                                <span class="font-black text-[#7C3AED] dark:text-purple-300 uppercase tracking-wider block mb-1">I DO (15 Mins) — Modeling & Direct Instruction</span>
                                <p>Teacher explains Evaporation, Condensation, Transpiration, and Precipitation using animated slides. Emphasize sun heat energy as the engine of the cycle.</p>
                            </div>

                            <div class="p-4 bg-[#F4F9F8] dark:bg-slate-900/60 rounded-xl border border-[#E5ECEB] dark:border-slate-800">
                                <span class="font-black text-[#D97706] dark:text-amber-300 uppercase tracking-wider block mb-1">WE DO (15 Mins) — Guided Practice</span>
                                <p>Class creates a large magnetic concept map on the whiteboard together. Students place stage cards and arrow labels in correct order.</p>
                            </div>

                            <div class="p-4 bg-[#F4F9F8] dark:bg-slate-900/60 rounded-xl border border-[#E5ECEB] dark:border-slate-800">
                                <span class="font-black text-[#E11D48] dark:text-rose-300 uppercase tracking-wider block mb-1">YOU DO TOGETHER (15 Mins) — Collaborative Group Work</span>
                                <p>Groups of 4 construct the "Water Cycle in a Ziploc Bag". Pour warm blue water, seal, tape to window, and observe water droplets forming.</p>
                            </div>

                            <div class="p-4 bg-[#F4F9F8] dark:bg-slate-900/60 rounded-xl border border-[#E5ECEB] dark:border-slate-800">
                                <span class="font-black text-[#2563EB] dark:text-blue-300 uppercase tracking-wider block mb-1">YOU DO ALONE (10 Mins) — Independent Application</span>
                                <p>Individual worksheet completion: diagram labeling and 3 multiple-choice comprehension questions.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Signatures -->
                    <div class="pt-6 border-t border-slate-300 dark:border-slate-700 grid grid-cols-3 gap-4 text-center text-[10px]">
                        <div>
                            <p class="text-[#64748B] dark:text-slate-400 mb-6">Prepared by:</p>
                            <p class="font-extrabold text-[#172033] dark:text-white underline">MARIA SANTOS</p>
                        </div>
                        <div>
                            <p class="text-[#64748B] dark:text-slate-400 mb-6">Checked by:</p>
                            <p class="font-extrabold text-[#172033] dark:text-white underline">JUAN DELA CRUZ</p>
                        </div>
                        <div>
                            <p class="text-[#64748B] dark:text-slate-400 mb-6">Noted by:</p>
                            <p class="font-extrabold text-[#172033] dark:text-white underline">DR. ELENA RAMOS</p>
                        </div>
                    </div>

                </div>
            </template>

            <!-- 3. PRESENTATION PREVIEW -->
            <template x-if="previewType === 'presentation'">
                <div class="max-w-3xl mx-auto space-y-4">
                    
                    <!-- Slide Screen Container -->
                    <div class="aspect-video bg-white dark:bg-[#172033] rounded-3xl border-4 border-slate-900 dark:border-slate-700 shadow-2xl p-6 md:p-10 flex flex-col justify-between relative overflow-hidden">
                        
                        <!-- Slide Header -->
                        <div class="flex items-center justify-between border-b border-slate-200 dark:border-slate-700 pb-3">
                            <span class="text-xs font-black tracking-widest text-[#159A9C] dark:text-teal-400 uppercase" x-text="selectedClass.subject + ' • GRADE 4'"></span>
                            <span class="text-xs font-bold text-slate-400" x-text="'Slide ' + currentSlide + ' of 12'"></span>
                        </div>

                        <!-- Dynamic Slide Content per slide number -->
                        <div class="py-6 flex-1 flex flex-col items-center justify-center text-center space-y-4">
                            <template x-if="currentSlide === 1">
                                <div>
                                    <span class="text-4xl mb-2 block">💧</span>
                                    <h1 class="text-2xl md:text-4xl font-extrabold text-[#172033] dark:text-white tracking-tight">THE WATER CYCLE</h1>
                                    <p class="text-xs md:text-sm font-semibold text-[#64748B] dark:text-slate-400 mt-2">Interactive Science Lesson • Term 1 Week 3</p>
                                </div>
                            </template>

                            <template x-if="currentSlide === 2">
                                <div class="max-w-md space-y-2">
                                    <span class="text-3xl block">🌍</span>
                                    <h2 class="text-xl font-bold text-[#172033] dark:text-white">What is the Water Cycle?</h2>
                                    <p class="text-xs text-[#64748B] dark:text-slate-300 leading-relaxed">The water cycle is the continuous journey water takes as it circulates between Earth's oceans, atmosphere, and land.</p>
                                </div>
                            </template>

                            <template x-if="currentSlide === 3">
                                <div class="max-w-md space-y-2">
                                    <span class="text-3xl block">☀️</span>
                                    <h2 class="text-xl font-bold text-amber-600 dark:text-amber-400">Stage 1: Evaporation</h2>
                                    <p class="text-xs text-[#64748B] dark:text-slate-300 leading-relaxed">Heat energy from the sun warms oceans, lakes, and rivers, turning liquid water into invisible gas called <strong>water vapor</strong>.</p>
                                </div>
                            </template>

                            <template x-if="currentSlide === 4">
                                <div class="max-w-md space-y-2">
                                    <span class="text-3xl block">🌱</span>
                                    <h2 class="text-xl font-bold text-emerald-600 dark:text-emerald-400">Transpiration in Plants</h2>
                                    <p class="text-xs text-[#64748B] dark:text-slate-300 leading-relaxed">Plants also release water vapor into the air through microscopic pores in their leaves!</p>
                                </div>
                            </template>

                            <template x-if="currentSlide === 5">
                                <div class="max-w-md space-y-2">
                                    <span class="text-3xl block">☁️</span>
                                    <h2 class="text-xl font-bold text-teal-600 dark:text-teal-400">Stage 2: Condensation</h2>
                                    <p class="text-xs text-[#64748B] dark:text-slate-300 leading-relaxed">As water vapor rises high into the sky, it cools down and transforms back into tiny water droplets, forming <strong>clouds</strong>.</p>
                                </div>
                            </template>

                            <template x-if="currentSlide === 6">
                                <div class="max-w-md space-y-2">
                                    <span class="text-3xl block">🌧️</span>
                                    <h2 class="text-xl font-bold text-blue-600 dark:text-blue-400">Stage 3: Precipitation</h2>
                                    <p class="text-xs text-[#64748B] dark:text-slate-300 leading-relaxed">When clouds become too heavy with water droplets, gravity pulls the water down as <strong>rain, snow, sleet, or hail</strong>.</p>
                                </div>
                            </template>

                            <template x-if="currentSlide === 7">
                                <div class="max-w-md space-y-2">
                                    <span class="text-3xl block">🌊</span>
                                    <h2 class="text-xl font-bold text-indigo-600 dark:text-indigo-400">Stage 4: Collection</h2>
                                    <p class="text-xs text-[#64748B] dark:text-slate-300 leading-relaxed">Fallen water gathers in rivers, lakes, oceans, and seeps into underground soil, ready for the cycle to repeat!</p>
                                </div>
                            </template>

                            <template x-if="currentSlide >= 8">
                                <div class="max-w-md space-y-2">
                                    <span class="text-3xl block">🔬</span>
                                    <h2 class="text-xl font-bold text-[#172033] dark:text-white" x-text="'Summary & Activity (Part ' + (currentSlide - 7) + ')'"></h2>
                                    <p class="text-xs text-[#64748B] dark:text-slate-300">Hands-on Ziploc bag experiment demonstration & classroom review questions.</p>
                                </div>
                            </template>
                        </div>

                        <!-- Footer Branding -->
                        <div class="flex items-center justify-between text-[10px] text-slate-400 border-t border-slate-200 dark:border-slate-700 pt-2">
                            <span>GuroPilot Interactive Presentation Deck</span>
                            <span>Rizal Elementary School</span>
                        </div>
                    </div>

                    <!-- Presentation Controls Bar -->
                    <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-2xl p-4 flex items-center justify-between shadow-xs">
                        <button @click="currentSlide = Math.max(1, currentSlide - 1)" 
                                :disabled="currentSlide === 1"
                                :class="currentSlide === 1 ? 'opacity-40 cursor-not-allowed' : 'hover:bg-slate-100 dark:hover:bg-slate-800 cursor-pointer'"
                                class="px-4 py-2 bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-xl text-xs font-bold text-[#172033] dark:text-white transition-all flex items-center gap-1">
                            <span>← Previous</span>
                        </button>

                        <div class="flex items-center gap-2 text-xs font-bold text-[#172033] dark:text-white">
                            <span class="px-3 py-1 bg-[#DDF6EF] dark:bg-teal-950/40 text-[#159A9C] dark:text-teal-300 rounded-lg" x-text="currentSlide"></span>
                            <span>/</span>
                            <span>12</span>
                        </div>

                        <button @click="currentSlide = Math.min(12, currentSlide + 1)" 
                                :disabled="currentSlide === 12"
                                :class="currentSlide === 12 ? 'opacity-40 cursor-not-allowed' : 'hover:bg-slate-100 dark:hover:bg-slate-800 cursor-pointer'"
                                class="px-4 py-2 bg-[#159A9C] hover:bg-[#0E7476] text-white rounded-xl text-xs font-bold transition-all flex items-center gap-1">
                            <span>Next →</span>
                        </button>
                    </div>

                </div>
            </template>

            <!-- 4. WORKSHEET PREVIEW -->
            <template x-if="previewType === 'worksheet'">
                <div class="max-w-2xl mx-auto bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-2xl p-6 md:p-10 shadow-sm font-sans text-[#172033] dark:text-slate-200 text-xs leading-relaxed space-y-6">
                    
                    <div class="border-b-2 border-slate-800 dark:border-slate-600 pb-3 text-center">
                        <h1 class="text-base font-black text-[#172033] dark:text-white uppercase tracking-wider">WORKSHEET: THE WATER CYCLE</h1>
                        <p class="text-xs font-semibold text-[#64748B] dark:text-slate-400">Science 4 • Term 1 Week 3</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4 text-xs font-semibold border-b border-slate-200 dark:border-slate-800 pb-3">
                        <p>Name: <span class="border-b border-slate-400 inline-block w-40"></span></p>
                        <p>Grade & Section: <span class="font-extrabold" x-text="selectedClass.grade"></span></p>
                        <p>Date: <span class="border-b border-slate-400 inline-block w-32"></span></p>
                        <p>Score: <span class="border-b border-slate-400 inline-block w-20"></span> / 15</p>
                    </div>

                    <!-- Part 1: Matching -->
                    <div class="space-y-3">
                        <h3 class="font-extrabold text-sm text-[#172033] dark:text-white">Part A: Matching Type</h3>
                        <p class="text-[#64748B] dark:text-slate-400 text-[11px]">Match Column A (Terms) with Column B (Definitions). Write the letter of the correct answer before each number.</p>
                        
                        <div class="space-y-2 text-xs">
                            <div class="flex items-center justify-between p-2 bg-[#F4F9F8] dark:bg-slate-900 rounded-xl">
                                <span>___ 1. Evaporation</span>
                                <span class="text-[#64748B] dark:text-slate-400 text-[11px]">A. Rain, snow, sleet, or hail falling to Earth</span>
                            </div>
                            <div class="flex items-center justify-between p-2 bg-[#F4F9F8] dark:bg-slate-900 rounded-xl">
                                <span>___ 2. Condensation</span>
                                <span class="text-[#64748B] dark:text-slate-400 text-[11px]">B. Liquid water heating up into gas</span>
                            </div>
                            <div class="flex items-center justify-between p-2 bg-[#F4F9F8] dark:bg-slate-900 rounded-xl">
                                <span>___ 3. Precipitation</span>
                                <span class="text-[#64748B] dark:text-slate-400 text-[11px]">C. Water vapor cooling down to form clouds</span>
                            </div>
                            <div class="flex items-center justify-between p-2 bg-[#F4F9F8] dark:bg-slate-900 rounded-xl">
                                <span>___ 4. Collection</span>
                                <span class="text-[#64748B] dark:text-slate-400 text-[11px]">D. Water gathering in lakes, oceans, and rivers</span>
                            </div>
                        </div>
                    </div>

                    <!-- Part 2: Fill in the Blanks -->
                    <div class="space-y-3">
                        <h3 class="font-extrabold text-sm text-[#172033] dark:text-white">Part B: Short Answer</h3>
                        <p class="text-[#64748B] dark:text-slate-400 text-[11px]">Answer the following question in 2–3 sentences.</p>
                        <div class="p-3 bg-[#F4F9F8] dark:bg-slate-900 rounded-xl space-y-3">
                            <p class="font-bold">What role does the sun play in driving the water cycle?</p>
                            <div class="border-b border-dashed border-slate-300 dark:border-slate-700 h-6"></div>
                            <div class="border-b border-dashed border-slate-300 dark:border-slate-700 h-6"></div>
                        </div>
                    </div>

                </div>
            </template>

            <!-- 5. QUIZ PREVIEW -->
            <template x-if="previewType === 'quiz'">
                <div class="max-w-2xl mx-auto space-y-4">
                    
                    <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-2xl p-6 shadow-sm flex items-center justify-between">
                        <div>
                            <h1 class="text-base font-extrabold text-[#172033] dark:text-white">QUIZ: THE WATER CYCLE</h1>
                            <p class="text-xs text-[#64748B] dark:text-slate-400">10 Multiple Choice Questions • Science Grade 4</p>
                        </div>
                        <button @click="showQuizAnswers = !showQuizAnswers" 
                                class="px-3 py-1.5 bg-[#EEE9FF] dark:bg-purple-950/40 text-[#7C3AED] dark:text-purple-300 text-xs font-bold rounded-xl cursor-pointer hover:bg-purple-200 transition-colors">
                            <span x-text="showQuizAnswers ? 'Hide Answer Key' : 'Show Answer Key'"></span>
                        </button>
                    </div>

                    <!-- Questions List -->
                    <div class="space-y-4">
                        
                        <!-- Question 1 -->
                        <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-2xl p-5 shadow-2xs space-y-3">
                            <div class="flex items-start justify-between gap-2">
                                <span class="font-extrabold text-xs text-[#172033] dark:text-white">1. What energy source powers the entire water cycle?</span>
                                <span class="px-2 py-0.5 bg-slate-100 dark:bg-slate-800 text-[10px] font-bold text-slate-500 rounded-md">1 Pt</span>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs font-medium">
                                <div class="p-2.5 rounded-xl border border-slate-200 dark:border-slate-800 flex items-center gap-2">
                                    <span class="w-5 h-5 rounded-full border border-slate-300 flex items-center justify-center text-[10px]">A</span>
                                    <span>The Moon</span>
                                </div>
                                <div :class="showQuizAnswers ? 'bg-emerald-50 border-emerald-500 text-emerald-900 font-bold dark:bg-emerald-950/40 dark:text-emerald-300' : 'border-slate-200 dark:border-slate-800'"
                                     class="p-2.5 rounded-xl border flex items-center justify-between gap-2">
                                    <div class="flex items-center gap-2">
                                        <span class="w-5 h-5 rounded-full border border-slate-300 flex items-center justify-center text-[10px]">B</span>
                                        <span>The Sun</span>
                                    </div>
                                    <span x-show="showQuizAnswers" class="text-[10px] text-emerald-600 font-bold">✓ Correct</span>
                                </div>
                                <div class="p-2.5 rounded-xl border border-slate-200 dark:border-slate-800 flex items-center gap-2">
                                    <span class="w-5 h-5 rounded-full border border-slate-300 flex items-center justify-center text-[10px]">C</span>
                                    <span>Wind currents</span>
                                </div>
                                <div class="p-2.5 rounded-xl border border-slate-200 dark:border-slate-800 flex items-center gap-2">
                                    <span class="w-5 h-5 rounded-full border border-slate-300 flex items-center justify-center text-[10px]">D</span>
                                    <span>Volcanic heat</span>
                                </div>
                            </div>
                        </div>

                        <!-- Question 2 -->
                        <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-2xl p-5 shadow-2xs space-y-3">
                            <div class="flex items-start justify-between gap-2">
                                <span class="font-extrabold text-xs text-[#172033] dark:text-white">2. What process turns liquid water into invisible gas (water vapor)?</span>
                                <span class="px-2 py-0.5 bg-slate-100 dark:bg-slate-800 text-[10px] font-bold text-slate-500 rounded-md">1 Pt</span>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs font-medium">
                                <div class="p-2.5 rounded-xl border border-slate-200 dark:border-slate-800 flex items-center gap-2">
                                    <span class="w-5 h-5 rounded-full border border-slate-300 flex items-center justify-center text-[10px]">A</span>
                                    <span>Condensation</span>
                                </div>
                                <div :class="showQuizAnswers ? 'bg-emerald-50 border-emerald-500 text-emerald-900 font-bold dark:bg-emerald-950/40 dark:text-emerald-300' : 'border-slate-200 dark:border-slate-800'"
                                     class="p-2.5 rounded-xl border flex items-center justify-between gap-2">
                                    <div class="flex items-center gap-2">
                                        <span class="w-5 h-5 rounded-full border border-slate-300 flex items-center justify-center text-[10px]">B</span>
                                        <span>Evaporation</span>
                                    </div>
                                    <span x-show="showQuizAnswers" class="text-[10px] text-emerald-600 font-bold">✓ Correct</span>
                                </div>
                                <div class="p-2.5 rounded-xl border border-slate-200 dark:border-slate-800 flex items-center gap-2">
                                    <span class="w-5 h-5 rounded-full border border-slate-300 flex items-center justify-center text-[10px]">C</span>
                                    <span>Precipitation</span>
                                </div>
                                <div class="p-2.5 rounded-xl border border-slate-200 dark:border-slate-800 flex items-center gap-2">
                                    <span class="w-5 h-5 rounded-full border border-slate-300 flex items-center justify-center text-[10px]">D</span>
                                    <span>Freezing</span>
                                </div>
                            </div>
                        </div>

                        <!-- Question 3 -->
                        <div class="bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-2xl p-5 shadow-2xs space-y-3">
                            <div class="flex items-start justify-between gap-2">
                                <span class="font-extrabold text-xs text-[#172033] dark:text-white">3. When water vapor cools down and forms clouds, this is called:</span>
                                <span class="px-2 py-0.5 bg-slate-100 dark:bg-slate-800 text-[10px] font-bold text-slate-500 rounded-md">1 Pt</span>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs font-medium">
                                <div :class="showQuizAnswers ? 'bg-emerald-50 border-emerald-500 text-emerald-900 font-bold dark:bg-emerald-950/40 dark:text-emerald-300' : 'border-slate-200 dark:border-slate-800'"
                                     class="p-2.5 rounded-xl border flex items-center justify-between gap-2">
                                    <div class="flex items-center gap-2">
                                        <span class="w-5 h-5 rounded-full border border-slate-300 flex items-center justify-center text-[10px]">A</span>
                                        <span>Condensation</span>
                                    </div>
                                    <span x-show="showQuizAnswers" class="text-[10px] text-emerald-600 font-bold">✓ Correct</span>
                                </div>
                                <div class="p-2.5 rounded-xl border border-slate-200 dark:border-slate-800 flex items-center gap-2">
                                    <span class="w-5 h-5 rounded-full border border-slate-300 flex items-center justify-center text-[10px]">B</span>
                                    <span>Evaporation</span>
                                </div>
                                <div class="p-2.5 rounded-xl border border-slate-200 dark:border-slate-800 flex items-center gap-2">
                                    <span class="w-5 h-5 rounded-full border border-slate-300 flex items-center justify-center text-[10px]">C</span>
                                    <span>Precipitation</span>
                                </div>
                                <div class="p-2.5 rounded-xl border border-slate-200 dark:border-slate-800 flex items-center gap-2">
                                    <span class="w-5 h-5 rounded-full border border-slate-300 flex items-center justify-center text-[10px]">D</span>
                                    <span>Runoff</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </template>

            <!-- 6. ACTIVITY SHEET PREVIEW -->
            <template x-if="previewType === 'activity'">
                <div class="max-w-2xl mx-auto bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-2xl p-6 md:p-10 shadow-sm font-sans text-[#172033] dark:text-slate-200 text-xs leading-relaxed space-y-6">
                    
                    <div class="border-b-2 border-slate-800 dark:border-slate-600 pb-3 text-center">
                        <span class="px-3 py-1 bg-[#FDE9E7] text-[#E11D48] font-bold rounded-full text-[10px]">HANDS-ON GROUP ACTIVITY</span>
                        <h1 class="text-base font-black text-[#172033] dark:text-white uppercase tracking-wider mt-1">WATER CYCLE IN A BAG</h1>
                        <p class="text-xs font-semibold text-[#64748B] dark:text-slate-400">Science Grade 4 • Group Size: 4 Students</p>
                    </div>

                    <div class="space-y-2">
                        <h3 class="font-extrabold text-sm text-[#172033] dark:text-white">Materials Required:</h3>
                        <ul class="list-disc list-inside space-y-1 pl-2 text-slate-700 dark:text-slate-300">
                            <li>Clear Ziploc sandwich bag (1 per group)</li>
                            <li>Permanent marker (Blue or Black)</li>
                            <li>1/4 cup of warm water + 2 drops of blue food coloring</li>
                            <li>Strong masking tape</li>
                            <li>Access to a sunny window</li>
                        </ul>
                    </div>

                    <div class="space-y-3">
                        <h3 class="font-extrabold text-sm text-[#172033] dark:text-white">Step-by-Step Procedure:</h3>
                        <div class="space-y-2">
                            <div class="p-3 bg-[#F4F9F8] dark:bg-slate-900 rounded-xl flex items-start gap-2">
                                <span class="w-5 h-5 rounded-full bg-[#159A9C] text-white flex items-center justify-center font-bold text-[10px] shrink-0">1</span>
                                <div><strong>Decorate the Bag:</strong> Draw a sun near the top, clouds, and ocean waves at the bottom of the Ziploc bag.</div>
                            </div>
                            <div class="p-3 bg-[#F4F9F8] dark:bg-slate-900 rounded-xl flex items-start gap-2">
                                <span class="w-5 h-5 rounded-full bg-[#159A9C] text-white flex items-center justify-center font-bold text-[10px] shrink-0">2</span>
                                <div><strong>Add Water:</strong> Pour warm blue water carefully into the bottom of the bag. Seal tightly!</div>
                            </div>
                            <div class="p-3 bg-[#F4F9F8] dark:bg-slate-900 rounded-xl flex items-start gap-2">
                                <span class="w-5 h-5 rounded-full bg-[#159A9C] text-white flex items-center justify-center font-bold text-[10px] shrink-0">3</span>
                                <div><strong>Hang Bag:</strong> Tape the bag upright on a window facing sunlight.</div>
                            </div>
                            <div class="p-3 bg-[#F4F9F8] dark:bg-slate-900 rounded-xl flex items-start gap-2">
                                <span class="w-5 h-5 rounded-full bg-[#159A9C] text-white flex items-center justify-center font-bold text-[10px] shrink-0">4</span>
                                <div><strong>Observe:</strong> Watch water droplets condense on the top of the bag after 30 minutes.</div>
                            </div>
                        </div>
                    </div>

                </div>
            </template>

            <!-- 7. SECONDARY MATERIAL PREVIEW (Answer Key, Rubric, Reading Material, Teacher Notes) -->
            <template x-if="!['dll','ilaw','presentation','worksheet','quiz','activity'].includes(previewType)">
                <div class="max-w-2xl mx-auto bg-white dark:bg-[#111C38] border border-[#E5ECEB] dark:border-slate-800 rounded-2xl p-6 md:p-10 shadow-sm text-xs leading-relaxed space-y-4">
                    <div class="flex items-center justify-between border-b border-slate-200 dark:border-slate-800 pb-3">
                        <h2 class="font-extrabold text-sm text-[#172033] dark:text-white" x-text="previewTitle"></h2>
                        <span class="px-2.5 py-1 bg-slate-100 dark:bg-slate-800 text-[#64748B] dark:text-slate-400 font-bold rounded-lg text-[10px]" x-text="previewFormat"></span>
                    </div>

                    <div class="p-4 bg-[#F4F9F8] dark:bg-slate-900 rounded-xl border border-[#E5ECEB] dark:border-slate-800 space-y-2">
                        <p class="font-bold text-slate-800 dark:text-slate-200" x-text="'Preview Content for ' + previewTitle"></p>
                        <p class="text-[#64748B] dark:text-slate-400">Detailed reference guide and classroom document prepared for Grade 4 Science lessons.</p>
                    </div>
                </div>
            </template>

        </div>

        <!-- ========================================== -->
        <!-- MODAL FOOTER -->
        <!-- ========================================== -->
        <div class="px-6 py-3.5 bg-white dark:bg-[#172033] border-t border-[#E5ECEB] dark:border-slate-800 flex items-center justify-between shrink-0 text-xs">
            <span class="font-medium text-[#64748B] dark:text-slate-400">GuroPilot Document Preview</span>
            
            <div class="flex items-center gap-3">
                <button @click="closePreview()" 
                        class="px-4 py-2 bg-slate-100 hover:bg-slate-200 dark:bg-slate-800 dark:hover:bg-slate-700 text-[#172033] dark:text-slate-200 font-bold rounded-xl cursor-pointer transition-colors">
                    Close Preview
                </button>
                <button @click="showToast('Download will be available when document generation is connected.')"
                        class="px-4 py-2 bg-[#159A9C] hover:bg-[#0E7476] text-white font-bold rounded-xl shadow-2xs transition-all cursor-pointer">
                    <span x-text="'Download ' + previewFormat"></span>
                </button>
            </div>
        </div>

    </div>

</div>
