<template>
  <div class="row">
    <ul class="col" v-if="items && items.length">
      <li class="item" v-for="item of items">
        {{item.title}}
        <p class="description">{{item.description}}</p>
      </li>
    </ul>

    <ul v-if="errors && errors.length">
      <li v-for="error of errors">
        {{error.message}}
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      items: [],
      errors: []
    }
  },

  // Fetches items when the component is created.
  created() {
    axios.get(`http://127.0.0.1/api/categories`)
        .then(response => {
          // JSON responses are automatically parsed.
          this.items = response.data
        })
        .catch(e => {
          this.errors.push(e)
        })
  }
}
</script>