@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Formulaire D'enregistrement de Client</div>

                <div class="card-body">
                    @if (isset($confirmation))

                        @if($confirmation ==1)
                          <div class="alert alert-success">Produit ajouté</div>
                        @else
                           <div class="alert alert-danger">Produit non ajouter </div>
                        @endif

                    @endif
                    <form method="POST" action="{{ route('updateproduit') }}">
                        @csrf
                   <div class="form-group">
                    <label for="id" class="control-label"> Identifiant du  produit :</label>
                    <input type="text"  readonly="true" name="id" id="id" value="{{ $produit->id }}" class="form-control" />
                    </div>
                   
                    <div class="form-group">
                        <label for="nomproduit" class="control-label"> Nom Produit :</label>
                        <input type="text" name="nomproduit" id="nomproduit" 
                        value="{{ $produit->nom }}"  class="form-control" />
                        </div>

                    <div class="form-group">
                    <label for="referenceproduit" class="control-label"> Reference Produit :</label>
                    <input type="text" name="referenceproduit" id="referenceproduit" value="{{  $produit->reference }}" class="form-control" />
                    </div>
             
                    <div class="form-group">
                    <label for="adresseclient" class="control-label">Quantite Produit :</label>
                    <input type="text" name="quantiteproduit" id="quantiteproduit" value="{{ $produit->quantite }}" class="form-control" />
                    </div>
             
                    <div class="form-group">
                    <label for="prixproduit" class="control-label"> Prix Produit :</label>
                    <input type="tel" name="prixproduit" id="prixproduit" value="{{ $produit->prix }}" class="form-control" />
                    </div>
                    
                    <div class="form-group">
                    <label for="datenais" class="control-label"> Photo :</label>
                    <input type="text" name="photoproduit" id="photoproduit" value="{{ $produit->photo }}" class="form-control" />
                    </div>
 
                    <div class="form-group">
                    <label for="id_categorie" class="control-label"> ID-Categorie :</label>
                    <input type="tel" name="id_categorie" id="id_categorie" value="{{ $produit->categorie_id }}" class="form-control" />
                    </div>
              
                    <div class="form-group">
                    <input type="submit" name="envoyer" id="envoyer" value="Enregistrer" class="btn btn-success"/>
                    <a class="btn btn-danger" href={{ route('getallproduit') }}>Annuler</a>
                    </div>
                    </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
