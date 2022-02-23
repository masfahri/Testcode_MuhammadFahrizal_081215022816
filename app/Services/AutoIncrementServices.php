<?php

namespace App\Services;

class AutoIncrementServices 
{

    /**
     * Handle Increments Custom
     *
     * @param array $params
     * @return String
     */
    public static function handleIncrement($params)
    {
        if ($params['data'] === 0) {
            $newID = $params['prefix'].'0001';
            return $newID; 
        }else{
            $initID = substr($params['data'], $params['length'], $params['length']+1);
            $initID++;
            $newID = $params['prefix'].sprintf('%04s', $initID);
            return $newID;
        }
    }
}
