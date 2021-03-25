<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'division_id',
        'position_id',
        'employee_idendtity_number',
        'firs_name',
        'last_name',
        'email',
        'address',
        'place_of_birth',
        'data_of_birth',
        'identity_card_number',
        'phone_number',
        'active',
        'image',
    ];
}
