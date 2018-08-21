<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class CustomerController extends Controller
{
    public function showAllCustomer()
    {
        $customers = Customer::showAllCustomer();
        return view('showCustomer',[
            'lists' => $customers
        ]);
    }
    public function insert(Request $request)
    {
        $customerPost = new CustomerRequest();
        $rule = $customerPost->rules();
        $validator = Validator::make($request->all(),$rule);
        $name = $request->get('name');
        $address = $request->get('address');
        $phone  = $request->get('phone');
        if(!$validator->fails())
        {
            DB::table('customers')->insert([
                'name' => $name,
                'address' => $address,
                'phone' => $phone,
                'active_flg' => 1
            ]);
            $request->session()->flash('success','Created Successfully !!!');
            return redirect()->route('showAllCustomer');
        }
        else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
    public function update(Request $request) {
        $customerPost = new CustomerRequest();
        $rule = $customerPost->rules();
        unset($rule['name']);
        $validator = Validator::make($request->all(),$rule);
        $id = $request->get('id');
        $name = $request->get('name');
        $address = $request->get('address');
        $phone = $request->get('phone');
        $success = true;
        if(!$validator->fails()){
            DB::table('customers')
                ->where('id',$id)
                ->update([
                    'name' => $name,
                    'address' => $address,
                    'phone' => $phone
                ]);
            return response()->json([
                'success' => $success
            ]);
        }
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()->all()
        ]);
    }
    public function delete($id)
    {
        DB::table('customers')
            ->where('id',$id)
            ->update([
                'active_flg' => 0
            ]);
        session()->flash('success','Deleted Successfully !');
        return redirect()->route('showAllCustomer');
    }
    public function deleteChecked(Request $request)
    {
        $customer_id_array = $request->get('id');
        $customer = Customer::query()->whereIn('id',$customer_id_array)->get();
        if(!empty($customer)) {
            foreach($customer as $value) {
                $value->active_flg = 0;
                $value->save();
            }
        }
        return response()->json([
            'success' => true
        ]);
    }
}
