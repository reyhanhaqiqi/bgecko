<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryGecko;
use App\Models\Gecko;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminGeckoController extends Controller
{
    public function index()
    {
        $geckos = Gecko::with('galleryGeckos')->get()->map(function ($gecko) {
            $gecko->formatted_date = Carbon::parse($gecko->kelahiran)->translatedFormat('d M Y');
            return $gecko;
        });
        return view('admin.pages.tables.data-gecko', compact('geckos'));
    }

    public function create()
    {
        return view('admin.pages.forms.input-gecko');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tipe' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'kelahiran' => 'required|date',
            'deskripsi' => 'nullable|string|max:255',
            'perkawinan' => 'required|string|max:255',
            'url' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $gecko = Gecko::create(
            $request->only([
                'nama',
                'tipe',
                'jenis_kelamin',
                'kelahiran',
                'deskripsi',
                'perkawinan',
            ])
        );

        if ($request->has('url')) {
            $image = $request->file('url');
            $image->storeAs('public/geckos', $image->hashName());

            GalleryGecko::create([
                'gecko_id' => $gecko->id,
                'url' => $image->hashName(),
            ]);
        }

        return redirect()->route('gecko.index')->with('status', 'Data Leopard Gecko berhasil ditambahkan!');
    }
}
