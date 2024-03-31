<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.cashier.home', [
            'title' => 'Dashboard Kasir'
        ]);
    }

    public function success($id)
    {
        return view('pages.cashier.success', [
            'title' => 'Transaksi Sukses',
            'transaction' => Transaction::find($id)
        ]);
    }
}
