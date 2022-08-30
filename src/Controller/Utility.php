<?php

namespace KameGame;

class Utility
{
    public static function validate(string $data): string
    {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;

    }
}