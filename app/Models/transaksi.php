<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    public function paket()
    {
        return $this->belongsTo(paket::class, 'paketid', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'userid', 'id');
    }
}
