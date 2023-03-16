<?php

namespace App\Http\Controllers;

use App\Models\Superadmin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SuperadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $superadmins = Superadmin::latest()->paginate(5);
    
        return view('superadmins.index',compact('superadmins'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmins.create');
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
  
        Superadmin::create($input);
     
        return redirect()->route('superadmins.index')
                        ->with('success','Superadmin created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Superadmin $superadmin)
    {
        return view('superadmins.show',compact('superadmin'));
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Superadmin $superadmin)
    {
        return view('superadmins.edit',compact('superadmin'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Superadmin $superadmin)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
  
        $input = $request->all();
          
        $superadmin->update($input);
    
        return redirect()->route('superadmins.index')
                        ->with('success','Superadmin updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Superadmin $superadmin)
    {
        $superadmin->delete();
     
        return redirect()->route('superadmins.index')
                        ->with('success','Superadmin deleted successfully');
    }
}