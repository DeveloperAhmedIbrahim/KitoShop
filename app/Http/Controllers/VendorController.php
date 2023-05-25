<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Vendor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    public function index()
    {
        $model['vendors'] = Vendor::all();
        return view('vendors.index',$model);
    }

    public function new()
    {
        return view('vendors.new');
    }


    public function save(Request $request)
    {
        if($request->request_type == "insert")
        {
            return $this->insert($request);
        }
        else if($request->request_type == "update")
        {
            return $this->update($request);
        }
    }

    public function insert($request)
    {
        $response = array();
        $validator = Validator::make($request->post(),[
            'name' => 'required|unique:vendors,name',
            'contact' => 'required|numeric',
            'email' => 'email',
        ]);

        if($validator->fails())
        {
            $response = [
                'code' => 0,
                'errors' => $validator->errors()->all()
            ];
            return $response;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://phonevalidation.abstractapi.com/v1/?api_key=08ceab5f4ba04294ad268719730e917d&phone='.$request->contact);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $contact_validator = curl_exec($ch);
        curl_close($ch);
        $contact_validator = json_decode($contact_validator);
        if($contact_validator->valid)
        {
            $contact = $contact_validator->format->international;
        }
        else
        {
            $response = [
                'code' => 0,
                'errors' => [
                    'The contact number you have entered is not valid.'
                ]
            ];
            return $response;
        }
        try
        {
            $vendor = new Vendor();
            $vendor->name = $request->name;
            $vendor->email = $request->email;
            $vendor->contact = $contact;
            $vendor->address = $request->address;
            $vendor->save();

            $response = [
                'code' => 1,
            ];
            session()->flash('success',"New vendor added successfully.");

        }
        catch(Exception $ex)
        {
            $response = [
                'code' => 2,
                'message' => $ex->getMessage()
            ];
        }

        return $response;
    }


    public function update($request)
    {
        $response = array();
        $validator = Validator::make($request->post(),[
            'name' => 'required|unique:vendors,name,'.$request->id.',id',
            'contact' => 'required|numeric',
        ]);

        if($validator->fails())
        {
            $response = [
                'code' => 0,
                'errors' => $validator->errors()->all()
            ];
            return $response;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://phonevalidation.abstractapi.com/v1/?api_key=08ceab5f4ba04294ad268719730e917d&phone='.$request->contact);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $contact_validator = curl_exec($ch);
        curl_close($ch);
        $contact_validator = json_decode($contact_validator);
        if($contact_validator->valid)
        {
            $contact = $contact_validator->format->international;
        }
        else
        {
            $response = [
                'code' => 0,
                'errors' => [
                    'The contact number you have entered is not valid.'
                ]
            ];
            return $response;
        }

        try
        {

            $vendor = Vendor::find($request->id);
            if($vendor != null)
            {
                $vendor->name = $request->name;
                $vendor->email = $request->email;
                $vendor->contact = $request->contact;
                $vendor->address = $request->address;
                $vendor->save();

                $response = [
                    'code' => 1,
                ];
                session()->flash('success',"Vendor updated successfully.");
            }
            else
            {
                $response = [
                    'code' => 2,
                    'message' => 'Record not found, Plx try again.'
                ];
            }

        }
        catch(Exception $ex)
        {
            $response = [
                'code' => 2,
                'message' => $ex->getMessage()
            ];
        }

        return $response;
    }

    public function edit($id = null)
    {
        if($id != null)
        {
            $id = Helper::decrypt($id);
            $model['vendor'] = Vendor::find($id);
            if($model['vendor'] != null)
            {
                return view('vendors.edit',$model);
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function delete($id = null)
    {
        if($id != null)
        {
            $id = Helper::decrypt($id);
            $vendor = Vendor::find($id);
            if($vendor != null)
            {
                $vendor->delete();
                session()->flash('success','Vendor deleted successfully.');
                return redirect()->back();
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect()->back();
        }
    }
}
