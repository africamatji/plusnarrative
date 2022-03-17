<template>
  <div>
      <v-row>
            <v-col>
                <h1>Users</h1>
            </v-col>
            <v-col>
                <inertia-link as="v-btn" href="/user" color="primary"> Create new user </inertia-link>
            </v-col>
        </v-row>
        <v-row>
          <v-col>
              <div>
                <v-data-table
                  :headers="headers"
                  :items="users"
                  item-key="name"
                  class="elevation-1"
                  :search="search"
                  :items-per-page=5
                >
                  <template v-slot:top>
                    <v-text-field
                      v-model="search"
                      label="Search for users"
                      class="mx-4"
                    ></v-text-field>
                  </template>
                  <template v-slot:[`item.first_name`]="{ item }">
                    <Link :href="'/user/update/'+item.id">
                        {{ item.first_name }}
                    </Link>
                  </template>         
                </v-data-table>
              </div>
          </v-col>
        </v-row>
  </div>
</template>

<script>
  import Layout from './../Layout';
  import { Link } from "@inertiajs/inertia-vue";

  export default {
    name: 'Dashboard',
    layout: Layout,
    components: {
        Link,
    },
    props: {
      users: Array,
    },
    data () {
      return {
        search: '',
      };
    },
    computed: {
      headers () {
        return [
          { text: 'First Name', value: 'first_name' },
          { text: 'Last Name', value: 'last_name' },
          { text: 'Email Address', value: 'email' },
          { text: 'Member Since', value: 'created_at' },
        ]
      },
    },   
  }
</script>