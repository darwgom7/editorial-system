<?php
class EditorialBranchModel
{
    private $code;
    private $address;
    private $phone;
    public function __construct($code, $address, $phone)
    {
        $this->code = $code;
        $this->address = $address;
        $this->phone = $phone;
    }
    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
}
