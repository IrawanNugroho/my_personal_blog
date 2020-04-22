<?php

namespace App\Http\Controllers;

use Intervention;
use Auth;
use Illuminate\Http\Request;
use App\Status;
use App\Image;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_image = Image::where('active', 1)->get();
        return view('gallery/index', ['list_image' => $list_image]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_status = Status::where('active', 1)->get(['id', 'name']);
        return view('gallery/create', ['list_status' => $list_status]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'     => 'required|string',
            'image'     => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'excerpt'   => 'required|string',
            'credit'    => 'required|string',
            'status'    => 'required|integer|max:3',
        ]);

        $file = $request->file('image');
        
        // $file_name = time()."_".$file->getClientOriginalName();
        // $input['imagename'] = time().'_cooks.'.$file->extension();
        // $destinationPath = public_path('/thumbnail');
        // $img = Intervention::make($file->path());
        // $img->resize(100, 100, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->save($destinationPath.'/'.$input['imagename']);


        $path = $file->store('public/images');
        $path = str_replace('public/images', '', $path);
        $image = Image::create([
                'title'         => $request->title,
                'description'   => $request->excerpt,
                'credit'        => $request->credit,
                'image'         => $path,
                'thumbnail'     => $path,
                'status_id'     => $request->status,
                'created_by'    => Auth::id(),
                'updated_by'    => Auth::id()
        ]);



        $list_image = Image::where('active', 1)->get();
 
		return view('gallery/index', ['list_image' => $list_image])->with('message', 'Image Uploaded!');
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
