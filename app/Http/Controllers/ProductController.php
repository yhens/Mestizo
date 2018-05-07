<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

use App\User;
use Hash;
use Validator;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product/index')->with( 'products', $products );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product/new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();

        $product->nombre = Input::get('nombre');
        $product->descripcion = Input::get('descripcion');
        $product->precio = Input::get('precio');

        if($product->save())
        {
            Session::flash('message','Alimento registrado correctamente');
            Session::flash('m-class','alert-success');
            return redirect('product');
        }
        else
        {
            Session::flash('message','Alimento no guardado');
            Session::flash('m-class','alert-danger');
            return redirect('product/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::all()->where('product_id','=', $id);

        if(count($order) > 0)
        {
            Session::flash('message','No se puede eliminar mientras un pedido exista');
            Session::flash('m-class','alert-danger');
            return redirect('product');
        }    
        else
        {
            product::find($id)->delete();

            Session::flash('message','Alimento eliminado correctamente');
            Session::flash('m-class','alert-success');
            return redirect('product');
        }
    }
}
