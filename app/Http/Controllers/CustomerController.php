<?php

namespace App\Http\Controllers;

use App\Repositories\CustomerRepository;
use App\Services\ValidadePhoneNumberService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    private $customerRepository;
    private $validadePhoneNumberService;

    public function __construct()
    {
        $this->customerRepository = new CustomerRepository;
        $this->validadePhoneNumberService = new ValidadePhoneNumberService;
    }


    public function getCustomers(): mixed
    {
        try {

            $customers = $this->customerRepository->getCustomers();
            $validatedCurstomers = null;

            if ($customers) {
                $validatedCurstomers = $this->validadePhoneNumberService->validatePhoneNumber($customers);
            }else{
                session()->flash('success', 'There is no data recorded in our system for this request.');
            }
            
            return view('welcome', compact('validatedCurstomers'));

        } catch (Exception $e) {
            return redirect()->back()->with('danger', $e->getMessage(), 400);
        }
    }

    public function filterCustomers(Request $request): mixed
    {
        try {

            if (is_null($request['status']) && !$request['country']) {
                return redirect()->back()->with('danger', 'Invalid filters. At least one search parameter must be provided.');
            }

            $customers = $this->customerRepository->filterCustomers($request);
            $validatedCurstomers = null;

            if ($customers) {
                $validatedCurstomers = $this->validadePhoneNumberService->validatePhoneNumber($customers);

                if (!is_null($request['status'])) {
                    foreach ($validatedCurstomers as $key => $customer) {
                        if ($customer->isValid != intval($request['status'])) {
                            $validatedCurstomers->forget($key);
                        }
                    }
                }

                $status = $request['status'] ? 'status :' . $request['status'] : null;
                $country = $request['country'] ? 'country code: ' . $request['country'] : null;
                session()->flash('success', 'Filtered by: ' . $status . $country);

            }else{
                session()->flash('success', 'There is no data recorded in our system for this request.');
            }

            return view('welcome', compact('validatedCurstomers'));

        } catch (Exception $e) {
            return redirect()->back()->with('danger', $e->getMessage(), 400);
        }
    }
}
