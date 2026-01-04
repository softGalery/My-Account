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
    }
    public function addAsset()
    {
        return view('backend.Asset-page.asset-add');
    }

   public function create(Request $request)
   {
//       dd($request->all());
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',
            'price'=> 'required'
        ]);
       $userId = $request->user()->id;
       return Asset::create([            'user_id' => $userId,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'price' => $request->input('price')
        ]);
   }
}
