<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyewaann extends Model
{
    protected $table = 'penyewaanns';
    protected $primaryKey = 'id';

    public $timestamps = false;
    protected $fillable = [ 'nama_penyewa','kategori_id', 'jumlah_barang', 'keterangan'];

    public function kategori()
{
    return $this->belongsTo(Kategori::class, 'kategori_id');
}

public function barang()
{
    return $this->belongsTo(Barang::class, 'kategori_id');
}
}
