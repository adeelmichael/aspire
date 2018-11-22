<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    protected $fillable = [
        'user_id',
        'amount',
        'duration',
        'repayment_freq',
        'interest_rate',
        'arrangement_fee',
        'monthyly_installment'
    ];

    protected $table = 'loan_plan';

}
