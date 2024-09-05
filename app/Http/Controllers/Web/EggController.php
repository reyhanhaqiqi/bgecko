<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Egg;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EggController extends Controller
{
    public function index()
    {
        $eggs = Egg::with('galleryEggs')->get()->map(function ($egg) {
            $egg->formatted_date = Carbon::parse($egg->tanggal_inkubasi)->translate('d M Y');
            return $egg;
        });

        return view('web.pages.egg', compact('eggs'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $eggs = Egg::where('id', 'like', "%$query%")
            ->orWhere('tanggal_inkubasi', 'like', "%$query%")
            ->orWhere('perkawinan', 'like', "%$query%")
            ->orWhere('keterangan', 'like', "%$query%")
            ->get();

        return view('web.pages.egg', compact('eggs'));
    }
}
