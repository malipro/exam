<?php

namespace App\Repositories;

use App\Http\Requests\ProductStoreRequest;
use Illuminate\Http\Request;

interface ProductRepositoryInterface
{
    public function all($data);

    public function create();

    public function store(ProductStoreRequest $request, $data);

    public function edit($id);

    public function update(ProductStoreRequest $request, $data, $product);

    public function show($id);

    public function destroy($product);
}
