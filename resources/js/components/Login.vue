<template>
    <div class="container p-3">
            <div class="col-md-6">
                <form class="p-3 card" @submit="onSubmit">
                    <label for="Login">
                        <h2 class="text-center">Login</h2>
                    </label>
                    <hr>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email"
                            v-model="email"
                            name="email"
                            class="form-control"
                            id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <!-- {{ email }} -->
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password"
                            v-model="password"
                            name="password"
                            class="form-control"
                            id="exampleInputPassword1">
                    </div>
                    
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>
                
            </div>  
    </div>
</template>
<script>
    export default{
        name: 'Login',
        data(){
            return{
                email: '',
                password: ''
            }
        },
        methods:{
            onSubmit(e){
                e.preventDefault();
                if(!this.email && !this.password){
                    console.log("Required Fields")
                    return
                }

                const validData = {
                    email: this.email,
                    password: this.password
                }
                // console.log(validData)
                this.$emit('login-attempt',validData)

                // this.email = ''
                // this.password = ''
            }
        }
    }
</script>

<style>
    .col-md-6{
        margin:0 auto;
    }
</style>