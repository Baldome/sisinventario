<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'state_id',
        'category_id',
        'location_id',
        'admission_date',
        'user_id',
        'model',
        'series',
        'image',
        'description',
        'observations'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class); // de muchos a uno 
    }

    public function location()
    {
        return $this->belongsTo(Location::class); // de muchos a uno
    }

    // Relación de muchos a uno con la tabla users 
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
