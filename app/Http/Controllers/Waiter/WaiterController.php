<?php

namespace App\Http\Controllers\Waiter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Table;
use App\Category;
use App\Product;
use App\OrderProduct;
use App\Order;
use App\MyClass\Cart;
use Session;
use Auth;

class WaiterController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('waiter');
  }

    public function index () {

      $tables  = Table::get();
      $categories  = Category::get();
      $products  = Product::get();
      if (Session::has('cart')) {
        $oldCart = Session::get('cart');
        $cart =  new Cart($oldCart);
        return view('waiter.index',['tables'=>$tables,'categories'=>$categories,'products'=>$products,'productsCart' => $cart->items,'totalPrice'=> $cart->totalPrice]);
      }
      return view('waiter.index',['tables'=>$tables,'categories'=>$categories,'products'=>$products]);
    }

    public function selectCategory (Request $request) {
      $data= Product::select('id','name','price')->where('id_category',$request->id_category)->take(100)->get();
      return response()->json($data);
    }

    // public function selectTable (Request $request) {
    //   // $data= Product::select('id','name','price')->where('id_category',$request->id_category)->take(100)->get();
    //   Session::put('id_table', $request->id_table);
    //   $data = $request;
    //   return response()->json($data);
    // }

    public function createOrder (Request $request) {
      $data= $request->dataI;
      $quant= $request->dataII;
      $num = count($data);
      $user = Auth::user()->id;
      //створюю замовлення
      $order = new Order;
      $order->user_id = $user;
      $order->table_id = $request->tableAdd;
      $order->summ = $request->summAdd;
      $order->status_id = 1;
      $order->save();

      $id_order= $order->id;

      //записую за допомогою циклу продукти
      for ($i=0; $i < $num; $i++) {
        $orderProduct = new OrderProduct;
        //записую значення
        $orderProduct->order_id = $id_order;
        $st = implode($data[$i]);
        $orderProduct->product_id = $st ;
        $st1 = implode($quant[$i]);
        $orderProduct->quantity = $st1;
        //зберігаю в бд
        $orderProduct->save();
      }

      //$data= Product::select('id','name','price')->where('id',$data[2])->take(100)->get();
      return response()->json($id_order);
    }

    public function cookedOrders () {
      $readyOrders= Order::select('*')->where('status_id',3)->with('orderproduct.product')->paginate(10);
      return view('waiter.cooked',['readyOrders'=>$readyOrders]);
    }

    public function recentOrders () {
      $readyOrders= Order::select('*')->where('status_id',4)->with('orderproduct.product')->paginate(10);
      return view('waiter.recent',['readyOrders'=>$readyOrders]);
    }

    public function acceptReady (Request $request) {
        $data = $request->id;
        $order = Order::find($data);
        //записую значення
        $order->status_id = 4;
        //зберігаю в бд
        $order->save();
        return response()->json($order);
    }

}
