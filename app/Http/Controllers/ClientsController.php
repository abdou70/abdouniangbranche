<?php

namespace App\Http\Controllers;

use App\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
   public function add(){
        $client = Client::all();
       return view('Client.add')->with("clients",$client);
   }

  /* public function getAll(){
    $client = Client::all();

    return view('Client.liste')->with("clients",$client);
   }*/

   public function update(){
    return $this->getAll();
   }

   public function edit($id){
       
       return view ('client.add');
   }


   public function persist (Request  $request) {
       
       $client=DB::table("clients")->insert(array(
        'nom'=>$request->nom,
        'prenom'=>$request->prenom,
        'adresse'=>$request->adresse,
        'tel'=>$request->telephone,
        'email'=>$request->email,
        'fidele' =>0,
        ));
       // $client->save();
        return redirect('/client/add')->with('success' , 'Data saved');
   }


    /*public function search  (Request $request) {

            
          // $search = $request->get('search');

           //$val="%".$search."%";
           
       //   $clients = DB::table('clients')->where('nom',"like",$val)->get();
           
           //echo "Value searched :".$val."<br/>";
            //$clients = DB::select("SELECT id FROM clients WHERE nom  LIKE '%:search%' ",["search"=>$search]);
           //var_dump($clients);
           //die ;
           
          // return view("Client.liste" ,['clients' =>$clients]) ;
        }*/

        public function searchPost(Request $request) {

            
            $search = $request->get('seachPersonne');
  
             $val="%".$search."%";
             
            $clients = DB::table('clients')->where('nom',"like",$val)->get();

            foreach($clients as $cl) {
                        echo "<option>";
                                echo "<p>";
                                    echo "".$cl->id."";
                                echo "</p>";
                        echo "</option>";
          }
        }




   public function index()
    {

        if(request('search') != null){
            $clients ['data'] = DB::table('clients')->where('nom',"like",'%'.request ('search').'%')->get();
            if($clients ['data']){
                $clients ['success'] = "ok";
            }else
            $clients ['error'] = "erreur";
            

            return response()->json($clients);
        }
    }
}
