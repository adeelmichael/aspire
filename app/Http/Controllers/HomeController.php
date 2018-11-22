<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Loans;
use App\Installments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $loans = Loans::where('user_id', $id)->get();

        return view('home', compact('loans'));
    }

    public function payLoan(Request $request)
    {
        if($this->checkPayment()){
            return redirect()->back()->with('status', 'Installment already Paid');
        }else{
            Installments::create([
                'loan_id' => $request->loan_id
            ]);
        }
        return redirect()->back()->with('status', 'Installment Paid');
    }

    public function checkPayment()
    {
        $date = \Carbon\Carbon::now();
        $month = $date->month;
        $year = $date->year;

        $check = DB::table("intallment")
            ->whereMonth('created_at', '=', $month)
            ->select('created_at')
            ->first();

        return $check;
    }
}
