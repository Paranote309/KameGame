<?php

namespace KameGame;

class Item
{
    public $prodID;
    public $prodName;
    public $prodPrice;

    public function __toString()
    {
        $text = '';
        $text .= 'id = ' . $this->prodID;
        $text .= ', name = ' . $this->prodName;
        $text .= ', price = ' . $this->prodPrice;

        return $text;
    }


}