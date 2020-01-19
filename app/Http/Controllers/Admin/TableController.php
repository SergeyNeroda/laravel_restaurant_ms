<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Table;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('admin.tables.index',[
        'tables' => Table::paginate(7)
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tables.create');
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
        'name_table' => 'required',
      ]);
      //створюю об'єкт
      $table = new Table;
      //записую значення
      $table->name = $request->name_table;
      //зберігаю в бд
      $table->save();
      return redirect()->back()->with('success', 'Стіл додано!');
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
      $table = Table::find($id);
      return view('admin.tables.edit',['table'=>$table]);
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
        'name_table' => 'required',
      ]);
      //знаходжу одиницю виміруі
      $table = Table::find($id);
      //записую значення
      $table->name = $request->name_table;
      //зберігаю в бд
      $table->save();
      return redirect()->back()->with('success', 'Стіл редаговано!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
      $table->delete();
      return redirect()->route('tables.index');
    }
}
