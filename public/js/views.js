//Global App View

App.Views.App = Backbone.View.extend({
	initialize: function(){

		vent.on('contact:edit', this.editContact, this);
		var addContactView = new App.Views.AddContact({ collection: this.collection });

		var allContactsView = new App.Views.Contacts({ collection: this.collection }).render().el;
		$('#tableContacts').append(allContactsView);

	},

	editContact :function(contact){
		var editContactView = new App.Views.EditContact ({ model: contact });
		$('#editContact').html(editContactView.el);

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
		this.collection.on('add', this.addOne, this);
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

	initialize: function(){
		this.model.on('destroy', this.unrender, this);
		this.model.on('change', this.render, this);
	},

	events: {
		'click a.delete' : 'deleteContact',
		'click a.edit' : 'editContact'
	},

	editContact: function(){
		vent.trigger('contact:edit',this.model);
	},

	deleteContact:function(){
		this.model.destroy();
	},

	render: function(){
		this.$el.html(this.template(this.model.toJSON()));
		return this;
	},

	unrender : function(){
		this.remove();
	}
});


//Edit contact View


App.Views.EditContact = Backbone.View.extend({
	template : template('editCOntactTemplate'),

	initialize : function(){
		this.render();

		this.form = this.$('form');
		this.firstname = this.form.find('#edit_firstname');
		this.lastname = this.form.find('#edit_lastname');
		this.email_address = this.form.find('#edit_email_address');
		this.description = this.form.find('#edit_description');
	},

	events :{
		'submit form': 'submit',
		'click .cancel': 'cancelEdit'
	},

	cancelEdit : function(){
		this.remove();
	},

	submit : function(e){
		e.preventDefault();
		this.model.save({
			firstname: this.firstname.val(),
			lastname: this.lastname.val(),
			email_address: this.email_address.val(),
			description: this.description.val()
		});

		this.remove();
	},

	render : function(){
		var html = this.template(this.model.toJSON());

		this.$el.html(html);
		return this;
	}
});
