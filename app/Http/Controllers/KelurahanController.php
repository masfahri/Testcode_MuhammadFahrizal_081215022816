<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\KelurahanRequest;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelurahan = new Kelurahan();
        $data = $kelurahan::all();
        $kecamatan = Kecamatan::pluck('nama', 'kode');
        $pageTitle = 'Master Kelurahan';
        return view('back.pages.kelurahan.index', compact('data', 'pageTitle', 'kecamatan'));
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
    public function store(KelurahanRequest $request, Kelurahan $kelurahan)
    {
        try {
            DB::beginTransaction();
            $kelurahan->create([
                'kode' => $request->kode,
                'nama' => $request->nama,
                'flag' => 'active',
                'kode_kecamatan' => $request->kode_kecamatan
            ]);
            DB::commit();
            return redirect()->route('kelurahan.index')->with('success', 'Kelurahan Telah Dibuat');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('kelurahan.index')->with('error', 'Kelurahan Telah Dibuat');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelurahan $kelurahan)
    {
        $data = $kelurahan::all();
        $pageTitle = 'Master Kelurahan';
        return view('back.pages.kelurahan.edit', compact('data', 'kelurahan', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelurahan $kelurahan)
    {
        try {
            DB::beginTransaction();
            $kelurahan->kode = $request->kode;
            $kelurahan->nama = $request->nama;
            $kelurahan->flag = $request->flag ? $request->flag : 'de-active';
            $kelurahan->save();
            DB::commit();
            return redirect()->route('kelurahan.index')->with('success', 'Kelurahan Telah Diubah');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('kelurahan.index')->with('error', 'Kelurahan Telah Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelurahan $kelurahan)
    {
        $kelurahan->delete();
        return redirect()->route('kelurahan.index')->with('success', 'Kelurahan Telah Dihapus');

    }

    /**
     * Update Flag From Ajax
     */
    public function updateFlag(Request $request, Kelurahan $kelurahan)
    {
        try {
            $data = $kelurahan->findOrFail($request->id);
            $data->flag = $request->flag;
            $data->save();
            return array('success' => true);
        } catch (\Throwable $th) {
            return array('error' => true);
        }
    }
}
