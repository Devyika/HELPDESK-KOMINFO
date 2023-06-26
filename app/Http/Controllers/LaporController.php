<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapor;

class LaporController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $lapors = Lapor::latest()->paginate(5);
   
       return view('lapors.index',compact('lapors'))
           ->with('i', (request()->input('page', 1) - 1) * 5);
   }
  
   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('lapors.create');
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
           'file'       => 'required|file|mimes:doc,docx,PDF,pdf,jpg,jpeg,png,xlsx,xlsm,xlsb,xltx|max:10000',
           'tanggal'         => 'required',
           'keterangan'       => 'required',
       ]);
 
       $input = $request->all();
 
       if ($file = $request->file('file')) {
           $destinationPath = 'file/';
           $profileFile = date('YmdHis') . "." . $file->getClientOriginalExtension();
           $file->move($destinationPath, $profileFile);
           $input['file'] = "$profileFile";
       }
   
       Lapor::create($input);
    
       return redirect()->route('lapors.index')
                       ->with('success','Data Berhasil Ditambah');
   }
    
   /**
    * Display the specified resource.
    *
    * @param  \App\Lapor  $lapor
    * @return \Illuminate\Http\Response
    */
   public function show(Lapor $lapor)
   {
       return view('lapors.show',compact('lapor'));
   }
    
   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Lapor  $lapor
    * @return \Illuminate\Http\Response
    */
   public function edit(Lapor $lapor)
   {
       return view('lapors.edit',compact('lapor'));
   }
   
   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Lapor  $lapor
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Lapor $lapor)
   {
       $request->validate([
           'tanggal'            => 'required',
           'keterangan'         => 'required',
       ]);
 
       $input = $request->all();
 
       if ($file = $request->file('file')) {
           $destinationPath = 'file/';
           $profileFile = date('YmdHis') . "." . $file->getClientOriginalExtension();
           $file->move($destinationPath, $profileFile);
           $input['file'] = "$profileFile";
       }else{
           unset($input['file']);
       }
         
       $lapor->update($input);
   
       return redirect()->route('lapors.index')
                       ->with('success','Data Berhasil Diupdate');
   }
 
   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Lapor  $lapor
    * @return \Illuminate\Http\Response
    */
   public function destroy(Lapor $lapor)
   {
       $lapor->delete();
    
       return redirect()->route('lapors.index')
                       ->with('success','Data Berhasil Dihapus');
   }
}

