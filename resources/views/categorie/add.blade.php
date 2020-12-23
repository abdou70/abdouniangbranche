@extends('layouts.template')
@include('layouts.nav')

@section('content')
<div class="row mt">
    <div class="col-md-12 P-1">
        <a type="button" class="btn btn-theme" href="{{ route('getallcategorie') }}">
                        liste des Categories
        </a>
    </div>
</div>
<div class="row mt">
          <div class="col-lg-12">
            <h4><i class="fa fa-angle-right"></i>{{ __('Ajouter categorie') }}</h4>
              <div class="form-panel">
                    @if (isset($confirmation))

                        @if($confirmation ==1)
                          <div class="alert alert-success">Categorie ajouté</div>
                        @else
                           <div class="alert alert-danger">Categorie non ajouter </div>
                        @endif

                    @endif
                    <form method="POST" action="{{ route('ajoutercategorie') }}">
                        @csrf
                   <div class="form-group">
                    <label for="nomcategorie" class="control-label"> Nom Categorie :</label>
                    <input type="text" name="nomcategorie" id="nomcategorie" class="form-control" />
                    </div>
                         
                    <div class="form-group">
                    <input type="submit" name="envoyer" id="envoyer" value="Enregistrer" class="btn btn-theme" data-toggle="modal" 
                    data-target="#exampleModal"/>
                    <input type="reset" name="annuler" id="annuler" value="annuler" class="btn btn-danger" />
                    </div>
                    </form>
                    </div>
            </div>
            <!-- /form-panel -->
</div>
       
@endsection
@include('layouts.footer')