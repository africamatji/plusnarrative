<template>
    <v-card>
        <v-container>
            <v-btn>
                Click Me!
            </v-btn>
                <div>
        <h1>Inertiajs is {{ test }}</h1>

        <Link href="/about-us">Go to about us</Link>
    </div>
        </v-container>
    </v-card>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
export default {
    components: {
        Link,
    },
    props: ["test"],
};
</script>