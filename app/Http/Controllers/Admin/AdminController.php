<?php

namespace App\Http\Controllers\Admin;

use App\Loans;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function createUsers()
    {
        return view('admin.users');
    }

    public function storeUsers(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->roles()->attach('2');

        return redirect('/admin/users')->with('status', 'User Created!!');
    }

    public function createLoans()
    {
        $users = User::where('id', '<>', Auth::user()->id)->get();
        //dd($users);
        return view('admin.loans', compact('users'));
    }

    public function storeLoans(Request $request)
    {
        $amount = (int)$request->amount;
        $interest = (int)$request->interest_rate/100;
        $rate = $amount*$interest;
        $total = $amount + $rate;
        $fee = $total + 500;
        $monthly_installment =  $fee/24;

        Loans::create([
            'user_id' => $request->users,
            'amount' => $request->amount,
            'duration' => $request->duration,
            'repayment_freq' => $request->frequency,
            'interest_rate' => $request->interest,
            'arrangement_fee' => $request->fee,
            'monthyly_installment' => $monthly_installment
        ]);

        return redirect('/admin/users/loans')->with('status', 'Successfully Created Loan');
    }

    public function checkUser($id)
    {
        $loan = Loans::where('user_id', $id)->first();

       return $loan;
    }
}
