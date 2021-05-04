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
        'employee_identity_number',
        'first_name',
        'last_name',
        'email',
        'address',
        'place_of_birth',
        'date_of_birth',
        'identity_card_number',
        'phone_number',
        'active',
        'image',
    ];

    public static function getSalesPromotor() {
        return self::where('position_id', 5)
                    ->orderBy('first_name')
                    ->get();
    }

    public static function getDemoBooker() {
        return self::where('position_id', 4)
                    ->orderBy('first_name')
                    ->get();
    }

    public static function getSVPSales() {
        return self::where('position_id', 3)
                    ->orderBy('first_name')
                    ->get();
    }
}
