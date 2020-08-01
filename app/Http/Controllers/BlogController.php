<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    //
    public function index(Request $request){
        $categories = Category::select(['id','categoryName'])->get(['id','categoryName']);
        $blogs = Blog::orderBy('id','desc')->with(['cat','user'])->limit(6)->get(['id','title','post_excerpt','slug','user_id','featuredImage']);
        $data = [
            'categories' => $categories,
            'blogs' => $blogs,
        ];
        return view('home')->with($data);
    }

    public function allBlogs(Request $request){
       
        $blogs = Blog::orderBy('id','desc')->with(['cat','user'])
        ->select(['id','title','post_excerpt','slug','user_id','featuredImage'])
        ->paginate(1);
        $data = [
            'blogs' => $blogs,
        ];
        return view('blogs')->with($data);
    }

    public function blogSingle(Request $request, $slug){
        $blog = Blog::where('slug', $slug)->with(['cat','tag','user'])->get(['id','title','user_id','featuredImage','metaDescription','post'])->first();
        $category_ids = [];
        foreach($blog->cat as $cat){
            array_push($category_ids,$cat->id);
        }
        $related_blogs = Blog::with('user')->where('id','!=',$blog->id)->whereHas('cat',function($q) use($category_ids){
            $q->whereIn('category_id', $category_ids);
        })->limit(5)->orderBY('id','desc')->get(['id','title','post_excerpt','slug','user_id','featuredImage']);
        
        $data = [
            'blog' => $blog,
            'related_blogs' => $related_blogs,
        ];
        return view('blogsingle')->with($data);
    }

    public function compose(View $view)
    {
        $cat = Category::select(['id','categoryName'])->get(['id','categoryName']);
        $view->with('cat', $cat);
    }

    public function categoryIndex(Request $request, $categoryName, $id){
        $items = Blog::with('user')->whereHas('cat',function($q) use($id){
            $q->where('category_id', $id);
        })->orderBY('id','desc')->select(['id','title','post_excerpt','slug','user_id','featuredImage'])->paginate(6);
        
        $data = [
            'blogs' => $items,
            'categoryName' => $categoryName,
        ];
        return view('category')->with($data);
    }

    public function tagIndex(Request $request, $tagName, $id){
        $items = Blog::with('user')->whereHas('tag',function($q) use($id){
            $q->where('tag_id', $id);
        })->orderBY('id','desc')->select(['id','title','post_excerpt','slug','user_id','featuredImage'])->paginate(6);
        
        $data = [
            'blogs' => $items,
            'tagName' => $tagName,
        ];
        return view('tag')->with($data);
    }

    public function search(Request $request){
        $str = $request->str;
        $blogs = Blog::orderBy('id','desc')->with(['cat','user','tag'])
        ->select(['id','title','post_excerpt','slug','user_id','featuredImage']);
        $blogs->when($str!='',function($q) use($str){
            $q->where('title','LIKE',"%{$str}%")
            ->orWhereHas('cat',function($q) use($str){
                $q->where('categoryName',$str);
            })
            ->orWhereHas('tag',function($q) use($str){
                $q->where('tagName',$str);
            });
        });
        $blogs = $blogs->paginate(1);
        $blogs->appends($request->all());
        $data = [
            'blogs' => $blogs,
        ];
        return view('blogs')->with($data);

        // if(!$str) return $blogs->get();
        // $blogs->where('title','LIKE',"%{$str}%")
        //     ->orWhereHas('cat',function($q) use($str){
        //         $q->where('categoryName',$str);
        //     })
        //     ->orWhereHas('tag',function($q) use($str){
        //         $q->where('tagName',$str);
        //     });
        
        // $data = [
        //     'blogs' => $blogs,
        // ];
        
        // return $blogs->get();
    }
}
