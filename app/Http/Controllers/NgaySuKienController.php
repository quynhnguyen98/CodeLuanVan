<?php

namespace App\Http\Controllers;
use Session;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
class NgaySuKienController extends Controller
{
    public function ngay_su_kien(){
         $admin = Session::get('admin')->tendangnhap;
        if ($admin!='') {
			 return view('admin.event');
        }else{
		    return Redirect('/login_');
    
        }
    }

    public function index()
    {
        if(request()->ajax()) 
        {

         $data = DB::table('sukien')->get();
        
        return response()->json($data);
        }
        //dd( $data);
        return view('/fullcalendar');
    }
    
   
    public function store(Request $request)
    {  
        $insertArr = [ 'title' => $request->title,
                       'start' => $request->start,
                       
                    ];
        $event = DB::table('sukien')->insert($insertArr);   
        return response()->json($event);
    }
     
 
    public function update(Request $request)
    {   
        $where = array('id' => $request->id);
        $updateArr = ['title' => $request->title,'start' => $request->start];
        $event  =DB::table('sukien')->where($where)->update($updateArr);
 
        return response()->json($event);
    } 
 
 
    public function destroy(Request $request)
    {
        $event = DB::table('sukien')->where('id',$request->id)->delete();
   
        return response()->json($event);
    }    
}
