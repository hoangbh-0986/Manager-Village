<template>
  <header class="px-5 py-1 text-white bg-blue-400">
    <nav class="container flex items-center justify-between mx-auto">
      <div v-if="authUser" class="flex items-center space-x-5">
        <router-link to="/dashboard">
          <HomeIcon class="w-6 h-6 text-white" />
          <span class="sr-only">Dashboard</span>
        </router-link>
        <router-link to="/users" v-if="isAdmin">Users</router-link>
      </div>
      <router-link to="/" v-else>
        <HomeIcon class="w-6 h-6 text-white" />
      </router-link>
      <div>
        <el-menu
          :default-active="activeIndex"
          class="el-menu-demo flex justify-center"
          mode="horizontal"
          @select="handleSelect"
        >
          <el-submenu index="2">
            <template slot="title" class="css-hihi">Giới Thiệu</template>
            <el-menu-item index="2-1">item one</el-menu-item>
            <el-menu-item index="2-2">item two</el-menu-item>
            <el-menu-item index="2-3">item three</el-menu-item>
          </el-submenu>
          <el-submenu index="3">
            <template slot="title" class="capitalize"
              >Làng nghề truyền thống</template
            >
            <el-menu-item index="2-1">item one</el-menu-item>
            <el-menu-item index="2-2">item two</el-menu-item>
            <el-menu-item index="2-3">item three</el-menu-item>
          </el-submenu>
          <el-submenu index="4">
            <template slot="title">Nghệ Nhân</template>
            <el-menu-item index="2-1">item one</el-menu-item>
            <el-menu-item index="2-2">item two</el-menu-item>
            <el-menu-item index="2-3">item three</el-menu-item>
          </el-submenu>
          <el-submenu index="5">
            <template slot="title">Sản phẩm</template>
            <el-menu-item index="2-1">item one</el-menu-item>
            <el-menu-item index="2-2">item two</el-menu-item>
            <el-menu-item index="2-3">item three</el-menu-item>
          </el-submenu>
          <el-submenu index="6">
            <template slot="title">Hộ sản xuất</template>
            <el-menu-item index="2-1">item one</el-menu-item>
            <el-menu-item index="2-2">item two</el-menu-item>
            <el-menu-item index="2-3">item three</el-menu-item>
          </el-submenu>
          <el-submenu index="7">
            <template slot="title">Liên Hệ</template>
            <el-menu-item index="2-1">item one</el-menu-item>
            <el-menu-item index="2-2">item two</el-menu-item>
            <el-menu-item index="2-3">item three</el-menu-item>
          </el-submenu>
          <div class="line"></div>
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
    };
  },
  components: {
    Logout,
    HomeIcon,
    LoginIcon,
  },
  computed: {
    ...mapGetters("auth", ["authUser", "isAdmin"]),
  },
};
</script>

<style scoped>
.css-hihi {
  text-transform: uppercase !important;
  color: white !important;
}
</style>
