<template>
  <aside class="mr-2">
    <router-link
      to="/"
      class="aside-btn"
      :class="{ active: $route.name == 'index' }"
    >
      <div>Dashboard</div>
    </router-link>
    <router-link
      to="/admin/ward"
      class="aside-btn"
      :class="{ active: $route.name == 'contests' }"
    >
      <div>Ward</div>
    </router-link>
    <router-link
      to="/admin/job"
      class="aside-btn"
      :class="{ active: $route.name == 'users' }"
    >
      <div>Job</div>
    </router-link>
    <router-link
      to="/posts"
      class="aside-btn"
      :class="{ active: $route.name == 'posts' }"
    >
      <div>Posts</div>
    </router-link>
  </aside>
</template>

<style scoped>
.aside-btn {
  @apply block text-gray-700 px-2 py-3 mb-1 outline-none;
}

.nuxt-link-exact-active {
  @apply bg-gray-100 font-bold text-gray-900 rounded-lg;
}
</style>
