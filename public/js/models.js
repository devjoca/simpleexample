App.Models.Contact = Backbone.Model.extend({
	validate: function (attrs){
		if ( $.trim(attrs.firstname) == '' || $.trim(attrs.lastname) == '' ){
			return 'First name  and last name are required';
		}

		if ($.trim(attrs.email_address) == ''){
			return 'Email address is required';
		}
	}
});
