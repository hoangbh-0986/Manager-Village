<template>
  <div>
    <Banner />
    <Header />
    <SlideShow />
    <div class="flex justify-center">
      <div class="h-full flex justify-between my-10 w-10/12">
        <div class="ml-1 body-post">
          <div
            class="flex border-b-2 border-fuchsia-600 items-center justify-between mr-5 mb-5"
          >
            Trang chủ > Sản Phẩm
          </div>
            <div class="flex flex-wrap content-evenly">
                <div 
                    class="flex my-10 ml-2 cursor-pointer"
                    v-for="item in products"
                    :key="item.id"
                    :index="item.id"
                    @click="detailProduct(item)"
                >
                    <div 
                        class="item border flex flex-col items-center justify-center"
                        >
                        <img :src="srcImage(item)" alt="" class="image-product"/>
                            <div class="w-10/12">
                            <h2 class="title-item my-2"> {{ item.name }}</h2>
                                <p class="short-content">
                                    Làng nghề: {{ item.craft_villages.name}}
                                </p>
                                <p class="mt-2">
                                    SĐT: {{ item.craft_villages.phone}}
                                </p>
                            </div>
                    </div>
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
import { get as getProducts } from "../api/product";
import SlideShow from "@/components/SlideShowContact.vue";
import Banner from "@/components/Banner.vue";
import Header from "@/components/Header.vue";


export default {
  data() {
    return {
      jobs: [],
      products: [],
    };
  },

  mounted() {
    getJob().then((response) => (this.jobs = response.data.jobs));
    getProducts().then((response) => (this.products = response.data.products));
  },
  name: "Home",
  components: {
    SlideShow,
    Banner,
    Header,
  },

  methods: {
    gotoPost(item) {
      if (item.posts[0].id) {
        this.$router.push({
          path: `/post/${item.posts[0].id}`,
        });
      } else {
        this.router.push({
          path: "/post",
        });
      }
    },

    srcImage(item) {
        var a =  require(`../assets/images/${item.image}`)
        
        return a
    },

    detailProduct(item) {
      this.$router.push({
        path: `product/${item.id}`,
      });
    }
  },
};
</script>
<style scoped>
  .body-post {
    flex-grow: 30;
  }
  .title-job {
    flex-grow: 1;
  }
  .title-general {
    font-size: 24px;
    color: #2f3c44;
    text-shadow: 1px 1px #cccccc;
    text-transform: uppercase;
  }
  .el-date-editor.el-input {
    width: 100%;
  }
  .el-dialog__body {
    padding: 0px 20px !important;
  }
  .el-form-item {
    margin-bottom: 20px;
  }
  .image-product {
    width: 250px;
    height: 250px;
  }
</style>
