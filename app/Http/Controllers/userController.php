<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class userController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('users.utilisateurs');
  }

  public function liste()
  {
    $users = DB::select('select * from users ');
    return view('users.liste', compact('users'));
  }

  public function desactive($id)
  {
    DB::update("update utilisateur set statut='desactiver' where idUser=?",[$id]);
    return back()->with('success','Utilisateur desactivé avec succès !');
  }

  public function active($id)
  {
    DB::update("update utilisateur set statut='activer' where idUser=?",[$id]);
    return back()->with('success','Utilisateur activé avec succès !');
  }


  public function erreur()
  {

    return view('auth.erreur');
  }

  public function create()
  {
    return view('users.create');
  }





  public function  create_user(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'prenom' => 'required',
      'email' => 'required',
      'password' => 'required',
      'privilege' => 'required',

    ]);

    $file = $request->file('fichier');
    if (empty($file)) {
      include_once 'verifications.php';
      $vmail = new verifyEmail();
      $vmail->setStreamTimeoutWait(20);
      $vmail->Debug = FALSE;
      $vmail->Debugoutput = 'html';
      $vmail->setEmailFrom('mortex415@gmail.com');

      $email = $request->input('email');
      $e = strval($email);

      if ($vmail->check($e)) {
        $user = User::where('email',  $request->input('email'))->count();

        if ($user > 0) {
          return redirect()->route('create')->with('error', 'email déjà enregistrer !');
        } else {
          User::create([
            'name' => $request->get('name'),
            'prenom' => $request->get('prenom'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'privilege' => $request->get('privilege'),
            'image' => $request->get('image'),
            'flagtransmis' => $request->get('flagtransmis'),
          ]);
          return redirect()->route('create')->with('success', 'succès, l\'enregistrement s\'est bien effectué.');
        }
      } elseif (verifyEmail::validate($e)) {
        return redirect()->route('create')->with('error', "Email non valide !");
      } else {
        return redirect()->route('create')->with('error', "Le mail utilisés semble ne pas exister. Veuillez en utiliser un autre.");
      }
    } else {
      echo 'File Name: ' . $file->getClientOriginalName();
      echo '<br>';
      echo 'File Extension: ' . $file->getClientOriginalExtension();
      echo '<br>';
      echo 'File Real Path: ' . $file->getRealPath();
      echo '<br>';
      echo 'File Size: ' . $file->getSize();
      echo '<br>';
      echo 'File Mime Type: ' . $file->getMimeType();

      $destinationPath = 'uploads';
      $file->move($destinationPath, $file->getClientOriginalName());

      $email = $request->input('email');

      include_once 'verifications.php';
      $vmail = new verifyEmail();
      $vmail->setStreamTimeoutWait(20);
      $vmail->Debug = FALSE;
      $vmail->Debugoutput = 'html';
      $vmail->setEmailFrom('mortex415@gmail.com');


      $e = strval($email);

      if ($vmail->check($e)) {

        $user = User::where('email',  $request->input('email'))->count();
        if ($user > 0) {
          return redirect()->route('create')->with('error', 'email déjà enregistrer !');
        } else {
          User::create([
            'name' => $request->get('name'),
            'prenom' => $request->get('prenom'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'privilege' => $request->get('privilege'),
            'image' => $request->get('image'),
            'flagtransmis' => $request->get('flagtransmis'),
          ]);
          return redirect()->route('create')->with('success', 'succès, l\'enregistrement s\'est bien effectué.');
        }
      } elseif (verifyEmail::validate($e)) {
        return redirect()->route('create')->with('error', "Email non valide !");
      } else {
        return redirect()->route('create')->with('error', "Le mail utilisés semble ne pas exister. Veuillez en utiliser un autre.");
      }
    }
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
   
    $mdpuser = $request->input('passwordA');
    $mdpuser1 = $request->input('passwordN');
    $mdpuser2 = $request->input('passwordC');

    if ($mdpuser2=='') {

    } else {
  
    
    $user = User::FindOrFail($id);

    $verifypass = password_verify($mdpuser, $user->password);


    if ($verifypass == true && $mdpuser1 == $mdpuser2) {

      $user->update([

        'password' => bcrypt($request->get('passwordN')),

      ]);

     }else{
      return back()->with('error','L\'ancien mot de passe est invalide');
     }
    
      
    }
    

    $file = $request->file('fichier');
    $imagePath = User::select('image')->where('id', $id)->first();
    if (empty($file)) {
      $nom = $request->input('name');
      $prenom = $request->input('prenom');
      $email_usr_sante = $request->input('email');
      $privilege = $request->input('privilege');

      DB::update('update users set name = ?,prenom= ? ,email= ? ,privilege=?  where id = ?', [$nom, $prenom, $email_usr_sante, $privilege, $id]);


      return back()->with('success', 'succès, la modification s\'est bien effectuée');
    } else {


      $filePath = substr($imagePath->image, 1);

      unlink("uploads/" . $filePath);
      //Display File Name
      echo 'File Name: ' . $file->getClientOriginalName();
      echo '<br>';

      //Display File Extension
      echo 'File Extension: ' . $file->getClientOriginalExtension();
      echo '<br>';

      //Display File Real Path
      echo 'File Real Path: ' . $file->getRealPath();
      echo '<br>';

      //Display File Size
      echo 'File Size: ' . $file->getSize();
      echo '<br>';

      //Display File Mime Type
      echo 'File Mime Type: ' . $file->getMimeType();

      //Move Uploaded File
      $destinationPath = 'uploads';
      $file->move($destinationPath, $file->getClientOriginalName());

      $nom = $request->input('name');
      $prenom = $request->input('prenom');
      $email_usr_sante = $request->input('email');
      $privilege = $request->input('privilege');
      $image = $request->input('image');

      DB::update('update users set name = ?,prenom= ? ,email= ? ,privilege=? ,image=? where id = ?', [$nom, $prenom, $email_usr_sante, $privilege, $image, $id]);

      return back()->with('success', 'succès, la modification s\'est bien effectuée');
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show()
  {
    $id = Auth::user()->id;
    $user = DB::select("select * from users where id=?", [$id]);
    return view('users.modifCompte', compact('user', 'id'));
  }


  public function updateimage(Request $request, $id)
  {

    $user = User::FindOrFail($id);

    $img = $request->file('image');
    $file = $request->file('fichier');

    $imagePath = User::select('image')->where('id', $id)->first();


    if (empty($img)) {

      echo 'File Name: ' . $file->getClientOriginalName();
      echo '<br>';
      echo 'File Extension: ' . $file->getClientOriginalExtension();
      echo '<br>';
      echo 'File Real Path: ' . $file->getRealPath();
      echo '<br>';
      echo 'File Size: ' . $file->getSize();
      echo '<br>';
      echo 'File Mime Type: ' . $file->getMimeType();

      $destinationPath = 'uploads';
      $file->move($destinationPath, $file->getClientOriginalName());

      $image = $request->input('image');

      DB::update('update users set image=? where id = ?', [$image, $id]);

      return redirect()->route('modifCompte', compact('user'))->with('message', 'succès, la modification s\'est bien effectuée.');
    } else {

      if (empty($file)) {

        $image = $request->input('image');

        DB::update('update users set image=? where id = ?', [$image, $id]);

        return redirect()->route('modifCompte', compact('user'))->with('message', 'succès, la modification s\'est bien effectuée.');
      } else {

        $filePath = substr($imagePath->image, 1);

        unlink("uploads/" . $filePath);
        //Display File Name
        echo 'File Name: ' . $file->getClientOriginalName();
        echo '<br>';

        //Display File Extension
        echo 'File Extension: ' . $file->getClientOriginalExtension();
        echo '<br>';

        //Display File Real Path
        echo 'File Real Path: ' . $file->getRealPath();
        echo '<br>';

        //Display File Size
        echo 'File Size: ' . $file->getSize();
        echo '<br>';

        //Display File Mime Type
        echo 'File Mime Type: ' . $file->getMimeType();

        //Move Uploaded File
        $destinationPath = 'uploads';
        $file->move($destinationPath, $file->getClientOriginalName());



        $image = $request->input('image');


        DB::update('update users set image=? where id = ?', [$image, $id]);

        return redirect()->route('modifCompte', compact('user'))->with('message', 'succès, la modification s\'est bien effectuée.');
      }
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function Compteupdate(Request $request, $id)
  {


    $user = User::FindOrFail($id);

    $mdpuser = $request->input('passwordA');
    $mdpuser1 = $request->input('passwordN');
    $mdpuser2 = $request->input('passwordC');


    $verifypass = password_verify($mdpuser, $user->password);


    if ($verifypass == true && $mdpuser1 == $mdpuser2) {

      $user->update([

        'password' => bcrypt($request->get('passwordN')),

      ]);

      return redirect()->route('modifCompte', compact('user'))->with('message', 'succès, la modification s\'est bien effectuée.');
    } else {
      //return view('pages.modifCompte')->with('error','mot de passe incorrect !');
      return redirect()->route('modifCompte')->with('error', 'Mot de pass incorect!');
    }
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
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $user = User::findOrFail($id);
    return view('users.edit', compact('user'));
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $imagePath = User::select('image')->where('id', $id)->first();
    $filePath = substr($imagePath->image, 1);
    if ($filePath == 'vide') {
      User::destroy($id);
      return back()->with('success', 'Utilisateur supprimer avec succès !');
    } else {
      unlink("uploads/" . $filePath);
      User::destroy($id);
      return back()->with('success', 'Utilisateur supprimer avec succès !');
    }
  }
}
