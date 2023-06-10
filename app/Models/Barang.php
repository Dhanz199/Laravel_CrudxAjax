<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = "barang";
    protected $primaryKey = "id";
    protected $fillable = ['no_rfq', 'tanggal', 'description', 'harga_pokok', 'nama_toko', 'contact_person', 'alamat_toko'];
}
