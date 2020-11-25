<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contact;
use Auth;
use Validator;

class ContactController extends Controller
{
    //
    public function index() {
        $contacts = Contact::where('user_id', Auth::user()->id)->where('status', 'active')->paginate(10);
        return view('contacts', compact('contacts'));
    }

    public function addContact() {
        return view('add-contact');
    }

    public function storeContact(Request $request) {
        $messages = [
            'name.required' => 'Name is required',
            'amount.unique' => 'Email is already used',   
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'unique:contacts'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        else
        {
            $contact = Contact::create([
                'name'    => $request->name,
                'user_id' => Auth::user()->id,
                'company' => $request->company,
                'phone'   => $request->phone,
                'email'   => $request->email
            ]);

            if($contact->save())
                return redirect()->route('contacts')->with('success', 'Succefully added contact.');
            else
                return redirect()->route('contacts')->with('error', 'Failed to add contact.');          
        }
    }

    public function editContact(Request $request, $id) {
        $contact = Contact::find($id);
        if ($request->isMethod('post')) {
            $messages = [
                'name.required' => 'Name is required'
            ];
            $validator = Validator::make($request->all(), [
                'name' => 'required'
            ], $messages);

            if($request->has('email')) {
                $email = Contact::where('email', $request->email)->where('id', '!=', $contact->id)->first();
                if(!empty($email)) {
                    $validator->errors()->add('email', 'Email alreay exist!');   
                    return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
                }
                                
            }
            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }

            else {
                $contact->name = $request->name;
                $contact->company = $request->company;
                $contact->phone = $request->phone;
                $contact->email = $request->email;

                if($contact->save())
                    return redirect()->route('contacts')->with('success', 'Succefully updated contact.');
                else
                    return redirect()->route('contacts')->with('error', 'Could not updated contact.');
            }

        }
        return view('edit-contact', compact('contact'));
    }

    public function removeContact($id) {
        $contact = Contact::find($id);
        if(!empty($contact)) {
            $contact->status = 'removed';
            if($contact->save())
                return redirect()->back()->with('success', 'Contact has been removed');
            else
                return redirect()->back()->with('error', 'Could not delete contact.');
        }
        else
            return redirect()->back()->with('error', 'Could not delete contact.');
    }

    public function searchContact(Request $request) {
        $contacts = Contact::where('name', 'LIKE', '%'.$request->search.'%')
            ->where('user_id', Auth::user()->id)
            ->where('status', 'active')
            ->get();
        return view('search', compact('contacts'));
    }
}
