<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use App\Models\TeamMember;

class TentangController extends Controller
{
    public function index()
    {
        $aboutUs = AboutPage::where('is_active', true)->first();
        $teamMembers = TeamMember::active()->get();
        
        return view('pages.tentang', compact('aboutUs', 'teamMembers'));
    }
}
