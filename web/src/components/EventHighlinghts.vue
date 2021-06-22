<template>
  <div class="flex justify-center flex-col items-center my-10">
    <div class="flex w-10/12 flex-col items-center">
      <h1 class="my-1 title-general">TIN TỨC - SỰ KIỆN NỔI BẬT</h1>
      <img src="../assets/images/title.png" />
      <div class="flex my-10">
        <div 
          class="mr-2 my-5 cursor-pointer"
          @click="gotoPost(item)"
          v-for="item in posts.slice(0, 1)"
          :key="item.id"
          :index="item.id"
        >
          <img
            :src="srcImage(item)"
            alt=""
            class="image-big mb-5"
          />
          <a class="title-item1">
            {{ item.title }}
          </a>
          <p class="text-base">
            {{ item.content.substr(0, 200) }}...
          </p>
        </div>
        <div class="ml-2">
          <div
            class="flex my-3 cursor-pointer"
            @click="gotoPost(item)"
            v-for="item in posts.slice(1, 4)"
            :key="item.id"
            :index="item.id"
          >
            <img
              :src="srcImage(item)"
              alt=""
              class="image-small mt-2 mr-5"
            />
            <div>
              <a class="title-item1 my-2">
                {{ item.title }}
              </a>
              <p class="text-sm">
                {{ item.content.substr(0, 200) }}...
              </p>
            </div>
          </div>
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
    getByCategory(2).then((response) => (this.posts = response.data.posts));
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

<style scoped>
.image-big {
  max-height: 400px;
}
.image-small {
  max-width: 160px;
  max-height: 110px;
}
.title-item1 {
  text-decoration: none;
  color: #212121;
  font-weight: bold;
}
</style>
