<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\reset;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception; 
require_once "vendor/autoload.php";


class resetControler extends Controller
{

   

       public function verifEmail()
    {

        return view('home.verifEmail'); 
    }

 public function help()
    {
        return view('users.help');
    }

   public function listeMaladie()
    {
      $maladie = DB::table('maladie')->paginate(13);
        return view('users.listeMaladie',compact('maladie'));
    }

    public function listeSymptome()
    {
      $symptome = DB::table('symptome')->paginate(13);
        return view('users.listeSymptome',compact('symptome'));
    }

       public function verifCode(Request $request)
    {
      
           return view('home.verifCode');
    }

   public function editpassword()
    {

        return view('home.editpassword'); 
    }



  public function confirmEmail(Request $request){

        
        $email= $request->input('email');

    
       $user = User::where('email', $request->input('email'))->count();
            
            if($user > 0){
                  $email= $request->input('email');
                  $code=substr(md5(uniqid().rand(0,10000)),0,5);

                  $mail = new PHPMailer(true);
 
                    try {
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';  
                        $mail->SMTPAuth = true;
                        $mail->Username = "noreplay.tulipsante2022@gmail.com"; 
                        $mail->Password = "kvksyzcwtejiagyd";
                        $mail->SMTPSecure = 'tls';  
                        $mail->Port = (587);                    
                      
                        $mail->setFrom('noreplay.tulipsante2022@gmail.com', 'Tulipsante');
                        $mail->addAddress(' '.$email.' ', '');
                        $mail->isHTML(true);
                        $mail->Subject = 'Tulipsante: Reinitialisation de Mot Passe';
                        $mail->Body    = "<b> Votre code de Confirmation est le : <br><br>".$code."</b>";
                     
                        $mail->send();
                        echo 'Email has been sent';
                    } catch (Exception $e) {
                        echo 'Email could not be sent. Mailer Error: '. $mail->ErrorInfo;
                    }

                  DB::insert('insert into reset (email, code) values (? ,?)',[$email, $code]);
                  return view('home.verifCode', compact('email'));
            } else {
              return redirect()->route('verifEmail')->with('error',"cet email n'existe pas !");
            }
    }




    public function confirmCode(Request $request)
    {
       $email = reset::where('email', $request->input('email'))->count();
       $code = reset::where('code', $request->input('code'))->count();

            if($email >0 && $code > 0 )
            {
              $email=$request->input('email');
              $code=$request->input('code');
        return view('home.editpassword', compact("email","code"));
            } else {
                $email=$request->input('email');
      return view('home.verifCode', compact('email','code'));
       
      }
    }


     public function confirmPassword(Request $request)
    {
      $email=$request->input('email');  
      $code=$request->input('code');  
       

       $usr=DB::select('select id from users where email=? ',[$email]);
       $id=$usr[0]->id;

      $user= User::FindOrFail($id);  

      $mdpuser1 = $request->input('passwordN');
      $mdpuser2 = $request->input('passwordC');

          
           $user->update([
            
             'password' => bcrypt($request->get('passwordN')),
            
        ]);
        $reset=DB::delete("delete from reset where code=?",[$code] );
        return redirect()->route('login', compact('email','code'))->with('message', 'Mot de passe modifier avec succes.');

        
    }


    public function userAdmin()
    {
        return view('home.userAdmin');
    }

    public function  createuserAdmin(Request $request)
{
     $request->validate([
    'name' => 'required',
    'prenom' => 'required',
    'email' => 'required',
    'password' => 'required',
    'privilege' => 'required',

  ]);

    $file = $request->file('fichier');
    if (empty($file)){
            include_once 'verifications.php';
            $vmail = new verifyEmail();
            $vmail->setStreamTimeoutWait(20);
            $vmail->Debug= FALSE;
            $vmail->Debugoutput= 'html';
            $vmail->setEmailFrom('mortex415@gmail.com');

            $email= $request->input('email');
            $e=strval($email);

          if ($vmail->check($e)) {  
                      $user = User::where('email',  $request->input('email'))->count();

                      if($user > 0){
                          return redirect()->route('userAdmin')->with('error','email déjà enregistrer !');
                      }else{
                            User::create([
                                'name' => $request->get('name'),
                                'prenom' => $request->get('prenom'),
                                'email' => $request->get('email'),
                                'password' => bcrypt($request->get('password')),
                                'privilege' => $request->get('privilege'),
                                'image' => $request->get('image'),
                                'flagTransmis' => $request->get('flagTransmis'),
                            ]);
                            return redirect()->route('login')->with('message', 'succès, l\'enregistrement s\'est bien effectué.');
                      }
          }elseif (verifyEmail::validate($e)) {
                return redirect()->route('userAdmin')->with('error',"Email non valide !");
          } else {
                return redirect()->route('userAdmin')->with('error',"Le mail utilisés semble ne pas exister. Veuillez en utiliser un autre.");
          }

    }else{
          echo 'File Name: '.$file->getClientOriginalName();echo '<br>';
          echo 'File Extension: '.$file->getClientOriginalExtension();echo '<br>';
          echo 'File Real Path: '.$file->getRealPath();echo '<br>';
          echo 'File Size: '.$file->getSize();echo '<br>';echo 'File Mime Type: '.$file->getMimeType();

          $destinationPath = 'uploads';
          $file->move($destinationPath,$file->getClientOriginalName());

           $email= $request->input('email');

      include_once 'verifications.php';
      $vmail = new verifyEmail();
      $vmail->setStreamTimeoutWait(20);
      $vmail->Debug= FALSE;
      $vmail->Debugoutput= 'html';
      $vmail->setEmailFrom('mortex415@gmail.com');

     
      $e=strval($email);

      if ($vmail->check($e)) {

            $user = User::where('email',  $request->input('email'))->count();
            if($user > 0){
                return redirect()->route('userAdmin')->with('error','email déjà enregistrer !');
            }else{
                  User::create([
                     'name' => $request->get('name'),
                      'prenom' => $request->get('prenom'),
                      'email' => $request->get('email'),
                      'password' => bcrypt($request->get('password')),
                      'privilege' => $request->get('privilege'),
                      'image' => $request->get('image'),
                      'flagTransmis' => $request->get('flagTransmis'),
                  ]);
                return redirect()->route('login')->with('message', 'succès, l\'enregistrement s\'est bien effectué.');
            }
      }elseif (verifyEmail::validate($e)) {
            return redirect()->route('userAdmin')->with('error',"Email non valide !");
      } else {
            return redirect()->route('userAdmin')->with('error',"Le mail utilisés semble ne pas exister. Veuillez en utiliser un autre.");
      }

    }
}


    
    }

