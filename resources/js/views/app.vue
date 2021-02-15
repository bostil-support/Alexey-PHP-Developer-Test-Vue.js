<template>
  <div>
    {{ message }}
  </div>
</template>

<script>
export default {
  name: 'app',

  props: {
    config: {
      type: Object,
      required: true
    }
  },

  data () {
    return {
      message: 'Hello World',
    }
  },
}
</script>

<style scoped>

</style>
