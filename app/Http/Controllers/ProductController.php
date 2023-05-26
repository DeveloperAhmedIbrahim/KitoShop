<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $model['products'] = Product::all();
        return view('products.index',$model);
    }

    public function new()
    {
        $model['sizes'] = Size::all();
        $model['colors'] = Color::all();
        return view('products.new',$model);
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
            'name' => 'required|unique:products,name',
            'article' => 'required',
            'colors' => 'required',
            'sizes' => 'required'
        ]);

        if($validator->fails())
        {
            $response = [
                'code' => 0,
                'errors' => $validator->errors()->all()
            ];
            return $response;
        }
        $image_name = '';
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/products'),$image_name);
            $image_name = 'assets/images/products/'.$image_name;
        }

        try
        {
            $product = new Product();
            $product->name = $request->name;
            $product->article = $request->article;
            $product->sizes = json_encode($request->sizes);
            $product->colors = json_encode($request->colors);
            $product->image = $image_name;
            $product->save();
            $response = [
                'code' => 1,
            ];
            session()->flash('success',"New product added successfully.");
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
            'name' => 'required|unique:products,name,'.$request->id.',id',
            'article' => 'required',
            'colors' => 'required',
            'sizes' => 'required'
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

            $product = Product::find($request->id);
            if($product != null)
            {
                $image_name = $product->image;
                if($request->hasFile('image'))
                {
                    if(file_exists(public_path($product->image)))
                    {
                        unlink(public_path($product->image));
                    }
                    $image = $request->file('image');
                    $image_name = time() . '.' . $image->getClientOriginalExtension();
                    $image->move('assets/images/products',$image_name);
                    $image_name = 'assets/images/products/'.$image_name;
                }

                $product->name = $request->name;
                $product->article = $request->article;
                $product->sizes = json_encode($request->sizes);
                $product->colors = json_encode($request->colors);
                $product->image = $image_name;
                $product->save();

                $response = [
                    'code' => 1,
                ];
                session()->flash('success',"Product updated successfully.");
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
            $model['product'] = Product::find($id);
            if($model['product'] != null)
            {
                $model['colors'] = Color::all();
                $model['sizes'] = Size::all();
                return view('products.edit',$model);
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
            $product = Product::find($id);
            if($product != null)
            {
                if(file_exists(public_path($product->image)))
                {
                    unlink(public_path($product->image));
                }
                $product->delete();
                session()->flash('success','Product deleted successfully.');
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
