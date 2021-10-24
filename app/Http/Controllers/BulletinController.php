<?php

namespace App\Http\Controllers;

use App\Models\Bulletin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class BulletinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return inertia::render('PastBulletins', ['bulletins' => Bulletin::all()]);
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
        //
        $path = $request->file('file')->getClientOriginalName();
        Bulletin::create([
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'link' => $request->input('link'),
            'path' => $path,
        ]);
        $request->file('file')->storeAs('public/bulletins', $path);
        return redirect('/bulletin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bulletin  $bulletin
     * @return \Illuminate\Http\Response
     */
    public function show(Bulletin $bulletin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bulletin  $bulletin
     * @return \Illuminate\Http\Response
     */
    public function edit(Bulletin $bulletin)
    {
        //
        Bulletin::find($bulletin->id);
        return inertia::render('EditBulletinForm', ['bulletin' => $bulletin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bulletin  $bulletin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bulletin $bulletin)
    {
        //
        Bulletin::find($bulletin->id)->update([
            'name' => $request->input('name'),
            // 'path' => $request->path,
            'link' => $request->input('link'),
            'date' => $request->input('date'),
        ]);
        return redirect('/bulletin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bulletin  $bulletin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bulletin $bulletin)
    {
        //
        Bulletin::find($bulletin->id)->delete();
        Storage::delete('public/bulletins/' . $bulletin->path);
        return redirect('/bulletin');
    }
}
