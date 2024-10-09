@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $user->name }}'s Профіль</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Біографія</h5>
            <p class="card-text">{{ $profile->bio }}</p>
            <h5 class="card-title">Електронна пошта</h5>
            <p class="card-text">{{ $user->email }}</p>
            <div class="form-group">
                <label>Фото профілю:</label>
                @if ($profile->profile_image) <!-- Змінив на $profile, щоб відповідати структурі -->
                    <img src="{{ asset('storage/' . $profile->profile_image) }}" class="img-fluid" alt="Profile Image">
                @else
                    <p>Фото не завантажено.</p>
                @endif
            </div>
            <a href="{{ route('profiles.edit', $profile->user_id) }}" class="btn btn-warning">Редагувати профіль</a>
        </div>
    </div>
</div>
@endsection
