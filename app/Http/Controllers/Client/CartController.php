<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Order;
use Session;
use App\MyClass\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('cart')) {
          $oldCart = Session::get('cart');
          $cart =  new Cart($oldCart);
          return view('client.cart',['products' => $cart->items,'totalPrice'=> $cart->totalPrice]);
        }
        return view('client.cart');
        // } else {
        //   //return redirect()->back();
        // }

    }

    public function addToCart (Request $request, $id) {
      $product  = Product::find($id);
      $oldCart  = Session::has('cart') ? Session::get('cart') : null ;
      $cart = new Cart($oldCart);
      $cart->add($product,$product->id);
      $request->session()->put('cart',$cart);
      //dd($request->session()->get('cart'));
      return redirect()->back();
    }

    public function getReduceByOne($id){
     $oldCart = Session::has('cart') ? Session::get('cart') : null;
     $cart = new Cart($oldCart);
     $cart->reduceByOne($id);
     if (isset($cart->items)) {
       if(count($cart->items) > 0){
         Session::put('cart', $cart);
       }else{
         Session::forget('cart');
       }
     }

     return redirect()->back();
   }
   public function getRemoveItem($id){
     $oldCart = Session::has('cart') ? Session::get('cart') : null;
     $cart = new Cart($oldCart);
     $cart->removeItem($id);
     if(count($cart->items) > 0){
       Session::put('cart', $cart);
     }else{
       Session::forget('cart');
     }
     return redirect()->back();
   }

   //покупка
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
//функція для отримання замовлення
    public function getCheckout () {
      if (!Session::has('cart')) {
        return view('client.cart');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      //потрібно переробити на запит до бд
      $total = $cart->totalPrice;
      return view('client.checkout',['total'=>$total]);
    }
}
