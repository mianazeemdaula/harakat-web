<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Inbox;
use App\Models\User;

class InboxController extends Controller
{
    public function index()
    {
        $auth = auth()->user();
        $data = Inbox::where('user_id', $auth->id)
        ->orWhere('user2_id', $auth->id)->orderBy('id','desc')->paginate();
        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inbox = Inbox::with(['user', 'user2'])->find($id);
        return response()->json($inbox, 200);
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
        $data = Inbox::find($id);
        if($request->has('read')){
            $data->read = !$data->read;
        }
        if($request->has('star')){
            $data->star = !$data->star;
        }
        $data->save();
        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function startChat($id)
    {
        $ids = [auth()->id(), $id];
        $inbox =  Inbox::whereIn('user_id', $ids)
        ->orWhere('user2_id',$ids)->first();
        if(!$inbox){
            $inbox = new Inbox;
            $inbox->user_id = auth()->id();
            $inbox->user2_id = $id;
            $inbox->title = User::find($id)->name;
            $inbox->title_ar = User::find($id)->name;
            $inbox->save();
        }
        return $this->show($inbox->id);
    }
}
