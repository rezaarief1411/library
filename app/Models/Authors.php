<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Authors extends Model
{

    public $timestamps = false;
    
    use HasFactory;

    protected $table = "authors";

    protected $fillable = ['id','name','bio','birth_date'];
    

}
