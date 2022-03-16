<template>
  <v-row>
      <v-col>
          <h1>Users</h1>
      </v-col>
      <v-col>
          <v-btn>
              Create New User
          </v-btn>
      </v-col>
  </v-row>
</template>

<script>
  import Layout from './../Layout';

  export default {
      name: 'Dash',
    // Using the shorthand
    layout: Layout,

    props: {
      user: Object,
    },
  }
</script>