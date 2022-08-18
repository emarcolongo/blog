@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('posts.create') }}" class="btn btn-sm btn-success float-right"><i class="fa-solid fa-circle-plus"></i> Criar Postagem</a>
            <h2>Postagens Blog</h2>
            <div class="clearfix">

            </div>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Autor</th>
                <th scope="col">Status</th>
                <th scope="col">Criado</th>
                <th scope="col">Acoes</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>
                        @if ($post->is_active)
                            <span class="badge badge-success">Ativo</span>
                        @else
                            <span class="badge badge-danger">Inativo</span>
                        @endif
                    </td>
                    <td>{{ date('d/m/Y H:i:s', strtotime($post->created_at)) }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('posts.show',[$post->id]) }}" class="btn btn-sm btn-primary" style="margin-right: 5px"> Editar</a>
                            <form action="{{ route('posts.destroy',[$post->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i> Remover</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nada encontrado !</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $posts->links('pagination::bootstrap-4') }}
@endsection