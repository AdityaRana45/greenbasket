<?php

namespace App\Http\Controllers;
use App\Models\Vegetable;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
{
    $vegetables = Vegetable::orderBy('name')->get();
    return view('homepage', compact('vegetables'));
}
}
