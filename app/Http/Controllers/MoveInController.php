<?php

namespace App\Http\Controllers;

use App\Models\MoveIn;
use App\Http\Requests\StoreMoveInRequest;
use App\Http\Requests\UpdateMoveInRequest;

class MoveInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $moveIn = MoveIn::all();

        // dd($moveIn);
        return view('pages.movein', ['moveIn' => $moveIn]);
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
     * @param  \App\Http\Requests\StoreMoveInRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMoveInRequest $request)
    {
        // dd($request->file('csv_file')); 
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt|max:2048', 
        ]);

        if($request->hasFile('csv_file')){
            $file = $request->file('csv_file');
            $filepath = $file->getRealPath();

            if(($handle = fopen($filepath, 'r')) !== false){

                $header = fgetcsv($handle);

                while (($data = fgetcsv($handle)) !== false) {
                    // Insert the data into the database
                    MoveIn::create([
                        'user_id'         => $data[0],  // Assuming user_id is the first column in CSV
                        'fullname'        => $data[1],  // Fullname is the second column, and so on...
                        'email'           => $data[2],
                        'phone'           => $data[3],
                        'rental_type'     => $data[4],
                        'marketing_desc'  => $data[5],
                        'date'            => $data[6],  // Ensure this matches the date format in the CSV
                        'cancelled'       => $data[7],  // Assuming the 'cancelled' column is a boolean or integer
                        'created_at'      => now(),     // Set the created_at timestamp to current time
                        'updated_at'      => now(),     // Set the updated_at timestamp to current time
                    ]);
                }
                fclose($handle); // Close the file handle after processing
                
            } 
            return redirect()->route('movein')->with('success', 'File uploaded and data inserted.');

        }

        // dd($request->file('csv_file'));
        return back()->with('error', 'No file selected.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MoveIn  $moveIn
     * @return \Illuminate\Http\Response
     */
    public function show(MoveIn $moveIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MoveIn  $moveIn
     * @return \Illuminate\Http\Response
     */
    public function edit(MoveIn $moveIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMoveInRequest  $request
     * @param  \App\Models\MoveIn  $moveIn
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMoveInRequest $request, MoveIn $moveIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MoveIn  $moveIn
     * @return \Illuminate\Http\Response
     */
    public function destroy(MoveIn $moveIn)
    {
        //
    }
}
