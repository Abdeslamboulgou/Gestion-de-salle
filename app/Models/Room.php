<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    use HasFactory;
    protected $table = 'rooms';
    protected $primaryKey = 'id';
    protected $fillable = ['name','id_owner','openingDate','closingDate','suspension','type'];


    public function user()
    {
        return $this->belongsTo(User::class, 'id_owner');
    }

    


}
