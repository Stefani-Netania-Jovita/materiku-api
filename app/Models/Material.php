<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable =[
        'title',
        'subject',
        'semester',
        'material_type',
        'description',
        'file_url',
    ];
}
