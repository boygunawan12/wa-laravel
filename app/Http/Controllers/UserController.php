<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\User; 
use Illuminate\Support\Facades\Http;
use App\ChatSend;






class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $dir = "user";
    protected $url = "users";


  



    public function json(){
        $userid = user()->id;

          $data = User::select([
'email',
'id',
'created_at',
'quota',
'is_active',
]);

            return Datatables::of($data)->addColumn('action',function($d){
        $pair = '<button title="Edit" data-title="Edit" class="btn btn-success create-btn btn-sm" data-src="'.url($this->url.'/'.$d->id.'/edit').'"><i class="fas fa-pencil-alt"></i></button>
<button title="Delete" class="btn btn-danger delete-btn btn-sm" href="'.url($this->url.'/'.$d->id).'"><i class="fas fa-trash"></i></button>
';



    return $pair;


            })

            ->editColumn('quota',function($d){
              $quota = $d->quota;

            $quotaLeft =  $quota-ChatSend::where('userid',$d->id)->count();

            return $quotaLeft;

            })
            ->editColumn('is_active',function($d){

              return ($d->is_active ? '<span class="badge badge-success">Active</span>':'<span class="badge badge-danger">Disabled</span>');
            })
            ->make(true);

    }





    public function index(Request $request)
    {
        //

        $title = "List";


        $totalUser = User::where('role','0')->count();
          // $data = @Table::all();
        return view($this->dir.'/index',compact('title','totalUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        $title = "Create";
        
        
        return view($this->dir.'/create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // UNTUK DUMP NAMA FORM

    /**
     * Store a newly created resource in storage.
     *
     * @param  $request, $type untuk save/update,$table untuk Class nama tabel

     */


    public function store(Request $request)
    {



        $userid = user()->id;

    $validatedData = $request->validate([
"email" => "required|unique:users|email" ,
"password" => "required" ,

]);


    $user = new User;

    $user->email = $request->email;
    $user->last_name = $request->last_name;
    $user->name = $request->name;

    $user->password = bcrypt($request->password);
    $user->verified = $request->verified;
    $user->is_active = $request->status;
    
    $user->quota = $request->quota;

    $save = $user->save();

  # code...

#store





        if ($save) {
            $msg = "data saved successfully";
            $success = true;


        }
        else {

            $msg = "data failed to save";
            $success = false;

        }
    
        return [
          'success'=>$success,
          'msg'=>$msg
        ];

}

      

        // $table = new Table;
        // print_r($request->all());


    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $data = $this->fields();
        $table = User::find($id);
        $title = "";
        $subtitle = "";
        return view($this->dir.'/info',compact('data','table','title','subtitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        // $data = $this->fields();
        $data = User::find($id);

        $title = "Edit Data";
        $subtitle = "";
        

        

        return view($this->dir.'/edit',compact('data','title','subtitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     

    $validatedData = $request->validate([
"email" => "required|unique:device,phone,".$id ,


]);

        $userid = user()->id;


    @$user =  User::find($id);



    $user->email = $request->email;
    $user->last_name = $request->last_name;
    $user->name = $request->name;

    if (!empty($request->password)) {
      # code...
    $user->password = bcrypt($request->password);

    }

    $user->verified = $request->verified;

    $user->is_active = $request->status;
    $user->quota = $request->quota;

  $save = $user->save();

       if ($save) {
        //Do Your Something
          $status = 1;
            // return redirect($this->url);
            $msg = "Data Successfully Updated";
          $success = true;
        }
        else {
        //Do Your Something 
          $status =0;
          $success = false;
            $msg = "Data Failed to Update";

        }

        return [
          'success'=>$success,
          'msg'=>$msg
        ];


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        //
        $table = User::find($id);
        $delete = $table->delete();
         if ($delete) {
        $success= true;
          $msg = 'Data Deleted successfully';

        }
        else {

          $msg = 'Failed to delete ';
            $success = false;
        }

        return [
          'success'=>$success,
          'msg'=>$msg
        ];
    }

  

    

}
