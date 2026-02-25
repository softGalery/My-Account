<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function index(){
        return view('backend.pages.income-page.index');
    }
    public function list()
    {
        $user_id = Auth::user()->id;
        return Income::where('user_id', $user_id)->get();
    }
    public function incomeById(Request $request)
    {
        $user_id = Auth::user()->id;
        $income_id = $request->input('id');
        return Income::where('id', $income_id)->where('user_id', $user_id)->first();
    }
    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',
            'amount' => 'required',
        ]);
        $user_id = Auth::user()->id;
        return Income::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'amount' => $request->input('amount'),
            'user_id' => $user_id,
        ]);
    }
}
