<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tool_id',
        'borrower_user_id',
        'date_time_loan',
        'expected_return_date',
        'date_time_return',
        'isBorrowed',
        'observations',
    ];

    public function tool()
    {
        return $this->belongsTo(Tool::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'borrower_user_id');
    }
}
