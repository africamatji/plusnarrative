<template>
  <div>
      <v-row class="pa-4">
            <v-col>
                <h1 class="white--text">Users</h1>
            </v-col>
            <v-col align="right">
                <inertia-link as="v-btn" href="/user" color="#ff0043"> Create new user </inertia-link>
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
                  dark
                >
                  <template v-slot:top>
                    <v-row>
                      <v-col cols="3">
                          <v-text-field
                            v-model="search"
                            append-icon="mdi-magnify"
                            label="Search for users"
                            class="mx-4"
                            solo-inverted
                          ></v-text-field>
                      </v-col>
                    </v-row>
                  </template>

                  <template v-slot:[`item.first_name`]="{ item }">
                    <Link :href="'/user/update/'+item.id" class="orange--text">
                        {{ item.first_name }}
                    </Link>
                  </template>
                  <template v-slot:[`item.created_at`]="{ item }">
                      {{ dateForm(item.created_at) }}
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
  import moment from 'moment';

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
    methods: {
      dateForm (date) {
        return moment(String(date)).format('D MMM YYYY');
      },
    },  
  }
</script>