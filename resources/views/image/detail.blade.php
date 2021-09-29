@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.message')
            
                <div class="card pub_image pub_image_detail">
                    <div class="card-header">
                        @if($image->user->image)
                            <div class='container-avatar'>
                                <img src="{{ route('user.avatar',['filename'=>$image->user->image])}}" 
                                                                                        class="avatar" />
                            </div>
                        @endif
                        <div class="data-user">
                            {{ $image->user->name.' '.$image->user->surname }}
                            <span class="nickname">{{' | @'.$image->user->nick}}</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="image-container image-detail">
                            <img src="{{ route('image.file',['filename'=>$image->image_path]) }}" />
                        </div>
                        
                        <div class="description">
                            <span class="nickname">{{ '@'.$image->user->nick }}</span>
                            <p>{{ $image->description }}</p>
                        </div>
                        
                        <div class="likes">
                            <img src="{{ asset('img/hearts-black.png') }}" />
                        </div>
                        
                        <div class="clearfix"></div>
                        <div class="comments">
                            <h2>Comentarios ({{ count($image->comments) }}) </h2>
                            <hr>
                            
                            <form method="POST" action="" >
                                @csrf
                                
                                <input type="hidden" name="image_id" value="{{$image->id}}" />
                                <p><textarea class="form-control" name="content" required></textarea></p>
                                <button type="submit" class="btn btn-success">
                                    Enviar
                                </button>
                            </form>     
                            
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
