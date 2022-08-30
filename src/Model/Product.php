<?php

namespace KameGame;

class Product
{
    private int $prodID;
    private int $userId;
    private string $prodName;
    private string $prodDesc;
    private int $prodPrice;

    /**
     * @return int
     */
    public function getProdID(): int
    {
        return $this->prodID;
    }

    /**
     * @param int $prodID
     */
    public function setProdID(int $prodID): void
    {
        $this->prodID = $prodID;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }



    /**
     * @return string
     */
    public function getProdName(): string
    {
        return $this->prodName;
    }

    /**
     * @param string $prodName
     */
    public function setProdName(string $prodName): void
    {
        $this->prodName = $prodName;
    }

    /**
     * @return string
     */
    public function getProdDesc(): string
    {
        return $this->prodDesc;
    }

    /**
     * @param string $prodDesc
     */
    public function setProdDesc(string $prodDesc): void
    {
        $this->prodDesc = $prodDesc;
    }



    /**
     * @return int
     */
    public function getProdPrice(): int
    {
        return $this->prodPrice;
    }

    /**
     * @param int $prodPrice
     */
    public function setProdPrice(int $prodPrice): void
    {
        $this->prodPrice = $prodPrice;
    }


    public function __toString()
    {
        $str = 'prodID = ' . $this->prodID;
        $str .= ', userId = ' . $this->userId;
        $str .= ', prodName = ' . $this->prodName;
        $str .= ', prodDesc = ' . $this->prodDesc;
        $str .= ', prodPrice = ' . $this->prodPrice;

        return $str;
    }


}