<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    public function client()
    {
        return $this->belongsTo(Client::class);
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
}
