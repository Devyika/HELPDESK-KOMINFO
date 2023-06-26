<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class Pendaftaran2Controller extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $pendaftarans = Pendaftaran::latest()->paginate(5);
   
       return view('pendaftarans2.index',compact('pendaftarans'))
           ->with('i', (request()->input('page', 1) - 1) * 5);
   }
  
   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('pendaftarans2.create');
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
           'namawebsite' => 'required',
           'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           'url'         => 'required',
           'token'       => 'required',
           'status'      => 'required',
       ]);
 
       $input = $request->all();
 
       if ($image = $request->file('image')) {
           $destinationPath = 'image/';
           $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
           $image->move($destinationPath, $profileImage);
           $input['image'] = "$profileImage";
       }
   
       Pendaftaran::create($input);
    
       return redirect()->route('pendaftarans2.create')
                       ->with('success','Data Berhasil Ditambah');
   }
    
   /**
    * Display the specified resource.
    *
    * @param  \App\Pendaftaran  $pendaftaran
    * @return \Illuminate\Http\Response
    */
   public function show(Pendaftaran $pendaftaran)
   {
       return view('pendaftarans2.show',compact('pendaftaran'));
   }
    
   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Pendaftaran  $pendaftaran
    * @return \Illuminate\Http\Response
    */
   public function edit(Pendaftaran $pendaftaran)
   {
       return view('pendaftarans2.edit',compact('pendaftaran'));
   }
   
   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Pendaftaran  $pendaftaran
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Pendaftaran $pendaftaran)
   {
       $request->validate([
           'namawebsite' => 'required',
           'url'         => 'required',
           'token'       => 'required',
           'status'      => 'required',
       ]);
 
       $input = $request->all();
 
       if ($image = $request->file('image')) {
           $destinationPath = 'image/';
           $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
           $image->move($destinationPath, $profileImage);
           $input['image'] = "$profileImage";
       }else{
           unset($input['image']);
       }
         
       $pendaftaran->update($input);
   
       return redirect()->route('pendaftarans2.index')
                       ->with('success','Data Berhasil Diupdate');
   }
 
   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Pendaftaran  $pendaftaran
    * @return \Illuminate\Http\Response
    */
   public function destroy(Pendaftaran $pendaftaran)
   {
       $pendaftaran->delete();
    
       return redirect()->route('pendaftarans2.index')
                       ->with('success','Data Berhasil Dihapus');
   }
}
