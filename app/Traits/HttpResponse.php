<?php
    namespace App\Traits;
    trait HttpResponse{
        protected function success($data, $message = null, $code = 200){
            return response()->json([
                'status' => 'Request Successfully',
                'message' => $message,
                'data' => $data,
            ], $code);
        }
        protected function error($data, $message = null, $code){
            return response()->json([
                'status' => 'Request Field to submit',
                'message' => $message,
                'data' => $data,
            ], $code);
        }
    }