<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Http\RedirectResponse\Redirect;

class PostController extends Controller
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
        echo "<pre>";
        print_r($_POST);
        
        $post = new Post;
        $post->title = $_POST['title'];
        $post->content = $_POST['content'];
        $post->save();
         
        return redirect(route('viewallposts'));

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
    
    public function viewonepost() {
        
        $id = $_GET['id'];
        $post = \DB::table('posts')->where('id', $id)->first();
        
        return \View::make("posts.viewonepost")->with("post", $post);

        // var_dump($post);
        // return "viewonepost";
    }
    
    public function postdelete() {
        
        $id = $_GET['id'];
        Post::where('id',$id)->delete();
        
        return redirect(route('viewallposts'));
    }
    
    public function updateonepost(Request $request) {
        
        $id = $_GET['id'];
        $post = \DB::table('posts')->where('id', $id)->first();
        
        return \View::make("posts.updateonepost")->with("post", $post);
    }
    
    public function updateonepostaction(Request $request) {
        
        $post = Post::find($_POST["id"]);
        $post->title = $_POST["title"];
        $post->content = $_POST["content"];
        
        $validatedData = $request->validate([
            'title' => 'email',
            'content' => 'max:255|min:5',
        ]);
        
        $post->save();
        
        return redirect(route('viewallposts'));
        
        var_dump($post);
        exit('update one post action');
    }
}
