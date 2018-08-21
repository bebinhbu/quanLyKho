<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderRequest;
use App\Provider;
use Illuminate\Http\Request;
use Validator;

class ProviderController extends Controller
{
    public function showAllProvider()
    {
        $provider = Provider::showAllProvider();
        return view('showProvider',[
            'lists'=>$provider
        ]);
    }
    public function insert(Request $request)
    {
        $providerPost = new ProviderRequest();
        $rule = $providerPost->rules();
        $validator = Validator::make($request->all(),$rule);
        $name = $request->get('name');
        $address = $request->get('address');
        $phone = $request->get('phone');
        $provider =  new Provider();
        $provider->name = $name;
        $provider->address = $address;
        $provider->phone = $phone;
        $provider->active_flg = 1;
        if(!$validator->fails()) {
            $provider->save();
            $request->session()->flash('success','Created Successfully !!!');
            return redirect()->route('showAllProvider');
        }
        else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
    public function update(Request $request) {
        $providerPost = new ProviderRequest();
        $rule = $providerPost->rules();
        unset($rule['name']);
        $validator = Validator::make($request->all(),$rule);
        $id = $request->get('id');
        $name = $request->get('name');
        $address = $request->get('address');
        $phone = $request->get('phone');
        $success = true;
        $provider = Provider::findProviderByID($id);
        if(!$validator->fails()){
            $provider -> name = $name;
            $provider -> address = $address;
            $provider -> phone = $phone;
            $provider -> save();
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
        $provider = Provider::findProviderByID($id);
        $provider->active_flg = 0 ;
        $provider->save();
        session()->flash('success','Deleted Successfully !');
        return redirect()->route('showAllProvider');
    }
    public function deleteChecked(Request $request){
        $provider_id_array = $request->get('id');
        $provider = Provider::query()->whereIn('id',$provider_id_array)->get();
        if(!empty($provider)) {
            foreach($provider as $value) {
                $value->active_flg = 0;
                $value->save();
            }
        }
        return response()->json([
            'success' => true
        ]);
    }

}
