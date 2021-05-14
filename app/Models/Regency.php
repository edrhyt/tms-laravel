<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    use HasFactory;

    public static function getRegencyName($id) {
        $regency = self::where('id', $id)
                    ->orderBy('name')
                    ->get()
                    ->first();
        return $regency->name;
    }
}
