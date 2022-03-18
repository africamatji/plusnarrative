<template>
    <div>
        <v-row>
            <v-col>
                <Link href="/dashboard" class="white--text">Back to users</Link>
            </v-col>
        </v-row>
        <v-row>
            <v-col>
                <p class="white--text">
                    <strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries
                </p>
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
