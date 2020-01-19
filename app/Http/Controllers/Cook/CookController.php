<?php

namespace App\Http\Controllers\Cook;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Order;
use App\Recipe;
use App\OrderProduct;
use App\Product;

class CookController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('cook');
  }

  public function index () {
    $orders= Order::select('*')->where('status_id',1)->with('orderproduct.product')->paginate(10);
    return view('cook.index',['orders'=>$orders]);
  }

  public function acceptOrders () {
    $acceptOrders= Order::select('*')->where('status_id',2)->with('orderproduct.product')->paginate(10);
    return view('cook.accept',['acceptOrders'=>$acceptOrders]);
  }

  public function successOrders () {
    $readyOrders= Order::select('*')->where('status_id',3)->with('orderproduct.product')->paginate(10);
    return view('cook.success',['readyOrders'=>$readyOrders]);
  }

//змінюю статус замовлення
  public function accept (Request $request) {
    $data = $request->id;
    $order = Order::find($data);
    //записую значення
    $order->status_id = 2;
    //зберігаю в бд
    $order->save();
    return response()->json($order);
  }
  //змінюю статус замовлення
    public function ready (Request $request) {
      $data = $request->id;
      $order = Order::find($data);
      //записую значення
      $order->status_id = 3;
      //зберігаю в бд
      $order->save();
      return response()->json($order);
    }


}
