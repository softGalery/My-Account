<?php

namespace App\Http\Controllers;

use App\Models\Liability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LiabilityController extends Controller
{
    public function index(){
        return view('backend.pages.Liabilities-pages.index');
    }

    public function list()
    {
        $user_id = auth::id();
        return Liability::where('user_id', $user_id)->get();
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'type' => 'required',
            'amount' => 'required|numeric|min:1',
        ]);
            $userId = $request->user()->id;
            return Liability::create([
               'user_id' => $userId,
               'name' => $request->input('name'),
               'description' => $request->input('description'),
               'type' => $request->input('type'),
               'amount' => $request->input('amount'),
            ]);
    }

    public function deleteLiability(Request $request)
    {
        $user_id = $request->user()->id;
        $id = request('id');
        return Liability::where('user_id', $user_id)->where('id', $id)->delete();
    }

    public function LiabilityByID(Request $request)
    {
        $user_id = $request->user()->id;
        $id = request('id');
        return Liability::where('user_id', $user_id)->where('id', $id)->first();
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'type' => 'required',
            'amount' => 'required|numeric|min:1',
        ]);
        $userId = $request->user()->id;
        $id = $request->input('id');
        return Liability::where('user_id', $userId)->where('id', $id)->update([
            'user_id' => $userId,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'amount' => $request->input('amount'),
        ]);
    }

}
