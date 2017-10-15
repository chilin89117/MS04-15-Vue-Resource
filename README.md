# MS04-11 Http (With Laravel)
* Use `bcryptjs` to encrypt password on the client side
* Use 3 methods to add and display users:
	* `jQuery/AJAX`
	* `vue-resource`
	* `Axios`

* Note: globally setup `X-CSRF-TOKEN` in request headers using content of `<meta>` tag, i.e.
	* `$('meta[name="csrf-token"]').attr('content')` 

#### End of section 15.