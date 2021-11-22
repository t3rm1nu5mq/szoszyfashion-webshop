<template>
    <Link :href="'/'">
        <img src="/images/szoszy_logo_brick_180x.png">
    </Link>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
    })
</script>
