<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class Opd2Controller extends Controller
{
    //method yang dipanggil pertama kali
    public function index(){
        return view('opd2.opd2_index'); //load view
    }

    //method untuk tampilkan data di tabel
    public function data(){
        $data  = User::select("*")->orderBy('created_at', 'DESC')->get(); //query get semua data ke model
        $form = view("opd2.opd2_data", ['data' => $data]); //passing data ke view
        $darr=array('data'=>''.$form.''); //convert ke bentuk array
        return response()->json($darr); //convert ke respone json
    }

    //method untuk tampilkan form input
    public function input(){
        $form = view("opd2.opd2_input"); //load view
        $darr=array('data'=>''.$form.''); //convert ke bentuk array
        return response()->json($darr); //convert ke respone json
    }

    //method untuk insert data
    public function create(Request $request)
    {   
        $postall = $request->all(); //tangkap semua parameter yang di post
        $inputclear = \Arr::except($request->all(), array('_token', '_method')); //pisahkan parameter token 
        $username = $request->input('username'); //tangkap parameter npm yang di post
        $password = Hash::make ( $request->input('password'));

        $cek = User::where('username', '=', $username)->count(); //query cek npm apakah sudah ada di tabel atau belum
        if($cek) {
            return response()->json([ //respon json jika gagal
                'status' => false,
                'info' => "Data Sudah ada di database"
            ], 201);
            return false;
        }

        $post = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]); 
        
        //jika lolos pengecekan npm maka query insert ini jalan 
        return response()->json([ //respon json jika berhasil
            'status' => true,
            'info' => 'Data Berhasil Ditambahkan',
        ], 201);
    }

    //method untuk tampilkan form edit
    public function edit(Request $request)
    {
        $where = array('id_user' => $request->input('id_user')); //tangkap parameter id yang di post
        $post  = User::where($where)->first(); //get ke tabel di model berdasarkan id

        $form = view("opd2.opd2_edit", ['data' => $post]); //passing data ke view
        $darr=array('data'=>''.$form.''); //convert ke bentuk array
        return response()->json($darr); //convert ke respone json
    }

    //method untuk update data
    public function update(Request $request)
    {
        $postall = $request->all(); //tangkap semua parameter yang di post
        $inputclear = \Arr::except($request->all(), array('_token', '_method')); //pisahkan parameter token 
        $id_user = $request->input('id_user'); //tangkap parameter id yang di post
        $username = $request->input('username'); //tangkap parameter npm yang di post

        $username_b = User::select('username')->where('id_user', $id_user)->first(); //get data by id untuk dapatkan npm lama 

        $cek = User::where([ //query cek npm apakah sudah ada di tabel atau belum dibandingkan dengan npm baru dan lama
            ['username', '!=', $username_b->username],
            ['username', '=', $username]
        ])->count();
        if($cek) {
            return response()->json([ //respon json jika gagal
                'status' => false,
                'info' => "Data Sudah ada di database"
            ], 201);
            return false;
        }

        User::where('id_user', $id_user)->update($inputclear); //jika lolos pengecekan npm maka query update ini jalan 
        return response()->json([ //respon json jika berhasil
            'status' => true,
            'info' => "Data Berhasil Diperbarui"
        ], 201);
    }

    //method untuk delete data
    public function destroy($id_user)
    {
        User::where('id_user', $id_user)->delete(); //query delete data berdasarkan id
        return response()->json([ //respon json jika berhasil
            'status' => true,
            'info' => "Data Berhasil Dihapus"
        ], 201);
    }

}
