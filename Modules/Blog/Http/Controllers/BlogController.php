<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        // return view('blog::index');
        $blogposts = Blog::all();

        return view('blog::index', [
            'blogposts' => $blogposts
            ]);
    }

    /**store
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('blog::add');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        // $title = $request->get('title');
        // $desc = $request->get('desc');

        // dd($title, $desc);

        $data = [
            'title' => $request->get('title'),
            'desc' => $request->get('desc')
        ];

        $blog = Blog::create($data);

        if($blog) {
            return redirect('blog');
        } else {
            dd(error_log);
        }
    }
 
    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('blog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $blogpost = Blog::find($id);
        return view('blog::edit',[
            'blogpost'=>$blogpost
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $update = Blog::where('id', $id)->update([
            'title' => $request->get('title'),
            'desc' => $request->get('desc')
        ]);

        // //other way, long way
        // $blogpost = Blog::find($id);
        // $blogpost->title = $request->get('title');
        // $blogpost->desc = $request->get('desc');
        // $blogpost->save();

        return redirect('blog');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $delete = Blog::where('id', $id)->delete();
        return redirect('blog');
    }
}
