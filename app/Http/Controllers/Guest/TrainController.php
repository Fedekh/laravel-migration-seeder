<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Train;
use Illuminate\Http\Request;



class TrainController extends Controller
{
    public function index()
    {
        $today=date('Y-m-d H:i:s');
        $trains = Train::where('time_start', '>=', $today)->orderBy('time_start', 'ASC')->get();
        return view('home', compact('trains'));
    }
}