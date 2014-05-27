//Global App View

App.Views.App = Backbone.View.extend({
	initialize: function(){
		var addContactView = new App.Views.AddContact({ collection: this.collection });

		var allContactsView = new App.Views.Contacts({ collection: this.collection }).render().el;
		$('#tableContacts').append(allContactsView);

	}
});



//Contact View

App.Views.AddContact = Backbone.View.extend({
	el: '#addContact',

	initialize: function(){
		this.firstname = this.$('#firstname');
		this.lastname = this.$('#lastname');
		this.email_address = this.$('#email_address');
		this.description = this.$('#description');
	},

	events: {
		'submit' : 'addContact'
	},

	addContact: function (e){
		e.preventDefault();

		this.collection.create({
			firstname: this.firstname.val(),
			lastname: this.lastname.val(),
			email_address: this.email_address.val(),
			description: this.description.val()
		}, { wait : true });


		this.clearForm();

	},

	successF :function(model, resp, options){
		console.log('successs');
	},

	clearForm: function(){
		this.firstname.val('');
		this.lastname.val('');
		this.email_address.val('');
		this.description.val('');
	}

});


//All contacts View

App.Views.Contacts = Backbone.View.extend({
	tagName: 'tbody',

	initialize: function(){
		this.collection.on('sync', this.addOne, this);
	},

	render: function (){
		this.collection.each(this.addOne, this);
		return this;
	},

	addOne: function(contact){
		var contactView = new App.Views.Contact({ model: contact });
		this.$el.append(contactView.render().el);
	}
});


//Single contact View

App.Views.Contact = Backbone.View.extend({
	tagName: 'tr',

	template: template('allContactsTemplate'),

	render: function(){
		this.$el.append(this.template(this.model.toJSON()));
		return this;
	}
});
