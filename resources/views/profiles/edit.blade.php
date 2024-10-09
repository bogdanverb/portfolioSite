@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редагувати профіль</h1>
    <form action="{{ route('profiles.update', $profile->user_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="full_name">Повне ім'я</label>
            <input type="text" class="form-control" name="full_name" value="{{ $profile->full_name }}" required>
        </div>
        <div class="form-group">
            <label for="bio">Біографія</label>
            <textarea class="form-control" name="bio">{{ $profile->bio }}</textarea>
        </div>
        <div class="form-group">
            <label for="contact_info">Контактна інформація</label>
            <input type="text" class="form-control" name="contact_info" value="{{ $profile->contact_info }}">
        </div>
        <div class="form-group">
            <label for="social_links">Соціальні посилання (JSON)</label>
            <textarea class="form-control" name="social_links">{{ $profile->social_links }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Оновити</button>
    </form>
</div>
@endsection
