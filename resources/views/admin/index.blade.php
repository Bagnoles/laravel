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
                        <h3>Точка входа админа</h3>
                        <a class="btn btn-primary" href="/admin/parser" role="button">Парсинг новостей (спорт)</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection
