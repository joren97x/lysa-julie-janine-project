<script setup>

    import {reactive, ref} from 'vue'
    import router from '@/router';
    import api from '@/axios';

    const error = ref('')
    const loginForm = reactive({
        email: 'admin@email.com',
        password: 'asdasd'
    })

    async function login() {
        try {
            const result = await api.post("/login", loginForm)
            console.log(result)
            if(result.data.length <= 0) {
                error.value = "Invalid credentials"
            }
            else {
                localStorage.setItem('auth', JSON.stringify(result.data.user))
                localStorage.setItem('token', JSON.stringify(result.data.token))
                if(result.data.user.role == 'student') {
                    router.push('/student/dashboard')
                }
                else {
                    router.push('/admin/students')
                }
            }
            
        }
        catch(err) {
            error.value = "Invalid credentials"
            console.log(err)
        }
    }
</script>

<template>

    <v-container>
        <p class="text-center text-h3 my-6">Student Management System {{ error }} </p>
        <v-card class="py-6" width="50%" style="margin: auto;">
            <v-card-title class="text-center text-h4 my-4">LOGIN</v-card-title>
            <v-card-item>
                <v-text-field class="mt-2" :error-messages="error" label="Email address" v-model="loginForm.email" density="comfortable" variant="outlined"></v-text-field>
                <v-text-field label="Password" type="password" density="comfortable" v-model="loginForm.password" variant="outlined"></v-text-field>
            </v-card-item>
            <v-card-actions>
                <v-btn block color="blue" variant="flat"  @click="login">Login</v-btn>
            </v-card-actions>
            <p class="text-center mb-5">Not registered?  <router-link to="/register">Create an account</router-link> </p>
        </v-card>
    </v-container>
    
</template>