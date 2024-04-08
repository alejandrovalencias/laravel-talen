<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_path',
        'location',
        'industry',
        'user_id',
    ];

    public static function rules($id = null)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
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
