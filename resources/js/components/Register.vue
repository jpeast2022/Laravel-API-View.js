<template>
     <div class="container p-3">
            <div class="col-md-6">
                <form class="p-3 card">
                    <label for="Login">
                        <h2 class="text-center">Register</h2>
                    </label>
                    <hr>
                    <div class="mb-3">
                        <label for="Name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="Email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Must be unique!">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="Password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirm-Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>
                
            </div>  
    </div>
</template>
<script>
    export default {
        name: 'Register'
    }
</script>