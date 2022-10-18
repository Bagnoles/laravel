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
                        <h3>Форма добавления категории</h3>
                        <form action="/news/addCategory" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="name" value="" class="form-control" placeholder="Название категории" aria-label="Название категории" aria-describedby="basic-addon2">
                            </div>
                            <div class="input-group">
                                <input name="slug" class="form-control" aria-label="Name category (slug)" placeholder="Name category (slug)">
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
