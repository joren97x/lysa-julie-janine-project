<script setup>
    import {ref} from 'vue'
    import router from '@/router';
    
    const drawer = ref(true)
    function logout() {
        localStorage.removeItem('auth')
        router.push('/login')
    }

</script>

<template>
        
    <v-layout>
        <v-navigation-drawer v-model="drawer">
            <p class="text-h5 text-center my-4"> Welcome back! </p>
            <v-divider></v-divider>
            <v-list nav>
                <!-- <router-link to="/admin/check-attendance" style="text-decoration: none;">
                    <v-list-item prepend-icon="mdi-calendar-check" class="text-black" title="Check attendance" value="myfiles"></v-list-item>
                </router-link> -->
                <router-link to="/admin/students" style="text-decoration: none;">
                    <v-list-item prepend-icon="mdi-account-multiple" class="text-black" title="Students" value="shared"></v-list-item>
                </router-link>
                <!-- <router-link to="/admin/attendance-history" style="text-decoration: none;">
                    <v-list-item prepend-icon="mdi-calendar-clock" class="text-black" title="Attendance history" value="starred"></v-list-item>
                </router-link>
                <router-link to="/admin/change-password" style="text-decoration: none;">
                    <v-list-item prepend-icon="mdi-lock-open" class="text-black" title="Change password" value="change"></v-list-item>
                </router-link> -->
            </v-list>
        </v-navigation-drawer>

        <v-main class="bg-grey-lighten-3">
            <v-toolbar color="white">
                <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
                <v-toolbar-title>Admin</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-menu>
                    <template v-slot:activator="{ props }">
                        <v-btn icon="mdi-account" v-bind="props">
                        </v-btn>
                    </template>
                    <v-list>
                            <v-btn variant="text" @click="logout()" prepend-icon="mdi-logout">Logout</v-btn>
                    </v-list>
                </v-menu>
            </v-toolbar>

            <v-container style="height: 100vh;">

                <slot/>
            </v-container>

        </v-main>
    </v-layout>
</template>