<!-- resources/views/portfolios/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Додати Портфоліо</h1>

    <form action="{{ route('portfolios.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Назва</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Опис</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Зберегти</button>
    </form>
</div>
@endsection
