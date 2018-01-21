<?php

namespace App\Http\Controllers;

use App\Category;
use App\LikeType;
use App\Post;
use Illuminate\Http\Request;
use App\Utils\AppConstant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['posts'] = Post::where('status',AppConstant::STATUS_ACTIVE)->latest('id')->paginate(10);
        $data['categories'] = Category::with('blog_count')->where('status',AppConstant::STATUS_ACTIVE)->orderBy('priority','asc')->get();

        return view('pages.home')->with('data', $data);
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
            'category' => 'required|min:1|max:1000000000000|numeric',
            'body' => 'required|max:20000',
            'title' => 'required|max:500'
        ]);
        if ($validator->fails()) {
            $error = $validator->errors();
            if ($error) {
                Session::flash('error', $error->first());
            }
            // redirect to view page
        }

        // Add Post in table

        try {
            DB::beginTransaction();

            $post = new Post();
            $post->user_id = 1; // Static user_id change after integrate in live project (Login user id)
            $post->category_id = $request->category;
            $post->body = $request->body;
            $post->title = $request->title;
            $post->save();

            DB::commit();

            Session::flash('success', __('message.addPostSuccess'));

        } catch (QueryException  $e){
            DB::rollback();
            Session::flash('error', __('auth.server_error'));
        }

        $data['posts'] = Post::where('status',AppConstant::STATUS_ACTIVE)->latest('id')->paginate(10);
        $data['categories'] = Category::with('blog_count')->where('status',AppConstant::STATUS_ACTIVE)->orderBy('priority','asc')->get();

        return view('pages.home')->with('data', $data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $validator = Validator::make([
            'id' => $id
        ], [
            'id' => 'required|min:1|max:1000000000000|numeric',
        ]);
        if ($validator->fails()) {
            $error = $validator->errors();
            if ($error) {
                Session::flash('error', $error->first());
            }
            // redirect to view page
        }

        $post = Post::where(array(
            'id' => $id,
            'status' => AppConstant::STATUS_ACTIVE
        ))->first();

        if($post == ""){
            Session::flash('error', __('message.NotFound'));
            
            // redirect post question form or design 
        }

        $data['categories'] = Category::with('blog_count')->where('status',AppConstant::STATUS_ACTIVE)->orderBy('priority','asc')->get();
        $data['post'] = $post;
        $data['like'] = LikeType::where('status', AppConstant::STATUS_ACTIVE)->get();
        return view('pages.details')->with('data', $data);

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
