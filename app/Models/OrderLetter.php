<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLetter extends Model
{
    use HasFactory;

    protected $table = 'order_letters';

    protected $fillable = [
        'number',
        'province_id',
        'regency_id',
        'subdistrict_id',
        'village_id',
        'sp_employee_id',
        'db_employee_id',
        'ss_employee_id',
        'surveyor_id',
        'coordinator_name',
        'address',
        'installments_tenor',
        'coordinator_discount',
        'reward',
        'dp_discount',
        'total',
        'netto',
        'first_installment',
        'monthly_installments',
        'date',
        'survey_date',
        'delivery_date',
        'due_date',
        'customers',
        'survey_status',
        'phone',
    ];
}
