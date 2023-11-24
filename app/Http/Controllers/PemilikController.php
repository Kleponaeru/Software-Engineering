<?php

namespace App\Http\Controllers;

use App\Models\PemilikSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PemilikController extends Controller
{


    public function Pemilik()
    {
        $orders = PemilikSampah::orderBy('id', 'desc')->paginate(5);
        return view('dashboard_pemilik', ['orders' => $orders]);
    }

    public function formPesanan()
    {
        return view('pesanan_pemilik');
    }
    public function postPesanan(Request $request)
    {
        PemilikSampah::create([
            'kg_sampah'=>$request->kg_sampah,
            'jam'=>$request->jam,
            'status' =>$request->status,
        ]);
        return redirect("/dashboard/pemilik");
    }
    public function profilepengambil()
    {
        $username = Auth::User()->username ?? '';
        $user = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        return view('profile_pemilik', ['result' => $result, 'user'=>$user]);
    }

    public function delete($id)
    {
        $n = PemilikSampah::find($id);
        $n->delete();
        return redirect("/dashboard/pemilik");
    }

    public function update($id,Request $request)
    {
        $n = PemilikSampah::find($id);
        $n->kg_sampah = $request->kg_sampah;
        $n->jam = $request->jam;
        $n->status = $request->status;
        $n -> save();

        return redirect("/dashboard/pemilik");
    }

    public function formedit($id)
    {
        $n = PemilikSampah::find($id);
        return view('editpesanan_pemilik', ['n'=>$n]);
    }

}