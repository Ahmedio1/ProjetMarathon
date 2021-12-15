<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Resources\views;
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
        return view('welcome');
    }

    public function showDate(){
        $date=[];
        $data = DB::table('series')->orderBy('premiere','desc')->get();
        for($i=0;$i<5;$i++){
            $date[$i]=$data[$i];
        }
        return view('welcome',['date' =>$date]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('taches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    // validation des données de la requête
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',

            ]
        );

        // code exécuté uniquement si les données sont validaées
        // sinon un message d'erreur est renvoyé vers l'utilisateur

        // préparation de l'enregistrement à stocker dans la base de données
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password= $request->password;



        // insertion de l'enregistrement dans la base de données
        $user->save();

        // redirection vers la page qui affiche la liste des tâches
        return redirect('/base');
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

}
