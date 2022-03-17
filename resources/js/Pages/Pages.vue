<template>
    <div>
        <v-row>
            <v-col>
                <Link href="/dashboard">Back to users</Link>
            </v-col>
        </v-row>
        <v-row>
            <v-col>
                <p>Pages...</p>
            </v-col>
        </v-row>
    </div>
</template>

<script>
    import Layout from './../Layout';
    import { Link } from '@inertiajs/inertia-vue';

    export default {
        name: 'Pages',
        layout: Layout,
        components: {
            Link,
        },
        props: {
            pages: Object,
        },
    }
</script>
