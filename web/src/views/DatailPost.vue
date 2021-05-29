<template>
    <div
    v-html="post.content"  
    >

    </div>
</template>
<script>
import { getDetail } from "../api/post";
export default {
      data() {
    return {
      post: null,
    };
  },
  mounted() {
    getDetail(2).then((response) => (this.post = response.data));
  },
}
</script>