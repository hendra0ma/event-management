<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PeralatanModel;
use Session;

class Peralatan extends Controller
{
    public function index()
    {
        $data = PeralatanModel::all();
        return view("peralatan.index",["data"=>$data]);
    }
    public function insert(Request $req)
    {
        $this->validate($req,[
            "nama" => 'required|min:5|max:20',
            "jumlah" => "required",
         ]);
         PeralatanModel::insert([
            "nama"=> $req->input("nama"),
            "jumlah"=> $req->input("jumlah"),
        ]);
        Session::flash("success","event berhasil di tambahkan");
        return redirect ("/home/peralatan");
    }
    public function update(Request $req,$id)
    {
        $this->validate($req,[
            "nama" => 'required|min:5|max:20',
            "jumlah" => "required",
         ]);
         PeralatanModel::where("id",$id)->update([
            "nama"=> $req->input("nama"),
           "jumlah" => $req->input('jumlah')
        ]);
        Session::flash("success","event berhasil di update");
        return redirect('/home/peralatan');
    }
    public function delete($id)
    {
        Session::flash("success","event berhasil di delete");    
        PeralatanModel::where("id",$id)->delete();
        return redirect("/home/peralatan");
    }
}
