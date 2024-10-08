<?php

namespace App\Http\Controllers\Admin;

use App\Exports\GeckosExport;
use App\Http\Controllers\Controller;
use App\Models\Gecko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AdminGeckoController extends Controller
{
    public function index()
    {
        $geckos = Gecko::with('galleryGeckos')->paginate(10);
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
            'line_albino' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'kelahiran' => 'required|date',
            'deskripsi' => 'required|string|max:255',
            'perkawinan' => 'required|string|max:255',
            'url' => 'required|array',
            'url.*' => 'image|mimes:jpg,jpeg,png',
        ]);

        $gecko = Gecko::create(
            $request->only([
                'nama',
                'line_albino',
                'jenis_kelamin',
                'kelahiran',
                'deskripsi',
                'perkawinan',
            ])
        );

        if ($request->hasFile('url')) {
            foreach ($request->file('url') as $file) {
                $filename = $file->hashName();
                $file->storeAs('public/geckos', $filename);

                $gecko->galleryGeckos()->create(['url' => $filename]);
            }
        }

        return redirect()->route('gecko.index')->with('status', 'Data Leopard Gecko berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $gecko = Gecko::findOrFail($id);
        return view('admin.pages.edit.edit-gecko', compact('gecko'));
    }

    public function update(Request $request, Gecko $gecko)
    {
        $request->validate([
            'nama' => 'nullable|string|max:255',
            'line_albino' => 'nullable|string',
            'jenis_kelamin' => 'nullable|string',
            'kelahiran' => 'nullable|date',
            'deskripsi' => 'nullable|string|max:255',
            'perkawinan' => 'nullable|string|max:255',
            'url' => 'nullable|array',
            'url.*' => 'image|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('url')) {

            foreach ($gecko->galleryGeckos as $galleryGecko) {
                if ($galleryGecko->url) {
                    Storage::delete('public/geckos/' . $galleryGecko->url);
                }
            }

            $gecko->galleryGeckos()->forceDelete();

            foreach ($request->file('url') as $file) {
                if ($file instanceof \Illuminate\Http\UploadedFile) {
                    $filename = $file->hashName();
                    $file->storeAs('public/geckos', $filename);
                }

                $gecko->galleryGeckos()->create([
                    'url' => $filename,
                ]);
            }

            $gecko->update([
                'nama' => $request->nama,
                'line_albino' => $request->line_albino,
                'jenis_kelamin' => $request->jenis_kelamin,
                'kelahiran' => $request->kelahiran,
                'deskripsi' => $request->deskripsi,
                'perkawinan' => $request->perkawinan,
            ]);
        }

        $gecko->update([
            'nama' => $request->nama,
            'line_albino' => $request->line_albino,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelahiran' => $request->kelahiran,
            'deskripsi' => $request->deskripsi,
            'perkawinan' => $request->perkawinan,
        ]);


        return redirect()->route('gecko.index')->with('status', 'Data Leopard Gecko berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $gecko = Gecko::findOrFail($id);

        foreach ($gecko->galleryGeckos as $galleryGecko) {
            if ($galleryGecko->url) {
                Storage::delete('public/geckos/' . $galleryGecko->url);
            }
        }

        $gecko->forceDelete();

        return redirect()->route('gecko.index');
    }

    public function export()
    {
        return Excel::download(new GeckosExport, 'geckos.xlsx');
    }
}
