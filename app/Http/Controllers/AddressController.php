<?php

namespace App\Http\Controllers;

//use App\Models\User;
use App\Models\User;
use App\Models\Address;
use App\Http\Traits\GeneralTrait;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAddressRequest;
//use App\Http\Requests\UpdateAddressRequest;

class AddressController extends Controller
{
use GeneralTrait;
    
public function insert_address(StoreAddressRequest $request)
{
    $user = Auth::user();
    if(!$user){
        return $this->returnError('','Error in insert');
    }
    $address = new Address([
        'street_address' => $request->input('street_address'),
        'area' => $request->input('area'),
        'city' => $request->input('city')
    ]);
    $user->address()->save($address);
        return $this->returnSuccessMessage('تمت اضافة العنوان بنجاح');
    }
   public function get_address()
        {
            $user = Auth::user();
            if (!$user) {
                return $this->returnError('', 'User not found');
            } else {
                $address = $user->address;
                return $this->returnData('تم جلب العنوان بنجاح',$address);
            }
       
        }
    

    
    }