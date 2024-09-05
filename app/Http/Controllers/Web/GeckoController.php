<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Gecko;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GeckoController extends Controller
{
    public function index()
    {
        $geckos = Gecko::with('galleryGeckos')->get()->map(function ($gecko) {
            $gecko->formatted_date = Carbon::parse($gecko->kelahiran)->translate('d M Y');
            return $gecko;
        });

        return view('web.pages.gecko', compact('geckos'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $geckos = Gecko::where('id', 'like', "%$query%")
            ->orWhere('nama', 'like', "%$query%")
            ->orWhere('tipe', 'like', "%$query%")
            ->orWhere('jenis_kelamin', 'like', "%$query%")
            ->orWhere('kelahiran', 'like', "%$query%")
            ->orWhere('deskripsi', 'like', "%$query%")
            ->orWhere('perkawinan', 'like', "%$query%")
            ->get();

        return view('web.pages.gecko', compact('geckos'));
    }
}
