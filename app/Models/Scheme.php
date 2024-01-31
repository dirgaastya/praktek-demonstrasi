<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
    use HasFactory;
    protected $table = 'schemes';
    protected $primaryKey = 'kd_skema';
    public $incrementing = false;
    protected $fillable = [
        'kd_skema','nm_skema', 'jenis','jml_unit'
    ];
}
