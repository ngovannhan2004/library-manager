<?php

namespace App\Http\Controllers;

use App\Http\services\StatisticService;
use App\Models\Book;
use App\Models\LoanSlip;
use App\Models\Statistic;

class StatisticController extends Controller
{

    public function index()
    {
        $borrowData = Book::countBorrows();
        $uniqueReadersCount = LoanSlip::countUniqueReaders();
        return view('admin.pages.statistic.index', compact('uniqueReadersCount', 'borrowData'));
    }



}
