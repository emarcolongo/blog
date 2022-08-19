@extends('layouts.site')
@section('content')
    <div class="row">
        <div class="col-8">
            <div class="col-12">
                <h2>Postagens</h2>
                <hr>
            </div>
            @foreach ($posts as $post)
                <div class="col-12">
                    @if ($post->thumb)
                        <img src="{{ asset('storage/' . $post->thumb) }}" class="img-fluid" style="margim-bottom: 20px;">
                    @else
                        <img src="{{ asset('img/no-photo.jpg') }}" class="img-fluid" style="margim-bottom: 20px;">
                    @endif
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->description }}</p>
                    <a href="{{ route('site.single', [$post->slug]) }}"><i class="fa-brands fa-readme"></i> Leia mais...</a>
                    <hr>
                </div>
            @endforeach
            <div class="col-12">
                {{ $posts->links('pagination::bootstrap-4') }}
            </div>
        </div>
        <div class="col-4">
            <div class="col-12">
                <h2>Sidebar</h2>
                <hr>
            </div>
        </div>
    </div>
@endsection