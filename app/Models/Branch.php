<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    
    protected $table = 'tblbranch';

    public function transactions() {
        return $this->hasMany(Transaction::class, 'branch_id', 'branch_id');
    }
}
