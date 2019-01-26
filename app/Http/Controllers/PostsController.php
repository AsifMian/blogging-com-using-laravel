<?php

namespace App\Http\Controllers;
use App\post;
use Illuminate\Http\Request;
//added this while writting the delete image code
use Illuminate\Support\Facades\Storage;
//to use pure sql quries
use DB;
class PostsController extends Controller
{

    /**to check the user is logged in or not
    conform authentication by middleware* */
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    //but simply this line block the excess even view the post so
 /**   public function __construct()
    {
        $this->middleware('auth');
    }
   we have to add exceptions here**/
    public function __construct()
    {
        //we added this array ['except'=>['index','show']
        $this->middleware('auth',['except'=>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //  $posts=DB::select('select * from posts');
        //  $posts=Post::all();
        //same as
        $posts= Post::orderBy('id','desc')->get();
        return view('posts.index')->with('posts',$posts);
    }

    public function create()
    {

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable|max:1999'

        ]);

        //handle the file upload
        if($request->hasFile('cover_image'))
        {
            //get file name with extention
            $fileNameWithExt=$request->file('cover_image')->getClientOriginalName();
            //now it may create problem if user select the image with same name so we get

            //Get just file name seprately
              $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);

              //Get just Extension
            $extension=$request->file('cover_image')->getClientOriginalExtension();

            //now to name of image will be
            $fileNameToStore=$fileName.'_'.time().'.'.$extension;

            //store image
            $path=$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }
        else
        {
            //if no file selected by the user then default image will be
            $fileNameToStore='noimage.jpg';

        }

        //create new post and save to database
        $post=new Post;
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->user_id=auth()->user()->id;
        $post->cover_image=$fileNameToStore;
        $post->save();
        return redirect()->back()->with('success','Post Created Successfully Congratulation!');
      // or
       // return redirect('/posts')->with('success','Post Create Successfully Congratulation!');
    }

    public function show($id)
    {
       $post= Post::find($id);
       return view('posts.show')->with('post',$post);
    }

    public function edit($id)
    {
        $post= Post::find($id);

        //check that user is logged in or not only logged in user can edit there post
        //not by manual typing url edit
        if(auth()->user()->id !==$post->user_id)
        {
            return redirect('/posts')->with
            ('error','Unauthorized Access you dont have permission to Access this page!');
        }
        return view('posts.edit')->with('post',$post);
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
        //validation
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',

        ]);

        //handle the file upload
        if($request->hasFile('cover_image'))
        {
            //get file name with extention
            $fileNameWithExt=$request->file('cover_image')->getClientOriginalName();
            //now it may create problem if user select the image with same name so we get

            //Get just file name seprately
            $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);

            //Get just Extension
            $extension=$request->file('cover_image')->getClientOriginalExtension();

            //now to name of image will be
            $fileNameToStore=$fileName.'_'.time().'.'.$extension;

            //store image
            $path=$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }

        //update post and save to db
        $post=Post::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        if($request->hasFile('cover_image'))
        {
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        return redirect('/posts')->with('success','Post Updated Successfully Congratulations!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //we can delete by just
        //Post::destroy($id);

        //or
        $post=Post::find($id);

        //check valid user
        if(auth()->user()->id !== $post->user_id)
        {
            return redirect('/posts')->with
            ('error','Unauthorized Access you dont have permission to Access this page!');
        }

        //to delete images also and if only this is not default image
        if($post->cover_image !== 'noimage.jpg')
        {
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();
        return redirect('/posts')->with('error','Post Deleted Successfully!');

    }
}
