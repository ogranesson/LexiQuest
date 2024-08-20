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
        return view('admin/dashboard', array_merge($this->monthlyPosts(), $this->weeklyPosts(), $this->monthlyTopics(), $this->weeklyTopics()));
    }

    public function monthlyPosts() {
        $months = [];
        for ($i = 11; $i >= 0; $i--) {
            $months[] = Carbon::now()->subMonths($i)->format('F Y');
        }

        $results = DB::table('posts')
                    ->select(
                        DB::raw("DATE_FORMAT(created_on, '%M %Y') AS month"),
                        DB::raw('COUNT(*) AS post_count')
                    )
                    ->whereBetween('created_on', [Carbon::now()->subMonths(11)->startOfDay(), Carbon::now()->endOfDay()])  // Filter by the current year
                    ->groupBy(DB::raw("DATE_FORMAT(created_on, '%M %Y')"))
                    ->orderBy('created_on')
                    ->get()
                    ->keyBy('month')
                    ->toArray();

        $labels = [];
        $data = [];

        foreach ($months as $month) {
            $labels[] = $month;
            $data[] = isset($results[$month]) ? $results[$month]->post_count : 0;
        }

        $monthlyPosts = Chartjs::build()
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

        return compact("monthlyPosts");
    }

    public function weeklyPosts() {
        $dates = [];
        for ($i = 6; $i >= 0; $i--) {
            $dates[] = Carbon::now()->subDays($i)->format('m-d');
        }

        $results = DB::table('posts')
                    ->select(
                        DB::raw("DATE_FORMAT(created_on, '%m-%d') AS date"),
                        DB::raw('COUNT(*) AS post_count')
                    )
                    ->whereYear('created_on', date('Y'))
                    ->whereBetween('created_on', [Carbon::now()->subDays(7)->startOfDay(), Carbon::now()->endOfDay()])
                    ->groupBy(DB::raw("DATE_FORMAT(created_on, '%m-%d')"))
                    ->orderBy(DB::raw("DATE_FORMAT(created_on, '%m-%d')"))
                    ->get()
                    ->keyBy('date')
                    ->toArray();

        $labels = [];
        $data = [];

        foreach ($dates as $date) {
            $labels[] = $date;
            $data[] = isset($results[$date]) ? $results[$date]->post_count : 0;
        }

        $weeklyPosts = Chartjs::build()
        ->name("post_weekly")
        ->type("line")
        ->size(["width" => 400, "height" => 200])
        ->labels($labels)
        ->datasets([
            [
                "label" => "Posts by day",
                "backgroundColor" => "rgba(38, 185, 154, 0.31)",
                "borderColor" => "rgba(38, 185, 154, 0.7)",
                "data" => $data
            ]
        ])
        ->options([
            'plugins' => [
                'title' => [
                    'display' => true,
                    'text' => 'Posts per day'
                ]
            ]
        ]);

        return compact("weeklyPosts");
    }

    public function monthlyTopics() {
        $months = [];
        for ($i = 11; $i >= 0; $i--) {
            $months[] = Carbon::now()->subMonths($i)->format('F Y');
        }

        $results = DB::table('topics')
                    ->select(
                        DB::raw("DATE_FORMAT(created_on, '%M %Y') AS month"),
                        DB::raw('COUNT(*) AS topic_count')
                    )
                    ->whereBetween('created_on', [Carbon::now()->subMonths(11)->startOfDay(), Carbon::now()->endOfDay()])  // Filter by the current year
                    ->groupBy(DB::raw("DATE_FORMAT(created_on, '%M %Y')"))
                    ->orderBy('created_on')
                    ->get()
                    ->keyBy('month')
                    ->toArray();

        $labels = [];
        $data = [];

        foreach ($months as $month) {
            $labels[] = $month;
            $data[] = isset($results[$month]) ? $results[$month]->topic_count : 0;
        }

        $monthlyTopics = Chartjs::build()
        ->name("topic_monthly")
        ->type("line")
        ->size(["width" => 400, "height" => 200])
        ->labels($labels)
        ->datasets([
            [
                "label" => "Topics by month",
                "backgroundColor" => "rgba(38, 185, 154, 0.31)",
                "borderColor" => "rgba(38, 185, 154, 0.7)",
                "data" => $data
            ]
        ])
        ->options([
            'plugins' => [
                'title' => [
                    'display' => true,
                    'text' => 'Topics per month'
                ]
            ]
        ]);

        return compact("monthlyTopics");
    }

    public function weeklyTopics() {
        $dates = [];
        for ($i = 6; $i >= 0; $i--) {
            $dates[] = Carbon::now()->subDays($i)->format('m-d');
        }

        $results = DB::table('topics')
                    ->select(
                        DB::raw("DATE_FORMAT(created_on, '%m-%d') AS date"),
                        DB::raw('COUNT(*) AS topic_count')
                    )
                    ->whereYear('created_on', date('Y'))
                    ->whereBetween('created_on', [Carbon::now()->subDays(7)->startOfDay(), Carbon::now()->endOfDay()])
                    ->groupBy(DB::raw("DATE_FORMAT(created_on, '%m-%d')"))
                    ->orderBy(DB::raw("DATE_FORMAT(created_on, '%m-%d')"))
                    ->get()
                    ->keyBy('date')
                    ->toArray();

        $labels = [];
        $data = [];

        foreach ($dates as $date) {
            $labels[] = $date;
            $data[] = isset($results[$date]) ? $results[$date]->topic_count : 0;
        }

        $weeklyTopics = Chartjs::build()
        ->name("topic_weekly")
        ->type("line")
        ->size(["width" => 400, "height" => 200])
        ->labels($labels)
        ->datasets([
            [
                "label" => "Topics by day",
                "backgroundColor" => "rgba(38, 185, 154, 0.31)",
                "borderColor" => "rgba(38, 185, 154, 0.7)",
                "data" => $data
            ]
        ])
        ->options([
            'plugins' => [
                'title' => [
                    'display' => true,
                    'text' => 'Topics per day'
                ]
            ]
        ]);

        return compact("weeklyTopics");
    }
}
