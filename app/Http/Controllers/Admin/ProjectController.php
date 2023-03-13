<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('updated_at', 'DESC')->simplePaginate(5);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project();
        $types = Type::orderBy('type')->get();
        return view('admin.projects.create', compact('project', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:projects|max:60',
            'description' => 'required|string|min:30',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp,jfif',
            'link' => 'required|url|unique:projects',
            'type_id' => 'nullable|exists:types,id'
        ], [
            'name.required' => 'Project name is required',
            'name.unique' => "$request->name name is already taken",
            'name.max' => 'The project name max length is 60 characters',
            'image.image' => 'The file must be an image',
            'image.mimes' => 'The file extension need to be (jpeg, jpg, png, webp, jfif)',
            'description.required' => 'Project description is required',
            'description.min' => 'The project description min length is 30 characters',
            'link.required' => 'Project link is required',
            'link.url' => 'The link must be an URL',
            'link.unique' => "The project Link exist already",
            'type_id' => 'The type dosen\'t exist'

        ]);


        $data = $request->all();
        $project = new Project();
        if (Arr::exists($data, 'image')) {
            $img_url = Storage::put('project', $data['image']);
            $data['image'] = $img_url;
        };
        $project->fill($data);
        $project->status = Arr::exists($data, 'status');
        $project->save();
        return to_route('admin.projects.show', $project->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $types = Type::orderBy('type')->get();
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => ['required', 'string', Rule::unique('projects')->ignore($project->id), 'max:60'],
            'description' => 'required|string|min:30',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp,jfif',
            'link' => ['required', 'url', Rule::unique('projects')->ignore($project->id)]
        ], [
            'name.required' => 'Project name is required',
            'name.unique' => "$request->name name is already taken",
            'name.max' => 'The project name max length is 60 characters',
            'image.image' => 'The file must be an image',
            'image.mimes' => 'The file extension need to be (jpeg, jpg, png, webp, jfif)',
            'description.required' => 'Project description is required',
            'description.min' => 'The project description min length is 30 characters',
            'link.required' => 'Project link is required',
            'link.url' => 'The link must be an URL',
            'link.unique' => "The project Link exist already",

        ]);


        $data = $request->all();
        if (Arr::exists($data, 'image')) {
            if ($project->image) Storage::delete($project->image);
            $img_url = Storage::put('project', $data['image']);
            $data['image'] = $img_url;
        };

        $project->fill($data);
        $project->status = Arr::exists($data, 'status');
        $project->save();

        return redirect()->route('admin.projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
