<?php

namespace App\Repositories;

interface ColorRepositoryInterface
{
    public function all($data);

    public function store($data);

    public function update($data, $color);

    public function destroy($color);

}
