<?php

use App\Models\OrderDetail;

if (!function_exists('GetAllItems')) {

    /**
     * Get All Orders
     *
     * @param
     * @return
     */
    function GetAllItems($items)
    {
        $html = '';
        $orderDetails = OrderDetail::get();
        for ($i = 0; $i < count($items); $i++) {
            $html .= "<div class='mb-3'>";
                $html .= "<div class='small text-gray-500'>".$items[$i]->nama;
                    $html .= "<div class='small float-right'><b>".$items[$i]->OrderDetails->count()." of ".$orderDetails->count()."</b></div>";
                    $html .= "</div>";
                    $html .= "<div class='progress' style='height: 12px;'>";
                        $html .= "<div class='progress-bar bg-".RandomColorBootstrap($i)."' role='progressbar' style='width: ".$items[$i]->OrderDetails->count()."%'";
                        $html .= "aria-valuenow='".$items[$i]->OrderDetails->count()."' aria-valuemin='1' aria-valuemax='".$orderDetails->count()."'></div>";
                        $html .= "</div>";
                        $html .= "</div>";
                    }
                    return $html;
    }
}

