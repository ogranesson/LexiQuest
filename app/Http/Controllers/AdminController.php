<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function view() {
        return view('admin/dashboard', $this->yearlyData());
    }

    public function yearlyData() {
        $results = DB::table('posts')
                    ->select(
                        DB::raw("DATE_FORMAT(created_on, '%M') AS month"),
                        DB::raw('COUNT(*) AS post_count')
                    )
                    ->whereYear('created_on', date('Y'))  // Filter by the current year
                    ->groupBy(DB::raw("DATE_FORMAT(created_on, '%M')"))  // Group by month name
                    ->orderBy(DB::raw("created_on"))
                    ->get()
                    ->toArray();

        $labels = [];
        $data = [];
        
        // Loop through each result and add the month and number of posts to arrays for the chart
        foreach($results as $result) {
            $labels[] = $result->month;
            $data[] = $result->post_count;
        }

        $chart = Chartjs::build()
        ->name("post_monthly")
        ->type("line")
        ->size(["width" => 400, "height" => 200])
        ->labels($labels)
        ->datasets([
            [
                "label" => "Posts by month",
                "backgroundColor" => "rgba(38, 185, 154, 0.31)",
                "borderColor" => "rgba(38, 185, 154, 0.7)",
                "data" => $data
            ]
        ])
        ->options([
            'plugins' => [
                'title' => [
                    'display' => true,
                    'text' => 'Posts per month'
                ]
            ]
        ]);
        
        return compact("chart");
    }
}