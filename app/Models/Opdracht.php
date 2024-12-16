<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Opdracht extends Model
{
    use HasFactory;

    // Specificeer de tabelnaam als het niet automatisch herkend wordt
    protected $table = 'Opdrachten';

    // Als er geen timestamps zijn in je tabel
    public $timestamps = false;
}
