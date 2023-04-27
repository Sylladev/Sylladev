<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class examensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function liste()
    {
        $examens = DB::select("select idExamen,idConsultation,valeur,examen.flagTransmis,typeExamens.typeExamens from examen,typeExamens where examen.idTypeExamens = typeExamens.idTypeExamens and examen.idExamen NOT IN(select idExamen from examenDetaille) order by examen.idExamen DESC LIMIT 12");

        $examensDetails = DB::select("select * from examen,typeExamens where examen.idTypeExamens = typeExamens.idTypeExamens and examen.idExamen IN(select idExamen from examenDetaille) order by examen.idExamen DESC LIMIT 100");
       
        $ekg = DB::select("select * from ekgFichier order by idEkgFichier DESC LIMIT 12");

        return view("examens.examens_liste",compact('examens','examensDetails','ekg'));
    }
    
    public function getExamen(Request $request, $idExamen)
    {
       $examen = DB::select("select * from examen,typeExamens where examen.idTypeExamens=typeExamens.idTypeExamens and examen.idExamen=?", [$idExamen]);
       return response()->json([
          'examen' => $examen
       ]);
    }

    public function getExamenDetails(Request $request, $idExamen)
    {
       $examen = DB::select("select * from examenDetaille where idExamen=?", [$idExamen]);
       return response()->json([
          'examen' => $examen
       ]);
    }

    public function getEkg(Request $request, $idEkg)
    {
        $ekg = DB::select("select * from ekgFichier where idEkgFichier=?",[$idEkg]);
       return response()->json([
          'ekg' => $ekg
       ]);
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
}
