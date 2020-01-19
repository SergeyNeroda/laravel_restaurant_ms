<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recipe;
use App\Product;
use App\Ingredient;
use App\Units;
use Session;


class RecipesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::pluck('name', 'id');
        //перевірити чи існує інгредієнт :todo
        $ingredient = Recipe::find(1);
        $product_name = '';
        return view('admin.recipes.index',['ingredient'=>$ingredient,'products' => $products,'product_name'=>$product_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $products = Product::all();
      $ingredients = Ingredient::all();
      $units = Units::all();
      return view('admin.recipes.create',['products'=>$products,'ingredients'=>$ingredients,'units'=>$units]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'select_product' => 'required',
        'select_ingredient' => 'required',
        'select_unit' => 'required',
        'quantity' => 'required',
      ]);
      //створюю об'єкт
      $recipe = new Recipe;
      //записую значення
      $recipe->product_id = $request->select_product;
      $recipe->ingredient_id = $request->select_ingredient;
      $recipe->unit_id = $request->select_unit;
      $recipe->quantity = $request->quantity;
      //зберігаю в бд
      $recipe->save();
      return redirect()->back()->with('success', 'Інгредієнт додано!');

    }

    public function storeRecept(Request $request)
    {
        $product_id_session  = $request->product_id;
        $this->validate($request,[
          'product_id' => 'required',
        ]);
        Session::put('product_id_session',$product_id_session);

        //
        $selectedID = $product_id_session;
        $products = Product::pluck('name', 'id');
        //обираю рецепти для продукту
        $product = Product::find($product_id_session);

        $recipe = $product->recipes;
        $product_name = $product->name;
        //обираю інгредієнти для продукту


        return view('admin.recipes.index',['recipe'=>$recipe,'selectedID'=>$selectedID,'products' => $products,'val'=>$product_id_session,'product_name'=>$product_name]);
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
      $products = Product::all();
      $ingredients = Ingredient::all();
      $units = Units::all();

      $recipe = Recipe::find($id);
      return view('admin.recipes.edit',['products'=>$products,'ingredients'=>$ingredients,'units'=>$units],compact('recipe'));
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
      $this->validate($request,[
        'select_product' => 'required',
        'select_ingredient' => 'required',
        'select_unit' => 'required',
        'quantity' => 'required',
      ]);
      $recipe = Recipe::find($id);
      //записую значення
      $recipe->product_id = $request->select_product;
      $recipe->ingredient_id = $request->select_ingredient;
      $recipe->unit_id = $request->select_unit;
      $recipe->quantity = $request->quantity;
      //зберігаю в бд
      $recipe->save();
      return redirect('/recipes')->with('success', 'Рецепт редаговано!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
      $recipe->delete();
      return redirect()->route('recipes.index');
    }
}
