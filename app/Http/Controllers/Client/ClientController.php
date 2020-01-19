<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;

class ClientController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('client');
  }

  //дані для індексної сторінки
  public function index()
  {
    $products = Product::paginate(12);
    return view('client.index', ['products' => $products]);
      //
    //return view('client.index',[
    //  'products' => Product::get()->paginate(2)
    //]);
  }

  //данні для сторінки магазину
  public function shop()
  {
    $products = Product::paginate(12);
    $categories = Category::get();
    //Получаем коллекцию категорий, где есть посты. Есть постов в категории нет, то ее не будет в выборке.
    //$categories = Category::has('products')->get();
    return view('client.shop', ['products' => $products,'categories' => $categories]);
      //
    //return view('client.index',[
    //  'products' => Product::get()->paginate(2)
    //]);
  }
  //функція для відображення товарів по категоріям
  public function shopCategory ($id) {
    //$products = Product::paginate(6);
      $category_products = Product::where('id_category',$id)->paginate(12);
      $categories = Category::get();
      //dump($category_products);
      return view('client.shop', ['products' => $category_products,'categories' => $categories]);
  }
  //відображення деталей про конкретний продукт
  public function productDetail ($id) {
    //$product_detail = Product::where('id',$id);
    $product_detail = Product::findOrFail($id);
    return view('client.product_detail', ['product_detail' => $product_detail]);
  }
}
