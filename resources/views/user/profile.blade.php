@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="profile-user">
                
                    @if($user->image)
                    <div class='container-avatar'>
                        <img src="{{ route('user.avatar',['filename'=>$user->image])}}" 
                             class="avatar" />
                    </div>
                    @endif
                
                
                <div class="user-info">
                    <h1>{{ '@'.$user->nick }}</h1>
                    <h2>{{ $user->name.' '.$user->surname }}</h2>
                    <p>{{ 'Se unió '.$user->created_at->locale('es_ES')->diffForHumans(null, false, false, 1) }}</p>
                </div>
            </div>
            
            <div class="clearfix"></div>
            
            <hr/>
            
            <div class="clearfix"></div>
            
            @foreach($user->images as $image)
            @include('includes.image', ['image'=>$image])
            @endforeach

        </div>
    </div>
</div>
@endsection
