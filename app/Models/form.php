<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\rolltable;
use Illuminate\Database\Eloquent\SoftDeletes;


class form extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "form";
    protected $primarykey = "id";
    protected $fillable = [
        'id',
        'name',
        'email',
        'state',
        'gender',
        'hobbies',
        'roll',
        'image',
    ] ;

    public function hasOneRelationship()
    {
        return $this->hasOne(rollTable::class, 'id', 'roll'); // Correct the class name and add a semicolon
    }


}  
    
    

