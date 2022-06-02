<?php

namespace App\Repositories;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Color;
use App\Models\ColorPrice;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function all($data)
    {
        $products = Product::with('prices');

        if($data->filled('name'))
            $products = $products->where('name','like','%'.$data->name.'%');

        if($data->filled('start_price'))
            $products = $products->whereHas('prices',function ($query) use ($data){
                $query->where('price','>=',$data->start_price);
            });


        if($data->filled('end_price'))
            $products = $products->whereHas('prices',function ($query) use ($data){
                $query->where('price','<=',$data->end_price);
            });

        return $products->paginate(15);

    }

    public function create()
    {
        return Color::all();
    }

    public function store(ProductStoreRequest $request, $data)
    {
        $product = Product::create([
            'name' => $data->name,
            'description' => $data->description,
        ]);

        for ($index = 0; $index<=count($data->colors); ++$index)
            ColorPrice::create([
                'product_id' => $product->id,
                'color_id' => $data->colors[$index],
                'price' => $data->price[$index],
            ]);


    }

    public function edit($id)
    {
        return Product::with('prices')->find($id);
    }

    public function update(ProductStoreRequest $request, $data, $product)
    {
        $product->update([
          'name' => $data->name,
          'description' => $data->description,
        ]);

        $product->prices()->delete();

        //update prices
        for ($index = 0; $index<=count($data->colors); ++$index)
            ColorPrice::create([
                'product_id' => $product->id,
                'color_id' => $data->colors[$index],
                'price' => $data->price[$index],
            ]);


    }

    public function show($id)
    {
        return Product::with('prices')->find($id);
    }

    public function destroy($product)
    {
        $product->delete();
    }

}
