<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Console\Scheduling\ScheduleRunCommand;
use Illuminate\Http\Request;
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

    public function complete($id){
        $serie = Serie::find($id);
        $nbEpisodes = DB::table('episodes')->where('serie_id', $id)->count();
        $nbSaisons = DB::table('episodes')->where('serie_id', $id)->max('saison');
        return view('completeSerie', ['serie' => $serie, 'nbEpisodes'=>$nbEpisodes, 'nbSaisons' => $nbSaisons]);
    }

    /*
    public function getNbSaisons($id){
        $nbSaisons = DB::table('episodes')->where('serie_id', $id)->max('saison');
        return $nbSaisons;
    }

    public function  getNbEpisodes($id){
        $nbEpisodes = DB::table('episodes')->where('serie_id', $id)->count();
        return $nbEpisodes;
    }
    */
}
