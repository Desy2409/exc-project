<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    protected $guard = 'admin';

    protected $fillable = [
        'last_name',
        'first_name',
        'phone_number1',
        'phone_number2',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
