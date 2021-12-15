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
        $date=[];
        $data = DB::table('series')->orderBy('premiere','desc')->get();
        for($i=0;$i<5;$i++){
            $date[$i]=$data[$i];
        }
        return view('accueil.echantillon',['date' =>$date]);

    }
    public function filtre(Request $request) {
        $cat = $request->get("cat", '');
        if (empty($cat)) {
            $series = DB::table('series')->get();
        } else {
            $series = DB::table('series')->orderBy($cat)->get();

        }
        return view('welcome', ['series' => $series]);
    }

    public function ajoutCommentaire(){
        return view('commentaire.commentaire');


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
            'note' => 'required',

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
