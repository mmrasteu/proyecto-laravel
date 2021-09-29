@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Subir nueva imagen </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('image.save') }}" enctype="multipart/form-data">
                       
                        @csrf
                        <div class="form-group row">
                            <label for="image_path" class="col-md-3 col-form-label text-md-right">{{ __('Imagen') }}</label>
                            <div class="col-md-7">
                                <input id="image_path" type="file" name="image_path" class="form-control @error('image_path') is-invalid @enderror" required/>
                                @error('image_path')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="description" class="col-md-3 col-form-label text-md-right">{{ __('Descripción') }}</label>
                            <div class="col-md-7">
                                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" required>
                                </textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3">
                                <input type="submit" value="Subir imagen" class="btn btn-primary" required/>
                            </div>
                        </div>
                    </form>
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection