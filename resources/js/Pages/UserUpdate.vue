<template>
    <div>
        <v-row>
            <v-col>
                <Link href="/dashboard" class="white--text">Back to users</Link>
                <h1 class="white--text">{{ formData.first_name }}</h1>
            </v-col>
        </v-row>
        <v-row class="mt-10">
            <v-col cols="8">
                <v-card
                    color="#333"
                    class="pa-8 pr-10"
                >
                    <v-form
                        ref="form"
                        v-model="valid"
                        lazy-validation
                    >
                        <v-row>
                            <v-col>
                                <v-text-field
                                    v-model="formData.first_name"
                                    :rules="nameRules"
                                    label="First Name"
                                    required
                                ></v-text-field>
                            </v-col>
                            <v-col>
                                <v-text-field
                                    v-model="formData.last_name"
                                    :rules="nameRules"
                                    label="Last Name"
                                    required
                                ></v-text-field>
                            </v-col>
                        </v-row>
                    <v-text-field
                        v-model="formData.email"
                        :rules="emailRules"
                        label="E-mail"
                        required
                    ></v-text-field>
                    <v-checkbox
                        v-model="formData.roles"
                        v-for="role in roles_arr"
                        :key="role"
                        :value="role"
                        :label="role"
                    ></v-checkbox>
                    <v-row>
                        <v-col>
                            <v-text-field
                                v-model="formData.password"
                                :rules="(formData.password) ? passwordRules : []"
                                label="Password"
                                type="password"
                            ></v-text-field>
                        </v-col>
                        <v-col>
                            <v-text-field
                                v-model="formData.confirm_password"
                                :rules="(formData.confirm_password) ? confirmPasswordRules : []"
                                label="Confirm password"
                                type="password"
                            ></v-text-field>
                        </v-col>
                    </v-row>

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
                </v-card>
            </v-col>
        </v-row>
    </div>
</template>

<script>
    import Layout from './../Layout';
    import { Link } from '@inertiajs/inertia-vue';

    export default {
        name: 'UserUpdate',
        layout: Layout,
        components: {
            Link,
        },
        props: {
        user: Object,
        user_roles: Array,
        roles: Object,
        },
        data () {
            return {
                formData: {
                    email: null,
                    last_name: null,
                    first_name: null,
                    roles: null,
                    password: null,
                    confirm_password: null,
                    id: null,
                },
                valid: false,
                roles_arr: [],
                emailRules: [
                    v => !!v || 'E-mail is required',
                    v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
                ],
                nameRules: [
                    v => !!v || 'Name is required',
                    v => (v && v.length > 1) || 'Name is too short',
                ],
                passwordRules: [
                    v => !!v || 'Password is required',
                    v => (v && v.length > 5) || 'Password is too short',
                ],
                confirmPasswordRules: [
                    v => !!v || 'Password is required',
                    v => (v && v == this.formData.password) || 'Password mismatch',
                ],
            };
        },
        created () {
            this.formData.roles = this.user_roles;
            this.formData.last_name = this.user.last_name;
            this.formData.first_name = this.user.first_name;
            this.formData.email = this.user.email;
            this.formData.id = this.user.id;

            Object.keys(this.roles).forEach((item)=>{
                console.log('item : ', item);
                this.roles_arr.push(item);
             });
        },
        methods: {
            submit () {
                if (this.$refs.form.validate()) {
                    this.$inertia.post('/user/update', this.formData)
                }
            },
        }, 
    }
</script>

<style scoped>
.white-border input{
    border-color: #fff !important;
}
</style>