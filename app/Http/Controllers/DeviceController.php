<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Device; 
use Illuminate\Support\Facades\Http;







class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $dir = "device";
    protected $url = "device";


  



    public function json(){
        $userid = user()->id;

          $data = Device::select([
'device.phone',
'device.id',
'device.status',
])->where('userid',$userid);

            return Datatables::of($data)->addColumn('action',function($d){
        $pair = '<button title="Edit" data-title="Edit" class="btn btn-success create-btn btn-sm" data-src="'.url($this->url.'/'.$d->id.'/edit').'"><i class="fas fa-pencil-alt"></i></button>
<button title="Delete" class="btn btn-danger delete-btn btn-sm" href="'.url($this->url.'/'.$d->id).'"><i class="fas fa-trash"></i></button>
';

    $pair .='';
    if ($d->status==0) {
        # code...
        $pair .= '<button title="Pair" data-save="false" class="btn btn-info pair-btn btn-sm create-btn" data-src="'.url($this->url.'/'.$d->id.'/pair').'"><i class="fas fa-qrcode"></i></button>';
    }

    return $pair;


            })->make(true);

    }





    public function index(Request $request)
    {
        //

        $title = "List";


          // $data = @Table::all();
        return view($this->dir.'/index',compact('title'));
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
"phone" => "required" ,

]);


    $device = new Device;

    $device->phone = $request->phone;
    $device->userid = $userid;

    $save = $device->save();

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
        $table = Device::find($id);
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
        $data = Device::find($id);

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
"phone" => "required" ,

]);

        $userid = user()->id;


    @$device =  Device::find($id);

    $device->phone = $request->phone;
    $device->userid = $userid;

$save = $device->save();

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
        $table = Device::find($id);
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

    public function pair($id){

        $data = Device::find($id);



        $phone= $data->phone;
        // echo "string";
            $response = Http::get('http://localhost:3000/whatsapp', [
                'phone' => $phone,
                // 'page' => 1,
            ]);
        // print_r($response);
        $body =$response->body();
        // print_r($body);
        return view('device/pair',compact('phone'));
    }

    public function sendQr(Request $request){
        $qr = $request->qr;



        broadcast(new \App\Events\SendQr($qr));

        return [
            'success'=>true,
            'data'=>$qr
        ];

    }


    public function connect(Request $request){

        $state = $request->state;
        $phone = $request->phone;

        if ($state=='open') {
            # code...

            $device = Device::where(['phone'=>$phone])->update(['status'=>'1']);

            broadcast(new \App\Events\StateOpen($phone));

        }
        else{
            $device = Device::where(['phone'=>$phone])->update(['status'=>'1']);

        }

        return [
            'state'=>$state,
            'phone'=>$phone,
        ];

    }

    public function list(){
        $data = Device::select(['phone as text','id'])->where('userid',user()->id);

        return $data->get();
    }

    

}
