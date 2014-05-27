<!doctype html>
<html lang="en">
<head>

<style>
	table thead td {

		font-weight: bold;
	}

	#addContact{
		margin-bottom: 20px;
	}

	.module{
		margin-top: 20px;
	}
</style>
</head>
<body>

	<h1>Contacts</h1>

	{{ Form::open(array( "id" => "addContact" , "class" =>"module")) }}
		<div>
			{{ Form::label('firstname', 'Frist Name') }}
			{{ Form::input('text', 'firstname', '') }}
		</div>
		<div>
			{{ Form::label('lastname', 'Last Name') }}
			{{ Form::input('text', 'lastname', '') }}
		</div>
		<div>
			{{ Form::label('email_address', 'Email Adress') }}
			{{ Form::input('text', 'email_address', '') }}
		</div>
		<div>
			{{ Form::label('description', 'Description') }}
			{{ Form::textarea('decription', '', array("id"=> "description")) }}
		</div>
		<div>
			{{ Form::submit('Add Contact') }}
		</div>
	{{ Form::close() }}


	<table id="tableContacts">
		<thead>
			<td>First Name</td>
			<td>Last Name</td>
			<td>Email Address</td>
			<td>Description</td>
			<td>Actions</td>
		</thead>
	</table>

	<div id="editContact"></div>

<script id="allContactsTemplate" type="text/template">
	<td><%= firstname %></td>
	<td><%= lastname %></td>
	<td><%= email_address %></td>
	<td><%= description %></td>
	<td><a href="#contacts/<%= id %>" class="edit"> Edit </a></td>
	<td><a href="#contacts/<%= id %>" class="delete"> Delete </a></td>
</script>

<script id="editCOntactTemplate" type="text/template">
	<h2> Edit contact:  <%=firstname%> <%=lastname%></h2>
	{{ Form::open(array( "id" => "editContact", "class" =>"module" )) }}
		<div>
			{{ Form::label('edit_firstname', 'Frist Name') }}
			<input name="edit_firstname" type="text" value="<%=firstname%>" id="edit_firstname">
		</div>
		<div>
			{{ Form::label('edit_lastname', 'Last Name') }}
			<input name="edit_lastname" type="text" value="<%=lastname%>" id="edit_lastname">
		</div>
		<div>
			{{ Form::label('edit_email_address', 'Email Adress') }}
			<input name="edit_email_address" type="text" value="<%=email_address%>" id="edit_email_address">
		</div>
		<div>
			{{ Form::label('edit_description', 'Description') }}
			<textarea id="edit_description" name="edit_decription" cols="50" rows="10"><%=description%></textarea>
		</div>
		<div>
			{{ Form::submit('Edit Contact') }}
			<button type="button" class="cancel"> Cancel </button>
		</div>
	{{ Form::close() }}

</script>



	{{ HTML::script('https://code.jquery.com/jquery-1.11.1.min.js') }}
	{{ HTML::script('http://underscorejs.org/underscore.js') }}
	{{ HTML::script('http://backbonejs.org/backbone.js') }}
	{{ HTML::script('js/main.js') }}
	{{ HTML::script('js/models.js') }}
	{{ HTML::script('js/collections.js') }}
	{{ HTML::script('js/views.js') }}
	{{ HTML::script('js/router.js') }}


<script>
	new App.Router;
	Backbone.history.start();

	App.contacts = new App.Collections.Contacts;
	App.contacts.fetch().then(function(){
		new App.Views.App({ collection : App.contacts });
	});
</script>

</body>
</html>
