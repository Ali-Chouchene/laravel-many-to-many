<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::orderBy('updated_at', 'DESC')->simplePaginate(5);
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = new Type();
        return view('admin.types.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string||unique:types|max:20',
            'color' => 'nullable',
        ], [
            'type.required' => 'Type name is required',
            'type.unique' => "$request->type is already taken",
            'type.max' => 'The type name max length is 20 characters',
        ]);


        $data = $request->all();
        $type = new Type();

        $type->fill($data);
        $type->save();
        return to_route('admin.types.index');
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
    { {
            $type = Type::findOrFail($id);
            return view('admin.types.edit', compact('type'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $request->validate([
            'type' => ['required', 'string', Rule::unique('types')->ignore($type->id), 'max:20'],
            'color' => 'nullable',
        ], [
            'type.required' => 'Type name is required',
            'type.unique' => "$request->type is already taken",
            'type.max' => 'The type name max length is 20 characters',
        ]);


        $data = $request->all();

        $type->fill($data);

        $type->save();

        return redirect()->route('admin.types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('admin.types.index');
    }
}
