<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Egg;
use App\Models\Gecko;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $eggs = Egg::with('galleryEggs')->take(3)->get()->map(function ($egg) {
            $egg->formatted_date = Carbon::parse($egg->tanggal_inkubasi)->translate('d M Y');
            return $egg;
        });

        return view('web.pages.index', compact('eggs'));
    }
}
