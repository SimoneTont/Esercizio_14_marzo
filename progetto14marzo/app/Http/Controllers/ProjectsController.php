<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Activity;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('index', compact('projects'));
    }

    public function show($id)
    {
        $project = Project::with('user', 'activities')->findOrFail($id);
        return view('show', compact('project'));
    }

    public function create()
    {
        // Return view to create a new project
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        // Create a new project instance
        $project = new Project();
        $project->name = $validatedData['name'];
        // Set other attributes if needed
        $project->save();

        // Store associated activities if provided
        if ($request->has('activities')) {
            $project->activities()->attach($request->input('activities'));
        }

        // Redirect to the project index page
        return redirect()->route('index')->with('success', 'Project created successfully!');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $allActivities = Activity::all(); // Assuming Activity is your model for activities
        return view('edit', compact('project', 'allActivities'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        // Update the project
        $project = Project::findOrFail($id);
        $project->name = $validatedData['name'];
        // Update other attributes if needed
        $project->save();

        // Redirect back to the project show page
        return redirect()->route('show', $id)->with('success', 'Project updated successfully!');
    }

    public function destroy($id)
    {
        // Find the project and delete it
        $project = Project::findOrFail($id);
        $project->delete();

        // Redirect back to the project index page
        return redirect()->route('index')->with('success', 'Project deleted successfully!');
    }

    public function destroyActivity($projectId, $activityId)
    {
        $project = Project::findOrFail($projectId);
        $project->activities()->detach($activityId);
    }
}
