<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; // Add contact model, since model gets data from the database.
use Illuminate\Support\Facades\DB;
use Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guest()) {
            return redirect()->route('login')->with('error', 'You need before you can access this page.');
        }
        $contacts = Contact::latest()->paginate(4);
        return view('contacts.index')->with('contacts', $contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guest()) {
            return redirect()->route('login')->with('error', 'You need before you can access this page.');
        }
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $filename = time() . $request->file('image')->getClientOriginalName(); // example : 20223423434image.jpg
        $path = $request->file('image')->storeAs('images', $filename, 'public'); // filepath
        $input['image'] = '/storage/' . $path; // ve in the database table column
        Contact::create($input);
        return redirect('contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::guest()) {
            return redirect()->route('login')->with('error', 'You need before you can access this page.');
        }
        $contact = Contact::find($id);
        $message = DB::table('messages')->where('contact_id', $id)->get();
        $data = [
            'contacts' => $contact,
            'messages' => $message
        ];
        return view('contacts.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::guest()) {
            return redirect()->route('login')->with('error', 'You need before you can access this page.');
        }
        $contact = Contact::find($id);
        return view('contacts.edit')->with('contacts', $contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::guest()) {
            return redirect()->route('login')->with('error', 'You need before you can access this page.');
        }
        $contact = Contact::find($id);
        $input = $request->all();
        $filename = time() . $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $filename, 'public');
        $input['image'] = '/storage/' . $path;
        $contact->update($input);
        return redirect('contact');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::destroy($id);
        return redirect('contact');
    }
}
