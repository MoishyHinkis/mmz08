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
        return inertia::render('PriceList', ['ads' => Size::all()]);
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
            'footer' => $request->input('price'),
        ]);
        $request->file('file')->storeAs('images', $path);
        return redirect('/pricelist');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size, String $pricelist)
    {
        //
        $ad = DB::table('sizes')->where('name',$pricelist)->get();
        return inertia::render('Buy', ['ad' => $ad[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(String $str)
    {
        //
        $data = DB::table('sizes')->where('id', $str)->get();

        return inertia::render('EditSizeForm', ['ad' => $data[0]]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size, String $pricelist)
    {
        //
        $size = DB::table('sizes')->where('id',$pricelist)->get();
        // $path = $request->file('file')->getClientOriginalName();
        // dd($path);
        DB::table('sizes')->where('id', $pricelist)->update([
            'name' => $request->name,
            'footer' => $request->footer,
        ]);
        // $request->file('file')->storeAs('images', $path);
        // Storage::delete('images/' . $size[0]->path);
        return redirect('/pricelist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(String $pricelist)
    {
        //
        $size = DB::table('sizes')->where('id', $pricelist)->get();
        Storage::delete('images/' . $size[0]->path);
        DB::table('sizes')->where('id', $pricelist)->delete();
        return redirect('/pricelist');
    }
}
