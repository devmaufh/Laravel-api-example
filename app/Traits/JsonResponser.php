<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

trait JsonResponser
{
    private function successResponse($data, $code){
        return response()->json($data, $code);
    }

    protected function errorResponse($message, $code){
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    protected function showOne(Model $instance, $code = 200){
        return $this->successResponse(['data' =>$instance], $code);
    }
    protected function showAllPaginate(LengthAwarePaginator $collection, $code = 200){
        return $this->successResponse(['data' => $collection],$code);
    }

}


?>
