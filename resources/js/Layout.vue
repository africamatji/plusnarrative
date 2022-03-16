<template>
  <main>
      <v-app>
          <v-row>
              <v-col cols="3">
   <v-navigation-drawer
        absolute
        permanent
        left
        >
        <template v-slot:prepend>
            <v-list-item two-line>
                <v-list-item-content>
                    <v-list-item-title>PlusNarrative</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </template>

        <v-divider></v-divider>

        <v-list dense>
            <v-list-item
            v-for="item in items"
            :key="item.title"
            >
            <v-list-item-icon>
                <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-icon>

            <v-list-item-content>
                <v-list-item-title>{{ item.title }}</v-list-item-title>
            </v-list-item-content>
            </v-list-item>
        </v-list>
        </v-navigation-drawer>
              </v-col>
               <v-col align="left" class="mt-4" cols="8">
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
    name: 'Layout',
    components: {
        Link,
    },
    data () {
      return {
        items: [
          { title: 'Users', icon: 'mdi-account' },
          { title: 'Pages', icon: 'mdi-note' },
        ],
      }
    },
};
</script>