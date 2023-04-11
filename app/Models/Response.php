<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;
    protected $fillable =[
        'pegadaian_id',
        'status',
        'pesan',
        'date',
    ];
    public function pegadaian()
    {
        return $this->belongsTo(Pegadaian::class);
    }
    
}
