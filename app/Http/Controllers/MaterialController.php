<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Material::latest()->get();

        return response()->json($materials);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=>'required|string|max:255',
            'subject' =>'required|string|max:255',
            'semester' =>'required|integer|min:1|max:255',
            'file_url' =>'nullable|url|max:255',
        ]);

        $material = Material::create($validated);

        return response()->json([
            'message'=>'material berhasil ditambhkan',
            'data'=> $material 
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $material = Material ::findOrfail($id);

        return response()->json($material);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' =>'sometimes|required|string|max:255',
            'subject' => 'sometimes|required|string|string|max:255',
            'semester' =>'sometimes|required|interger|min:1|max:14',
            'file_url' =>'sometimes|nullable|url|max:255',
        ]);

        $material = Material::find($id);
        $material->update($validated);

        return response()->json([
            'message' => 'materi berhasil diperbarui',
            'data' => $material
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $material = Material ::findOrFail($id);

      $material ->delete();

      return response()->json([
        'message' => 'Materi berhasil dihapus',
      ]);
    }
}
