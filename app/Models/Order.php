<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'patient_id',
        'client_id',
        'position_id',
        'subclient_id',
        'test_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function subclient()
    {
        return $this->belongsTo(Client::class, 'subclient_id');
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function medicine()
    {
        return $this->hasOne(Medicine::class);
    }

    public function laboratory()
    {
        return $this->hasOne(Laboratory::class);
    }
}
