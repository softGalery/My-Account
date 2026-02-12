<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetController extends Controller
{
    public function index()
    {
        return view('backend.Asset-page.index');
//        return view('welcome');
    }

    public function assetsList()
    {
        $user_id = Auth::id();
        return Asset::where('user_id', $user_id)->get();
    }

   public function create(Request $request)
   {
//       dd($request->all());
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',
            'price'=> 'required|numeric:'
        ]);
       $userId = $request->user()->id;
       return Asset::create([
           'user_id' => $userId,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'price' => $request->input('price')
        ]);
   }

    public function assetDelete(Request $request)
    {
        $user_id = Auth::id();
        $assets_id = $request->input('id');
        return Asset::where('user_id', $user_id)->where('id', $assets_id)->delete();
    }
    public function assetUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',
            'price'=> 'required|numeric:'
        ]);
        $user_id = Auth::id();
        $assets_id = $request->input('id');
        return Asset::where('user_id', $user_id)->where('id', $assets_id)->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'price' => $request->input('price')
        ]);
    }

}
