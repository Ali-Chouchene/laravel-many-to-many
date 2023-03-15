<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technology;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $techs = Technology::orderBy('updated_at', 'DESC')->simplePaginate(5);
        return view('admin.technologies.index', compact('techs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tech = new Technology();
        return view('admin.technologies.create', compact('tech'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string||unique:technologies',
            'color' => 'nullable',
        ], [
            'name.required' => 'Technology name is required',
            'name.unique' => "Technology name is already taken",
        ]);


        $data = $request->all();
        $tech = new Technology();

        $tech->fill($data);
        $tech->save();
        return to_route('admin.technologies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tech = Technology::findOrFail($id);
        return view('admin.technologies.edit', compact('tech'));
    }

    /**
     * Update the specified resource in storage.0
     */
    public function update(Request $request, string $id)
    {
        $tech = Technology::findOrFail($id);
        $request->validate([
            'name' => ['required', 'string', Rule::unique('technologies')->ignore($tech->id), 'max:20'],
            'color' => 'nullable',
        ], [
            'name.required' => 'Technology name is required',
            'name.unique' => "Technology name is already taken",
            'name.max' => 'Technology name max length is 20 characters',

        ]);


        $data = $request->all();

        $tech->update($data);



        return redirect()->route('admin.technologies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tech = Technology::findOrFail($id);
        $tech->delete();

        return redirect()->route('admin.technologies.index');
    }
}
