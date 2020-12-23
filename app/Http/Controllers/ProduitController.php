<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{

    public function add()
    {
        $categories = Categorie::all();
        return view('produit.add',['les_categorie'=>$categories]);
    }
    public function getAll()
    
    {
        $liste_produit = Produit::all();//paginate c'est pour determiner le nombre de produit a afficher
        //$liste_client = Client::all();
        $categories = Categorie::all();
        return view('produit.liste' ,['liste_produit' => $liste_produit],['les_categorie' =>$categories]);
    }
    public function edit($id)
    {
        $produit = Produit::find($id);
        return view('produit.edit',['produit' => $produit]);
    }
    public function update(Request $request)
    {
        $produit =  Produit::find($request->id);
        $produit->nom = $request->nomproduit;
        $produit->reference = $request->referenceproduit;
        $produit->quantite = $request->quantiteproduit;
        $produit->prix = $request->prixproduit;
        $produit->photo = $request->photoproduit;
        $produit->categorie_id = $request->id_categorie;
        $leproduit = $produit->save();
        return Redirect('/produit/getall');
    }
    public function delete($id)
    {
        $produit = Produit::find($id);//On demande au model Client de prendre les client avec les id  
        if($produit != null) //s'il existe des clients on fait le delete.
        {
            $produit->delete ();
        }

        return $this->getAll();
    }
    public function ajouter(Request $request)
    {
       
        
        // echo $request->nomclient;
        $produit = new Produit();
        $produit->nom = $request->nomproduit;
        $produit->reference = $request->referenceproduit;
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
         }
        $produit->save();
       
        return redirect()->route('addproduit');
    }
}
