<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Color;
use Exception;
use GuzzleHttp\RedirectMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ColorController extends Controller
{

    public function index()
    {
        $model['colors'] = Color::all();
        return view('colors.index',$model);
    }

    public function new()
    {
        return view('colors.new');
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
            'name' => 'required|unique:colors,name',
            'color' => 'required',
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
            $color = new Color();
            $color->name = $request->name;
            $color->color = $request->color;
            $color->save();

            $response = [
                'code' => 1,
            ];
            session()->flash('success',"New color added successfully.");

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
            'name' => 'required|unique:colors,name,'.$request->id.',id',
            'color' => 'required',
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

            $color = Color::find($request->id);
            if($color != null)
            {
                $color->name = $request->name;
                $color->color = $request->color;
                $color->save();

                $response = [
                    'code' => 1,
                ];
                session()->flash('success',"Color upadted successfully.");
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
            $model['color'] = Color::find($id);
            if($model['color'] != null)
            {
                return view('colors.edit',$model);
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
            $color = Color::find($id);
            if($color != null)
            {
                $color->delete();
                session()->flash('success','Color deleted successfully.');
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
