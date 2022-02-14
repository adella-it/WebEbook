<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gender;
use App\Models\Role;
use App\Models\Ebook;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
        public function __construct()
        {
            $this->middleware('auth');
        }

    public function index()
    {
        $id_account = Auth::user()->account_id;
        $ebook = Order::join('ebook', 'ebook.ebook_id', '=', 'order.id_ebook')
              		->join('account', 'account.account_id', '=', 'order.id_account')
                    ->where('id_account', $id_account)
              		->get();
        return view('cart', compact('ebook'));
    }
     public function detail($id)
    {
        $id_account = Auth::user()->account_id;
        $ebooks = Ebook::where('ebook_id', $id)->first();
        return view('detail', compact('ebooks'));
    }

    public function store(Request $request)
    {
        $id_buku = $request->id_buku;
        $id_user = Auth::user()->account_id;
        $tanggalnya = date('Y-m-d');
        $bukunya = Ebook::where('ebook_id', $id_buku)->first();
        $dataArray = array(
                'id_account' => $id_user,
                'id_ebook' => $bukunya->ebook_id,
                'order_date' => $tanggalnya
        );
        $do_order = Order::create($dataArray);
        if($do_order) {
            return redirect('order')->with("success", "Sewa Buku Berhasil");
        } else {
            return redirect('order')->with("failed", "Sewa Buku Gagal");
        }
    }

    public function remove(Request $request)
    {
        $id_ordernya = $request->id_order;
        $res = Order::where('order_id',$id_ordernya)->delete();
        if($res) {
            return redirect('order')->with("success", "Berhasil Hapus Buku");
        } else {
            return redirect('order')->with("failed", "Gagal Hapus Buku");
        }
    }
}
