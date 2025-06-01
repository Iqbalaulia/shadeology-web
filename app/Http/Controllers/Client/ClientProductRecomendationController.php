<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\PersonalColor;
use App\Models\ProductList;
use App\Models\ProductRecommendation;
use App\Models\SkinTone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClientProductRecomendationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skintone = SkinTone::orderBy('created_at', 'desc')->get();
        $personalColor = PersonalColor::orderBy('created_at', 'desc')->get();
        $productList = ProductList::orderBy('created_at', 'desc')->get();
        return view('client.pages.product-recommendation.index', compact(
            'skintone',
            'personalColor',
            'productList'
        ));
    }


    public function search(Request $request)
    {
        try {
            $query = ProductRecommendation::query()
                ->with(['product.brand', 'product.type', 'skintone', 'personalColor']);

            if ($request->filled('personal_color_id')) {
                $query->where('id_personal_color', $request->personal_color_id);
            }

            if ($request->filled('skin_tone_id')) {
                $query->where('id_skintone', $request->skin_tone_id);
            }

            $recommendations = $query->get();
            $personalColor = PersonalColor::all();
            $skintone = SkinTone::all();

            return view('client.pages.product-recommendation.index', compact(
                'recommendations',
                'personalColor',
                'skintone'
            ));
        } catch (\Exception $e) {
            Log::error('Product recommendation search error: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while searching. Please try again.');
        }
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
