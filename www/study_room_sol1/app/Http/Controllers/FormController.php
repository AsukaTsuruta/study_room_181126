<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;

class FormController extends Controller
{
    public function index()
    {
        $items = Form::all();
        return view ('form.index', ['items' => $items]);
    }
    
    public function add()
    {
        return view ('form.create');
    }

    public function save(Request $request)
    {
        $form = new Form();
        $form->name = $request->name;
        $form->mail = $request->mail;
        $form->save();
        return response()->json();
    }

    public function delete(Request $request)
    {
        Form::find($request->id)->delete();
        return response()->json();
    }
}
