<?php
namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $data = Mapel::all();
        return view('pages.mapel.index', compact('data'));
    }

    public function create()
    {
        return view('pages.mapel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_name' => 'required|string|max:255',
                
        ]);

        Mapel::create([
            'subject_name' => $request->subject_name
        ]);

        return redirect()->route('mapels.index')->with('success', 'Mapel berhasil ditambahkan');
    }

    public function edit($id)
    {
        $mapel = Mapel::findOrFail($id);
        return view('pages.mapel.edit', compact('mapel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'subject_name' => 'required|string|max:255'
        ]);

        $mapel = Mapel::findOrFail($id);
        $mapel->update(['subject_name' => $request->subject_name]);

        return redirect()->route('mapel.index')->with('success', 'Mapel berhasil diperbarui');
    }

    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();

        return back()->with('success', 'Mapel berhasil dihapus');
    }
}
