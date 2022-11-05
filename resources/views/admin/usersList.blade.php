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
                        <h3>Список пользователей</h3>
                        <ul class="list-group">
                            @forelse ($users as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center p-2">{{  $item->name }}
                                    <div>
                                        @if (!$item->is_admin)
                                        <a class="btn btn-outline-success me-md-2" type="button" href="/admin/users/addAdmin/{{ $item->id }}">Сделать администратором</a>
                                        @else
                                        <a class="btn btn-outline-danger" type="button" href="/admin/users/delAdmin/{{ $item->id }}">Убрать из администраторов</a>
                                        @endif
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item">Нет пользователей</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection


