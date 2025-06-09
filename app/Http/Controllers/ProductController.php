<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\Property;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (isset($request->query()['properties'])) {
            $products = Product::with([
                'property',
                'property.type'
            ])//?properties[Вес][]=5&properties[Вес][]=2&properties[Ширина][]=20
            ->whereHas('property.type', function($query) use ($request) {
                $k = 0;
                foreach ($request->query()['properties'] as $property => $value) {
                    if($k == 0) {
                        $query->where(['name' => $property])
                            ->whereIn('value', $value);
                        $k++;
                    } else {
                        $query->orWhere(['name' => $property])
                            ->whereIn('value', $value);
                    }
                }
            })->get();
        } else {
            $products = Product::with([
                'property',
                'property.type'
            ])->get();
        };
//        foreach ($products as $key => $product) {
//            echo '<pre>'.print_r($product->name, true) . "</pre>";
//            foreach ($product->property as $property) {
//                echo '<pre>    '.$property->id .' '. $property->type->name.' '.$property->value.'<br></pre>';
//            }
//        }

        return ProductResource::collection($products);
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
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $product = Product::create($data);
        return ProductResource::make($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //dd($product);
        return ProductResource::make($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();
        $product->update($data);
        //$type = $type->fresh();
        return ProductResource::make($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['message' => 'done', 'status' => 200]);
    }
}
