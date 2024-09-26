<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function asset(){
        return $this->hasMany(Asset::class);
    }

    public function tool(){
        return $this->hasMany(Tool::class);
    }
}
