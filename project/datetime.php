<?php
   $date1 = new DateTime("18-02-24");
   $date2 = new DateTime("2019-03-24");
   if ($date1 > $date2) {
    echo 'datetime1 greater than datetime2';
   }
   if ($date1 < $date2) {
    echo 'datetime1 lesser than datetime2';
   }
  if ($date1 == $date2) {
    echo 'datetime2 is equal than datetime1';
   }
?>
