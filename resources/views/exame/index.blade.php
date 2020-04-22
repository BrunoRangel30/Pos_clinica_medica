@extends('layouts.app')

@section('content')
    <div class='container'>
        <form>
            <div class='form-row'>
                <div class="col-md-5">
                    <label class="sr-only" for="inlineFormInputGroup">Pesquise o exame</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-search"></i></div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Pesquise o exame">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection