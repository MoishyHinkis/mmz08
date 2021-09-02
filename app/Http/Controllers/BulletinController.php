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
        return inertia::render('PastBulletins', ['ads' => Bulletin::all()]);
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
            'footer' => $request->input('footer'),
            'link' => $request->input('link'),
            'path' => $path,
        ]);
        $request->file('file')->storeAs('images', $path);
        return redirect('/pastbulletins');
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
    public function edit(Bulletin $bulletin, String $pastbulletin)
    {
        //
        $data = DB::table('bulletins')->where('id', $pastbulletin)->first();
        // dd($data);
        return inertia::render('EditBulletinForm', ['ad' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bulletin  $bulletin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bulletin $bulletin, String $pastbulletins)
    {
        //
        DB::table('bulletins')->where('name', $pastbulletins)->update([
            'name' => $request->input('name'),
            // 'path' => $request->path,
            'link' => $request->input('link'),
            'footer' => $request->input('footer'),
        ]);
        return redirect('/pastbulletins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bulletin  $bulletin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bulletin $bulletin, String $pastbulletins)
    {
        //
        $bulletin = DB::table('bulletins')->where('id', $pastbulletins)->first();
        Storage::delete('images/' . $bulletin->path);
        DB::table('bulletins')->where('id', $pastbulletins)->delete();
        return redirect('/pastbulletins');
    }
}
