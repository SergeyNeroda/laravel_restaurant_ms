<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ingredient;
use App\Supplier;

class IngredientsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      //перевірити чи існує рецепт
      $ingredient = Ingredient::all();
      return view('admin.ingredients.index',['ingredient'=>$ingredient]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $suppliers  = Supplier::all();
      return view('admin.ingredients.create',['suppliers'=>$suppliers]);
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
      'name_ingredient' => 'required',
      'select_supplier' => 'required',
    ]);
    //створюю об'єкт
    $ingredient = new Ingredient;
    //записую значення
    $ingredient->name_ingredient = $request->name_ingredient;
    $ingredient->supplier_id = $request->select_supplier;
    //зберігаю в бд
    $ingredient->save();
    return redirect()->back()->with('success', 'Інгредієнт додано!');
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
    $suppliers  = Supplier::all();
    $ingredient = Ingredient::find($id);
    return view('admin.ingredients.edit',['suppliers'=>$suppliers,'ingredient'=>$ingredient]);
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
      'name_ingredient' => 'required',
      'select_supplier' => 'required',
    ]);
    $ingredient = Ingredient::find($id);
    //записую значення
    $ingredient->name_ingredient = $request->name_ingredient;
    $ingredient->supplier_id = $request->select_supplier;
    //зберігаю в бд
    $ingredient->save();
    return redirect('/ingredients')->with('success', 'Інгредієнт редаговано!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Ingredient $ingredient)
  {
    $ingredient->delete();
    return redirect()->route('ingredients.index');
  }
}
