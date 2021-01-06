<?php

namespace App\Http\Controllers;


use App\Reglement;
use Illuminate\Http\Request;

class ReglementController extends Controller
{
    public function add()
    {
        // $categories = Reglement::all();
        return view('reglement.add');
    }
    public function getAll()
    
    {
        $liste_reglement = Reglement::all();//paginate c'est pour determiner le nombre de produit a afficher
        //$liste_client = Client::all();
        // $categories = Reglement::all();
        return view('reglement.liste' ,['liste_reglement' => $liste_reglement]);
    }
    /* public function edit($id)
    {
        $produit = Reglement::find($id);
        return view('produit.edit',['produit' => $produit]);
    } */
   /*  public function update(Request $request)
    {
        $produit =  Reglement::find($request->id);
        $produit->nom = $request->nomproduit;
        $produit->reference = $request->referenceproduit;
        $produit->quantite = $request->quantiteproduit;
        $produit->prix = $request->prixproduit;
        // $produit->photo = $request->photoproduit;
        $produit->categorie_id = $request->id_categorie;
        $leproduit = $produit->save();
        return Redirect('/produit/getall');
    } */
   /*  public function delete($id)
    {
        $produit = Reglement::find($id);//On demande au model Client de prendre les client avec les id  
        if($produit != null) //s'il existe des clients on fait le delete.
        {
            $produit->delete ();
        }

        return $this->getAll();
    } */
    public function ajouter(Request $request)
    {
       
        
       /*   echo $request->nomreglement;
         die; */
        $reglement = new Reglement();
        $reglement->typereglement = $request->nomreglement;
        $lereglement = $reglement->save();
       /*  $produit->reference = $request->referenceproduit;
        $produit->quantite = $request->quantiteproduit;
        $produit->prix = $request->prixproduit;
        $produit->photo = $request->photoproduit;
        $produit->categorie_id = $request->id_categorie;

        if ($files = $request->file('photo')) {
            
            $destinationPath = 'images/produits/'; // upload path
            $image = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $image);
            $path = '/images/produits/'.$image;
            $url = url($path);
            $produit->photo = $url;
         } */
         
       
        return redirect()->route('addreglement',['confirmation'=>$lereglement]);
    }
}
