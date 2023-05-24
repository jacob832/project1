<?php
namespace App\Http\Traits;
trait GeneralTrait

{
    public function getCurrentLang(){
        return app()->getLocale();
    }
    public function returnError($error,$msg){
        return response()->json([
            'status'=>'false',
            'error'=>$error,
            'msg'=>$msg, 
        ]);
    }
    public function returnSuccessMessage($msg="",$errNum="S000"){
        return [
            'status'=>true,
            'errNum'=>$errNum,
            'msg'=>$msg,
        ];
    }
    public function returnData($msg="",$data){
        return response()->json([
            'status'=>true,
            'data'=>$data,
            'msg'=>$msg,
           // $key=>$value,
        ]);
    }
}