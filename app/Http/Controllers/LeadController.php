<?php

namespace App\Http\Controllers;

use App\Mail\NewLead;
use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    //
    public function create()
    {
        return view('guest.leads.create');
    }
    public function store(Request $request)
    {
        //dd($request->all());

        $val_data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|max:2000'
        ]);

        $newLead = Lead::create($val_data);

        Mail::to('andrea@fotoalbum.com')->send(new NewLead($newLead));

        return back()->with('message', 'Messagge sent successfully');
    }
}
