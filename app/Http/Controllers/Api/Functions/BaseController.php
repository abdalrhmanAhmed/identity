<?php

namespace App\Http\Controllers\Api\Functions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
        // Send respnose
        public function sendResponse($result , $message = [] , $code = 200){
            $response = [
                'success' => 'success',
                'data' => $result,
                'message' => $message
            ];
    
            return response()->json($response, $code);
        }
    
    
        // Send Error
        public function sendError($error , $eroorMessage = [] , $code = 200){
    
            $response = [
                'success' => false,
                'data' => $error,
                'message' => $eroorMessage
            ];
    
            if( !empty($eroorMessage)){
                $response['message'] = $eroorMessage;
            }
    
            return response()->json($response, $code);
        }
}
