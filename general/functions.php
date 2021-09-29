<?php


function test($condition, $message){

    if($condition){
        echo "<div class='alert alert-info'
            $message done
        </div>";
    }else{
        
        echo "<div class='alert alert-danger'
            $message fail
        </div>";
    };


}

function auth(){
    if ($_SESSION['admin']) {
    }
    else {
        header("location: /hospital/admin/admin.php");
    }
}




?>