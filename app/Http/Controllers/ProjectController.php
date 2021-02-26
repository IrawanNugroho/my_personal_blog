<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Status;
use App\Project;
use DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_article = DB::table('projects')
                        ->join('statuses', 'statuses.id', '=', 'projects.status_id')
                        ->where('projects.active',1)
                        ->select('projects.id', 'projects.title', 'projects.updated_at', 'statuses.name as status')
                        ->orderBy('id', 'DESC')
                        ->paginate(15);
        
        return view('project/index', ['list_article' => $list_article]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get list of status
        $list_status = Status::where('active', 1)->get(['id', 'name']);
        
        return view('project/create', ['list_status' => $list_status]);
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
        $validatedData = $request->validate([
            'title'         => 'required|string|max:128',
            'description'   => 'nullable|string|max:1000',
            'status'        => 'required|integer|max:3'
        ]);

        $project = new Project;
        $project->title         = Str::title($request->title);
        $project->description   = $request->description;
        $project->status_id     = $request->status;
        $project->created_by    = Auth::id();
        $project->updated_by    = Auth::id();
        $project->save();

        return redirect()->route('projects.show', ['id' => $project->id])->with('message', 'Project created!');
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
        $project = DB::table('projects')
                    ->join('statuses', 'statuses.id', '=', 'projects.status_id')
                    ->join('users', 'users.id', '=', 'projects.updated_by')
                    ->select('projects.id', 'projects.title', 'projects.description', 'statuses.name as status', 'projects.created_at', 'users.name as updated_by', 'projects.updated_at  as last_update')
                    ->where('projects.active', 1)
                    ->where('projects.id', '=', $id)
                    ->first();

        return view('project/show', ['project' => $project]);
        // return dd($project);
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
