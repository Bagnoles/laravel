@extends('layouts.app')

@section('menu')
    @include('admin/menu')
@endsection



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Добавить источник</h3>
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">{{ $error }}</div>
                            @endforeach
                        @endif
                        <form action="/admin/sources/add" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="link" value="" class="form-control" placeholder="Введите ссылку" aria-label="Ссылка" aria-describedby="basic-addon2">
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection

