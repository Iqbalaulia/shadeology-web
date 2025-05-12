<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminProductBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brand = ProductBrand::orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.pages.product.brand.index', compact('brand'));
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
            Log::info('Attempting to create brand with data:', $request->all());

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
            ]);


            $ProductBrand = ProductBrand::create($validatedData);

            Log::info('brand created successfully:', $ProductBrand->toArray());
            return redirect()->route('admin.product-brand.index')
                ->with('success', 'brand created successfully');
        } catch (\Exception $e) {
            Log::error('brand creation failed: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to brand event. Please try again.');
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
        Log::info('brand edit started', ['ProductBrand' => $id]);

        try {
            $productBrand = ProductBrand::findOrFail($id);
            return response()->json($productBrand);
        } catch (\Exception $th) {
            Log::error('Failed ProductBrand edit', ['ProductBrand_id' => $id]);
            return response()->json(['error' => 'ProductBrand not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            Log::info('ProductBrand update started', ['ProductBrand' => $id]);

            $productBrand = ProductBrand::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $productBrand->fill($validatedData);

            $productBrand->save();
            return redirect()->route('admin.product-brand.index')
                ->with('success', 'productBrand updated successfully');
        } catch (\Exception $e) {
            Log::error('productBrand update failed: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update ProductBrand. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Log::info('Start to delete brand: ' . $id);

        try {
            $productBrand = ProductBrand::findOrFail($id);
            $productBrand->delete();

            Log::info('Success to delete brand: ' . $id);
            return redirect()
                ->route('admin.product-brand.index')
                ->with('success', 'brand deleted successfully');
        } catch (\Exception $e) {
            Log::error('Failed to delete brand: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete brand');
        }
    }
}
