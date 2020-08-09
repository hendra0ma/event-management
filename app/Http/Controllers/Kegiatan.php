<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\KegiatanModel;
use Session;

class Kegiatan extends Controller
{
    public function insert(Request $req)
    {
        $this->validate($req,[
            "nama" => 'required|min:5|max:20',
         ]);
         KegiatanModel::insert([
            "nama_kegiatan"=> $req->input("nama"),
            "event_models_id"=>$req->input("idEvent")
        ]);
        Session::flash("success","event berhasil di tambahkan");
        return redirect ("/home");
    }
    public function delete($id)
    {
        Session::flash("success","event berhasil di delete");    
        KegiatanModel::where("id",$id)->delete();
        return redirect("/home");
    }
    public function update(Request $req,$id)    
    {
        KegiatanModel::where("id",$id)->update([
            "event_models_id"=> $req->input("id")
        ]);
        return redirect("/home");
    }
}
