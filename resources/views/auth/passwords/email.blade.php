@extends('layouts.layout_login')
<style>
  .sombraBotao{
        padding-left:15px;
        padding-right: 15px;
        padding-top: 5px;
        padding-bottom: 5px;
        border: solid 1px #183153;
        border-radius: 8px;
        background-color:#ffd43b;
        color: #214450;
        /* font-family: 'roundproblackegular'; /* fonte */
        font-weight: 700;
        font-size: 1em;
         /* text-transform: uppercase;*/
        -webkit-box-shadow: 0 0.375em 0 currentColor !important;
    }
    body{

        background-color: #fff !important;
    }

    .linkLogin{
        color: #183153 !important;
        padding-left: 20px !important;

    }
    .top .senha{
        margin-top:5%;
    }
    .header .card-header{
        color: #ffd43b !important;
        font-size: 1.1em !important;
        font-weight: 700 !important;
        background-color: #183153
    }
    .senha .card{
        border: solid 1px #183153;
        border-radius: 8px;
    }
</style>
@section('content-login')
<div class="container top">
    <div class="row justify-content-center">
        <div class="col-md-8 senha">
            <div class="card header">
                <div class="card-header">{{ __('Resetar Senha') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="sombraBotao">
                                    {{ __('Enviar link para redefinir a senha') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
