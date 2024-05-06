<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'sate', 'admission_date', 'model', 'series', 'image', 'description', 'observations', 'category_id', 'location_id'];

    public function category()
    {
        return $this->belongsTo(Category::class); // de muchos a uno 
    }

    public function location()
    {
        return $this->belongsTo(Location::class); // de muchos a uno
    }
}
