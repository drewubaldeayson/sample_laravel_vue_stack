<template>
    <div>
        <div class="text-center mb-3 ml-4 mr-4">
            <h1>Home</h1>
            <div>
                Name: <span v-html="this.user.name"> </span>
            </div>

            <div>
                Email Address: <span v-html="this.user.email"> </span>
            </div>

            <div class="text-center m-4">
                <p><router-link to="/login">Logout</router-link></p>
            </div>

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
            USER: "/user"
        }
    },
    methods: {
        getUser(){
            axios
                .get(this.API_URL.concat(this.USER),axios.defaults.headers.common )
                .then(response => {
                    this.user = response.data;
                })
                .catch(error => {
                     alert(error)
                });

        }
    },
    created(){
        this.getUser();
    }
}
</script>
