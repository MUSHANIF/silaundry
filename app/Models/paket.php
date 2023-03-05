<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paket extends Model
{
    use HasFactory;

    public function pakets()
    {
        return $this->hasMany(transaksi::class, 'paketid', 'id');
    }
}
