@extends('layouts.template')
@include('layouts.nav')
@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Produits</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" action="{{ route('ajoutercategorie') }}">
          @csrf
     <div class="form-group">
      <label for="nomcategorie" class="control-label"> Nom Categorie :</label>
      <input type="text" name="nomcategorie" id="nomcategorie" class="form-control" />
      </div>
           
      <div class="form-group">
      <input type="submit" name="envoyer" id="envoyer" value="Enregistrer" class="btn btn-theme" data-toggle="modal" 
      data-target="#exampleModal"/>
      {{-- <input type="reset" name="annuler" id="annuler" value="annuler" class="btn btn-danger" /> --}}
      </div>
      </form>
    </div>
  </div> 
</div>
<div class="">
  <h1 >FAST-FOOD</h1>
  @if(count($errors) > 0)

      <div class="alert alert-danger">
          <ul>
              @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
              @endforeach
          </ul>
      </div>
      @endif
      @if (\Session::has('success'))
          <div class="alert alert-success">
              <p>{{ \Session::get('success') }}</p>
          </div>
      @endif
      <button type="button" class="btn btn-theme" data-toggle="modal" 
      data-target="#exampleModal">
          Ajouter Categorie
      </button>
      
      <br><br>
      
  
  
  {{-- <input class="search" id="search" placeholder=search...  type="search" name="search" class="form-control" autocomplete="off">
  <datalist id="trouve"></datalist> --}}


  <br><br>
</div>
<div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> Liste des Catégories</h4>
                <hr>
                <thead>
                <tr>
                           <th>ID</th>
                           <th>libelle Categorie</th>
                           <th>Action</th>
                           <th>Action</th>
                       </tr>
                       @foreach($liste_categorie as $categorie)
                       <tr>
                           <td>{{ $categorie->id }}</td>
                           <td>{{ $categorie->libelle }}</td>
                           <td><a class="btn btn-theme"  
                            href="{{ route('editcategorie' , ['id' => $categorie->id]) }}" >Editer</a></td>
                          <td><a class="btn btn-danger" href="{{ route('deletecategorie' , ['id' => $categorie->id]) }}" onclick="return confirm('Voulez-vous vraiement supprimer?')" >Supprimer</a></td>
                        </tr>
                       @endforeach
                    </table>
                    {{-- {{ $liste_produit->links() }} --}}
                    </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
@endsection
@include('layouts.footer')