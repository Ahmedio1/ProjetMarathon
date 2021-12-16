<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class CommentaireController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $idUser = Auth::id();
        $user = User::find($idUser);
        $serie=Serie::find($id);
       return view('commentaire.commentaire', ['serie'=>$serie,'user'=>$user]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $this->validate($request, [
            'message' => 'required',
            'note'=>'required'
        ]);
        $comments = new Comment();
        $comments->content = $request->message;
        $comments->note = $request->note;
        $comments->validated =0;
        $comments->user_id =Auth::id();
        $comments->serie_id = $id;
        Comment::insert(['content' => $comments->content, 'note' => $comments->note,'validated' => 0,'user_id'=>$comments->user_id,'serie_id'=>$comments->serie_id]);


        return redirect("sommaire/".$id);
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
        $serie = Serie::find($id);
        $nbEpisodes = DB::table('episodes')->where('serie_id', $id)->count();
        $comments = Comment::where('serie_id',$serie->id)->get();
        $idUser=Auth::id();
        $auth= User::find($idUser);
        $nbSaisons = DB::table('episodes')->where('serie_id', $id)->max('saison');
        return view('completeSerie', ['serie' => $serie, 'nbEpisodes'=>$nbEpisodes, 'nbSaisons' => $nbSaisons,'comments'=>$comments,'auth'=>$auth]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($idS,$id)
    {
        Comment::where('id',$id)->update(['validated'=>1]);
        return redirect('/edit/'.$idS);
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
}
