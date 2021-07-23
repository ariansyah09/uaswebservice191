<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barangs';
    protected $primaryKey = 'id';

    public $timestamps = false;
    protected $fillable = [ 'nama_barang','harga', 'kategori_id', 'keterangan'];

    public function kategori()
{
    return $this->belongsTo(Kategori::class, 'kategori_id');
}
}
