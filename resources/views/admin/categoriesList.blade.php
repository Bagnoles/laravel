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
                        <h3>Категории новостей</h3>
                        <ul class="list-group">
                            @forelse ($categories as $category)
                                <li class="list-group-item d-flex justify-content-between align-items-center p-2">{{  $category['name'] }}
                                    <div>
                                        <a class="btn btn-outline-success me-md-2" type="button" href="/news/editCategory/{{ $category['id'] }}">Редактировать</a>
                                        <a class="btn btn-outline-danger" type="button" href="/news/deleteCategory/{{ $category['id'] }}">Удалить</a>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item">Нет категорий</li>
                            @endforelse
                        </ul>
                        <a type="button" class="btn btn-outline-dark mt-3" href="/news/addCategory">Добавить категорию</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection

