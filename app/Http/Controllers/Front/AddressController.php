<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\DeliveryAddress;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class AddressController extends Controller
{
    public function saveDeliveryAddress(Request $request) {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(),[
               'delivery_name' => 'required|string|max:100',
               'delivery_address' => 'required|string|max:200',
                'provinces' => 'required|string|max:150',
                'districts' => 'required|string|max:150',
                'wards' => 'required|string|max:150',
                'delivery_mobile' => 'required|string|max:10'
            ]);
            if ($validator->passes()) {
                $data = $request->all();
                $address = array();
                $address['user_id'] = Auth::user()->id;
                $address['name'] = $data['delivery_name'];
                $address['address'] = $data['delivery_address'];
                $address['provinces'] = $data['provinces'];
                $address['districts'] = $data['districts'];
                $address['wards'] = $data['wards'];
                $address['mobile'] = $data['delivery_mobile'];
                $address['status'] = 1;
                if (!empty($data['delivery_id'])) {
                    // Edit Delivery Address
                    DeliveryAddress::where('id',$data['delivery_id'])->update($address);
                } else {
                    // Add Delivery Address
                    DeliveryAddress::create($address);
                }
                // Get Updated Delivery Addresses
                $deliveryAddresses = DeliveryAddress::deliveryAddresses();
                $provinces = Province::get()->toArray();
                return response()->json([
                   'view' => (String)View::make('front.products.delivery_addresses')->with(compact('deliveryAddresses','provinces'))
                ]);

            } else {
                return response()->json([
                   'type' => 'error',
                   'errors' => $validator->messages()
                ]);
            }

        }
    }

    public function getDeliveryAddress(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            $deliveryAddress = DeliveryAddress::where('id',$data['addressid'])->first()->toArray();
            return response()->json([
               'address' => $deliveryAddress,
            ]);
        }
    }

    public function removeDeliveryAddress(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            DeliveryAddress::where('id',$data['addressid'])->delete();
            // Get Updated Delivery Addresses
            $deliveryAddresses = DeliveryAddress::deliveryAddresses();
            $provinces = Province::get()->toArray();
            return response()->json([
                'view' => (String)View::make('front.products.delivery_addresses')->with(compact('deliveryAddresses','provinces'))
            ]);
            return response()->json([
                'address' => $deliveryAddress,
            ]);
        }
    }

    public function setDefaultDeliveryAddress(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            DeliveryAddress::where('user_id',Auth::user()->id)->update(['is_default'=>0]);
            DeliveryAddress::where('id',$data['addressid'])->update(['is_default'=>1]);
            // Get Updated Delivery Addresses
            $deliveryAddresses = DeliveryAddress::deliveryAddresses();
            $provinces = Province::get()->toArray();
            return response()->json([
                'view' => (String)View::make('front.products.delivery_addresses')->with(compact('deliveryAddresses','provinces'))
            ]);
            return response()->json([
                'address' => $deliveryAddress,
            ]);
        }
    }
}
