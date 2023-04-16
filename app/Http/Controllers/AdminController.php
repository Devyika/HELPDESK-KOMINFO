<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;

class AdminController extends Controller
{
    //method yang dipanggil pertama kali
    public function index(){
        return view('admin.admin_index'); //load view
    }

    //method untuk tampilkan data di tabel
    public function data(){
        $data  = AdminModel::select("*")->orderBy('created_at', 'DESC')->get(); //query get semua data ke model
        $form = view("admin.admin_data", ['data' => $data]); //passing data ke view
        $darr=array('data'=>''.$form.''); //convert ke bentuk array
        return response()->json($darr); //convert ke respone json
    }

    //method untuk tampilkan form input
    public function input(){
        $form = view("admin.admin_input"); //load view
        $darr=array('data'=>''.$form.''); //convert ke bentuk array
        return response()->json($darr); //convert ke respone json
    }

    //method untuk insert data
    public function create(Request $request)
    {   
        $postall = $request->all(); //tangkap semua parameter yang di post
        $inputclear = \Arr::except($request->all(), array('_token', '_method')); //pisahkan parameter token 
        $username = $request->input('username'); //tangkap parameter npm yang di post

        $cek = AdminModel::where('username', '=', $username)->count(); //query cek npm apakah sudah ada di tabel atau belum
        if($cek) {
            return response()->json([ //respon json jika gagal
                'status' => false,
                'info' => "Data Sudah ada di database"
            ], 201);
            return false;
        }

        $post = AdminModel::create($inputclear); //jika lolos pengecekan npm maka query insert ini jalan 
        return response()->json([ //respon json jika berhasil
            'status' => true,
            'info' => 'Success'
        ], 201);
    }

    //method untuk tampilkan form edit
    public function edit(Request $request)
    {
        $where = array('id' => $request->input('id')); //tangkap parameter id yang di post
        $post  = AdminModel::where($where)->first(); //get ke tabel di model berdasarkan id

        $form = view("admin.admin_edit", ['data' => $post]); //passing data ke view
        $darr=array('data'=>''.$form.''); //convert ke bentuk array
        return response()->json($darr); //convert ke respone json
    }

    //method untuk update data
    public function update(Request $request)
    {
        $postall = $request->all(); //tangkap semua parameter yang di post
        $inputclear = \Arr::except($request->all(), array('_token', '_method')); //pisahkan parameter token 
        $id = $request->input('id'); //tangkap parameter id yang di post
        $username = $request->input('username'); //tangkap parameter npm yang di post

        $username_b = AdminModel::select('username')->where('id', $id)->first(); //get data by id untuk dapatkan npm lama 

        $cek = AdminModel::where([ //query cek npm apakah sudah ada di tabel atau belum dibandingkan dengan npm baru dan lama
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

        AdminModel::where('id', $id)->update($inputclear); //jika lolos pengecekan npm maka query update ini jalan 
        return response()->json([ //respon json jika berhasil
            'status' => true,
            'info' => "Success"
        ], 201);
    }

    //method untuk delete data
    public function destroy($id)
    {
        AdminModel::where('id', $id)->delete(); //query delete data berdasarkan id
        return response()->json([ //respon json jika berhasil
            'status' => true,
            'info' => "Success"
        ], 201);
    }

}

