<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function showAllCustomer()
    {
        $customers = Customer::showAllCustomer();
        return view('showCustomer',[
            'lists' => $customers
        ]);
    }
}
