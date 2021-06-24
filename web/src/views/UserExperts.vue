<template>
  <div>
    <Banner />
    <Header />
    <SlideShow />
    <div class="flex justify-center">
      <div class="h-full flex justify-between my-10 w-11/12">
        <div class="ml-1 body-post w-3/4 mr-5">
          <div
            class="flex border-b-2 border-fuchsia-600 items-center justify-between mr-5 mb-5"
          >
            Trang chủ > Nghệ nhân
          </div>
          <div 
            class="flex p-8 border-b cursor-pointer"
            @click="gotoPost(item)"
            v-for="item in posts.slice(0, 6)"
            :key="item.id"
            :index="item.id"
          >
            <img
                :src="srcImage(item)"
                alt=""
                class="image-news"
            />
            <div class="flex flex-col pl-6">
              <a class="title-item1 my-2">
                {{ item.title }}
              </a>
              <p class="text-sm">
                {{ item.content.substr(0, 200) }}...
              </p>
            </div>
          </div>
        </div>

        <div class="mr-1 title-job">
          <h1 class="my-1 title-general mb-2">Làng nghề truyền thống</h1>
          <div
            v-for="item in jobs.slice(0, 10)"
            :key="item.id"
            class="flex border-t-2 border-b-2 border-fuchsia-600 items-center justify-between py-3 cursor-pointer"
            @click="gotoPost(item)"
          >
            <p class="">{{ item.name }}</p>
            <i class="el-icon-arrow-right" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { get as getJob } from "../api/job";
import { DetailPostExpert } from '../api/post'
import SlideShow from "@/components/SlideShowContact.vue";
import Banner from "@/components/Banner.vue";
import Header from "@/components/Header.vue";

export default {
  data() {
    return {
      jobs: [],
      posts: [],
    };
  },

  mounted() {
    getJob().then((response) => (this.jobs = response.data.jobs));
    DetailPostExpert().then((response) => (this.posts = response.data.posts));
  },

  components: {
    SlideShow,
    Banner,
    Header,
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
};
</script>
<style scoped>
    .title-general {
        font-size: 24px;
        color: #2f3c44;
        text-shadow: 1px 1px #cccccc;
        text-transform: uppercase;
        font-weight: 600;
    }
    .image-news {
        max-width: 320px;
        max-height: 200px;
    }
</style>