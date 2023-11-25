<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fileable = ['category_id', 'category_image'];

    function rel_to_user(){
        return $this->belongsTo(User::class, 'added_by');
    }
}
