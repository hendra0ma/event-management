<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\EventModels;
use Session;
use Carbon\Carbon;
class Event extends Controller
{
    public function index()
    {
        $data = EventModels::all();
        return view("home.index",["data"=>$data]);
    }
    public function insert(Request $req)
    {
        $this->validate($req,[
            "nama" => 'required|min:5|max:20',
            "tanggal" => "required",
         ]);
         EventModels::insert([
            "nama"=> $req->input("nama"),
            "tanggal"=> $req->input("tanggal"),
        ]);
        Session::flash("success","event berhasil di tambahkan");
        return redirect ("/home");
    }
    public function update(Request $req,$id)
    {
        $this->validate($req,[
            "nama" => 'required|min:5|max:20',
            "tanggal" => "required",
         ]);
         EventModels::where("id",$id)->update([
            "nama"=> $req->input("nama"),
           "tanggal" => $req->input('tanggal'),
            "updated_at"=>Carbon::now()
        ]);
        Session::flash("success","event berhasil di update");
        return redirect('/home');
    }
    public function delete($id)
    {
        Session::flash("success","event berhasil di delete");    
        EventModels::where("id",$id)->delete();
        return redirect("/home");
    }
}
