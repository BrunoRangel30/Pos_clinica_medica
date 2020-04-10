@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
        <div class="card-header">Editar o usuário {{$user->name}}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.users.update', $user) }}">
                    @csrf
                   {{ method_field('PUT') }}
                   @foreach ($roles as $item)
                    <div class='form-check'>
                            <input type='checkbox' name='roles[]' value='{{$item->id}}'
                            @if($user->roles->pluck('id')->contains($item->id)) checked @endif
                            >
                            <label>{{$item->nome}}</label>
                    </div>
                   @endforeach
                   <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection