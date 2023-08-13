<?php

namespace App\ApiTrait;

trait GeneralTrait
{
    // Get Current language
    public function getCurrentLang(){

        return app()->getLocale();
    }

    // if u have any error show this response Json
    public function returnError($errNum, $msg){

        return response()->json([
           'status' => false,
           'errNum' => $errNum,
           'msg' => $msg
        ]);
    }

    // if u have not any error show this response Json
    public function returnSuccessMessage($errNum = "S000", $msg = ""){

        return response()->json([
            'status' => true,
            'errNum' => $errNum,
            'msg' => $msg
        ]);
    }

    public function returnData($key, $value, $msg = ""){

        return response()->json([
            'status' => true,
            'errNum' => "S000",
            'msg' => $msg,
            $key => $value
        ]);
    }

}
