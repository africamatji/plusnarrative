<template>
    <div>
        <v-row>
            <v-col>
                <p class="white--text">
                    <strong>Register</strong> hallloooo...</p>
            </v-col>
        </v-row>
    </div>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue';

    export default {
        name: 'Register',
        components: {
            Link,
        },
        props: {
            pages: Object,
        },
    }
</script>
