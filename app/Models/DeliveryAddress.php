<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DeliveryAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'address', 'provinces', 'districts', 'wards', 'mobile', 'status'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'provinces', 'code');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'districts', 'code');
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class, 'wards', 'code');
    }

    public static function deliveryAddresses() {
        $user_id = Auth::user()->id;
        $deliveryAddresses = DeliveryAddress::with(['province', 'district', 'ward'])->where('user_id', $user_id)->get()->toArray();
        return $deliveryAddresses;
    }


}
