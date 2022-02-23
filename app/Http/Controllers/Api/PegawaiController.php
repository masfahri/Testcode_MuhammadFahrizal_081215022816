<?php

namespace App\Http\Controllers\Api;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\PegawaiRequest;

class PegawaiController extends Controller
{
    public function __construct() {
        $this->index = 'admin.pegawai.index';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawais = Pegawai::all();
        return response()->json(["data" => $pegawais],200);
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
    public function store(PegawaiRequest $request)
    {
        try {
            DB::beginTransaction();
            $data  = Pegawai::create(collect($request->validated())->filter()->toArray());
            DB::commit();
            return response()->json(["data" => $data],200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(["message" => $th->getMessage()],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        return response()->json(["data" => $pegawai],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return response()->json(["data" => $pegawai],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $pegawai = Pegawai::findOrFail($id);
            $pegawai->nama       = $request->nama;
            $pegawai->tanggal_lahir      = $request->tanggal_lahir;
            $pegawai->gaji = $request->gaji;

            $pegawai->save();
            DB::commit();
            return response()->json(["data" => $pegawai],200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(["message" => $th->getMessage()],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $pegawai = Pegawai::findOrFail($id);
            $pegawai->delete();
            DB::commit();
            return response()->json(["data" => $pegawai],200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(["message" => $th->getMessage()],500);
        }
    }
}
