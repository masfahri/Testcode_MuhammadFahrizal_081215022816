<?php

namespace App\Http\Controllers;

use App\Services\AutoIncrementServices;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getLastCode($model, $field, $prefix, $length)
    {
        count($model::all()) == 0 ? $data = 0 : $data = $model::latest($field)->first()->$field;
        return $this->getKodeIncrement($model, ['data' => $data, 'prefix' => $prefix, 'length' => $length]);
    }

    /**
     * Get Kode Guru Last
     * @param $model $field in $model
     * @return String
     */
    public function getKodeIncrement($model, $incrementParams)
    {
        $autoIncrementServices = new AutoIncrementServices();
        $result = $autoIncrementServices->handleIncrement($incrementParams);
        return $result;
    }
}
