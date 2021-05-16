<?php

namespace App\Http\Controllers;
use App\Models\Todos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;


class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show todos page
       
        $todos = Todos::select('id','name','category','status')->get();
       return view('list', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $msg = $request->all();
        if(!empty($msg)){
            $tasks = Todos::create([
                'name' => $request->taskname,
                'category' => $request->taskcategory,
                'status' => $request->taskstatus,
                ]);
            return response()->json($tasks); 
        }else {
            $msg ="The field is empty";
            return response()->json($msg);
        }
        
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function show(Todos $todos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //update status of check todo list and send email
        $task = Todos::where('id',$request->id)->update(['status'=> $request->status]);
        $msg = "updated";
        $to_email = "hajar.elyoussfi@hbusiness.digital"; //
        $from_email = "benchrifamb@gmail.com";
        $data = array('name' => 'Hajar Elyoussfi', 'body'=>'The todo has been completed');
        if($request->status == 1) {
            Mail::send('mail', $data,  function($message) use( $to_email,$from_email, $data) {
                $message->from($from_email)->subject('Todo list app');
                $message->to($to_email)->subject('Todo list app');});
        }
        return response()->json($msg);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $task = Todos::where('id',$request->id)->update(['name'=> $request->name]);
        $msg = "updated";
        return response()->json($msg);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Todos::where('id',$id)->delete();
        return response()->json($id);
    }

    public function destroyall(Request $request)
    {
        $task = Todos::where('status', $request->status)->delete();
        $msg = "the completed todo has been deleted";
        return response()->json($msg);
    }
}
