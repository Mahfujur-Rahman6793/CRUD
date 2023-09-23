<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;
use Session;
class CrudController extends Controller
{
    public function showData(){
        // $allData = Crud::all();
        $allData = Crud::paginate(5);
        return view('showInfo',compact('allData'));
    }

    public function addData(){
        return view('addInfo');
    }
    public function storeData(Request $request){
        $request->validate([
            'name' => 'required|max:25',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'phone'=>'required|min:11'
        ]);
        // return $request->all();
        $crud = new Crud;
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->password = $request->password;
        $crud->phone = $request->phone;
        $crud->save();
        $request->session()->flash('mes', 'Successfully insert data into database');
        return redirect('/');
    }

    public function editData($id=null){
        $editData = Crud::find($id);
        return view('edit_Data',compact('editData'));
        // return $id;
    }

    public function updateData(Request $request, $id){
        $request->validate([
            'name' => 'required|max:25',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'phone'=>'required|min:11'
        ]);
        // return $request->all();
        $crud = Crud::find($id);
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->password = $request->password;
        $crud->phone = $request->phone;
        $crud->save();
        $request->session()->flash('mes', 'Successfully Updated data into database');
        return redirect('/');
    }

}
