<template>
  <aside class="mr-2">
    <router-link
      to="/admin/craft-village"
      class="aside-btn"
      :class="$route.name === 'craft-village' ? 'active' : ''"
    >
      <div>Làng Nghề</div>
    </router-link>
    <router-link
      to="/admin/ward"
      class="aside-btn"
      :class="$route.name === 'ward' ? 'active' : ''"
    >
      <div>Khu Vực(xã, phường)</div>
    </router-link>
    <router-link
      to="/admin/job"
      class="aside-btn"
      :class="$route.name === 'job' ? 'active' : ''"
    >
      <div>Nghề Truyền Thống</div>
    </router-link>
    <router-link
      to="/admin/posts"
      class="aside-btn"
      :class="$route.name === 'posts' ? 'active' : ''"
    >
      <div>Bài Viết</div>
    </router-link>
    <router-link
      to="/admin/expert"
      class="aside-btn"
      :class="$route.name === 'expert' ? 'active' : ''"
    >
      <div>Nghệ Nhân</div>
    </router-link>
    <router-link
      to="/admin/users"
      class="aside-btn"
      :class="$route.name === 'usersAdmin' ? 'active' : ''"
    >
      <div>Người dùng</div>
    </router-link>
    <router-link
      to="/admin/feedback"
      class="aside-btn"
      :class="$route.name === 'managerFeedback' ? 'active' : ''"
    >
      <div>Phản hồi</div>
    </router-link>
  </aside>
</template>

<style scoped>
.aside-btn {
  @apply block text-gray-700 px-2 py-3 mb-1 outline-none;
}
.active {
  background-color: rgba(111, 111, 190, 0.219);
}
</style>
