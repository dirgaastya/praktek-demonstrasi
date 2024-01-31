<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $table = 'participants';
    protected $primaryKey = 'id_peserta';
    protected $fillable = [
        'kd_peserta','kd_skema','nm_peserta', 'jekel','alamat','no_hp'
    ];

    public function scheme()
    {
        return $this->belongsTo(Scheme::class, 'kd_skema', 'kd_skema');
    }
}
