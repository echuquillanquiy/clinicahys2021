<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'anam_description', 'ant_personal', 'ant_family', 'importance', 'asymptomatic',
        'orofaringe', 'cardiovascular', 'torax', 'printdx', 'observations', 'result', 'temperature',
        'fc', 'spo2', 'patient_id', 'order_id', 'user_id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
