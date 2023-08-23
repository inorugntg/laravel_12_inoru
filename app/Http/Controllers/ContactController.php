<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $data = Contact::all();
        return $data;
    }
    public function create()
    {
        
    }

    public function edit($id){
        $data = Contact::find($id);
        return $data;
    }

    public function update(Request $request, $id)
    {
        Contact::find($id)->update($request->all());

    }

    public function store(Request $request)
    {
        Contact::create($request->all());
       
    }

    public function delete($id)
    {
        Contact::find($id)->delete();

    }
}
