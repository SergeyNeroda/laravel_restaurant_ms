<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index',[
          'products' => Product::paginate(12)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formInput = $request->except('image');
        $this->validate($request,[
          'name' => 'required',
          'code' => 'required',
          'price' => 'required',
          'info' => 'required',
          'spl_price' => 'required',
          'id_category' => 'required',
          'image' => 'image|mimes:png,jpg,jpeg|max:10000'
        ]);
        $image = $request->image;
        if ($image) {
          $imageName = $image->getClientOriginalName();
          $image->move('images/products',$imageName);
          $formInput['image'] = $imageName;
        }
        Product::create($formInput);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $product = Product::find($id);
      return view('admin.products.edit',compact('product'));
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
      $request->validate([
        'name' => 'required',
        'code' => 'required',
        'price' => 'required',
        'info' => 'required',
        'spl_price' => 'required',
        'id_category' => 'required',
        'image' => 'image|mimes:png,jpg,jpeg|max:10000'
      ]);

      $product = Product::find($id);
      $product->name =  $request->get('name');
      $product->code =  $request->get('code');
      $product->price =  $request->get('price');
      $product->info =  $request->get('info');
      $product->spl_price =  $request->get('spl_price');
      $product->id_category =  $request->get('id_category');


      if ($request->hasfile('image')) {
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move('images/products',$imageName);

        $product->image  = $imageName;
      }
      $product->save();

      return redirect('/product')->with('success', 'Тег редаговано!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
      $product->delete();
      return redirect()->route('product.index');
    }
}
