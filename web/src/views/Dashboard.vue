<template>
  <div>
    <site-header class="site-header" />
    <div class="layout">
      <site-sidebar class="site-sidebar" />
      <nuxt class="site-content" />
    </div>
  </div>
</template>

<script>
import SiteHeader from "@/components/HeaderAdmin.vue";
import SiteSidebar from "@/components/Sidebar.vue";

export default {
  components: {
    SiteHeader,
    SiteSidebar,
  },

  head() {
    return {
      title: this.$store.state.pageTitle,
    };
  },
};
</script>

<style scoped>
.layout {
  @apply grid gap-2 w-full mx-auto px-2 mt-4 mx-auto;
  grid-template-areas: "site-sidebar site-content";
  grid-template-columns: 260px 1fr;
}

.site-header {
  grid-area: site-header;
}

.site-sidebar {
  grid-area: site-sidebar;
}

.site-content {
  @apply bg-white rounded-lg ml-2 p-4;
  grid-area: site-content;
}
</style>
