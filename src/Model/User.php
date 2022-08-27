<?php

namespace KameGame;

class User
{
    public int $id;
    public string $username;
    public string $password;
    public string $email;
    public int|null $age;
    public string|null $location;
    public string $date;

    public function __toString()
    {
        $text = '';
        $text .= 'id = ' . $this->id;
        $text .= ', username = ' . $this->username;
        $text .= ', password = ' . $this->password;
        $text .= ', email = ' . $this->email;
        $text .= ', age = ' . $this->age;
        $text .= ', location = ' . $this->location;
        $text .= ', date = ' . $this->date;

        return $text;
    }
}