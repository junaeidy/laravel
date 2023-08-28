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
