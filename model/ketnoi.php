<?php

class ketnoi
{
    public function moketnoi()
    {   
        $mysqli = mysqli_connect('localhost','domdom','1234','domdom');
        mysqli_set_charset($mysqli, "utf8");
        return $mysqli;
    }
    public function dongketnoi($con)
    {
        $con->close();
    }
}

?>