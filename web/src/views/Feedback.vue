<template>
  <DashBoard>
    <List
      :feedBacks="feedBacks"
      @onDelete="onDelete"
    />

    <Pagination :total="total" />
  </DashBoard>
</template>

<script>
import { get, destroy } from "../api/contact";
import Pagination from "@/components/Pagination.vue";
import List from "@/components/ListFeedback.vue";
import DashBoard from "@/components/DashBoard.vue";

export default {
  components: {
    Pagination,
    List,
    DashBoard,
  },

  data() {
    return {
      feedBacks: [],
      total: 0,
    };
  },
  mounted() {
    get().then(
      (response) => (
        (this.feedBacks = response.data.feedbacks),
        (this.total = response.data.feedbacks.length)
      )
    );
  },

  methods: {
    async onDelete(id) {
      try {
        await destroy(id);
        await get().then(
          (response) => (this.feedBacks = response.data.feedbacks)
        );
        this.$message({
          message: "Đã xóa feedback",
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
