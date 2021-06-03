<template>
  <DashBoard>
    <List
      :users="users"
      @setRole="setRole"
    />
    <Pagination :total="total" />
  </DashBoard>
</template>

<script>
import { get, setRole } from "../api/user";
import Pagination from "@/components/Pagination.vue";
import List from "@/components/ListUsers.vue";
import DashBoard from "@/components/DashBoard.vue";

export default {
  components: {
    Pagination,
    List,
    DashBoard,
  },

  data() {
    return {
      users: null,
      total: 0,
    };
  },
  mounted() {
    get().then((response) => (this.users = response.data.data, this.total = response.data.data.lenght));
  },

  methods: {
    async setRole(id) {
      try {
        await setRole(id);
        this.$message({
          message: "Cập nhật quyền thành công",
          type: "success",
        });
      } catch (e) {
        this.$message({
          message: "Đã có lỗi xảy ra",
          type: "error",
        });
      }
    },
  },
};
</script>
