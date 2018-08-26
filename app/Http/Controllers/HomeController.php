<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public $user;

    public function __construct(UserInterface $user)
    {
        $this->middleware('auth');
        $this->user=$user;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=$this->user->getUser();    
        return view('user')->with('users', $user);
    }


    public function upload(){
        return view('upload');
    }

    public function multiple(){        
        return view('multiple');
    }

    public function uploadfile(Request $r)
    {


            /*$img=$r->file('image');
            $name=$img->getClientOriginalName();
            $despath=public_path('/images/mynew');
            dd($img->move($despath,$name));*/

            $rules=[
                'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ];
            $this->validate($r,$rules);

            $image= $r->file('image');
            
            $image_name=time().'-'.pathinfo($image->getClientOriginalName(),PATHINFO_FILENAME).'.'.$image->getClientOriginalExtension();

            $input['user_id'] = Auth::user()->id;
            $input['imagename'] = $image_name;

            $destinationPath = public_path('/images/js');

            $image->move($destinationPath, $image_name);
            $this->user->upload($input);                        

            Session::flash('message',[  
                'msg'=>'Uploaded successfully.',
                'type'=>'alert-success'
            ]); 

            return back()->with('success','Image Upload successful');
    }


    public function multipleupload(Request $r){

            $images=$r->file('image');

            $i=0;
            foreach ($images as $img) {
                $name=$img->getClientOriginalName();
                $img->move(public_path('images'),$name);
                $data[$i]['imagename']=$name;
                $data[$i++]['user_id'] = Auth::user()->id;
            }
                        

            $this->user->upload($data);                       

            Session::flash('message',[  
                'msg'=>'Uploaded successfully.',
                'type'=>'alert-success'
            ]);           


            return back();  
    }


}
