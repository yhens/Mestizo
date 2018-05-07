<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

use App\User;
use Hash;
use Validator;
use Auth;



class tipopedido extends Controller
{
    //
     @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipopedidos = tipopedido::all();
        return view('tipopedido/index')->with( 'tipopedidos', $tipopedidos );
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
        $tipopedido = new Product();

        $tipopedido->mesanine = Input::get('mesanine');
        $tipopedido->para_llevar = Input::get('para_llevar');
        

        
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
        $order = Order::all()->where('tipopedido_id','=', $id);

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
