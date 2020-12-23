@extends('layouts.template')
@include('layouts.nav')
@section('content')
  <div class="mt">

    <div class="col-md-12">
            <div class="content-panel">

              <div class="row">
                  <div class="col-md-3 " >
                       <p class="centered"><img src="{{ asset('template/img/user.jpg') }}" class="img-circle" width="90%"></p>
                       <h1 class="centered">{{ Auth::user()->name }} </h1>
                  </div>
                      
                  <div class="col-md-3 mt">
                        <h1>NOM</h1>
                        <h3>{{ Auth::user()->name }}</h3>           
                  </div>
     
                  <div class="col-md-2 mt">
                        <h1>PROFIL(S)</h1>
                        <h3>{{implode(', ',Auth::user()->profils()->get()->pluck('status')->toArray())}}</h3>           
                  </div>
                  <div class="col-md-4 mt">
                          <a class="but " style="float: right; margin-right: 5%;" href="{{ route('set-password') }}">{{ __('Modifier  mot de passe') }}</a>
                   </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                        <a class="but " style="float: right; margin: 1%; " href="{{ route('home') }}"onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Deconnexion') }}</a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                      
                </div>
              </div>
            </div>
              <!-- /content-panel -->
    </div>
     <!-- /col-md-12 -->
 </div>

<style>
.but {
    display: flex;
    -webkit-box-align: center;
    align-items: center;
    -webkit-box-pack: center;
    justify-content: center;
    font-family: "Nunito Sans", sans-serif;
    font-size: 1.6rem;
    line-height: 2.4rem;
    font-weight: 700;
    text-decoration: none;
    padding: 10px 24px;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.2s ease 0s;
    border: 2px solid #4ECDC4;
    background-color: rgb(255, 255, 255);
    color: rgb(80, 77, 193);
   }
 
 </style>
@endsection
@include('layouts.footer')