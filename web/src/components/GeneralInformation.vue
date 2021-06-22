<template>
  <div class="flex justify-center my-10">
    <div class="flex w-10/12 flex-col items-center">
      <h1 class="my-1 title-general">Giới thiêu chung</h1>
      <img src="../assets/images/title.png" />
      <div class="flex my-10">
        <div 
          class="item border m-2 flex flex-col p-1"
          v-for="item in posts"
          :key="item.id"
          :index="item.id"
        >
          <img :src="srcImage(item)" alt="" style="min-height: 400px;"/>
          <h2 class="title-item my-2">{{ item.title }}</h2>
          <p class="short-content">
            {{ item.content.substr(0, 200) }}...
          </p>
          <el-button type="primary my-4" class="cursor-pointer"  @click="gotoPost(item)">Xem Thêm</el-button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import { getByCategory } from '../api/post'

export default {

  data() {
    return {
      posts: [],
    }
  },
  
  mounted() {
    getByCategory(1).then((response) => (this.posts = response.data.posts));
  },
  
  methods: {
      srcImage(item) {
        var a =  require(`../assets/images/${item.image}`)
        
        return a
      },
      gotoPost(item) {
        this.$router.push({
          path: `/post/${item.id}`,
        });
      }
  }
}
</script>

<style>
.title-general {
  font-size: 24px;
  color: #2f3c44;
  text-shadow: 1px 1px #cccccc;
  text-transform: uppercase;
}
.title-item {
  font-weight: bold;
  padding-bottom: 5px;
  padding-top: 5px;
  color: #212121;
  text-transform: uppercase;
}
.short-content {
  min-height: 130px;
}
</style>
