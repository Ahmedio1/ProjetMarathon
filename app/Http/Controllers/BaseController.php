<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Episode;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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



    public function welcome(){
        $series = Serie::all();
        return view('welcome', ['series' => $series]);
    }

    public function sommaire($id){
        $serie = Serie::find($id);
        return view('sommaireSerie', ['serie' => $serie]);
    }

    public function liste($id){
        $idUser = Auth::id();
        $user = User::find($idUser);
        $episodes = DB::table('episodes')->where('serie_id', $id)->get();
        return view('listeEpisodes', ['episodes'=>$episodes,'user'=>$user]);
    }

    public function dejaVu($eId,$date,$uId){
        $seen = DB::table('seen')->where('episode_id',$eId)->exists();
        $episode = Episode::find($eId);
        if($seen){
            return redirect("/listeEpisodes/".$episode->serie_id);}
        else{
            DB::table('seen')->insert(['user_id' => $uId, 'episode_id' => $eId, 'date_seen' => $date]);
            return redirect("/listeEpisodes/".$episode->serie_id);}
    }



}

