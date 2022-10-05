<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenety extends Model
{
    use HasFactory;
    protected $table="ameneties";
    protected $fillable = ['id','name', 'status'];
    public $timestamps=false;

}
