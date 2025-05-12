<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkinTone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminSkinToneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skinTones = SkinTone::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.pages.skin-tone.index', compact('skinTones'));
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
            Log::info('Attempting to create skin tone with data:', $request->all());

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
            ]);


            $skinTone = SkinTone::create($validatedData);

            Log::info('Skin tone created successfully:', $skinTone->toArray());
            return redirect()->route('admin.skin-tone.index')
                ->with('success', 'Skin tone created successfully');
        } catch (\Exception $e) {
            Log::error('Skin tone creation failed: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to skin tone event. Please try again.');
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
        Log::info('Skin tone edit started', ['skintone' => $id]);

        try {
            $skintone = SkinTone::findOrFail($id);
            return response()->json($skintone);
        } catch (\Exception $th) {
            Log::error('Failed skintone edit', ['skintone_id' => $id]);
            return response()->json(['error' => 'Skintone not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            Log::info('Skintone update started', ['skintone' => $id]);

            $skintone = SkinTone::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $skintone->fill($validatedData);

            $skintone->save();
            return redirect()->route('admin.skin-tone.index')
                ->with('success', 'Skintone updated successfully');
        } catch (\Exception $e) {
            Log::error('Skintone update failed: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update skintone. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Log::info('Start to delete skin tone: ' . $id);

        try {
            $skintone = SkinTone::findOrFail($id);
            $skintone->delete();

            Log::info('Success to delete skin tone: ' . $id);
            return redirect()
                ->route('admin.skin-tone.index')
                ->with('success', 'Skin tone deleted successfully');
        } catch (\Exception $e) {
            Log::error('Failed to delete skin tone: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete skin tone');
        }
    }
}
