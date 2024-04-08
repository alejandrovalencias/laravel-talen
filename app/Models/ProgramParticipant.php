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
        $table = '';
        switch ($en) {
            case 'user':
                $table = 'users';
                break;
            case 'company':
                $table = 'companies';
                break;
            case 'challenge':
                $table = 'challenges';
                break;
                default:
                $table = $en;
        }
        $rules = [
            'program_id' => 'required|exists:programs,id',
            'entity_type' => 'required|string|in:user,challenge,company',
            'entity_id' => 'required|exists:' . $table . ',id'
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
