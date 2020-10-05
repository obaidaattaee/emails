<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\User\EditRequest;
use App\Http\Requests\User\UserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Link;
use App\Models\UserLink;
use App\Http\Requests\ChangePasswordRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function status($id){
        $user = User::find($id);
        if($user){
            $user->update(['is_active'=>!$user->is_active]);
            session()->flash("msg", "s: Status updated Successfully");
            return redirect(route("users.index"));
        }
    }
    public function index(Request $request)
    {
        //$links = auth()->user()->links;
        //dd($links);
        //$admin = User::find(4);
        //$link = Link::find(1);
        //dd($link->users);
        $q=$request->get("q")??"";
        $role = $request->get("role")??"";

        $users=User::whereRaw('true');
        if($role){
            $users->whereRaw('id in (select model_id from model_has_roles where model_id=users.id
            and role_id =?)',$role);
        }

        if($q){
            $users->where("name","like","%$q%");
        }
        $users=$users->orderBy('id','desc')->paginate(10)->appends(["q"=>$q,]);
        return view("admin.user.index")->with("users",$users);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        return view("admin.user.create")->withUsers($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $request['password']=bcrypt($request['password']);
        $user = User::create($request->all());
        $user->assignRole('admin');

        session()->flash("msg", "s: Created Successfully");
        return redirect(route("users.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $users = User::find($id);
        if(!$users){
            session()->flash("msg", "e: User was not found");
            return redirect(route("users.index"));
        }

           return view("admin/user.show")->withuser($users);
    }


    public function edit($id)
    {

        $users = User::find($id);
        if($users==null){
            session()->flash("msg", "e: USer was not found");
            return redirect(route("users.index"));
        }

           return view("admin/user.edit")->withusers($users);
    }


    public function update(UserRequest $request, $id)
    {
        $request['password'] = bcrypt($request['password']);
        User::find($id)->update($request->all());
        session()->flash("msg", "i:User Updated Successfully");
        return redirect(route("users.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(!$user){
            session()->flash("msg", "e: USer was not found");
            return redirect(route("users.index"));
        }
        if($user->id == auth()->user()->id){
            session()->flash("msg", "w: You can't delete logged in user");
            return redirect(route("users.index"));
        }
        $user->delete();
        session()->flash("msg", "w:User Deleted Successfully");
        return redirect(route("users.index"));
    }
    public function changePassword(){
        return view('admin.user.change_password');
    }
    public function postChangePassword(ChangePasswordRequest $request){
        $hasher = app('hash');
        if ($hasher->check($request->current_password, auth()->user()->password)) {
            // Success
            $user = User::find(auth()->user()->id);
            $user->update(['password'=>bcrypt($request->new_password)]);
            session()->flash("msg", "s:Password updated Successfully");
            return redirect(route("change-password"));
        }
        else{
            session()->flash("msg", "e:Invalid Current Password");
            return redirect(route("change-password"));
        }
    }


    public function permissions($id)
    {
        $user = User::find($id);
        if(!$user){
            session()->flash("msg", "e: User was not found");
            return redirect(route("users.index"));
        }
        return view("admin/user.permissions")
            ->withuser($user)
            ->withLinks(Link::all());
    }

    public function postPermissions(Request $request, $id){
        //delete all current permissios for this user
        UserLink::where("user_id", $id)->delete();
        if(!empty($request['permissions'])){
            foreach($request->permissions as $permission){
                UserLink::create([
                    'user_id' => $id,
                    'link_id' => $permission
                ]);
            }
        }
        session()->flash("msg", "i: User Permissions Updated Successfully");
        return redirect(route("users.index"));
    }
}
