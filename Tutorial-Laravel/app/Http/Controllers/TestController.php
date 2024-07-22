<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class TestController extends Controller
{

    public function postsIndex(){

        $allPostsFromDB=Post::all(); // get Collection obj
        // @dd($allPostsFromDB);
        // $date=date("Y-m-d  G:i:s");

        // $allPosts=[
        //     ['id'=>1,'title'=> 'php','posted_by'=> 'ahmed','created_at'=>$date ],
        //     ['id'=>2,'title'=> 'js','posted_by'=> 'homos','created_at'=>$date ],
        //     ['id'=>3,'title'=> 'c','posted_by'=> 'sayed','created_at'=>$date ],
        // ];

        return view("./posts/index",[
            "allposts"=> $allPostsFromDB,
            "id"=> 1
        ]);
    }


    public function show($id){
        // dd($id);  //% id == in thos case  Post $id    $id == $singelPostFromDB    route model binding



        $singelPostFromDB=Post::findOrFail($id); // get the ele
        // $singelPostFromDB=Post::where('id',$id)->first(); get frist ele
        // $singelPostFromDB=Post::where('id',$id)->get(); // get all eles that  provides the condition but in Collection obj

        // @dd($singelPostFromDB);

        // if(is_null($singelPostFromDB)){
        //     return to_route('posts.index');
        // }

        // $date=date("Y-m-d  G:i:s");

        // $singelPost= ['id'=>$id,'title'=> 'php','posted_by'=> 'ahmed','created_at'=> $date ];

        return view("./posts/show",[
            'singelPost'=>$singelPostFromDB,
        ]);
    }

    public function create(){
        $users = User::all();
        // @dd($users);
        return view('./posts/create',[
            'users' => $users
        ]);
    }




    public function store(Request $request){
        // $_POST == requset()->all()
        $title = $_POST['title'];
        $description = $_POST['description'];
        $post_creator= $_POST['post_creator'];


        $request->validate([
            'title' => ['required','min:3'],
            'description' => ['required','min:6'],
            'post_creator' => ['required','exists:users,id']
        ]);





        // $post = new Post;

        // $post->title = $title;
        // $post->description = $description;

        // $post->save();



        Post::create([  // you gonna need a $fillable  in model
            'title' => $title ,
            'description' => $description,
            'user_id' => $post_creator
        ]);


        // $request = request();
        // $data = $request->all();  // $data will be an array





        return to_route('posts.index');
    }


    public function edit($id){
        $users = User::all();


        $allPostsFromDB = Post::all();




        foreach($allPostsFromDB as $post){
            if($id == $post['id']){
                // @dd($post['id']);
                return view('./posts/edit',[
                    'post' => $post,
                    'users' => $users

                ]);
            }
        }

        }

        public function update($id,Request $request){

            $title = $_POST['title'];
            $description = $_POST['description'];
            $post_creator=$_POST['post_creator'];


            $request->validate([
                'title' => ['required','min:3'],
                'description' => ['required','min:6'],
                'post_creator' => ['required','exists:users,id']
            ]);





            $singlePostDB = Post::find($id); // like sql

            $singlePostDB->update([
                'title' => $title,
                'description' => $description,
                'user_id' => $post_creator

            ]);


            return to_route("posts.show",$id);
        }




        public function destroy($id){

            $singlePostDB = Post::find($id); // save model event
            $singlePostDB->delete();


            return to_route('posts.index');
        }




    }



