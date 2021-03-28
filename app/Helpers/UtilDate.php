<?php
namespace App\Helpers;

class UtilDate {
    public static function format($date, $from, $to){
        if($date != ''){
            $date = date_create_from_format($from, $date);
            $date = date_format($date, $to);
        }
        return $date;
    }
}

?>
