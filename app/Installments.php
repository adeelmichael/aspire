<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Installments extends Model
{
    protected $fillable = [
        'loan_id'
    ];

    protected $table = 'intallment';
}
