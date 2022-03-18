<template>
  <main>
      <v-app :style="{background: '#222425'}">
          <v-row>
              <v-col cols="3">
                <v-navigation-drawer
                    absolute
                    permanent
                    left
                    dark
                >
                    <template v-slot:prepend>
                        <v-list-item two-line>
                            <v-list-item-content>
                                <v-list-item-title class="pa-4">
                                    <v-img
                                        src="./img/logo-plusnarrative.svg"
                                        width="170"
                                    >
                                    </v-img>
                                </v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </template>

                    <v-divider></v-divider>

                    <v-list dense>
                        <v-list-item
                            v-for="item in items"
                            :key="item.title"
                            class="tile"
                        >
                        <v-list-item-icon>
                            <v-icon>{{ item.icon }}</v-icon>
                        </v-list-item-icon>

                        <v-list-item-content>
                            <v-list-item-title>
                                <Link :href="item.href" class="white--text">
                                    {{ item.title }}
                                </Link>
                            </v-list-item-title>
                        </v-list-item-content>
                        
                        </v-list-item>
                        <v-list-item>
                            <v-list-item-content>
                                <v-list-item-title>
                                    <v-btn @click="logout" text>
                                            Logout
                                    </v-btn>
                                </v-list-item-title>
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
            { title: 'Users', icon: 'mdi-account', href: '/dashboard' },
            { title: 'Pages', icon: 'mdi-note', href: '/pages' },
            ],
        }
        },
        methods: {
            logout () {
                this.$inertia.get('/logout');
            },
        },
    };
</script>

<style scoped>
  .tile {
    margin: 5px;
    border-radius: 4px;
  }
  .tile:hover {
    background: #ff0043;
  }
  .tile:active {
    background: black;
  }
</style>