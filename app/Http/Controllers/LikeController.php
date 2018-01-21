<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LikeController extends Controller
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
            'like_type_id' => 'required|min:1|numeric'
        ]);
        if ($validator->fails()) {
            $error = $validator->errors();
            return response()->json([
                'success' => $error
            ], 500);
        }

        try {
            DB::beginTransaction();
            $like = Like::where('post_id', $request->post_id)
                ->where('user_id', 2)
                ->first();

            if($like === null) {
                $like = new Like();
                $like->user_id = 2  ; // User static id. login user id after live project integration
                $like->post_id = $request->post_id;
                $like->like_type_id = $request->like_type_id;
                $like->save();
            } else {
                if($like->like_type_id == $request->like_type_id) {
                    $like->delete();
                } else {
                    $like->like_type_id = $request->like_type_id;
                    $like->save();
                }
            }

            DB::commit();
        } catch (QueryException $e) {
            DB::rollback();
            return response()->json([
                'success' => $e->getMessage()
            ], 500);
        }
        $count = Like::where('post_id', $request->post_id)
            ->count();

        return response()->json([
            'count' => $count
        ], 200);
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
