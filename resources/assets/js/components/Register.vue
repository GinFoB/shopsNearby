<template>
    <v-card flat>
        <v-form ref="form" v-model="valid" lazy-validation>
            <v-text-field
                    v-model="email"
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
                    @click="register"
                    color="info"
            >
                Sign up
            </v-btn>
        </v-form>
    </v-card>
</template>

<script>
    export default {
        data: () => ({
            valid: true,
            email: '',
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
            register() {
                let data = {
                    email: this.email,
                    password: this.password
                };

                axios.post('/api/register', data)
                    .then(({data}) => {
                        this.$router.push('/login');
                    })
                    .catch(({response}) => {
                        alert(response.data.message);
                    });
            }
        }
    }
</script>