<template>
  <vue-simplemde v-model="content" preview-class="markdown-body" ref="markdownEditor" />
</template>

<script>
  import VueSimplemde from 'vue-simplemde'

  export default {
    components: {
      VueSimplemde
    }
  }
</script>

<style>
  @import '~simplemde/dist/simplemde.min.css';
  @import '~github-markdown-css';
</style>