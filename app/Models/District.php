<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $fillable = ['districts'];

//    public function provinces()
//    {
//        return $this->belongsTo(Province::class);
//    }

    public function wards()
    {
        return $this->hasMany(Ward::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'districts', 'code');
    }
}
