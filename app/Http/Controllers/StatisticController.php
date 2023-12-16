<?php

namespace App\Http\Controllers;

use App\Http\services\StatisticService;
use App\Models\Statistic;

class StatisticController extends Controller
{
    private StatisticService $statisticService;
    public function index()
    {
        $statistics = Statistic::all();
        return view('admin.pages.statistic.index', compact('statistics'));
    }



}
