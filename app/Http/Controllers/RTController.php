<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\RW;
use Illuminate\Http\Request;

class RTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $rt = RT::with('rw')->orderBy('rw_id', 'asc')->get();
        } else {
            $rt = RT::with('rw')->where('rw_id', auth()->user()->rw_id)->get();
        }
        // dd($rt);
        return view('admin.rt.index', compact('rt'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rw = RW::orderBy('id', 'asc')->get();
        return view('admin.rt.create', compact('rw'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_rt' => 'required',
            'rw_id' => 'required'
        ]);

        RT::create([
            'nama_rt' => $request->nama_rt,
            'rw_id' => $request->rw_id,
        ]);
        return redirect()->route('rt.index')->with('toast_success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rt = RT::findOrFail($id);
        $rw = RW::orderBy('id', 'asc')->get();
        return view('admin.rt.edit', compact('rt', 'rw'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_rt' => 'required',
            'rw_id' => 'required'
        ]);

        RT::where('id', $id)->update([
            'nama_rt' => $request->nama_rt,
            'rw_id' => $request->rw_id,
        ]);
        return redirect()->route('rt.index')->with('toast_success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        RT::destroy($id);
        return redirect()->route('rt.index')->with('toast_success', 'Data Berhasil Dihapus');
    }
}
