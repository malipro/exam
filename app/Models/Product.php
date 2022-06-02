<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description'
    ];

    public function prices()
    {
        return $this->hasMany(ColorPrice::class);
    }

    public function getShortDescriptionAttribute()
    {
        mb_internal_encoding('UTF-8');
        return mb_substr($this->description, 0,40).'...';
    }
}
