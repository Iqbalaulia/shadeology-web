<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productType = ProductType::orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.pages.product.type.index', compact('productType'));
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
            Log::info('Attempting to create product type with data:', $request->all());

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
            ]);


            $productType = ProductType::create($validatedData);

            Log::info('product type created successfully:', $productType->toArray());
            return redirect()->route('admin.product-type.index')
                ->with('success', 'product type created successfully');
        } catch (\Exception $e) {
            Log::error('product type creation failed: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to product type event. Please try again.');
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
        Log::info('product type edit started', ['ProductType' => $id]);

        try {
            $productType = ProductType::findOrFail($id);
            return response()->json($productType);
        } catch (\Exception $th) {
            Log::error('Failed ProductType edit', ['ProductType_id' => $id]);
            return response()->json(['error' => 'ProductType not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            Log::info('ProductType update started', ['ProductType' => $id]);

            $productType = ProductType::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $productType->fill($validatedData);

            $productType->save();
            return redirect()->route('admin.product-type.index')
                ->with('success', 'ProductType updated successfully');
        } catch (\Exception $e) {
            Log::error('ProductType update failed: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update ProductType. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Log::info('Start to delete product type: ' . $id);

        try {
            $productType = ProductType::findOrFail($id);
            $productType->delete();

            Log::info('Success to delete product type: ' . $id);
            return redirect()
                ->route('admin.product-type.index')
                ->with('success', 'product type deleted successfully');
        } catch (\Exception $e) {
            Log::error('Failed to delete product type: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete product type');
        }
    }
}
