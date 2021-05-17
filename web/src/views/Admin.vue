<template>
  <div>
    <site-header class="site-header" />
    <div class="layout">
      <site-sidebar class="site-sidebar" />
      <List
        :wards="wards"
        @onDelete="onDelete"
        @onEdit="item => $refs.edit.open(item)"
        @openCreate="$refs.create.open()"
      />

      <Pagination :total="total" />

      <WardForm ref="create" title="Create new ward" @save="create" />
      <WardForm ref="edit" title="Edit ward" @save="onEdit" />
    </div>
  </div>
</template>

<script>
import { get, create, destroy, update } from "../../api/ward";
import SiteHeader from "@/components/HeaderAdmin.vue";
import SiteSidebar from "@/components/Sidebar.vue";
import Pagination from "@/components/Pagination.vue";
import List from "@/components/ListWard.vue";
import WardForm from "@/components/WardForm.vue";

export default {
  components: {
    SiteHeader,
    SiteSidebar,
    Pagination,
    List,
    WardForm,
  },

  data() {
    return {
      wards: null,
      total: 0,
    };
  },
  mounted() {
    get().then((response) => (this.wards = response.data.data));
  },

  methods: {
    async create (values) {
      try {
        await create(values)
        this.$data.message({
          message: 'Ward is created!',
          type: 'success'
        })
      } catch (e) {
        this.$message.error(e)
      }
    },

    async onDelete (id) {
      try {
        await destroy(id) 
          this.$data.message({
            message: 'Ward is deleted!',
            type: 'success'
          })
      } catch (e) {
        this.$data.message.error(e);
      }
    },

    async onEdit (values) {
      try {
        await update(values.id, values)
        this.$data.message({
            message: 'ward is updated',
            type: 'success'
        })
      } catch (e) {
        this.$data.message.error(e)
      }
    }
  }
}
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
