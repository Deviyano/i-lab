<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['quiz_id', 'type', 'text', 'options'];

    protected $casts = [
        'options' => 'array', // Zorg ervoor dat de opties als JSON worden opgeslagen
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
