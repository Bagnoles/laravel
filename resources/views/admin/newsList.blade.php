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
                        <h3>Список новостей</h3>
                        <ul class="list-group">
                            @forelse ($news as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center p-2">{{  $item->title }}
                                    <div>
                                        <a class="btn btn-outline-success me-md-2" type="button" href="/news/editNews/{{ $item->id }}">Редактировать</a>
                                        <a class="btn btn-outline-danger" type="button" href="/news/deleteNews/{{ $item->id }}">Удалить</a>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item">Нет новостей</li>
                            @endforelse
                        </ul>
                        <div class="d-flex justify-content-start mt-3">
                            {!! $news->links() !!}
                        </div>
                        <a type="button" class="btn btn-outline-dark mt-3" href="/news/add">Добавить новость</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection

