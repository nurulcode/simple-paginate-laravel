<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

trait ApiRespon
{
    use SimplePaginate;

    protected function successResponse($data, $code)
    {
        return response()->json($data, $code);
    }

    protected function errorResponse($message, $code)
    {
        return response()->json([ 'status' => 'error', 'error' =>  $message, 'code' => $code], $code);
    }

    protected function getAllData(Collection $collection, $code = 200)
    {
        $collection = $this->paginate($collection);

        return $this->successResponse(['data' => $collection], $code);
    }

    protected function getData(Model $model, $code = 200)
    {
        return $this->successResponse(['data' => $model], $code);
    }

    protected function getMessage($message, $code = 200)
    {
        return $this->successResponse(['data' => $message], $code);
    }
}
