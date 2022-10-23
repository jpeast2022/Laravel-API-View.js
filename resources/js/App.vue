<template>
    <div>
        <Header 
          @toogle-login-page="toogleLoginPage"
          @toogle-register-page="toogleRegisterPage"/>
        <div v-if="showLogin">
            <Login @toogle-login-page="toogleLoginPage" @login-attempt="loginAttempt"/>
        </div>
        <div v-else-if="showRegister">
          <Register @toogle-login-page="toogleRegisterPage"/>
        </div>
        <div v-else-if="showTask">
            <Task/>
        </div>
       
    </div>
</template>
<script>
    import Header from './components/Header.vue';
    import Login from './components/Login.vue';
    import Register from './components/Register.vue';
    import Task from './components/Task.vue'
    import axios from 'axios';
    import setAuthHeader from './token/setAuthHeader';
    export default {
      name: "App",
      components: {
        Header,
        Login,
        Register,
        Task
      },
      data(){
          return {
            data: [],
            showLogin: true,
            showRegister: false,
            showTask: true, 
          }
      },
      mounted(){
        this.tokenCheck()
      },
      methods: {
        reloadPage() {
            window.location.reload();
          },
        toogleLoginPage(){
          this.showLogin = !this.showLogin,
          this.showRegister = false
        },
        toogleRegisterPage(){
          this.showRegister = !this.showRegister
          this.showLogin = false
        },
        async loginAttempt(data){
          const res = await fetch('http://127.0.0.1:8000/api/login',{
            method: 'POST',
            headers: {
              'Accept': 'application/vnd.api+json',
              'Content-Type': 'application/vnd.api+json'
            },
            body: JSON.stringify(data)
          })

          const Token = await res.json()
          console.log(Token)
          console.log(Token.data.token)
          localStorage.setItem('Bearer-Token',JSON.stringify(Token.data))
          // var a = JSON.parse(localStorage.getItem('Bearer-Token'))
          // console.log(a.user.name)
          this.showLogin = false
          this.reloadPage()
          // console.log(data)
        },
        tokenCheck(){
          let a = JSON.parse(localStorage.getItem('Bearer-Token'))
          console.log(a)
          if(a === null){
              this.showLogin = true
              console.log('yhdjwahdjwa')
          }else{
              this.showLogin = false
          }
        }
      }
    }
</script>