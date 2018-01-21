<?php

namespace App\Http\Controllers;

use App\Upvote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UpVoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), [
            'post_id' => 'required|min:1|max:1000000000000|numeric',
            'status' => 'required|numeric|min:1|max:2'
        ]);
        if ($validator->fails()) {
            $error = $validator->errors();
            if ($error) {
                return response()->json([
                    'success' => $error
                ], 500);
            }
            // redirect to view page
        }

        try {
            DB::beginTransaction();

            $upvote = Upvote::where('post_id', $request->post_id)
                ->where('user_id', 2)
                ->first();

            if($upvote === null ){
                $upvote = new Upvote();
                $upvote->user_id = 2; // Default user id change after integrate in live project
                $upvote->post_id = $request->post_id;
                $upvote->status =  $request->status;
                $upvote->save();
            } else {
                $upvote->delete();
            }

            DB::commit();

            $upvotePos = Upvote::where('post_id', $request->post_id)
                ->where('status', 1)->count();
            $upvoteNeg = Upvote::where('post_id', $request->post_id)
                ->where('status', 2)->count();
            $class = Upvote::where('post_id', $request->post_id)
                ->where('user_id', 2)->count();
            return response()->json([
                'count' => $upvotePos - $upvoteNeg,
                'class' => $class
            ], 200);
        } catch (QueryException $e) {
            DB::rollback();
            return response()->json([
                'success' => $e->getMessage()
            ], 500);
        }

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
        //
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
