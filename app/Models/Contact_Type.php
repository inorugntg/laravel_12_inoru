<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_Type extends Model
{
    use HasFactory;

    protected $guarded=[];
    
    protected $table = "Contact_Types";

    public function contact(){
        return $this->hasMany(Contact::class);
    }
}
