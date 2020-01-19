<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Khill\Lavacharts\Lavacharts;
use App\Charts\SampleChart;
use App\User;
use App\Order;
use Charts;
use DB;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
      //графік за реєстрації користувачів за 10 днів
      $data = collect([]);
      for ($day=30; $day >= 0 ; $day--) {
        // $data->push(User::whereDate('created_at',today()->subDays($day))->count());
      //  $data->push(Order::whereDate('created_at',today()->subDays($day))->count());
        $data->push(DB::table('orders')->whereDate('created_at',today()->subDays($day))->sum('summ'));
      }
      $label = collect([]);
      for ($days=30; $days >= 0 ; $days--) {
        // $data->push(User::whereDate('created_at',today()->subDays($day))->count());
      //  $data->push(Order::whereDate('created_at',today()->subDays($day))->count());
        $label->push($days);
      }

      $chart = new SampleChart;
      $chart->title('Графік продажів за 30 днів');
      $chart->height(500);
      $chart->labels($label);
      $chart->dataset('Продажі', 'line', $data)->options([
        'borderColor' => '#ff0000',
        'pointBackgroundColor' => 'white',
        'pointBorderColor' => 'white',
        'borderWidth' => 1,
        'backgroundColor' => 'rgba(255, 0,0, 0.5)',

      ]);
      // //графік новий
      // $report = new SampleChart;
      // $report->height(550);
      // $report->labels(['One', 'Two', 'Three', 'Four']);
      // $report->dataset('Кава', 'line', [1, 2, 3, 4])->options([
      //   'borderColor' => '#ff0000',
      //   'pointBackgroundColor' => 'white',
      //   'pointBorderColor' => 'white',
      //   'borderWidth' => 1,
      //   'backgroundColor' => 'rgba(255, 0,0, 0.5)',
      //
      // ]);
      // $report->dataset('Чай', 'line', [4, 3, 2, 1])->options([
      //   'color' => '#05CBE1',
      //   'borderColor' => '#05CBE1',
      //   'pointBackgroundColor' => 'white',
      //   'pointBorderColor' => 'white',
      //   'borderWidth' => 1,
      //   'backgroundColor' => 'rgba(0, 231, 255, 0.5)',
      // ]);
      //
      // $report->title('Графік продажу продуктів');
      // $report->displayLegend(false);

      return view('admin.index',['chart'=>$chart]);
    }

    public function graphOrders (Request $request) {
      //dump($request->days);
      $dayCount = $request->days;
      //графік за реєстрації користувачів за 10 днів
      $data = collect([]);
      for ($day=$dayCount; $day >= 0 ; $day--) {
        // $data->push(User::whereDate('created_at',today()->subDays($day))->count());
      //  $data->push(Order::whereDate('created_at',today()->subDays($day))->count());
        $data->push(DB::table('orders')->whereDate('created_at',today()->subDays($day))->sum('summ'));
      }
      $label = collect([]);
      for ($days=$dayCount; $days >= 0 ; $days--) {
        // $data->push(User::whereDate('created_at',today()->subDays($day))->count());
      //  $data->push(Order::whereDate('created_at',today()->subDays($day))->count());
        $label->push($days);
      }

      $chart = new SampleChart;
      $chart->title('Графік продажів за '.$dayCount.' днів');
      $chart->height(500);
      $chart->labels($label);
      $chart->dataset('Продажі', 'line', $data)->options([
        'borderColor' => '#ff0000',
        'pointBackgroundColor' => 'white',
        'pointBorderColor' => 'white',
        'borderWidth' => 1,
        'backgroundColor' => 'rgba(255, 0,0, 0.5)',

      ]);
      // //графік новий
      // $report = new SampleChart;
      // $report->height(550);
      // $report->labels(['One', 'Two', 'Three', 'Four']);
      //
      // for ($d=3; $d >= 0 ; $d--) {
      //   $rand1 = mt_rand(1,254);
      //   $rand2 = mt_rand(10,254);
      //   $rand3 = mt_rand(1,254);
      //   $report->dataset('Кава', 'line', [1, 2, $d, 4])->options([
      //     // 'borderColor' => '#ff0000',
      //     'pointBackgroundColor' => 'white',
      //     'pointBorderColor' => 'white',
      //     'borderWidth' => 1,
      //     'backgroundColor' => 'rgba('.$rand1.', '.$rand2.','.$rand3.', 0.5)',
      //
      //   ]);
      //   $label->push($days);
      // }
      // $report->dataset('Чай', 'line', [4, 3, 2, 1])->options([
      //   'color' => '#05CBE1',
      //   'borderColor' => '#05CBE1',
      //   'pointBackgroundColor' => 'white',
      //   'pointBorderColor' => 'white',
      //   'borderWidth' => 1,
      //   'backgroundColor' => 'rgba(0, 231, 255, 0.5)',
      // ]);

      // $report->title('Графік продажу продуктів');
      // $report->displayLegend(false);

      return view('admin.index',['chart'=>$chart]);
    }
}
