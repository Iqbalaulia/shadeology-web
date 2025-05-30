<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PersonalColor;
use App\Models\ProductList;
use App\Models\ProductRecommendation;
use App\Models\SkinTone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminProductRecomendationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skintone = SkinTone::orderBy('created_at', 'desc')->get();
        $personalColor = PersonalColor::orderBy('created_at', 'desc')->get();
        $productList = ProductList::orderBy('created_at', 'desc')->get();
        $productRecomendation = ProductRecommendation::orderBy('created_at', 'desc')
            ->with(['product.brand', 'product.type', 'skintone', 'personalColor'])
            ->paginate(10);

        return view('admin.pages.product-recomendation.index', compact(
            'productRecomendation',
            'skintone',
            'personalColor',
            'productList'
        ));
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
            Log::info('Attempting to create Product recommendation with data:', $request->all());

            $validatedData = $request->validate([
                'id_skintone' => 'required|exists:skintones,id_skintone',
                'id_personal_color' => 'required|exists:personal_colors,id_personal_color',
                'id_product' => 'required|exists:products,id_product',
            ]);

            $productRecommendation = ProductRecommendation::create($validatedData);

            Log::info('Product recommendation created successfully:', $productRecommendation->toArray());

            return redirect()->route('admin.pages.product-recomendation.index')
                ->with('success', 'Product recommendation created successfully');
        } catch (\Exception $e) {
            Log::error('product recommendation creation failed: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create product recommendation. Please try again.');
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
        Log::info('Product recommendation edit started', ['ProductRecommendation' => $id]);
        try {
            $productRecommendation = ProductRecommendation::findOrFail($id);
            return response()->json($productRecommendation);
        } catch (\Exception $th) {
            Log::error('Failed Product Recommendation List edit', ['ProductRecommendation_id' => $id]);
            return response()->json(['error' => 'Product recommendation list not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            Log::info('Attempting to update Product recommendation with data:', $request->all());

            $productRecommendation = ProductRecommendation::findOrFail($id);

            // dd($request->all());
            $validatedData = $request->validate([
                'id_skintone' => 'required|exists:skintones,id_skintone',
                'id_personal_color' => 'required|exists:personal_colors,id_personal_color',
                'id_product' => 'required|exists:products,id_product',
            ]);

            $productRecommendation->fill($validatedData);
            $productRecommendation->save();

            Log::info('Product recommendation update successfully:', $productRecommendation->toArray());

            return redirect()->route('admin.pages.product-recomendation.index')
                ->with('success', 'Product recommendation update successfully');
        } catch (\Exception $e) {
            Log::error('product recommendation update failed: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update product recommendation. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Log::info('Start to delete product recommendation: ' . $id);

        try {
            $productRecommendation = ProductRecommendation::findOrFail($id);
            $productRecommendation->delete();
            Log::info('Success to delete product recommendation: ' . $id);
            return redirect()
                ->route('admin.pages.product-recomendation.index')
                ->with('success', 'product recommendation deleted successfully');
        } catch (\Exception $e) {
            Log::error('Failed to delete product recommendation: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete product recommendation');
        }
    }
}
