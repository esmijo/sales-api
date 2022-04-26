<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'tbltransaction';

    public function branch() {
        return $this->belongsTo(Branch::class, 'branch_id', 'branch_id');
    }

    protected $appends = ['BranchName'];

    protected $hidden = ['branch'];

    public function getBranchNameAttribute () {
        return $this->attributes['BranchName'] = $this->branch->branch_name;
    }
}
