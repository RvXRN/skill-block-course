<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Mapel, SkillBlock};

class SkillBlockController extends Controller
{
    public function index()
    {
        $data = SkillBlock::with('mapel')->get();
        return view('pages.skillblock.index', compact('data'));
    }

    public function create()
    {
        $mapel = Mapel::all();
        return view('pages.skillblock.create', compact('mapel'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'level'      => 'required|in:begineer,intermediete,expert',
            'subject_id' => 'required|exists:mapel,subject_id'
        ]);

        SkillBlock::create($request->all());

        return redirect()->route('block.index')->with('success', 'Course berhasil ditambahkan');
    }

    public function edit($id)
    {
        $block = SkillBlock::findOrFail($id);
        $mapel = Mapel::all();
        return view('pages.skillblock.edit', compact('block', 'mapel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'      => 'required',
            'level'      => 'required|in:begineer,intermediete,expert',
            'subject_id' => 'required|exists:mapel,subject_id'
        ]);

        $block = SkillBlock::findOrFail($id);
        $block->update($request->all());

        return redirect()->route('block.index')->with('success', 'Course berhasil diupdate');
    }

    public function destroy($id)
    {
        SkillBlock::findOrFail($id)->delete();
        return back()->with('success', 'Course berhasil dihapus');
    }
}
