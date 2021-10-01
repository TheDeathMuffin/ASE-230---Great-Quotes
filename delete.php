<?php
require("csv_util.php");
function confirm_delete(){
    if(confirm("Are you sure you want to delete this..?") === true){
        return true;
    }else{
        return false;
   }
 }
confirm_delete();
?>
