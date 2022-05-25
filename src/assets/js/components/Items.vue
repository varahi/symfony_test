<template>
  <div class="row">
    <div class="col" v-if="items && items.length">
      <div class="item" v-for="item of items">
        <h3><strong>{{item.title}}</strong></h3>
        <div class="description">{{item.description}}</div>
      </div>
    </div>

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
    axios.get(`http://127.0.0.1/api/items`)
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
