<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supplier;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::paginate(7);
        return view('admin.suppliers.index',['supplier'=>$supplier]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.suppliers.create');
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
        'name_supplier' => 'required',
        'status' => 'required',
        'city' => 'required',
        'address' => 'required',
        'tel' => 'required',
      ]);
      //створюю об'єкт
      $supplier = new Supplier;
      //записую значення
      $supplier->name_supplier = $request->name_supplier;
      $supplier->status = $request->status;
      $supplier->city = $request->city;
      $supplier->address = $request->address;
      $supplier->tel = $request->tel;
      //зберігаю в бд
      $supplier->save();
      return redirect()->back()->with('success', 'Постачальника додано!');
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
      $supplier = Supplier::find($id);
      return view('admin.suppliers.edit',['supplier'=>$supplier]);
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
        'name_supplier' => 'required',
        'status' => 'required',
        'city' => 'required',
        'address' => 'required',
        'status' => 'required',
      ]);
      //знаходжу постачальника
      $supplier = Supplier::find($id);
      //записую значення
      $supplier->name_supplier = $request->name_supplier;
      $supplier->status = $request->status;
      $supplier->city = $request->city;
      $supplier->address = $request->address;
      $supplier->tel = $request->tel;
      //зберігаю в бд
      $supplier->save();
      return redirect()->back()->with('success', 'Постачальника редаговано!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
      $supplier->delete();
      return redirect()->route('suppliers.index');
    }
}
