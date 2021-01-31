<?php

namespace App\DTO;

final class FooterInformation
{
    private string $companyName;

    private string $address;

    public function __construct(string $companyName, string $address)
    {
        $this->companyName = $companyName;
        $this->address = $address;
    }

    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    public function getAddress(): string
    {
        return $this->address;
    }
}
