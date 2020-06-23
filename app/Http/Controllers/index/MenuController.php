<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
class MenuController extends Controller
{
    public function index(){
        return view("menu.index");
    }

    public function create(){
        return view("menu.create");

    }
    public function addcreate(Request $request){
        $da = $request->all();
        $data = [
            "name" => $da['name'],
            "hidden" => $da['hidden'],
            "sort" => $da['sort'],
            "createtime" => time(),
            "url"=>$da['url'],
        ];
        $res = Banner::insert($data);
        if($res){
            $message = [
                "success"=>true,
                "msg"=>"添加成功",
            ];
            echo json_encode($message);
        }else{
            $message = [
                "success"=>false,
                "msg"=>"添加失败",
            ];
            echo json_encode($message);
        }
    }
    public function addindex(){
        $res = Banner::where("hidden",1)->orderBy("sort","desc")->paginate(2);
        return view("menu.addindex",compact("res"));
    }
    // 删除
    public function dodel(Request $request){
        $id = $request->all();
        $res = Banner::where("id",$id)->update(["hidden"=>2]);
        if($res){
            $message = [
                "success"=>true,
                "msg"=>"删除成功",
            ];
            echo json_encode($message);
        }else{
            $message = [
                "success"=>false,
                "msg"=>"删除失败",
            ];
            echo json_encode($message);
        }
    }
    // 修改1
    public function connoisseuradd($id){
        
        $res = Banner::find($id);
        return view("menu.connoisseuradd",compact("res"));
    }
    public function update(Request $request){
        $data = $request->all();
        $res =  Banner::where("id",$data['id'])->update($data);
        if($res==1){
            $message = [
                "success"=>true,
                "msg"=>"修改成功",
            ];
            echo json_encode($message);
        }
        if($res==0){
            $message = [
                "success"=>false,
                "msg"=>"未修改",
            ];
            echo json_encode($message);
        }
    }
    public function updateajax(Request $request){
       $data = $request->all();
        $res = Banner::where("id",$data['id'])->update(['sort'=>$data['zi']]);
        if($res==1){
            $message = [
                "success"=>true,
                "msg"=>"修改成功",
            ];
            echo json_encode($message);
        }
    }
}
