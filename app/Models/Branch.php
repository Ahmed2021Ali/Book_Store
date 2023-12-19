<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    public $fillable=['status','address_detail','branch_number','city'];

    public function gatAllBranches()
    {
        return Branch::paginate(7);
    }
}
