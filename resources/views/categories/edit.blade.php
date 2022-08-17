@extends('layouts.app')
@section('content')
    <form action="{{ route('categories.update',[$category->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Name">Nome</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}">
        </div>
        <div class="form-group">
            <label for="Description">Descricao</label>
            <input type="text" name="description" id="description" class="form-control" value="{{ $category->description }}">
        </div>
        <div class="form-group">
            <label for="Slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ $category->slug }}">
        </div>
        <button class="btn btn-sm btn-success"><i class="fa-regular fa-circle-check"></i> Atualizar Categoria</button>
    </form>
@endsection