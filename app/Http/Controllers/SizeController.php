<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Size;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SizeController extends Controller
{
    public function index()
    {
        $model['sizes'] = Size::all();
        return view('sizes.index',$model);
    }

    public function new()
    {
        return view('sizes.new');
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
            'size' => 'required|unique:sizes,size',
        ]);

        if($validator->fails())
        {
            $response = [
                'code' => 0,
                'errors' => $validator->errors()->all()
            ];
            return $response;
        }

        try
        {
            $size = new Size();
            $size->size = $request->size;
            $size->save();

            $response = [
                'code' => 1,
            ];
            session()->flash('success',"New size added successfully.");

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
            'size' => 'required|unique:sizes,size,'.$request->id.',id',
        ]);

        if($validator->fails())
        {
            $response = [
                'code' => 0,
                'errors' => $validator->errors()->all()
            ];
            return $response;
        }

        try
        {

            $size = Size::find($request->id);
            if($size != null)
            {
                $size->size = $request->size;
                $size->save();

                $response = [
                    'code' => 1,
                ];
                session()->flash('success',"Size updated successfully.");
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
            $model['size'] = Size::find($id);
            if($model['size'] != null)
            {
                return view('sizes.edit',$model);
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
            $size = Size::find($id);
            if($size != null)
            {
                $size->delete();
                session()->flash('success','Size deleted successfully.');
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
