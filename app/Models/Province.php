<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $fillable = ['provinces'];

    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'provinces', 'code');
    }

}
