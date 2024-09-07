<?php

namespace App\Http\Controllers\Admin;

use App\Exports\EggsExport;
use App\Exports\EggsExport\EggsExport as EggsExportEggsExport;
use App\Http\Controllers\Controller;
use App\Models\Egg;
use App\Models\GalleryEgg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AdminEggController extends Controller
{
    public function index()
    {
        $eggs = Egg::with('galleryEggs')->paginate(10);
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

    public function edit($id)
    {
        $egg = Egg::findOrFail($id);
        return view('admin.pages.edit.edit-egg', compact('egg'));
    }

    public function update(Request $request, Egg $egg)
    {
        $request->validate([
            'tanggal_inkubasi' => 'nullable|date',
            'keterangan' => 'nullable|string|max:255',
            'perkawinan' => 'nullable|string|max:255',
            'url' => 'nullable|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('url')) {

            if ($egg->galleryEggs->url) {
                Storage::delete('public/eggs/' . $egg->galleryEggs->url);
            }

            $egg->galleryEggs()->forceDelete();

            $image = $request->file('url');
            $image->storeAs('public/eggs/', $image->hashName());

            $egg->galleryEggs()->create([
                'url' => $image->hashName(),
            ]);

            $egg->update([
                'tanggal_inkubasi' => $request->tanggal_inkubasi,
                'keterangan' => $request->keterangan,
                'perkawinan' => $request->perkawinan,
            ]);
        }

        $egg->update([
            'tanggal_inkubasi' => $request->tanggal_inkubasi,
            'keterangan' => $request->keterangan,
            'perkawinan' => $request->perkawinan,
        ]);

        return redirect()->route('egg.index')->with('status', 'Data telur telah berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $egg = Egg::findOrFail($id);

        Storage::delete('public/eggs/' . $egg->galleryEggs->url);

        $egg->forceDelete();

        return redirect()->route('egg.index');
    }

    public function export()
    {
        return Excel::download(new EggsExport, 'eggs.xlsx');
    }
}
