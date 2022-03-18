<template>

</template>

<script>
    import { Link } from '@inertiajs/inertia-vue';

    export default {
        name: 'Logout',
        components: {
            Link,
        },
        created () {
            window.location.href = "/login"
        },
    }
</script>
