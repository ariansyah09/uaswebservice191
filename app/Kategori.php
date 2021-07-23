<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id';

    public $timestamps = false;
    protected $fillable = [ 'nama_barang','description'];

    public function barang()
{
    return $this->hasMany(Barang::class );
}
}
