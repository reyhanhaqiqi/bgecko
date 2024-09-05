<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Egg;
use App\Models\Gecko;
use App\Models\NotificationFeature;

class AdminIndexController extends Controller
{
    public function index()
    {
        $geckos = Gecko::count();
        $eggs = Egg::count();

        $totalData = $geckos + $eggs;

        $latestGeckos = Gecko::with('galleryGeckos')->latest()->take(5)->get();
        $latestEggs = Egg::with('galleryEggs')->latest()->take(5)->get();

        return view('admin.index', compact('geckos', 'eggs', 'totalData', 'latestGeckos', 'latestEggs'));
    }
}
