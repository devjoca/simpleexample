<?php

class ContactsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Contact::all();
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$contact = new Contact;
		$contact->firstname = Input::json('firstname');
		$contact->lastname = Input::json('lastname');
		$contact->email_address = Input::json('email_address');
		$contact->description = Input::json('description');
		$contact->save();

		return $contact;
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$contact = Contact::find($id);
		return $contact;
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$contact = Contact::find($id);
		$contact->firstname = Input::json('firstname');
		$contact->lastname = Input::json('lastname');
		$contact->email_address = Input::json('email_address');
		$contact->description = Input::json('description');
		$contact->save();

		return $contact;
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Contact::find($id)->delete();
	}


}
