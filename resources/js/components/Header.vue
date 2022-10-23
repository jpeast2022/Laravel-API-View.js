<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <!-- unauthorized -->
      <div class="d-flex" v-if="Token">
        <a @click="onClick()" class="btn btn-outline-secondary me-2" href="#">Login</a>
        <a @click="onClickRegister()" class="btn btn-outline-secondary me-2" href="#">Register</a>
      </div>
      <!-- authorized -->
      <div class="user" v-else>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a @click="logOut()" class="dropdown-item" href="#">Logout</a></li>
              
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
</template>

<script>
    export default{
        name: 'Header',
        data: function(){
          return{
            // for displaying auth
              Token: false,
              Auth:''
          }
        },
        // like constructor
        mounted(){
           this.authenticatedUser()
        },
        methods:{
          reloadPage() {
            window.location.reload();
          },

          onClick(){
            this.$emit('toogle-login-page')
          },
          onClickRegister(){
            this.$emit('toogle-register-page')
          },
          async logOut(){
              let Key = JSON.parse(localStorage.getItem('Bearer-Token'));
              console.log(Key.token)
          // async loginAttempt(data){
                const res = await fetch('http://127.0.0.1:8000/api/logout',{
                  method: 'POST',
                  headers: {
                    'Accept': 'application/vnd.api+json',
                    'Content-Type': 'application/vnd.api+json',
                    'Authorization': 'Bearer '+ Key.token
                  },
                  
                })

              const msg = await res.json()
              console.log(msg.data.message)
              localStorage.clear()
              this.reloadPage()
              
          },
          authenticatedUser(){
            var token = JSON.parse(localStorage.getItem('Bearer-Token'));
            console.log(token)
            if(token === null){
              console.log("Unauthenticated")
              this.Token = true
            }else{
              this.Token = false
              this.Auth = token.user.name
              console.log(this.Auth)
            }
          }
        }

    }
    

</script>

<style>
    .user{
        margin-right: 100px;
        /* border: 1px solid red; */
    }
</style>