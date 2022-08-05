<template>
    <div>
        <div class="text-center mb-3 ml-4 mr-4">
            <h1>Login</h1>
        </div>
        <!-- Email input -->
        <div class="form-outline mb-4 ml-4 mr-4">
            <label class="form-label" for="form2Example1">Email address</label>
            <input v-model="user.email" type="email" class="form-control" />
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4 ml-4 mr-4">
            <label class="form-label" for="form2Example2">Password</label>
            <input v-model="user.password" type="password" id="form2Example2" class="form-control" />
        </div>

        <!-- Submit button -->
        <button @click= "login()" class="btn btn-primary btn-block m-4">Login</button>

        <!-- Register buttons -->
        <div class="text-center m-4">
            <p>Not a member? <router-link to="/registration">Register</router-link></p>

        </div>
    </div>
</template>
<script>
import axios from 'axios'

export default {
    data() {
        return {
            user: {},
            API_URL: "http://localhost:8002/api",
            LOGIN: "/login"
        }
    },
    methods: {
        login(){
            axios
                .post(this.API_URL.concat(this.LOGIN), this.user)
                .then(response => {
                    if(response.data.success){
                        axios.defaults.headers.common = { headers: {"Authorization" : `Bearer ${response.data.access_token}`} }
                        alert("Logged in successfully!")
                        this.$router.push({ path: '/home' })
                    }
                })
                .catch(error => {
                     alert("Invalid Credentials!")
                });

        }
    }
}
</script>
