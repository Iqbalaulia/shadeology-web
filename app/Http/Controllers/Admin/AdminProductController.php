<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductBrand;
use App\Models\ProductList;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productBrand = ProductBrand::orderBy('created_at', 'desc')->get();
        $productType = ProductType::orderBy('created_at', 'desc')
            ->get();
        $productsList = ProductList::with(['brand', 'type'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.pages.product.product.index', compact('productsList', 'productBrand', 'productType'));
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
            Log::info('Attempting to create product with data:', $request->all());


            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'id_merk' => 'required|exists:merks,id_merk',
                'id_type' => 'required|exists:tipe_products,id_type_product',
                'link_affiliate' => 'nullable|url',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);


            if ($request->hasFile('image')) {
                try {
                    $image = $request->file('image');
                    $request->validate([
                        'image' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
                    ]);

                    // Fix the image name generation
                    $imageName = time() . '_product.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('uploads/products');

                    // Create directory if it doesn't exist
                    if (!file_exists($destinationPath)) {
                        mkdir($destinationPath, 0755, true);
                    }

                    $image->move($destinationPath, $imageName);

                    // Make sure database path matches actual file path
                    $validatedData['image'] = 'uploads/products/' . $imageName;
                } catch (\Exception $e) {
                    Log::error('Image upload failed: ' . $e->getMessage());

                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'Gagal mengunggah gambar. Silakan coba lagi.');
                }
            }


            $productList = ProductList::create($validatedData);

            Log::info('Product created successfully:', $productList->toArray());

            return redirect()->route('admin.pages.product.product.index')
                ->with('success', 'Product created successfully');
        } catch (\Exception $e) {
            Log::error('product creation failed: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create product. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Log::info('Product edit started', ['ProductList' => $id]);
        try {
            $productList = ProductList::findOrFail($id);
            return response()->json($productList);
        } catch (\Exception $th) {
            Log::error('Failed Product List edit', ['ProductList_id' => $id]);
            return response()->json(['error' => 'Product list not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            Log::info('Attempting to create brand with data:', $request->all());

            $productList = ProductList::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'id_merk' => 'required|exists:merks,id_merk',
                'id_type' => 'required|exists:tipe_products,id_type_product',
                'link_affiliate' => 'nullable|url',
            ]);


            if ($request->hasFile('image')) {
                try {
                    $image = $request->file('image');
                    $request->validate([
                        'image' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
                    ]);

                    $imageName = time() . '_product.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('uploads/products');

                    if (!file_exists($destinationPath)) {
                        mkdir($destinationPath, 0755, true);
                    }

                    $image->move($destinationPath, $imageName);

                    $validatedData['image'] = 'uploads/products/' . $imageName;
                } catch (\Exception $e) {
                    Log::error('Image upload failed: ' . $e->getMessage());

                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'Gagal mengunggah gambar. Silakan coba lagi.');
                }
            }


            $productList->fill($validatedData);
            $productList->save();

            Log::info('Product updated successfully:', $productList->toArray());

            return redirect()->route('admin.pages.product.product.index')
                ->with('success', 'Product updated successfully');
        } catch (\Exception $e) {
            Log::error('product updated failed: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to updated product. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Log::info('Start to delete product: ' . $id);

        try {
            $productList = ProductList::findOrFail($id);
            // Delete the image file if it exists
            if ($productList->image) {
                $imagePath = public_path($productList->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                    Log::info('Product image deleted successfully: ' . $imagePath);
                }
            }

            $productList->delete();

            Log::info('Success to delete product: ' . $id);
            return redirect()
                ->route('admin.pages.product.product.index')
                ->with('success', 'product deleted successfully');
        } catch (\Exception $e) {
            Log::error('Failed to delete product: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete product');
        }
    }
}
