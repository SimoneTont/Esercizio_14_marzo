<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Auth::user()->projects;

        return view('index', compact('projects'));
    }

    public function show($id)
    {
        $project = Project::with('user', 'activities')->findOrFail($id);
        return view('show', compact('project'));
    }

    public function create()
{
    $latestProjectId = Project::max('id');
    $newProjectId = $latestProjectId + 1;

    return view('create', ['newProjectId' => $newProjectId]);
}

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $project = new Project();
        $project->name = $validatedData['name'];
        $project->save();

        if ($request->has('activities')) {
            $project->activities()->attach($request->input('activities'));
        }

        return redirect()->route('index')->with('success', 'Project created successfully!');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $allActivities = Activity::all();
        return view('edit', compact('project', 'allActivities'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $project = Project::findOrFail($id);
        $project->name = $validatedData['name'];
        $project->save();
        return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
    }



    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
    }

    public function destroyActivity($projectId, $activityId)
    {
        //dd($activityId, $projectId);
        $project = Project::findOrFail($projectId);
        $activity = $project->activities()->findOrFail($activityId);
        $activity->delete();
        return redirect()->route('projects.edit', $projectId)->with('success', 'Activity deleted successfully!');
    }
    public function addActivity(Request $request, $projectId)
{
    $project = Project::findOrFail($projectId);
    
    $activity = new Activity();
    $activity->name = $request->input('activity_name');
    $activity->project_id = $project->id;
    $activity->save();

    return redirect()->route('projects.edit', $projectId)->with('success', 'Activity added successfully!');
}
}
