<?php

namespace App\Http\Controllers;

use App\Models\ModelIjinLembur;

use App\Http\Requests\StoreModelIjinLemburRequest;
use App\Http\Requests\UpdateModelIjinLemburRequest;
use Illuminate\View\View;

class ModelIjinLemburController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $surats=ModelIjinLembur::all();
        return view('surat.index', compact('surats'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('surat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreModelIjinLemburRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ModelIjinLembur $modelIjinLembur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModelIjinLembur $modelIjinLembur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateModelIjinLemburRequest $request, ModelIjinLembur $modelIjinLembur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModelIjinLembur $modelIjinLembur)
    {
        //
    }
}
