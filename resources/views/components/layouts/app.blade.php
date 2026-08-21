<!DOCTYPE html>
<html lang="en" 
      x-data="{
          darkMode: localStorage.getItem('guro_theme') === 'dark',
          activeTab: '{{ $activeTab ?? 'home' }}',
          sidebarOpen: false,
          assistantOpen: false,
          lessonBuilderOpen: false,
          builderStep: 1,
          notificationsOpen: false,
          profileMenuOpen: false,

          tabUrls: {
              'home': '/',
              'my-lessons': '/my-lessons',
              'materials': '/materials',
              'templates': '/templates',
              'classes': '/classes',
              'students': '/students',
              'attendance': '/attendance',
              'grade-center': '/grade-center',
              'sf2': '/sf2-attendance',
              'sf9': '/sf9-report-card',
              'sf10': '/sf10-permanent-record',
              'reports': '/other-reports',
              'student-ids': '/student-ids',
              'settings': '/settings'
          },

          setTab(tab, updateHistory = true) {
              this.activeTab = tab;
              if (updateHistory && this.tabUrls[tab]) {
                  window.history.pushState({ tab: tab }, '', this.tabUrls[tab]);
              }
          },

          init() {
              this.$watch('darkMode', val => localStorage.setItem('guro_theme', val ? 'dark' : 'light'));
              
              // Sync activeTab with current URL path on page load
              const currentPath = window.location.pathname.replace(/\/$/, '') || '/';
              for (const [tKey, tUrl] of Object.entries(this.tabUrls)) {
                  if (tUrl === currentPath || (tKey === 'sf2' && currentPath === '/sf2') || (tKey === 'sf9' && currentPath === '/sf9')) {
                      this.activeTab = tKey;
                      break;
                  }
              }

              // Sync activeTab on browser Back/Forward navigation
              window.addEventListener('popstate', (event) => {
                  if (event.state && event.state.tab) {
                      this.activeTab = event.state.tab;
                  } else {
                      const path = window.location.pathname.replace(/\/$/, '') || '/';
                      for (const [tKey, tUrl] of Object.entries(this.tabUrls)) {
                          if (tUrl === path) {
                              this.activeTab = tKey;
                              break;
                          }
                      }
                  }
              });
          }
      }"
      :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GuroPilot - Kasangga sa Paggawa ng Aralin | DepEd MATATAG</title>
    
    <!-- Google Fonts Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen font-sans antialiased selection:bg-[#DDF6EF] selection:text-[#159A9C]"
      :class="darkMode ? 'dark bg-[#070D1E] text-slate-100' : 'bg-[#F4F9F8] text-[#172033]'">

    <div class="flex min-h-screen relative overflow-x-hidden">
        
        <!-- Mobile Sidebar Backdrop -->
        <div x-show="sidebarOpen" 
             @click="sidebarOpen = false" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-slate-900/40 backdrop-blur-xs z-40 lg:hidden">
        </div>

        <!-- Sidebar Component -->
        <x-app-sidebar />

        <!-- Main Content Wrapper -->
        <div class="flex-1 flex flex-col min-w-0 lg:pl-[250px]">
            
            <!-- Top Header Component -->
            <x-top-header />

            <!-- Page Content -->
            <main class="flex-1 p-4 md:p-6 lg:p-8 max-w-[1400px] w-full mx-auto">
                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- Floating AI Assistant Modal / Slide-over -->
    <x-teacher-assistant-modal />

    <!-- 3-Step Lesson Builder Modal -->
    <x-create-lesson-modal />

</body>
</html>
