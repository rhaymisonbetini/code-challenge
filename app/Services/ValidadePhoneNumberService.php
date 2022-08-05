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
    private $camerronRegex = '/\(237\)\ ?[2368]\d{7,8}$/';
    private $ethiopiaRegex = '/\(251\)\ ?[1-59]\d{8}$/';
    private $moroccoRegex = '/\(212\)\ ?[5-9]\d{8}$/';
    private $mozambiqueRegex = '/\(258\)\ ?[28]\d{7,8}$/';
    private $ugandagex = '/\(256\)\ ?\d{9}$/';


    public function validatePhoneNumber($customers): mixed
    {

        $customers->map(function ($customer) {

            switch (substr($customer->phone, 1, 3)) {
                case $this->camerronCode:
                    $customer->isValid = $this->isValidPhoneNumber($customer->phone, $this->camerronRegex);
                    $customer->country = 'Camerron';
                    break;

                case $this->ethiopiaCode;
                    $customer->isValid = $this->isValidPhoneNumber($customer->phone, $this->ethiopiaRegex);
                    $customer->country = 'Ethiopia';
                    break;

                case $this->morrocoCode;
                    $customer->isValid = $this->isValidPhoneNumber($customer->phone, $this->moroccoRegex);
                    $customer->country = 'Morroco';
                    break;

                case $this->mozambique;
                    $customer->isValid = $this->isValidPhoneNumber($customer->phone, $this->mozambiqueRegex);
                    $customer->country = 'Mozambique';
                    break;

                case $this->ugandaCode;
                    $customer->isValid = $this->isValidPhoneNumber($customer->phone, $this->ugandagex);
                    $customer->country = 'Uganda';
                    break;
            }
        });
        return $customers;
    }

    public function isValidPhoneNumber($phone, $regex) : bool
    {
        return preg_match($regex, $phone);
    }

}
