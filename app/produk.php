<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $fillable = [
        'name','harga','deskripsi','image','category_id'
    ];
}
