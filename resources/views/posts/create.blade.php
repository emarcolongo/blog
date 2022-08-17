@extends('layouts.app')
@section('content')
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Titulo</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Descricao</label>
            <input type="text" name="description" id="description" class="form-control">
        </div>
        <div class="form-group">
            <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <input type="text" name="slug" id="slug" class="form-control">
        </div>
        <div class="form-group">
            <label for="Category">Categorias</label>
            <div class="row">
                @foreach ($categories as $item)
                    <div class="col-2 checkbox">
                        <label>
                            <input type="checkbox" name="categories[]" id="categories[]" value="{{ $item->id }}"> {{ $item->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        <button class="btn btn-sm btn-success"><i class="fa-regular fa-circle-check"></i> Criar Postagem</button>
    </form>
@endsection