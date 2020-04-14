<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Classes\Common;
use Session;
use Illuminate\Support\Facades\Validator;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }

    public function welcome()
    {
        $session_token = Session::get('_token');
        $query_risposte_chiuse = "SELECT * FROM answers WHERE session_token='" . $session_token . "' GROUP BY id_question";
        $result_risposte_chiuse = DB::connection('mysql')->select($query_risposte_chiuse);

        $lista_risposte_chiuse = [];
        if ($result_risposte_chiuse) {
            foreach ($result_risposte_chiuse as $risposte_chiuse) {
                array_push($lista_risposte_chiuse, $risposte_chiuse->id_question);
            }
        }
        $query_domande_rimaste="SELECT * FROM questions WHERE id not in( '" . implode( "', '" , $lista_risposte_chiuse ) . "')";
        $result_domande_rimaste = DB::connection('mysql')->select($query_domande_rimaste);
        foreach ($result_domande_rimaste as $key=>$risposta_rimasta) {
            $query_risposte_disponibili="SELECT * FROM question_answers WHERE id_question=$risposta_rimasta->id";
            $result_risposte_disponibili = DB::connection('mysql')->select($query_risposte_disponibili);
            $result_domande_rimaste[$key]->risposte_disponibili=$result_risposte_disponibili;

        }
      //  dd($result_domande_rimaste);
        //dd($session_token ,$result_risposte_chiuse, $lista_risposte_chiuse,$result_domande_rimaste);
        return view('welcome',['session_token'=>$session_token,'domande_chiuse'=>$lista_risposte_chiuse,'domande_rimaste'=>$result_domande_rimaste]);
    }

    public function save_question(Request $request){
        $risp=null;
        $errors=null;
        $data=$request->all();
        $session_token = Session::get('_token');
        if(isset($_POST['risp'])) {$risp=$_POST['risp'];}


        if ($risp==null) {
            if ($data['tipo_domanda']=='multi') {$stringa2='answers requested'; } else { $stringa2='answer is required';}
            $messages='Question-'.$data['domanda'].' '.$stringa2;
            return redirect()->back()->with('errors',$messages);
        } else {
            $domanda=$data['domanda'];
            foreach($risp as $risposta) {
                $query_insert_risposte = "INSERT INTO answers (id_question,id_answer,session_token) VALUES ($domanda, $risposta,'".$session_token."')";
                $result_insert_risposte = DB::connection('mysql')->insert($query_insert_risposte);
            }
            return redirect()->route('welcome');
        }
      //
    }
}
