<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramParticipant extends Model
{
    protected $fillable = [
        'program_id',
        'entity_type',
        'entity_id',
    ];

    public static function rules($id = null)
    {
        $rules = [
            'program_id' => 'required|exists:programs,id',
            'entity_type' => 'required|string|in:user,challenge,company',
        ];
        return $rules;
    }

    public static function rulesEntity($en = null)
    {
        $rules = [
            'program_id' => 'required|exists:programs,id',
            'entity_type' => 'required|string|in:users,challenges,companies',
            'entity_id' => 'required|exists:' . $en . ',id'
        ];
        return $rules;
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function entity()
    {
        return $this->morphTo();
    }

}
