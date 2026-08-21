<?php

use Illuminate\Support\Facades\Route;

Route::get('/{tab?}', function ($tab = 'home') {
    $validTabs = [
        'home', 'dashboard', 'my-lessons', 'materials', 'templates',
        'classes', 'students', 'attendance', 'grade-center',
        'sf2', 'sf2-attendance', 'sf9', 'sf9-report-card',
        'sf10', 'sf10-permanent-record', 'other-reports', 'reports',
        'student-ids', 'settings'
    ];
    
    // Map friendly alias URLs to internal activeTab keys
    $tabMap = [
        'dashboard' => 'home',
        'sf2-attendance' => 'sf2',
        'sf9-report-card' => 'sf9',
        'sf10-permanent-record' => 'sf10',
        'reports' => 'reports',
        'other-reports' => 'reports',
    ];

    $cleanTab = strtolower(trim($tab, '/'));
    $activeTab = $tabMap[$cleanTab] ?? (in_array($cleanTab, $validTabs) ? $cleanTab : 'home');

    return view('dashboard', compact('activeTab'));
})->where('tab', '.*');

