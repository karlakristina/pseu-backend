<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'kategorije';
    protected $fillable = ['naziv'];


    public function skripte()
    {
        return $this->belongsToMany(Skripta::class, 'script_categories');
    }
}
