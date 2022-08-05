<template>
    <div>
        <div class="text-center mb-3 ml-4 mr-4">
            <h1>Registration</h1>
        </div>
        <!-- Name input -->
        <div class="form-outline mb-4 ml-4 mr-4">
            <label class="form-label" for="registerName">Name</label>
            <input v-model="user.name" type="text" id="registerName" class="form-control" />
        </div>

        <!-- Email input -->
        <div class="form-outline mb-4 ml-4 mr-4">
            <label class="form-label" for="registerEmail">Email</label>
            <input v-model="user.email" type="email" id="registerEmail" class="form-control" />
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4 ml-4 mr-4">
            <label class="form-label" for="registerPassword">Password</label>
            <input v-model="user.password" type="password" id="registerPassword" class="form-control" />
        </div>

        <!-- Submit button -->
        <button @click="register()" class="btn btn-primary btn-block mb-3 ml-4 mr-4">Register</button>

        <div class="text-center m-4">
            <p>Already a member? <router-link to="/login">Login</router-link></p>
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
            REGISTER: "/register"
        }
    },
    methods: {
        register(){
            axios
                .post(this.API_URL.concat(this.REGISTER), this.user)
                .then(response => {
                    alert("Account created successfully");
                    this.$router.push({ path: '/login' })
                })
                .catch(error => {
                    console.error("There was an error! "+error);
                });

        }
    }
}
</script>
