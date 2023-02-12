<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class date_format
{

    public function ymd_to_mdy($date_ymd)
    {

        $ymd = "";
        $mdy = "";
        
        $ymd = explode("-", $date_ymd);
        
        $mdy = $ymd[1] . "/" . $ymd[2] . "/" . $ymd[0];
        
        return $mdy;
    }
    
    public function mdy_to_ymd($date_mdy)
    {

        $mdy = "";
        $ymd = "";
        
        $mdy = explode("/", $date_mdy); //10/29/2015
        
        $ymd = $mdy[2] . "-" . $mdy[0] . "-" . $mdy[1]; // 2015-10-29
        
        return $ymd;
    }


}
?>