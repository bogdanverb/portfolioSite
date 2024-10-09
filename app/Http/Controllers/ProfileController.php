<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Метод для створення нового профілю
    public function create()
    {
        return view('profiles.create');
    }

    // Метод для збереження нового профілю
    public function store(Request $request)
    {
        // Валідація вхідних даних
        $request->validate([
            'full_name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'contact_info' => 'nullable|string',
            'social_links' => 'nullable|json',
        ]);

        // Створення профілю з даними
        Profile::create([
            'user_id' => Auth::id(), // Використовуємо Auth::id() для отримання ID користувача
            'full_name' => $request->full_name,
            'bio' => $request->bio,
            'contact_info' => $request->contact_info,
            'social_links' => $request->social_links,
        ]);

        // Переадресація на сторінку перегляду профілю після створення
        return redirect()->route('profiles.show', Auth::id());
    }

    // Метод для відображення профілю користувача
    public function show(Profile $profile)
    {
        // Отримуємо користувача, пов'язаного з профілем
        $user = $profile->user; // Доступ до користувача через відношення в моделі

        return view('profiles.show', compact('profile', 'user'));
    }

    // Метод для редагування профілю
    public function edit($id)
    {
        // Знаходимо профіль для редагування
        $profile = Profile::where('user_id', $id)->firstOrFail();
        return view('profiles.edit', compact('profile')); // Повертаємо форму редагування профілю
    }

    // Метод для оновлення профілю
    public function update(Request $request, $id)
    {
        // Валідація вхідних даних
        $request->validate([
            'full_name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'contact_info' => 'nullable|string',
            'social_links' => 'nullable|json',
        ]);

        // Знаходимо профіль для оновлення
        $profile = Profile::where('user_id', $id)->firstOrFail();

        // Оновлення даних профілю
        $profile->update([
            'full_name' => $request->full_name,
            'bio' => $request->bio,
            'contact_info' => $request->contact_info,
            'social_links' => $request->social_links,
        ]);

        // Переадресація на сторінку перегляду профілю з повідомленням про успішне оновлення
        return redirect()->route('profiles.show', $profile->user_id)->with('success', 'Профіль успішно оновлено!');
    }
}
