<?php

namespace App\Http\Controllers\payments;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\payments;
use App\cash;
use App\accounts;
use App\financial_year;
use App\head;
use App\month;
use DB;
use CH;
class payment extends Controller
{
    public function paymentlisting(){
    	$payments = payments::with('account')->get();
    	return view('pages.payments.payment_listing',compact('payments'));
    }

    public function addpaymentform(){
       
        $accounts  = accounts::all();
        $years     = financial_year::all();
        $heads     = head::all();
        $months    = month::all();
    	return view('pages.payments.add_payment_form',compact('accounts','years','heads','months'));
    }
    
    public function addpayment(Request $request){
        
        $payment = new payments;
        $payment->account_id = $request->account;
        $payment->debit = $request->amount;
        DB::table('accounts')->where('id',$request->account)->decrement('left_bal',$request->amount);
        if($request->paytype === "EX"){
            $payment->debit   = $request->amount;
            $payment->month_id = $request->month;
            $payment->exp_desc = $request->description;
            $payment->exp_desc = $request->description;
            $payment->exp_type_id = $request->headtype;
            $payment->exp_subhead_id = $request->subhead;
            $payment->type = "EXP";
        }
        if($request->salary == "checked"){
            $payment->employee_id = $request->employee;
        }
        $payment->financial_year = $request->fn_year;
        
        $payment->save();
        
    	return redirect()->to('payment/paymentlisting')->with('message','payment done successfully');
    }
    

    public function financialyear(){
        
        $years = financial_year::all();
        return view('pages.payments.financial_year_listing',compact('years'));
    }
    public function addfinancialyear(){
        return view('pages.payments.add_financial_year_form');
    }
    public function add_fnyear(Request $request){
        $request->validate(['fn_year' => 'required|unique:financial_year,year']);
        $year = new financial_year;
        $year->year = $request->fn_year;
        $year->save();
        return redirect()->to('payment/financialyear')->with('message','Record Added Successfully');
    }
    public function delete_year($id){
        $year = financial_year::find($id);
        $year->delete();
        return redirect()->to('payment/financialyear');
    }
    public function check_paid_amount(Request $request)
    {
        $voucher = voucher::find($request->voucher);
        return json_encode($voucher);
    }
    public function get_account_info(Request $request)
    {
        $account = accounts::find($request->id);
        return json_encode($account);
    }
}
