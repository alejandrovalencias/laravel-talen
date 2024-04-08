<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Challenge extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'difficulty',
        'user_id',
    ];

    public static function rules($id = null)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'difficulty' => 'required|integer', 
            'user_id' => 'required|exists:users,id',
        ];

        if ($id) {
            $rules['user_id'] = 'sometimes|required|exists:users,id'; 
        }

        return $rules;
    }

    public function user()
    {
        return $this->belongsTo(User::class); 
    }
}
