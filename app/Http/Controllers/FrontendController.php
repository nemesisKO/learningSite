<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Series;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function welcome()
    {

        return view('welcome')->withSeries(Series::all());
    }
    public function series(Series $series)
    {
        return view('series')->withSeries($series);
    }
}
