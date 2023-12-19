<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable=['massage','reason_for_communication','email','name','phone'];

    public function getAllContacts()
    {
        return Contact::paginate(7);
    }
}
