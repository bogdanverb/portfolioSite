<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'bio',
        'contact_info',
        'social_links',
        'profile_image', // Не забудьте додати поле для зображення профілю
    ];

    // Відношення до моделі User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
