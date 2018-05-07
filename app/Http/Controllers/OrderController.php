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


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('order/index')->with( 'orders', $orders );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::pluck('nombre','id')->prepend('Seleccionar alimento','');
        return view('order/new')->with('product', $product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order();

        $order->nombre = Input::get('nombre');
        $order->cionit = Input::get('cionit');
        $order->direccion = Input::get('direccion');
        $order->fecha = Input::get('fecha');
        $order->product_id = Input::get('product_id');
        $order->opcion = Input::get('opcion');
        $order->cantidad = Input::get('cantidad');
        $order->estado = Input::get('estado');

        if($order->save())
        {
            Session::flash('message','Pedido creado correctamente');
            Session::flash('m-class','alert-success');
            return redirect('order');
        }
        else
        {
            Session::flash('message','Pedido no guardado');
            Session::flash('m-class','alert-danger');
            return redirect('order/create');
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
        $order = Order::find($id);
        return view('order/show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $product = Product::pluck('nombre','id');
        return view('order/edit')->with(['order' => $order,'product' => $product]);
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
        $order = Order::find($id);

        $order->nombre = Input::get('nombre');
        $order->cionit = Input::get('cionit');
        $order->direccion = Input::get('direccion');
        $order->fecha = Input::get('fecha');
        $order->product_id = Input::get('product_id');
        $order->opcion = Input::get('opcion');
        $order->cantidad = Input::get('cantidad');
        $order->estado = Input::get('estado');

        if($order->save())
        {
            Session::flash('message','Pedido actualizado correctamente');
            Session::flash('m-class','alert-success');
            return redirect('order');
        }
        else
        {
            Session::flash('message','Data is not saved');
            Session::flash('m-class','alert-danger');
            return redirect('order/create');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::find($id)->delete();

        Session::flash('message','Pedido eliminado correctamente');
        Session::flash('m-class','alert-success');
        return redirect('order');
    }

    //UPDATE Password
    public function password(){
        return View('password');
    }

    public function updatePassword(Request $request){
        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:6|max:18',
        ];
        
        $messages = [
            'mypassword.required' => 'Contraseña actual es requerida',
            'password.required' => 'Nueva contraseña es requerida',
            'password.confirmed' => 'Las contraseñas no concuerdan',
            'password.min' => 'Contraseña muy corta (mínimo 6 caracteres)',
            'password.max' => 'Contraseña muy larga (máximo 18 caracteres)',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('password')->withErrors($validator);
        }
        else{
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                     ->update(['password' => bcrypt($request->password)]);
                return redirect('/')->with('message', 'Contraseña cambiada correctamente')->with('m-class','alert-success');
            }
            else
            {
                return redirect('password')->with('message', 'Contraseña inválida')->with('m-class','alert-danger');
            }
        }
    }
}
