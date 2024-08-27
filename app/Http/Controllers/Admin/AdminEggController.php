<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Egg;
use App\Models\GalleryEgg;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminEggController extends Controller
{
    public function index()
    {
        $eggs = Egg::with('galleryEggs')->get()->map(function ($egg) {
            $egg->formatted_date = Carbon::parse($egg->tanggal_inkubasi)->translatedFormat('d M Y');
            return $egg;
        });
        return view('admin.pages.tables.data-egg', compact('eggs'));
    }

    public function create()
    {
        return view('admin.pages.forms.input-egg');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_inkubasi' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
            'perkawinan' => 'required|string|max:255',
            'url' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $egg = Egg::create(
            $request->only([
                'tanggal_inkubasi',
                'keterangan',
                'perkawinan',
            ])
        );

        if ($request->hasFile('url')) {
            $image = $request->file('url');
            $image->storeAs('public/eggs', $image->hashName());

            GalleryEgg::create([
                'egg_id' => $egg->id,
                'url' => $image->hashName(),
            ]);
        }

        return redirect()->route('egg.index')->with('status', 'Data telur telah ditambahkan!');
    }
}
