<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $projects_count = Project::count();

        return view('admin.home', compact('projects_count'));
    }
}
