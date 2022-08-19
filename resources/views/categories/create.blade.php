@extends('layouts.app')
@section('content')
    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="Name">Nome</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
            @error('name')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="Description">Descricao</label>
            <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}">
        </div>
        <div class="form-group">
            <label for="Slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}">
        </div>
        <button class="btn btn-sm btn-success"><i class="fa-regular fa-circle-check"></i> Criar Categoria</button>
    </form>
@endsection