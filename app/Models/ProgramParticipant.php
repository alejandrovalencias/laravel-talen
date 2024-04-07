<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramParticipant extends Model
{
    use HasFactory;
    protected $fillable = ['program_id', 'entity_type', 'entity_id'];

    public function participant()
    {
        return $this->morphTo('entity', 'entity_type', 'entity_id');
    }
}
