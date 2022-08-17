<form action="{{ route('posts.update', $post->id) }}" method="post">
    @csrf
    @method("PUT")
    <div class="form-group">
        <label for="title">Titulo</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
    </div>
    <div class="form-group">
        <label for="description">Descricao</label>
        <input type="text" name="description" id="description" class="form-control" value="{{ $post->description }}">
    </div>
    <div class="form-group">
        <textarea name="" id="content" cols="30" rows="10" class="form-control">{{ $post->content }}</textarea>
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" name="slug" id="slug" class="form-control" value="{{ $post->slug }}">
    </div>
    <button class="btn btn-lg btn-success">Atualizar Postagem</button>
    <form action="{{  route('posts.destroy',[$post->id]) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Remover Post</button>
    </form>
</form>