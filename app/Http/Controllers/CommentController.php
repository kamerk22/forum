<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|min:1|max:1000000000000|numeric',
            'comment' => 'required|max:500'
        ]);
        if ($validator->fails()) {
            $error = $validator->errors();
            if ($error) {
                Session::flash('error', $error->first());
            }
            // redirect to view page
        }

        try {
            DB::beginTransaction();

            $comment = new Comment();
            $comment->user_id = 2; // Default user id change after integrate in live project
            $comment->post_id = $request->id;
            $comment->comment = $request->comment;
            $comment->save();

            DB::commit();
        } catch (QueryException $e) {
            DB::rollback();
            Session::flash('error', __('auth.server_error'));
        }
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
