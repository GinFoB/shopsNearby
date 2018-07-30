<template>
    <v-card flat>
        <v-form ref="form" v-model="valid" lazy-validation>
            <v-text-field
                    v-model="username"
                    :rules="emailRules"
                    label="Email"
                    required
            ></v-text-field>
            <v-text-field
                    v-model="password"
                    :rules="passwordRules"
                    type="password"
                    label="Password"
                    required
            ></v-text-field>

            <v-btn
                    :disabled="!valid"
                    @click="login"
                    color="info"
            >
                Login
            </v-btn>
        </v-form>
    </v-card>
</template>

<script>
    export default {
        data: () => ({
            valid: true,
            username: '',
            emailRules: [
                v => !!v || 'E-mail is required',
                v => /.+@.+/.test(v) || 'E-mail must be valid'
            ],
            password: '',
            passwordRules: [
                v => !!v || 'Password is empty'
            ],

        }),

        methods: {
            login() {
                let data = {
                    username: this.username,
                    password: this.password
                };

                axios.post('/api/login', data)
                    .then(({data}) => {
                        auth.login(data.token, data.user);

                        this.$router.push('/nearby');
                    })
                    .catch(({response}) => {
                        alert(response.data.message);
                    });
            }
        }
    }
</script>