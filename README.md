# MS04-15-Vue-Resource (With Laravel)
### Note: This application uses the ms04-01 database

![Home Page](../assets/a.png?raw=true)

* Use `bcryptjs` to encrypt password on the client side
* Use 3 methods to add and display users:
	* `jQuery/AJAX`
	* `vue-resource`
	* `Axios`
* Use `this.$resource` and custom actions to display users

* Note: globally setup `X-CSRF-TOKEN` in request headers using content of `<meta>` tag, i.e.
	* `$('meta[name="csrf-token"]').attr('content')` 

#### End of section 15.