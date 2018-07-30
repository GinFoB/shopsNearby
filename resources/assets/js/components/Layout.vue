<template>
    <v-app>
        <v-toolbar v-bind:style="{ 'background-color': 'lightsteelblue' }">
            <v-spacer></v-spacer>

            <v-toolbar-items>
                <div v-if="authenticated && user" v-bind:style="{ 'margin-top': '20px' }">
                    <v-btn flat>
                        <router-link to="/nearby">Nearby Shops</router-link>
                    </v-btn>
                    <v-btn flat>
                        <router-link to="/preferred">My preferred shops</router-link>
                    </v-btn>
                    <v-btn depressed small  @click="handleLogout()">Logout</v-btn>
                </div>

                <div v-else  v-bind:style="{ 'margin-top': '20px' }">
                    <v-btn flat>
                        <router-link to="/login">Login</router-link>
                    </v-btn>
                    <v-btn flat>
                        <router-link to="/register">Sign up</router-link>
                    </v-btn>
                </div>

            </v-toolbar-items>
        </v-toolbar>
        <transition name="fade">
            <router-view></router-view>
        </transition>
    </v-app>
</template>

<script>
    export default {
        data() {

            return {
                authenticated: auth.check(),
                user: auth.user
            };
        },

        mounted() {
            Event.$on('userLoggedIn', () => {
                this.authenticated = true;
                this.user = auth.user;
            });
        },


        methods: {
            handleLogout() {
                axios.post('/api/logout',
                    {
                        headers: {
                            "Authorization" : 'Bearer ' + auth.token
                        }
                    })
                    .then(({}) => {
                        window.localStorage.clear();
                        this.$router.push('/');
                        window.location.reload();
                    })
                    .catch(({response}) => {
                        console.log(response);
                    });
            }
        }
    }
</script>