<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdistrict extends Model
{
    use HasFactory;

    public static function getKecamatan($regency_id) {
        return self::where('regency_id', $regency_id)
               ->orderBy('name')
               ->get();
    }
}
