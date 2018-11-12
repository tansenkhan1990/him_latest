<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Session;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function userAdd()
    {
        return view('registration');
    }

    public function listUser()
    {

        //return view('showUser')->with('$post', $posts);
        //return view('showUser', ['posts' => $posts]);
    }

    public function deleteUser($id)
    {
        User::find($id)->delete();
        Session::flash('message', "User Successfully Deleted");
        return redirect()->back();
    }

 public function updateProfile(Request $request)
 {
     $this->validate($request, [
         'firstname' => 'required|string|max:255',
         'lastname' => 'required|string|max:255',
         'mobile' => 'required|string|max:255',
         'email' => 'required|string|email|max:255',
         'password' => 'required|string|min:6|confirmed',
     ]);



     //$postData = $request->all();
     //User::find($id)->update($postData);
     $user = Auth::user();
     $user->firstname = $request['firstname'];
     $user->lastname = $request['lastname'];
     $user->email = $request['email'];
     $user->mobile = $request['mobile'];
     $user->password = bcrypt($request['password']);
     $user->update();
     Session::flash('message', "Your Account successfully Updated");
     return redirect()->back();

 }
    public function getUpdateProfile(){
        return view('updateProfile');
    }
    public function showUser(){

        $posts = User::orderBy('id','desc')->get();
        return view('showUser', ['posts' => $posts]);

    }
    public function insertUser(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $email = $request['email'];
        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $mobile = $request['mobile'];
        $password = bcrypt($request['password']);

        //create new user - use App\User;
        $user = new User();
        $user->email = $email;
        $user->mobile = $mobile;
        $user->lastname = $lastname;
        $user->firstname = $firstname;
        $user->password = $password;
        $user->save(); //save to the db.
        //Auth::login($user);//login after register
        //$postData->save();
        Session::flash('message', "User Created successfully");
        return redirect()->back();
    }
}
