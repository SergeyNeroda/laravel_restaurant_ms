<?php
//use App\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
//     // Ignores notices and reports all other kinds... and warnings
//     error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
//     // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
// }
Route::group(['middleware' => 'admin'], function () {
    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
    // list all lfm routes here...
});

//група маршрутів для авторизованих користувачів
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        if (Auth::user()->isAdmin()) {
          return redirect('admin');
        }
         elseif (Auth::user()->isCook()) {
            return redirect('cook');
          }
          elseif (Auth::user()->isWaiter()) {
             return redirect('waiter');
           }
        else {
          return redirect('error');
        }
    });

    Route::get('error', function () {
        return "Помилка, ви не маєте доступу!.";
    });
    //група маршрутів для офіціанта
    Route::group(['middleware' => 'waiter'], function () {
        Route::get('/waiter','Waiter\WaiterController@index')->name('waiter');
        Route::get('/waiter/product','Waiter\WaiterController@selectCategory');
        Route::get('/waiter/table','Waiter\WaiterController@selectTable');
        Route::get('/waiter/createOrder','Waiter\WaiterController@createOrder');
        Route::get('/waiter/cooked/','Waiter\WaiterController@cookedOrders');
          Route::get('/waiter/cook/','Waiter\WaiterController@recentOrders')->name('cooked');
            Route::get('/cook/accept/ready','Waiter\WaiterController@acceptReady');

        //

    });
    //група маршрутів для кухаря
    Route::group(['middleware' => 'cook'], function () {
        Route::get('/cook','Cook\CookController@index')->name('cook');
        Route::get('/cook/accept','Cook\CookController@accept');
        Route::get('/cook/ready','Cook\CookController@ready');
        Route::get('/cook/acceptOrders','Cook\CookController@acceptOrders');
        Route::get('/cook/successOrders','Cook\CookController@successOrders');

    });
    //група маршрутів для адміністратора
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/admin','Admin\AdminController@index')->name('admin');
        Route::resource('product','Admin\ProductController');
        Route::resource('category','Admin\CategoryController');
        Route::resource('/file','Admin\FileController');
        Route::resource('tag','Admin\TagController');
        Route::resource('user','Admin\UserController');
        Route::post('user/password','Admin\UserController@password');
        Route::resource('posts','Admin\PostController');
        Route::resource('ingredients','Admin\IngredientsController');


        Route::resource('units','Admin\UnitsController');
        Route::resource('suppliers','Admin\SuppliersController');
        //date Range
        Route::get('/daterange', 'Admin\DateRangeController@index');
        Route::post('/daterange/fetch_data', 'Admin\DateRangeController@fetch_data')->name('daterange.fetch_data');
        //
        Route::get('event/add','Admin\EventController@createEvent');
        Route::post('event/add','Admin\EventController@store');
        Route::get('event','Admin\EventController@calender');

        Route::resource('statuses','Admin\StatusController');
        Route::resource('tables','Admin\TableController');
        Route::resource('orders','Admin\OrderController');
        //test
        Route::get('test','Admin\TestController@index');
        Route::get('test/product','Admin\TestController@selectProduct');
        Route::get('test/recipe','Admin\TestController@recipeProduct');
        Route::get('/test/del/id={id}','Admin\TestController@destroy');
        Route::get('/test/edit/id={id}','Admin\TestController@edit');
        Route::post('/test/update','Admin\TestController@update');
        Route::post('/test/insert','Admin\TestController@insert');


        Route::post('/graph/orders','Admin\AdminController@graphOrders')->name('graph');

    });
    // //група маршрутів для касира
    // Route::group(['middleware' => 'cashier'], function () {
    //     Route::get('/cashier','Cashier\CashierController@index');
    // });


    //група маршрутів для клієнта
    // Route::group(['middleware' => 'client'], function () {
    //   Route::get('/client','Client\ClientController@index');
    //   Route::get('/shop','Client\ClientController@shop');
    //   Route::get('/shop/category/{id}','Client\ClientController@shopCategory');
    //   Route::get('/shop/product/{id}','Client\ClientController@productDetail');
    //   //роути для корзини товарів
    //   Route::get('/cart','Client\CartController@index');
    //   Route::get('/cart/add/{id}','Client\CartController@addToCart');
    //   Route::get('/cart/reduce/{id}', 'Client\CartController@getReduceByOne');
    //   Route::get('/cart/removeItem/{id}','Client\CartController@getRemoveItem');
    //   //маршрут для замовлення
    //   // Route::get('/checkout','Client\CartController@checkout');
    //   Route::get('/checkout','CheckoutController@index');
    // });
  });

// Route::get('/home','HomeController@index');
//маршрути авторизації
Auth::routes();
//для локалізації
Route::get('locale/{locale}', function ($locale) {
  Session::put('locale',$locale);
  return redirect()->back();
  //передаю значення з лінку в сессію
});
