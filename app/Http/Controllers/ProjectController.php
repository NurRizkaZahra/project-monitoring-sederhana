<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'project_name' => 'required',
            'client_name' => 'required',
            'leader_name' => 'required',
            'leader_email' => 'required|email',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'progress' => 'required|integer|min:0|max:100',
            'leader_photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('leader_photo')) {
            $data['leader_photo'] = $request->file('leader_photo')->store('photos', 'public');
        }

        Project::create($data);
        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'project_name' => 'required',
            'client_name' => 'required',
            'leader_name' => 'required',
            'leader_email' => 'required|email',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'progress' => 'required|integer|min:0|max:100',
            'leader_photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('leader_photo')) {
            $data['leader_photo'] = $request->file('leader_photo')->store('photos', 'public');
        }

        $project->update($data);
        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted.');
    }
}
