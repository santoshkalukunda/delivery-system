<?php
       function nepalicurrenntdate(){
                require("nepali-date.php");
                $nepali_date = new nepali_date();
                $year_en = date("Y",time());
                $month_en = date("m",time());
                $day_en = date("d",time());
                $date_ne = $nepali_date->get_nepali_date($year_en, $month_en, $day_en);
                $today=$date_ne['y'].'-'.$date_ne['m'].'-'.$date_ne['d'];
                return $today;
                }

?>
