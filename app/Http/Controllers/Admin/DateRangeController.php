<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DateRangeController extends Controller
{
  function index()
  {
    $data = DB::table('posts')->orderBy('created_at', 'desc')->get();
    return view('admin.posts.date_range',['data'=>$data]);
  }

  function fetch_data(Request $request)
  {

    if($request->from_date != '' && $request->to_date != '')
    {
       $data = DB::table('posts')
         ->whereBetween('created_at', array($request->from_date, $request->to_date))
         ->get();
    }
    else
    {
       $data = DB::table('posts')->orderBy('created_at', 'desc')->get();
    }
      return view('admin.posts.date_range',['data'=>$data]);
   }

}
