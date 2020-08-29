<?php

namespace App\Http\Controllers;

use App\Linea;
use Illuminate\Http\Request;

class LineaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $edit = false;
        return view('home', compact('edit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        return view('pages.lines.index', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Linea;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();

        return redirect()->back();
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
    public function edit($id)
    {
        $edit = true;
        $res = Linea::where('id', '=', $id)->get();

        foreach($res as $i){
            $res = $i;
            break;
        }

        return view('pages.lines.index', compact('res','edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Linea::findOrFail($id);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();

        // $this->create();
        $edit = false;
        return view('pages.lines.index', compact('edit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Linea::findOrFail($id);
        $record->delete();

        $edit = false;
        return view('pages.lines.index', compact('edit'));
    }
}
