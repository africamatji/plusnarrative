<template>
    <div>
        <v-row class="mt-10">
            <v-col>
                <h1 class="white--text">Login</h1>
            </v-col>
        </v-row>
        <v-row>
            <v-col>
                <v-form
                    ref="form"
                    v-model="valid"
                    lazy-validation
                    >
                    <v-text-field
                        v-model="formData.email"
                        :rules="emailRules"
                        label="E-mail"
                        required
                    ></v-text-field>
                    <v-text-field
                        v-model="formData.password"
                        :rules="passwordRules"
                        label="Password"
                        required
                    ></v-text-field>
                    <v-btn
                        color="orange"
                        class="mr-4"
                        @click="submit"
                        rounded
                        outlined
                    >
                        Submit
                    </v-btn>
                </v-form>
            </v-col>
        </v-row>
    </div>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue';

    export default {
        name: 'Login',
        components: {
            Link,
        },
        props: {
            request_auth: Object,
        },
        data () {
            return {
                formData: {
                    email: null,
                    password: null,
                },
                valid: false,
                emailRules: [
                    v => !!v || 'E-mail is required',
                    v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
                ],
                passwordRules: [
                    v => !!v || 'Password is required',
                ],
            };
        },
        methods: {
            submit () {
                 if (this.$refs.form.validate()) {
                     const resp = this.$inertia.post('/login', this.formData);
                     console.log('resp', this.request_auth);
                } 
            },
        },
    }
</script>
