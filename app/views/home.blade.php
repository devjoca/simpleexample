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
</style>
</head>
<body>

	<h1>Contacts</h1>

	{{ Form::open(array( "id" => "addContact" )) }}
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
		</thead>
	</table>

<script id="allContactsTemplate" type="text/template">
	<td><%= firstname %></td>
	<td><%= lastname %></td>
	<td><%= email_address %></td>
	<td><%= description %></td>
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
