<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Faq;
use App\Http\Requests\FaqFormPost;
use App\Http\Requests\ChangePasswordForPost;
use Carbon\Carbon;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); //login check
        $this->middleware('verified'); //rmail verify chack
        $this->middleware('checkrole'); //role cheker
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $loggedin_user_id = Auth::id();
        $users = User::where('id', '!=', $loggedin_user_id)->orderBy('id', 'desc')->paginate(3);
        $total_users = User::count();
        return view('home', compact('users', 'total_users'));
    }

    public function addfaq()
    {
        $soft_deleted_faqs = Faq::onlyTrashed()->get();
        $faqs = Faq::all();
        return view('admin.addfaq', compact('soft_deleted_faqs', 'faqs'));
    }

    public function addfaqpost(FaqFormPost $request)
    {


        Faq::insert([
            'faq_question' => $request->faq_question,
            'faq_answer' => $request->faq_answer,
            'created_at' => Carbon::now()
        ]);
        return back()->with('status', 'Your Faq Added Successfully!');
    }

    public function faqdelete($faq_id)
    {
        Faq::find($faq_id)->delete();
        return back()->with('deletestatus', 'Deleted Succesfully!');
    }

    public function faqedit($faq_id)
    {
        $faq = Faq::find($faq_id);
        return view('admin.editfaq', [
            'faq' => $faq
        ]);
    }

    public function faqeditpost(Request $request)
    {
        Faq::find($request->faq_id)->update([
            'faq_question' => $request->faq_question,
            'faq_answer' => $request->faq_answer,

        ]);
        return back();
    }

    public function faqrestore($faq_id)
    {
        Faq::withTrashed()->where('id', $faq_id)->restore();
        return back();
    }
    public function faqharddelete($faq_id)
    {
        Faq::withTrashed()->where('id', $faq_id)->forceDelete();
        return back();
    }

    public function editprofile()
    {
        return view('admin.editprofile');
    }

    public function changepassword(ChangePasswordForPost $request)
    {
        if ($request->old_password == $request->password) {
            return back()->withErrors('your new password can not be your old password!');
        } else {
            $old_password = $request->old_password;
            $db_password = Auth::user()->password;
            if(Hash::check($old_password, $db_password)){
               
                User::find(Auth::id())->update([
                    'password' => Hash::mack($request->password)
                ]);
                return back()->with('password_change_success', 'Your password change Sucesfully!');
            }
            else{
                return back()->withErrors('your old password is not right!');
            }
        }
    }
}
