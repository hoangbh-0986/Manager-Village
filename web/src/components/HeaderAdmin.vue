<template>
  <header class="bg-white w-full">
    <div class="w-full mx-auto py-2 px-4">
      <div class="flex justify-between items-center py-1">
        <router-link to="/">
          <HomeIcon class="w-6 h-6 text-black" />
        </router-link>
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
      </div>
    </div>
  </header>
</template>

<script>
import { mapGetters } from "vuex";
import HomeIcon from "@/components/icons/HomeIcon";
import Logout from "@/components/Logout";
import LoginIcon from "@/components/icons/LoginIcon";
export default {
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
