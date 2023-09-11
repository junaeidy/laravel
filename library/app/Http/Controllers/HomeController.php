<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Catalog;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(){

        
    }
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
        
        $total_anggota = Member::count();
        $total_buku = Book::count();
        $total_peminjaman = Transaction::whereMonth('date_start' , date('m'))->count();
        $total_penerbit = Publisher::count();

        $data_donut = Book::select(DB::raw("count(publisher_id) as total"))->groupBy('publisher_id')->orderBy('publisher_id', 'asc')->pluck('total');
        $label_donut = Publisher::orderBy('publishers.id', 'asc')->join('books', 'books.publisher_id', '=', 'publishers.id')->groupBy('publishers.name')->pluck('publishers.name');

        $label_bar = ['Peminjaman', 'Pengembalian'];
        $data_bar = [];

        foreach ($label_bar as $key => $value) {
            $data_bar[$key]['label'] = $label_bar[$key];
            $data_bar[$key]['backgroundColor'] = $key == 0   ? 'rgba(60,141,188,0.9)' : 'rgba(210, 214, 222, 1)';
            $data_month = [];

            foreach (range(1,12) as $month) {
                if ($key == 0) {
                    $data_month[] = Transaction::select(DB::raw("count(*) as total"))-> whereMonth('date_start', $month)->first()->total;
                } else{
                    $data_month[] = Transaction::select(DB::raw("count(*) as total"))-> whereMonth('date_end', $month)->first()->total;
                }
            }

            $data_bar[$key]['data'] = $data_month;
        }

        return view('home', compact('total_buku', 'total_anggota', 'total_peminjaman', 'total_penerbit', 'data_donut', 'label_donut', 'data_bar'));


        //$members = Member::with('user')->get();
        //$books = Book::with('publisher')->get();
        //$publishers = Publisher::with('books')->get;
        //$authors = Author::with('books')->get();
        //$catalogs = Catalog::with('books')->get();

        //no 1
        //$data = Member::select('*') ->join('users' , 'users.member_id', '=' , 'members.id')->get();

        //no 2
        //$data = Member::select('*')-> leftJoin('users' , 'users.member_id', '=' , 'members.id')->where('users.id', null)->get();

        //no 3
        //$data = Transaction::select('members.id', 'members.name')->rightJoin('members', 'members.id', '=', 'transactions.member_id')->where('transactions.member_id', null)->get();

        //no 4
            //$data = Member::select('members.id', 'members.name', 'members.phone_number')->join('transactions', 'transactions.member_id', '=', 'members.id')->orderBy('members.id', 'asc')->get();


        //return $data;
        return view('home');
    }
}
