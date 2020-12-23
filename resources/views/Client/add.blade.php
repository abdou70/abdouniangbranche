@extends('layouts.template')
@include('layouts.nav')

@section('content')
<!-- {{-- Start-Add-Modal--}} -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Clients</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
                <form method="POST" action="/client/persist">
                    @csrf
                    <div class="modal-body">
                
                            <div class="form-group">
                            <label class="control-label" for="nom">Nom du Client</label>
                            <input class="form-control" type="text" name="nom" id="nom" />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="prenom">Prenom du Client</label>
                            <input class="form-control" type="text" name="prenom" id="prenom" />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="Adresse">Adresse du Client</label>
                            <input class="form-control" type="text" name="adresse" id="adresse" />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="telephone"> Telephone du Client</label>
                            <input class="form-control" type="text" name="telephone" id="telephone" />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">Email du Client</label>
                            <input class="form-control" type="text" name="email" id="email" />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="fidele"> Fidele Client</label>
                            <input class="form-control" type="text" name="fidele" id="fidele" />
                        </div>
                            <div class="form-group">
                            <input class="btn btn-theme" type="submit" name="Envoyer" id="envoyer" value="Envoyer"/>
                            <input class="btn btn-danger"  type="reset" name="Annuler" id="annuler" value="Annuler"/>
                        </div>
                    </div>
                </form>
          </div>
     </div>
 </div>
<!-- {{-- End Add Modal--}} -->

<!-- {{-- Start-Edit-Modal--}} -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Clients</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
                <form method="POST" action="/client/persist">
                    @csrf
                    <div class="modal-body">
                
                            <div class="form-group">
                            <label class="control-label" for="nom">Nom du Client</label>
                            <input class="form-control" type="text" name="nom" id="nom" />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="prenom">Prenom du Client</label>
                            <input class="form-control" type="text" name="prenom" id="prenom" />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="Adresse">Adresse du Client</label>
                            <input class="form-control" type="text" name="adresse" id="adresse" />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="telephone"> Telephone du Client</label>
                            <input class="form-control" type="text" name="telephone" id="telephone" />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">Email du Client</label>
                            <input class="form-control" type="text" name="email" id="email" />
                        </div>
                            <div class="form-group">
                            <input class="btn btn-theme" type="submit" name="Envoyer" id="envoyer" value="Envoyer"/>
                            <input class="btn btn-danger"  type="reset" name="Annuler" id="annuler" value="Annuler"/>
                        </div>
                    </div>
                </form>
          </div>
     </div>
 </div>
<!-- {{-- End Edit Modal--}} -->


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
                    Ajout des Clients
                </button>
                
                <br><br>
                
            
            
            <input class="search" id="search" placeholder=search...  type="search" name="search" class="form-control" autocomplete="off">
            <datalist id="trouve"></datalist>
        
       
            <br><br>

     <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> Liste des Clients</h4>
                <hr>
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOM</th>
                    <th scope="col">PRENOM</th>
                    <th scope="col">ADRESSE</th>
                    <th scope="col">TELEPHONE</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">FIDELE</th>
                     <th scope="col">Action</th>

                    </tr>
                </thead>
               <!--  <tfoot>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOM</th>
                    <th scope="col">PRENOM</th>
                    <th scope="col">ADRESSE</th>
                    <th scope="col">TELEPHONE</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">FIDELE</th>
                     <th scope="col">Action</th>

                    </tr>
                </tfoot> -->
                
                
                <tbody id="datatable1" >
                {{csrf_field() }}
                        @foreach($clients as $cl)
                            <tr>
                                <th>{{$cl->id}}</th>
                                <td>{{$cl->nom}}</td>
                                <td>{{ $cl->prenom }}</td>
                                <td>{{$cl->adresse}}</td>
                                <td>{{$cl->tel}}</td>
                                <td>{{$cl->email}}</td>
                                <td>{{$cl->fidele }}</td>
                                <td>
                                    <a href="" class="btn btn-theme" data-toggle="modal" 
                data-target="#editModal">EDIT</a>
                                    <a href="" class="btn btn-danger"data-toggle="modal" 
                data-target="#editModal" >DELETE</a>
                                </td>

                                
                        @endforeach
                </tbody>
                <tbody id="datatable2" >
                
                </tbody>
            </table>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script type="text/javascript">

$(document).ready(function (){
  $('#datatable2').hide()
   $('#search').keyup( function () {
   // $('#datatable1').Datatable()
    search = $('#search').val()
    base="http://127.0.0.1:8000/client/searchNom/"+search;

    $.ajax({
        headers: {
        'Access-Control-Allow-Origin': '*',
        "Content-Type": "text/html",
        },
        url: base ,
        type: "GET",
        dataType: "JSON",
        success: function (clients){
        /** var tables = '';
            $.each(data,function (key, value) {
                tables+='<tr>';
                tables+='<td>'+value.description_erreur+ '</td>';
                tables+='<td>'+value.description_traitement+ '</td>';
                tables+='</tr>';
            })

            $('#tbody').empty().html(tables); */
            //console.log(data)
            //alert(data)
            //console.log( )
            $('#datatable2').show()
            var tables = '';
            $.each(clients.data,function (key, value) {
                tables+='<tr>';
                tables+='<td>'+value.id+ '</td>';
                tables+='<td>'+value.nom+ '</td>';
                tables+='<td>'+value.prenom+ '</td>';
                tables+='<td>'+value.adresse+ '</td>';
                tables+='<td>'+value.tel+ '</td>';
                tables+='<td>'+value.email+ '</td>';
                tables+='<td>'+value.fidele+ '</td>';
                tables+='<td> <a href="" class="btn btn-success">EDIT</a> <a href="" class="btn btn-danger">DELETE</a></td>';
               
                tables+='</tr>';
            })
            $('#datatable2').empty().html(tables);
            $('#datatable1').hide()
            
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $('#datatable1').show()
            $('#datatable2').hide()
        }
    });
});


});



</script>
@endsection
@include('layouts.footer')