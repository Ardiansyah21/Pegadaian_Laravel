<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegadaian extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'email',
        'age',
        'no_tlp',
        'item',
        'nik',
        'foto',
    ]; 

    public function response()
    {
        return $this->hasOne(Response::class);
    }
}
