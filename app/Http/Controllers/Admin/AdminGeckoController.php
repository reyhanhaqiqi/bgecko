<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryGecko;
use App\Models\Gecko;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'deskripsi' => 'required|string|max:255',
            'perkawinan' => 'required|string|max:255',
            'url' => 'required|array',
            'url.*' => 'image|mimes:jpg,jpeg,png',
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
            'tipe' => 'nullable|string|max:255',
            'jenis_kelamin' => 'nullable|string',
            'kelahiran' => 'nullable|date',
            'deskripsi' => 'nullable|string|max:255',
            'perkawinan' => 'nullable|string|max:255',
            'url' => 'nullable|array',
            'url.*' => 'image|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('url')) {
            $image = $request->file('url');

            foreach ($gecko->galleryGeckos as $galleryGecko) {
                if ($galleryGecko->url) {
                    Storage::delete('public/geckos/' . $galleryGecko->url);
                }
            }

            $gecko->galleryGeckos()->delete();

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
                'tipe' => $request->tipe,
                'jenis_kelamin' => $request->jenis_kelamin,
                'kelahiran' => $request->kelahiran,
                'deskripsi' => $request->deskripsi,
                'perkawinan' => $request->perkawinan,
            ]);
        }

        $gecko->update([
            'nama' => $request->nama,
            'tipe' => $request->tipe,
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
}
