<?php

namespace App\Http\Controllers;

use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::where('is_active', true)->get();
        return view('pages.departments', compact('departments'));
    }

    public function show($slug)
    {
        $department = Department::with('doctors')->where('slug', $slug)->firstOrFail();
        return view('pages.department-show', compact('department'));
    }
}
