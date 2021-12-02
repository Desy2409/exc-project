<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guard = 'client';

    protected $fillable = [
        'person_type',
        'civility',
        'last_name',
        'first_name',
        'social_reason',
        'phone_number1',
        'phone_number2',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
