<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProvinsiRequest;

class ProvinsiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Provinsi::all();
        $pageTitle = 'Master Provinsi';
        return view('back.pages.provinsi.index', compact('data', 'pageTitle'));
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
    public function store(Provinsi $provinsi, ProvinsiRequest $request)
    {
        try {
            DB::beginTransaction();
            $provinsi->create([
                'kode' => $request->kode,
                'nama' => $request->nama,
                'flag' => 'active',
            ]);
            DB::commit();
            return redirect()->route('provinsi.index')->with('success', 'provinsi Telah Dibuat');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('provinsi.index')->with('error', 'provinsi Telah Dibuat');
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
    public function edit(Provinsi $provinsi)
    {
        $data = $provinsi::all();
        $pageTitle = 'Master Provinsi';
        return view('back.pages.provinsi.edit', compact('data', 'provinsi', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provinsi $provinsi)
    {
        try {
            DB::beginTransaction();
            $provinsi->kode = $request->kode;
            $provinsi->nama = $request->nama;
            $provinsi->flag = $request->flag ? $request->flag : 'de-active';
            $provinsi->save();
            DB::commit();
            return redirect()->route('provinsi.index')->with('success', 'provinsi Telah Diubah');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('provinsi.index')->with('error', 'provinsi Telah Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provinsi $provinsi)
    {
        $provinsi->delete();
        return redirect()->route('provinsi.index')->with('success', 'Provinsi Telah Dihapus');
    }

     /**
     * Update Flag From Ajax
     */
    public function updateFlag(Request $request, Provinsi $provinsi)
    {
        try {
            $data = $provinsi->findOrFail($request->id);
            $data->flag = $request->flag;
            $data->save();
            return array('success' => true);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return array('error' => true);
        }
    }
}
