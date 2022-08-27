<?php

namespace KameGame;

class Utility
{
    public static function validate($data){

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;

    }
}