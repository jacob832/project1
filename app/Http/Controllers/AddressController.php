<?php

namespace App\Http\Controllers;

//use App\Models\User;
use App\Models\User;
use App\Models\Address;
use App\Http\Traits\GeneralTrait;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAddressRequest;
use Symfony\Component\HttpFoundation\Request;
//use App\Http\Requests\UpdateAddressRequest;

class AddressController extends Controller
{
use GeneralTrait;
  
public function insert_address(Request $request)
{
    $user = Auth::user();
    if (!$user) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    $this->validate($request, [
        'street_address' => 'required',
        'area' => 'required',
        'city' => 'required'
    ]);

    $address = new Address([
        'street_address' => $request->input('street_address'),
        'area' => $request->input('area'),
        'city' => $request->input('city')
    ]);

    $user->address()->save($address);

    return response()->json(['message' => 'Address added successfully'], 200);
}

/*
public function insert_address(StoreAddressRequest $request)
{
    $user = Auth::user();
    if(!$user){
        return $this->returnError('400','Error in insert');
    }
    $address = new Address([
        'street_address' => $request->input('street_address'),
        'area' => $request->input('area'),
        'city' => $request->input('city')
    ]);
    $user->address()->save($address);
        return $this->returnSuccessMessage('تمت اضافة العنوان بنجاح');
    }
*/
   public function get_address()
        {
            $user = Auth::user();
            if (!$user) {
                return $this->returnError('404', 'User not found');
            } else {
                $address = $user->address;
                return $this->returnData('تم جلب العنوان بنجاح',$address);
            }
       
        }
    

    
    }