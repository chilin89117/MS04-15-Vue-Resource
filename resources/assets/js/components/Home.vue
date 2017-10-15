<template>
  <div>
    <h1>{{title}}</h1>
    <hr>
    <h3>Add User</h3>
    <form>
      <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" type="text" id="name" v-model="name" autofocus>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="email" id="email" v-model="email">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" id="password" v-model="password">
      </div>
      <button class="btn btn-primary" @click="submitJQ">jQuery/AJAX</button>
      <button class="btn btn-primary" @click="submitVR">vue-resource</button>
      <button class="btn btn-primary" @click="submitAX">Axios</button>
    </form>
    <hr>
    <h3>Show Users</h3>
    <button class="btn btn-success" @click="getUsersJQ">jQuery/AJAX</button>
    <button class="btn btn-success" @click="getUsersVR">vue-resource</button>
    <button class="btn btn-success" @click="getUsersAX">Axios</button>
    <button class="btn btn-danger" @click="clear">Clear</button>
    <br><br>
    <ul class="list-group">
      <li class="list-group-item" v-for="user in users">Name: {{user.name}} Email: {{user.email}}</li>
    </ul>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        name: '',
        email: '',
        password: '',
        hashed: '',
        users: [],
      };
    },
    props: {
      title: String,
      bcrypt: Object,
    },
    methods: {
      // Add user using jQuery/AJAX -----------------------------------
      submitJQ() {
        var vm = this;
        vm.hashed = vm.bcrypt.hashSync(vm.password, 8);

        // Get CSRF token from <meta> element
        // $.ajaxSetup({
        //   headers: {
        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        //   },
        // });

        $.ajax({
          url: '/users',
          method: 'post',
          data: {
            name: vm.name,
            email: vm.email,
            password: vm.hashed,
          },
        })
        .done((result) => {
          // Log JSON object returned from 'UserController@store'
          console.log(result.msg);

          // Reset input fields to blanks
          vm.name = '';
          vm.email = '';
          vm.password = '';
        })
        .fail((error) => {
          console.log(error.responseText);
        });
      },
      // Add users using vue-resource ---------------------------------
      submitVR() {
        var vm = this;
        vm.hashed = vm.bcrypt.hashSync(vm.password, 8);

        // Using 'vue-resource' (see setting headers for csrf-token in 'app.js')
        vm.$http.post('/users', {
          name: vm.name,
          email: vm.email,
          password: vm.hashed,
        })
        .then(
          (result) => {
            // Log JSON object returned from 'UserController@store'
            console.log(result.body.msg);

            // Reset input fields to blanks
            vm.name = '';
            vm.email = '';
            vm.password = '';
          },
          (error) => {
            console.log(error.body.message);
          }
        );
      },
      // Add users using Axios ----------------------------------------
      submitAX() {
        var vm = this;
        vm.hashed = vm.bcrypt.hashSync(vm.password, 8);

        axios.post('/users', {
          name: vm.name,
          email: vm.email,
          password: vm.hashed,
        })
        .then((response) => {
          // Log JSON object returned from 'UserController@store'
          console.log(response.data.msg);

          // Reset input fields to blanks
          vm.name = '';
          vm.email = '';
          vm.password = '';
        })
        .catch((error) => {
          console.log(error);
        });
      },
      // Get users using jQuery/AJAX ----------------------------------
      getUsersJQ() {
        var vm = this;

        $.ajax({
          url: '/users',
          method: 'get',
        })
        .done((result) => {
          console.log(result);
          vm.users = result;
        })
        .fail((error) => {
          console.log(error);
        });
      },
      // Get users using vue-resource ---------------------------------
      getUsersVR() {
        var vm = this;

        vm.$http.get('/users')
        .then(
          (result) => {
            console.log(result.body);
            vm.users = result.body;
          },
          (error) => {
            console.log(error.body.message);
          },
        );
      },
      // Get users using Axios ----------------------------------------
      getUsersAX() {
        var vm = this;

        axios.get('/users')
        .then((result) => {
          console.log(result.data);
          vm.users = result.data;
        })
        .catch((error) => {
          console.log(error);
        });
      },
      // Clear list of users ------------------------------------------
      clear() {
        var vm = this;

        vm.users = [];
      },
    },
  };
</script>
