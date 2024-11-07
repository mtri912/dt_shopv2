<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    protected $fillable = ['wards'];


    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'wards', 'code');
    }
}