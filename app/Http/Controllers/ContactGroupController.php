<?php

namespace App\Http\Controllers;

use App\Models\ContactGroup;
use App\Models\Contact;

use Illuminate\Http\Request;
use Validator;

class ContactGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactgroups = ContactGroup::where("company_id",company_id())
        ->orderBy("id","desc")->get();
return view('backend.contacts.contact_group.list',compact('contactgroups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.contacts.contact_group.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {	
		$validator = Validator::make($request->all(), [
			'name' => 'required|max:50',
		]);
		
		if ($validator->fails()) {
			return redirect('contact_groups/create')
							->withErrors($validator)
							->withInput();			
		}
			
	    
		
        $contactgroup= new ContactGroup();
	    $contactgroup->name = $request->input('name');
		$contactgroup->note = $request->input('note');
		$contactgroup->company_id = company_id();
	
        $contactgroup->save();
        
        
        return redirect()->route('contact_groups.index')->with('success', _lang('Saved sucessfully'));

    }
   

    /**
     * Display the specified resource.
     */
    public function show(ContactGroup $contactGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {
        $contactgroup = ContactGroup::where("id",$id)
                                    ->where("company_id",company_id())->first();
   
            return view('backend.contacts.contact_group.edit',compact('contactgroup','id')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
		$validator = Validator::make($request->all(), [
			'name' => 'required|max:50',
		]);
		
		if ($validator->fails()) {
            return redirect()->route('contact_groups.edit', $id)
            ->withErrors($validator)
            ->withInput();			
		}
	
        	
		
        $contactgroup = ContactGroup::where("id",$id)->where("company_id",company_id())->first();
		$contactgroup->name = $request->input('name');
		$contactgroup->note = $request->input('note');
		$contactgroup->company_id = company_id();
	
        $contactgroup->save();
		
        return redirect('contact_groups')->with('success', _lang('Updated sucessfully'));
	    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
       

        if (Contact::where('group_id', $id)->exists() ) {
        // If related records exist, redirect back with an error message
        return redirect('contact_groups')->with('error', _lang('Cannot delete conatct group. Related records exist.'));
    }
        $contactgroup = ContactGroup::find($id);
        $contactgroup->delete();
        return back()->with('success', _lang('Information has been deleted sucessfully'));
    }
}
