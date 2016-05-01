<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rekeningbank extends Model
{
    public $table = "rekeningbank";
  	
  	protected $fillable = ['lembagaID', 'namarekening1', 'nomorrekening1', 'namarekening2', 'nomorrekening2', 'namarekening3','nomorrekening3', 'namarekening4', 'nomorrekening4'];
  	
  	protected $primaryKey = 'idrekening';
}
