<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Books extends Model
{

    public $timestamps = false;
    
    use HasFactory;

    protected $table = "books";

    protected $fillable = ['id','title','description','pubilsh_date','author_id'];
    

}
