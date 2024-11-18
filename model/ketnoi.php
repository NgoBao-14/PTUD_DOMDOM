<?php

class ketnoi
{
    public function moketnoi()
    {   
        $mysqli = mysqli_connect('localhost','baotmdt','123456','qlbenhan2');
        mysqli_set_charset($mysqli, "utf8");
        return $mysqli;
    }
    public function dongketnoi($con)
    {
        $con->close();
    }
}

?>