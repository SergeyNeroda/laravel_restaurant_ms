<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Recipe;
use App\Ingredient;
use App\Units;

class TestController extends Controller
{
    public function index()
    {
      $products = Product::pluck('name', 'id');
      $categories = Category::pluck('name', 'id');
      $ingredients = Ingredient::all();
      $units = Units::all();
      return view('admin.test.index',['products'=>$products,'categories'=>$categories,'ingredients'=>$ingredients,'units'=>$units]);
    }


    public function selectProduct (Request $request) {
      $data= Product::select('id','name')->where('id_category',$request->id_category)->take(100)->get();
      return response()->json($data);
    }

    public function recipeProduct (Request $request) {
      $product='test';
      $data= Recipe::select('*')->where('product_id',$request->id_product)->with('ingredient','unit')->get();
      return response()->json($data);
    }

    public function destroy($id)
    {
        $data = Recipe::where('id',$id)->delete();
        return response()->json($data);
    }

    public function edit($id)
    {
        $data= Recipe::select('*')->where('id',$id)->with('ingredient','unit')->get();
        return response()->json($data);
    }

    public function update(Request $request) {
      //$data = "succccess";
       $id = $request->id;
       $recipe = Recipe::find($id);
      // $data = $recipe;
      // //записую значення
       $recipe->ingredient_id = $request->select_ingredient;
       $recipe->unit_id = $request->select_unit;
       $recipe->quantity = $request->quantity;
      // //зберігаю в бд
       $recipe->save();
       $data= Recipe::select('*')->where('id',$id)->with('ingredient','unit')->get();
      return response()->json($data);
    }
    public function insert(Request $request) {
      //$data = $request;

      $recipe = new Recipe;
      //записую значення
      $recipe->product_id = $request->id;
      $recipe->ingredient_id = $request->select_ingredient;
      $recipe->unit_id = $request->select_unit;
      $recipe->quantity = $request->quantity;
      //зберігаю в бд
      $recipe->save();
      $id = $recipe->id;
      $data= Recipe::select('*')->where('id',$id)->with('ingredient','unit')->get();
      return response()->json($data);
    }
}
