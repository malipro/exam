<?php

namespace App\Repositories;

use App\Models\Color;
use App\Models\Product;

class ColorRepository implements ColorRepositoryInterface
{
    public function all($data)
    {
        $colors = Color::with('prices');

        if($data->filled('name'))
            $colors = $colors->where('name',$data->name);

        return $colors->paginate(15);
    }


    public function store($data)
    {
        $data->validate(['name' => 'required|min:3']);

        Product::create($data->all());
    }


    public function update($data, $color)
    {
        $data->validate(['name' => 'required|min:3']);

        $color->update($data->all());
    }

    public function destroy($color)
    {
        //check if model has prices
        if($color->prices()->count()>0)
            return false;

        return $color->delete();
    }

}
