@extends('layouts.template')
@include('layouts.nav')
@section('content')

<div class="row mt">
    <div class="col-md-12">
        <a type="button" class="btn btn-theme" href="{{ route('admin.users.create') }}">
                        Ajouter un utilisateur
        </a>
    </div>
</div>
<div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> Liste des utilisateurs</h4>
                <hr>
                <thead>
                  <tr>
                                            <th>#</th>
                                            <th>Nom</th>
                                            <th>Login</th>
                                            <th>Profils</th>
                                            <th>Creation </th>
                                            <th>Mise à jour </th>
                                            <th>Actions</th>

                                        </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $user)
                         <tr>
                                 <td>{{$user->id}}</td>
                                 <td>{{$user->name}}</td>
                                 <td>{{$user->email}}</td>              
                                 <td>{{implode(', ',$user->profils()->get()->pluck('status')->toArray())}}</td>              
                                 <td>{{$user->created_at}}</td>
                                 <td>{{$user->updated_at}}</td>
                                 @can('manage-users')
                               
                                      <td><a href ="{{ route('admin.users.edit', $user->id) }}" title="modifier user" class="btn btn-theme btn-sm shadow-lg  mb-2  rounded">affecter roles</a></td>
  
                                 @endcan
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