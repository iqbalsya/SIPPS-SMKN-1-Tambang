<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanksiPelanggaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'akumulasi_poin',
    ];
}
