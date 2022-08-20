<div class="col-12">
    <hr>
    <h3>Comentários</h3>
    <hr>
    <form action="{{ route('site.single.comment') }}" method="post">
        @csrf
        <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
        <div class="form-group">
            <label>Seu Comentário</label>
            <textarea name="comment" id="comment" class="form-control @error('comment') is-invalid @enderror" cols="30" rows="5">{{ old('comment') }}</textarea>
            @error('comment')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-sm btn-success"><i class="fa-solid fa-comment"></i> Enviar Comentário</button>
    </form>
</div>
@if ($post->comments->count())
<div class="col-12">
    <hr>
    <h3>Comentários</h3>
    <hr>
    @foreach ($post->comments()->orderBy('id','desc')->get() as $comment)
        <div class="col-12">
            <small>Comentários enviado em {{ date('d/m/Y H:i:s', strtotime($comment->created_at)) }}</small>
            <p>{{ $comment->comment }}</p>
        </div>
    @endforeach
</div>
@endif
