<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'user_id',
    ];

    public static function rules($id = null)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date|before:end_date', 
            'end_date' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ];

        return $rules;
    }

    public function user()
    {
        return $this->belongsTo(User::class); 
    }
}
