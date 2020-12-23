@extends('layouts.template')
@include('layouts.nav')
@section('content')
<div class="row mt">
    <div class="col-md-12">
        <a type="button" class="btn btn-theme" href="{{ route('admin.profils.create') }}">
                        Ajouter un profil
        </a>
    </div>
</div>
<div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i>Liste des profils</h4>
                <hr>
                <thead>
                <tr>
                    <th>#</th>
                    <th><i class="fa fa-bookmark"></i> Profil</th>
                    <th><i class="fa fa-bookmark"></i> Creation</th>
                    <th><i class="fa fa-bookmark"></i> Mise a jour</th>
                    <th><i class="fa fa-bookmark"></i> Actions</th>
                  
                  
                  </tr>
                </thead>>
                  <tbody>
                  @foreach($profils as $profil)
                         <tr>
                                 <td>{{$profil->id}}</td>
                                 <td>{{$profil->status}}</td>
                                 <td>{{$profil->created_at}}</td>
                                 <td>{{$profil->updated_at}}</td>
                                 <td>
                                    <button class="btn btn-theme btn-xs"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                  </td>
                        </tr>
                     
                  @endforeach
                  </tbody>
                  </table>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->

@endsection
@include('layouts.footer')