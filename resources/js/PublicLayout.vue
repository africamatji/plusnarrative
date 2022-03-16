<template>
  <main>
      <v-app>
          <v-row>
               <v-col align="left" class="mt-4">
                    <article>
                        <slot />
                    </article>
               </v-col>
          </v-row>
      </v-app>
  </main>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
export default {
    name: 'PublicLayout',
    components: {
        Link,
    },
};
</script>