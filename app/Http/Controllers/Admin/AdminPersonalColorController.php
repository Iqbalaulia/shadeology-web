<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PersonalColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminPersonalColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personalColor = PersonalColor::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.pages.personal-color.index', compact('personalColor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Log::info('Attempting to create Personal color with data:', $request->all());

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $personalColor = PersonalColor::create($validatedData);

            Log::info('Personal color created successfully:', $personalColor->toArray());
            return redirect()->route('admin.personal-color.index')
                ->with('success', 'Personal color created successfully');
        } catch (\Exception $e) {
            Log::error('Personal color creation failed: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to Personal color event. Please try again.');
        }
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
        Log::info('Personal color edit started', ['personal_color_id' => $id]);

        try {
            $personalColor = PersonalColor::findOrFail($id);
            return response()->json($personalColor);
        } catch (\Exception $th) {
            Log::error('Failed Personal color edit', ['personal_color_id' => $id]);
            return response()->json(['error' => 'Personal color not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            Log::info('Personal Color update started', ['personalColor' => $id]);

            $personalColor = PersonalColor::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $personalColor->fill($validatedData);

            $personalColor->save();
            return redirect()->route('admin.personal-color.index')
                ->with('success', 'Personal Color updated successfully');
        } catch (\Exception $e) {
            Log::error('Personal Color update failed: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update Personal Color. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Log::info('Start to delete Personal color: ' . $id);

        try {
            $personalColor = PersonalColor::findOrFail($id);
            $personalColor->delete();

            Log::info('Success to delete Personal color: ' . $id);
            return redirect()
                ->route('admin.personal-color.index')
                ->with('success', 'Personal color deleted successfully');
        } catch (\Exception $e) {
            Log::error('Failed to delete Personal color: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete Personal color');
        }
    }
}
