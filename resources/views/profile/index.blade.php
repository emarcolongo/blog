@extends('layouts.app')
@section('content')
    <form action="profile.update" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="user[name]" id="user[name]" class="form-control" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label>E-Mail</label>
            <input type="text" name="user[email]" id="user[email]" class="form-control" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label>Senha</label>
            <input type="password" name="user[password]" id="user[password]" class="form-control" placeholder="Se deseja alterar sua senha, digite aqui a nova senha">
        </div>
        <div class="form-group">
            <label>Sobre</label>
            <textarea name="profile[about]" id="" cols="30" rows="10" class="form-control">{{ $user->profile->about }}</textarea>
        </div>
        <div class="form-group">
            <label>Facebook</label>
            <input type="text" name="profile[facebook_link]" id="profile[facebook_link]" class="form-control" value="{{ $user->profile->facebook_link }}">
        </div>
        <div class="form-group">
            <label>Instagram</label>
            <input type="text" name="profile[instagram_link]" id="profile[instagram_link]" class="form-control" value="{{ $user->profile->instagram_link }}">
        </div>
        <div class="form-group">
            <label>Site</label>
            <input type="text" name="profile[site_link]" id="profile[site_link]" class="form-control" value="{{ $user->profile->site_link }}">
        </div>        
        <div class="form-group">
            <button class="btn btn-sm btn-success"><i class="fa-solid fa-id-card-clip"></i> Atualizar Meu Perfil</button>
        </div>
    </form>    
@endsection