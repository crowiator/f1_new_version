<?php

namespace App\Http\Controllers;
use App\Models\Race;
use DataTables;
use Illuminate\Http\Request;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $races= Race::get();
        if($request->ajax()){
           $allData=DataTables::of($races)
               ->addIndexColumn()
               ->addColumn('action',function ($row){
                    $btn='<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.
                        $row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm
                        editRace">Edit</a>';
                   $btn.='<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.
                       $row->id.'" data-original-title="Delete" class="edit btn btn-danger btn-sm
                        deleteRace">Delete</a>';
                   return $btn;
               })
           ->rawColumns(['action'])
           ->make(true);
           return $allData;

        }

        return view('races',compact('races'));
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
        //
        Race::updateOrCreate(['id' => $request->race_id],
            ['name' => $request->name,
                'place' => $request->place,
                'circle' => $request->circle,
                'date' => $request->date,
                'time' => $request->time,
                'winner' => $request->winner,
            ]
        );
        return response()->json(['success' => 'Race added sucessfully']);

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
        $races=Race::find($id);
        return response()->json($races);
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
        Race::find($id)->delete();
        return response()->json(['success' => 'Race deleted sucessfully']);
    }
}
