<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    public static function getDesa($subdistrict_id) {
        return self::where('subdistrict_id', $subdistrict_id)
                    ->orderBy('name') ->get();
    }
}
