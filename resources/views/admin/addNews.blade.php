@extends('layouts.main')

@section('menu')
    @include('admin/header')
@endsection

@section('content')
    <h3>Форма добавления новости</h3>
    <form>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Заголовок новости" aria-label="Заголовок новости" aria-describedby="basic-addon2">
        </div>
        <div class="input-group">
            <textarea class="form-control" aria-label="Текст новости"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Добавить</button>
    </form>
@endsection

@section('footer')
    @include('footer')
@endsection
