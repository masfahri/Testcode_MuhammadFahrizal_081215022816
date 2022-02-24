<?php
if (!function_exists('ColorBootstrap')) {

    /**
     * Get All Orders
     *
     * @param
     * @return
     */
    function RandomColorBootstrap($i)
    {
        $a=array('success', 'danger', 'info', 'warning', 'primary');
        return $a[array_rand($a)];
    }
}