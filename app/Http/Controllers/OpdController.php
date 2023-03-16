<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OpdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opds = Opd::latest()->paginate(5);
    
        return view('opds.index',compact('opds'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('opds.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
  
        $input = $request->all();
    
        Opd::create($input);
     
        return redirect()->route('opds.index')
                        ->with('success','Opd created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Opd  $opd
     * @return \Illuminate\Http\Response
     */
    public function show(Opd $opd)
    {
        return view('opds.show',compact('opd'));
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Opd  $opd
     * @return \Illuminate\Http\Response
     */
    public function edit(Opd $opd)
    {
        return view('opds.edit',compact('opd'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Opd  $opd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Opd $opd)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
  
        $input = $request->all();
          
        $opd->update($input);
    
        return redirect()->route('opds.index')
                        ->with('success','Opd updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Opd  $opd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opd $opd)
    {
        $opd->delete();
     
        return redirect()->route('opds.index')
                        ->with('success','Opd deleted successfully');
    }
}