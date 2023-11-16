<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skripta extends Model
{
    use HasFactory;

    protected $table = 'skripte';
    protected $fillable = ['naslov', 'opis', 'datoteka'];

    
    public function kategorije()
    {
        return $this->belongsToMany(Kategorija::class, 'script_categories');
    }

    public function ocjene()
    {
        return $this->hasMany(Ocjena::class);
    }
}
