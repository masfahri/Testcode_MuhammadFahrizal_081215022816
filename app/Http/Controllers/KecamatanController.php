<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan = new Kecamatan();
        $data = $kecamatan::all();
        $pageTitle = 'Master Kecamatan';
        return view('back.pages.kecamatan.index', compact('data', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Kecamatan $kecamatan)
    {
        try {
            DB::beginTransaction();
            $kecamatan->create([
                'kode' => $request->kode,
                'nama' => $request->nama,
                'flag' => 'active'
            ]);
            DB::commit();
            return redirect()->route('kecamatan.index')->with('success', 'kecamatan Telah Dibuat');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('kecamatan.index')->with('error', 'Kelurahan Telah Dibuat');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kecamatan $kecamatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kecamatan $kecamatan)
    {
        $data = $kecamatan::all();
        $pageTitle = 'Master Kecamatan';
        return view('back.pages.kecamatan.edit', compact('data', 'kecamatan', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {
        try {
            DB::beginTransaction();
            $kecamatan->kode = $request->kode;
            $kecamatan->nama = $request->nama;
            $kecamatan->flag = $request->flag ? $request->flag : 'de-active';
            $kecamatan->save();
            DB::commit();
            return redirect()->route('kecamatan.index')->with('success', 'kecamatan Telah Diubah');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('kecamatan.index')->with('error', 'kecamatan Telah Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kecamatan $kecamatan)
    {
        $kecamatan->delete();
        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan Telah Dihapus');
    }

    /**
     * Update Flag From Ajax
     */
    public function updateFlag(Request $request, Kecamatan $kecamatan)
    {
        try {
            $data = $kecamatan->findOrFail($request->id);
            $data->flag = $request->flag;
            $data->save();
            return array('success' => true);
        } catch (\Throwable $th) {
            return array('error' => true);
        }
    }
}
