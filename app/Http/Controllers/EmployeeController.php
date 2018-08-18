<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;
use Validator;

class EmployeeController extends Controller
{
    public function showAllEmployee()
    {
        $employee = Employee::showAllEmployee();
        return view('showEmployee',[
            'lists' => $employee
        ]);
    }
    public function insert(Request $request)
    {
        $employeePost = new EmployeeRequest();
        $rule = $employeePost->rules();
        $validator = Validator::make($request->all(),$rule);
        $name = $request->get('name');
        $sex = $request->get('sex');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $employee =  new Employee();
        $employee->name = $name;
        $employee->sex = $sex;
        $employee->email = $email;
        $employee->phone = $phone;
        $employee->active_flg = 1;
        if(!$validator->fails()) {
            $employee->save();
            $request->session()->flash('success','Created Successfully !!!');
            return redirect()->route('showAllEmployee');
        }
        else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
    public function update(Request $request) {
        $employeePost = new EmployeeRequest();
        $rule = $employeePost->rules();
        unset($rule['name']);
        unset($rule['email']);
        $validator = Validator::make($request->all(),$rule);
        $id = $request->get('id');
        $name = $request->get('name');
        $sex = $request->get('sex');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $success = true;
        $employee = Employee::findEmployeeByID($id);
        if(!$validator->fails()){
            $employee->name = $name;
            $employee->sex  = $sex;
            $employee->email = $email;
            $employee->phone = $phone;
            $employee->save();
            return response()->json([
                'success' => $success
            ]);
        }
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()->all()
        ]);
    }
    public function delete($id) {
        $employee = Employee::findEmployeeByID($id);
        $employee->active_flg = 0 ;
        $employee->save();
        session()->flash('success','Deleted Successfully !');
        return redirect()->route('showAllEmployee');
    }
}
