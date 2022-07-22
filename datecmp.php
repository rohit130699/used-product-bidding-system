<?php
   $date1 = "18-03-22";
   $date2 = "2017-08-24";
   $curtimestamp1 = strtotime($date1);
   $curtimestamp2 = strtotime($date2);
   if ($curtimestamp1 > $curtimestamp2)
      echo "$date1 is latest than $date2";
   else
      echo "$date1 is older than $date2";
?>
