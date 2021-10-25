<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // dd(__('bsd'))
        return inertia::render('PriceList', ['sizes' => Size::all()]);
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
    public function store(Request $request)
    {
        $path = $request->file('file')->getClientOriginalName();
        Size::create([
            'name' => $request->input('name'),
            'path' => $path,
            'price' => $request->input('price'),
        ]);
        $request->file('file')->storeAs('public/sizes', $path);
        return redirect('/size');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
        return inertia::render('Buy', ['size' => $size]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        //
        return inertia::render('EditSizeForm', ['size' => $size]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        //
        $path = $request->file('file')->getClientOriginalName();
        Size::find($size->id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'path' => $path
        ]);
        $request->file('file')->storeAs('public/sizes', $path);
        Storage::delete('sizes/' . $size->path);
        return redirect('/size');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        //
        Storage::delete('public/sizes/' . $size->path);
        $size->delete();
        return redirect()->back();
    }
}
