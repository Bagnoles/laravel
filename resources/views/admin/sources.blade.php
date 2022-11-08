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
                        <h3>Источники</h3>
                        <ul class="list-group">
                            @forelse ($sources as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center p-2">{{  $item['link'] }}
                                    <div>
                                        <a class="btn btn-outline-danger" type="button" href="/admin/deleteSource/{{ $item['id'] }}">Удалить</a>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item">Нет источников</li>
                            @endforelse
                        </ul>
                        <a type="button" class="btn btn-outline-dark mt-3" href="/admin/sources/add">Добавить ссылку</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection


