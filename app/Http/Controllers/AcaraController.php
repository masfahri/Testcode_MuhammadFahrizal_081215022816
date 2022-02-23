<?php

namespace App\Http\Controllers;

use App\Models\AcaraModel;
use Illuminate\Http\Request;

class AcaraController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:acara-list|acara-create|acara-edit|acara-delete', ['only' => ['index','show']]);
         $this->middleware('permission:acara-create', ['only' => ['create','store']]);
         $this->middleware('permission:acara-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:acara-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acaras = AcaraModel::latest()->paginate(5);
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        AcaraModel::create($request->all());
    
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $acara
     * @return \Illuminate\Http\Response
     */
    public function show(AcaraModel $acara)
    {
        return view('products.show',compact('product'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $acara
     * @return \Illuminate\Http\Response
     */
    public function edit(AcaraModel $acara)
    {
        return view('products.edit',compact('product'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $acara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcaraModel $acara)
    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $acara->update($request->all());
    
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $acara
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcaraModel $acara)
    {
        $acara->delete();
    
        return redirect()->route('products.index')
                        ->with('success','AcaraModel deleted successfully');
    }
}
