<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Train;
use Illuminate\Http\Request;



class TrainController extends Controller
{
    public function index()
    {
        //query per prendere i treni che partono da adesso in poi
        $trains = Train::where('time_start', '>=', now())->orderBy('time_start', 'ASC')->get();
        return view('home', compact('trains'));
    }
}