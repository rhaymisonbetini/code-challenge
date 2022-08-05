<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository
{

    public function getCustomers(): mixed
    {
        return Customer::paginate(10);
    }

    public function filterCustomers($request): mixed
    {
        return Customer::where(function ($query) use ($request) {
            if ($request['country']) {
                $query->where('phone', 'like', '%' . $request['country'] . '%');
            }
        })->paginate(100);
    }
}
