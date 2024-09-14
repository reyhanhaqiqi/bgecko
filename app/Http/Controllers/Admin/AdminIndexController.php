<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Egg;
use App\Models\Gecko;
use Illuminate\Http\Request;

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

    public function search(Request $request)
    {
        $query = $request->input('query');

        $geckos = Gecko::where('id', 'like', "%$query%")
            ->orWhere('nama', 'like', "%$query")
            ->orWhere('line_albino', 'like', "%$query")
            ->orWhere('jenis_kelamin', 'like', "%$query")
            ->orWhere('kelahiran', 'like', "%$query")
            ->orWhere('deskripsi', 'like', "%$query")
            ->orWhere('perkawinan', 'like', "%$query")
            ->paginate();

        $eggs = Egg::where('id', 'like', "%$query%")
            ->orWhere('tanggal_inkubasi', 'like', "%$query")
            ->orWhere('keterangan', 'like', "%$query")
            ->orWhere('perkawinan', 'like', "%$query")
            ->paginate();

        return view('admin.pages.search.search-result', compact('geckos', 'eggs'));
    }
}
