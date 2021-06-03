<template>
  <header class="px-5 py-1 text-white bg-blue-400">
    <nav class="container flex items-center justify-between mx-auto">
      <div v-if="authUser" class="flex items-center space-x-5">
        <router-link to="/">
          <HomeIcon class="w-6 h-6 text-white" />
        </router-link>
        <router-link to="/admin/craft-village" v-if="isAdmin">Admin-DashBoard</router-link>
      </div>
      <router-link to="/" v-else>
        <HomeIcon class="w-6 h-6 text-white" />
      </router-link>
      <div>
        <el-menu
          :default-active="activeIndex"
          class="el-menu-demo flex justify-center"
          mode="horizontal"
        >
          <el-submenu index="2">
            <template slot="title" class="css-hihi">Nghề truyền thống</template>
            <el-menu-item
              v-for="item in jobs.slice(0, 7)"
              :key="item.id"
              :index="item.id"
              @click="detailJob(item)"
            >
              {{ item.name }}
            </el-menu-item>
          </el-submenu>
          <el-submenu index="3">
            <template slot="title" class="capitalize"
              >Làng nghề truyền thống</template
            >
            <el-menu-item
              v-for="item in carftVillages"
              :key="item.id"
              :index="item.id"
              @click="detailCarftVillages(item)"
            >
              {{ item.name }}
            </el-menu-item>
          </el-submenu>
          <el-submenu index="4">
            <template slot="title">Nghệ Nhân</template>
            <el-menu-item
              v-for="item in experts.slice(0, 5)"
              :key="item.id"
              :index="item.id"
              @click="detailExpert(item)"
            >
              {{ item.name }}
            </el-menu-item>
          </el-submenu>
          <el-submenu index="5">
            <template slot="title">Sản phẩm</template>
            <el-menu-item index="2-1">Sản phẩm làng nghề</el-menu-item>
            <el-menu-item index="2-2">Sản Phẩm khác</el-menu-item>
          </el-submenu>
          <el-submenu index="6">
            <template slot="title">Hộ sản xuất</template>
            <el-menu-item index="2-1">Hộ sản xuất nhỏ</el-menu-item>
            <el-menu-item index="2-2">Cơ sở sản xuất lớn</el-menu-item>
            <el-menu-item index="2-3">Hợp tác xã</el-menu-item>
          </el-submenu>
           <router-link to="/contact">
          <el-submenu index="7" >
            <template slot="title">Liên Hệ</template>
          </el-submenu>
          </router-link>
          <!-- <div class="line"></div> -->
        </el-menu>
      </div>
      <div class="inline-flex items-center space-x-5" v-if="authUser">
        <router-link to="/user">{{ authUser.name }}</router-link>
        <Logout />
      </div>
      <router-link
        v-else
        to="/login"
        class="inline-flex items-center space-x-2"
      >
        <span>Login</span>
        <LoginIcon class="w-6 h-6 text-white" />
      </router-link>
    </nav>
  </header>
</template>

<script>
import { get } from "../api/craftVillage";
import { get as getJob } from "../api/job";
import { get as getExpert } from "../api/expert";
import { mapGetters } from "vuex";
import Logout from "@/components/Logout";
import HomeIcon from "@/components/icons/HomeIcon";
import LoginIcon from "@/components/icons/LoginIcon";

export default {
  name: "Header",
  data() {
    return {
      activeIndex: "1",
      activeIndex2: "1",
      carftVillages: [],
      jobs: [],
      experts: [],
    };
  },

  mounted() {
    get().then((response) => (this.carftVillages = response.data.craftVillage));
    getJob().then((response) => (this.jobs = response.data.data));
    getExpert().then((response) => (this.experts = response.data.data));
  },

  components: {
    Logout,
    HomeIcon,
    LoginIcon,
  },
  computed: {
    ...mapGetters("auth", ["authUser", "isAdmin"]),
  },

  methods: {
    detailJob(item) {
      this.$router.push({
        path: '/admin/detail-post',
        query: { type: 'job', id: item.id },
        });
    },
    detailCarftVillages(item) {
      this.$router.push({
        path: '/admin/detail-post',
        query: { type: 'carftVillage', id: item.id },
        });
    },
    detailExpert(item) {
      this.$router.push({
        path: '/admin/detail-post',
        query: { type: 'expert', id: item.id },
      });
    }
  },
};
</script>

<style scoped>
.css-hihi {
  text-transform: uppercase !important;
  color: white !important;
}
</style>
