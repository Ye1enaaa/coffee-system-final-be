<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'customerName',
        'kiloOfBeans',
        'date'
    ];

    public function history(){
        return $this->belongsTo(Customer::class);
    }
}
