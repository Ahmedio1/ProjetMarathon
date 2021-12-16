<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function showDate(){
        $data = Serie::orderBy('premiere','desc')->take(5)->get();
        return view('accueil.echantillon',['date' =>$data]);

    }
    public function filtre(Request $request) {
        $cat = $request->get("cat", '');
        if (empty($cat)) {
            $series = Serie::all();
        } else {
            $series = Serie::orderBy($cat)->get();

        }
        return view('welcome', ['series' => $series]);
        return new RedirectResponse('/');
    }

    public function trierGenre(Request $request){
        $cat = $request->get("cat", '');
        if (empty($cat)) {
            $series = Serie::all();
        } else {
            $series = Serie::where("genre", "=" ,$cat,"or langue","=",$cat)->get();
        }
        return view('welcome', ['series' => $series]);
        return new RedirectResponse('/');
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
        $this->validate($request, [
            'content' => 'required',

        ]);
        $comments = new Comment();
        $comments->content = $request->message;
        $comments->save();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function welcome(){
        $series = Serie::all();
        return view('welcome', ['series' => $series]);
    }

    public function sommaire($id){
        $serie = Serie::find($id);
        return view('sommaireSerie', ['serie' => $serie]);
    }
}
