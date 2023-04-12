<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Inbox;

class InboxController extends Controller
{
    public function index()
    {
        $auth = auth()->user();
        // $data = Chat::where('user_id',$auth->id)
        // ->orWhereIn('deal_id', $dealIds)
        // ->with(['deal'])
        // ->join('messages','messages.chat_id','chats.id')
        // ->orderBy('messages.created_at','desc')
        // // ->groupBy('conversations.conversation_id')
        // ->paginate();
        $data = Inbox::where('user_id', $auth->id)->orderBy('id','desc')->paginate();
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
        //
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
        if($request->read){
            $data->read = !$data->read;
        }
        if($request->star){
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
}
