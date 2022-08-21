@extends('layouts.app')
@section('content')
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Titulo</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
            @error('title')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Descricao</label>
            <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}">
            @error('description')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="Content">Conteudo</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
            @error('content')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}">
        </div>
        <div class="form-group">
            <label for="Foto de Capa">Foto de Capa</label>
            <input type="file" name="thumb" id="thumb" class="form-control @error('thumb') is-invalid @enderror">
            @error('thumb')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="Category">Categorias</label>
            <div class="row">
                @foreach ($categories as $item)
                    <div class="col-2 custom-control custom-checkbox">
                        <label>
                            <input type="checkbox" name="categories[]" id="categories[]" class="custom-control-input @error('categories') is-invalid @enderror" value="{{ $item->id }}">
                            <label class="custom-control-label" for="categories[]">{{ $item->name }}</label>
                        </label>
                    </div>
                @endforeach                
            </div>
        </div>
        <button class="btn btn-sm btn-success"><i class="fa-regular fa-circle-check"></i> Criar Postagem</button>
    </form>
@endsection