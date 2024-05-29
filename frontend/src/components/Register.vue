<script setup>

    import {reactive, ref} from 'vue'
    import api from '@/axios';
    import router from '@/router';

    // const registerForm = reactive({
    //     firstname: null,
    //     middlename: null,
    //     lastname: null,
    //     address: null,
    //     email: null,
    //     phone: null,
    //     birthday: null,
    //     course: null,
    //     role: 'student'
    // })

    const error = ref('')
    const registerForm = reactive({
        firstname: 'asdsadsa',
        middlename: 'asdsadsa',
        lastname: 'asdsadsa',
        password: 'asdasd',
        address: 'asdsadsa',
        email: 'joren@email.com',
        phone: 'asdsadsa',
        birthday: null,
        course: 'BSIT',
        role: 'admin'
    })

    async function register() {
        try {
            const result = await api.post('/register', registerForm)
            console.log(result)
            if(result.status == 200) {
                localStorage.setItem('auth', JSON.stringify(result.data.user))
                localStorage.setItem('token', JSON.stringify(result.data.token))
                router.push('/login')
            }
            else {
                error.value = 'Please fill in required fields'
            }
            // router.push('/login')
        }
        catch(err) {
            error.value = 'Please fill in required fields'
            console.log(err)
        }
    }

</script>

<template>

    <v-container>
        <p class="text-center text-h3 my-6">Student Management System</p>
        <v-card class="py-6" width="80%" style="margin: auto;">
            <v-card-title class="text-center text-h4">REGISTER</v-card-title>
            <v-card-item>
                <v-alert color="red" v-if="error">{{ error }}</v-alert>
                <v-row class="mt-1">
                    <v-col cols="6">
                        <v-text-field variant="outlined" v-model="registerForm.firstname" density="comfortable" label="First name"></v-text-field>
                    </v-col>
                    <v-col cols="6">
                        <v-text-field variant="outlined" v-model="registerForm.middlename" density="comfortable" label="Middle name"></v-text-field>
                    </v-col>
                    <v-col cols="6">
                        <v-text-field variant="outlined" v-model="registerForm.lastname" density="comfortable" label="Last name"></v-text-field>
                    </v-col>
                    <v-col cols="6">
                        <v-text-field variant="outlined" v-model="registerForm.email" density="comfortable" label="Email address"></v-text-field>
                    </v-col>
                    <v-col cols="12">
                        <v-text-field type="password" variant="outlined" density="comfortable" label="Password" v-model="registerForm.password"></v-text-field>
                    </v-col>
                    <v-col cols="6">
                        <v-text-field variant="outlined" v-model="registerForm.address" density="comfortable" label="Address"></v-text-field>
                    </v-col>
                    <v-col cols="6">
                        <v-text-field variant="outlined" v-model="registerForm.phone" density="comfortable" label="Phone number"></v-text-field>
                    </v-col>
                    <v-col cols="6">
                        <v-text-field variant="outlined" v-model="registerForm.birthday" type="date" density="comfortable" label="Birthday"></v-text-field>
                    </v-col>
                    <v-col cols="6">
                        <v-select variant="outlined" :items="['BSIT', 'BEED', 'BSED', 'BSHM']" v-model="registerForm.course" density="comfortable" label="Course"></v-select>
                    </v-col>
                </v-row>
            </v-card-item>
            <v-card-actions>
                <v-btn block color="blue" variant="flat" @click="register">Register</v-btn>
            </v-card-actions>
        </v-card>
    </v-container>
    
</template>