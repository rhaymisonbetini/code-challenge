<?php

namespace App\Services;

class ValidadePhoneNumberService
{

    //Country codes
    private $camerronCode = '237';
    private $ethiopiaCode = '251';
    private $morrocoCode = '212';
    private $mozambique = '258';
    private $ugandaCode = '256';

    //Regex expressions
    private $camerronRegex = '/(237)\?[2368]\d{7,8}$/';
    private $ethiopiaRegex = '/(251)\?[1-59]\d{8}$/';
    private $moroccoRegex = '/(212)\?[5-9]\d{8}$/';
    private $MozambiqueRegex = '/(258)\?[28]\d{7,8}$/';
    private $Ugandagex = '/(256)\?\d{9}$/';


    public function validatePhoneNumber($customers): mixed
    {

        $customers->map(function ($customer) {

            switch (substr($customer->phone, 1, 3)) {
                case $this->camerronCode:
                    $customer->isValid = $this->validateCamerron($customer->phone);
                    $customer->country = 'Camerron';
                    break;

                case $this->ethiopiaCode;
                    $customer->isValid = $this->validadeEthiopia($customer->phone);
                    $customer->country = 'Ethiopia';
                    break;

                case $this->morrocoCode;
                    $customer->isValid = $this->validadeMorocco($customer->phone);
                    $customer->country = 'Morroco';
                    break;

                case $this->mozambique;
                    $customer->isValid = $this->validadeMozambique($customer->phone);
                    $customer->country = 'Mozambique';
                    break;

                case $this->ugandaCode;
                    $customer->isValid = $this->validadeUganda($customer->phone);
                    $customer->country = 'Uganda';
                    break;
            }
        });
        return $customers;
    }


    public function validateCamerron($phone): bool
    {
        return preg_match($this->camerronRegex, $phone);
    }

    public function validadeEthiopia($phone): bool
    {
        return preg_match($this->ethiopiaRegex, $phone);
    }

    public function validadeMorocco($phone): bool
    {
        return preg_match($this->moroccoRegex, $phone);
    }

    public function validadeMozambique($phone): bool
    {
        return preg_match($this->MozambiqueRegex, $phone);
    }

    public function validadeUganda($phone): bool
    {
        return preg_match($this->Ugandagex, $phone);
    }
}
