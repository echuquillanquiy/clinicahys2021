<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['dni', 'name', 'lastname', 'birthday', 'age', 'origin'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
