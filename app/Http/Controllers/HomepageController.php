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

public function search(Request $request)
{
    $query = Vegetable::query();

    if ($request->has('search') && !empty($request->search)) {
        $query->where('name', 'LIKE', '%' . $request->search . '%');
    }

    $vegetables = $query->get();

    return view('homepage', compact('vegetables'));
}

}
