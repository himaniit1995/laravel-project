<?php
 //http://www.kodementor.com/laravel-5-6-crud-application-from-scratch/
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;
use Image;
use Illuminate\Support\Facades\Response;
 
class PostController extends Controller
{

// To show all content in the main (index) page 

	public function index()
    { 

      //$users = DB::select('select * from posts');
      $users = Post::paginate(2);
      return view('Posts.index',['post' => $users]);
    }
 
 public function store(Request $request)
    {
        //validate input fields
        request()->validate([
            'post_title' => 'required',
            'post_content' => 'required',
            'post_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      
        ]);
        //for checking the image

    $filename = '';

    if ($request->hasFile('post_image')) {
        $image = $request->file('post_image');
        $name = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension(); // getting image extension
        $filename =time().'.'.$extension;
        $size = $image->getClientSize();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);

        $filename = '/images/'.$name;  
      }
        
        //save data into database
        //return $request->all();
        Post::create(['title' => $request->get('post_title'), 'body' => $request->get('post_content'),'image' => $filename]);

         return view('Posts.index');

    }
   
  public function create()
    {
        return view('Posts.create');
    }

// To show the specific page //

  public function show($id)
    {         
         $users = Post::with('comments')->find($id);
         //echo "<pre>";print_r($users);exit; 
         return view('Posts.show',['users'=>$users]);
    }
 
// To edit the Details

    public function edit($id)
    {      

         $user = Post::find($id);   
         return view('Posts.edit',['user'=> $user]);    
       
    }

// To Update the Post 

  public function update(Request $request, $id) 
    
    {
        //validate input fields
            request()->validate([
            'post_title' => 'required',
            'post_content' => 'required'

        ]);
        
        //return $request->all();
        //save data into database

        $user = Post::find($id); 
        $title = $request->input('post_title');
        $body = $request->input('post_content'); 
        $file =  $request->post_image;

        if ($file && $file->isValid()) {
          
          request()->validate([
            'post_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

          ]);

            $image = $request->file('post_image');
            $name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $size = $image->getClientSize();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);

            $filename = '/images/'.$name;  

            DB::update('update posts set title = ?,  body = ? , image = ?  where id = ?',[$title,$body,$filename,$id]);   

          }else{

            DB::update('update posts set title = ?,  body = ?  where id = ?',[$title,$body,$id]);    

          }

            return redirect('/')->with('success','Post updated successfully.');

    }
 


   // To Delete the posts
  
   public function destroy($id)

    {
           Post::where('id', $id)->delete();
           //DB::table('posts')->where('id', $id)->delete();

         $user = Post::find($id); 
      //  DB::delete('delete from posts where id = ?',[$id]);
       return redirect('/')->with('success','Information has been deleted');
    }
      
       } 
