<template>
  <DashBoard>
    <List
      :experts="experts"
      @onDelete="onDelete"
      @onEdit="(item) => $refs.edit.open(item)"
      @openCreate="$refs.create.open()"
    />

    <Pagination :total="total" />

    <ExpertForm ref="create" title="Thêm mới nghệ nhân" @save="create" />
    <ExpertForm
      ref="edit"
      title="Cập nhật thông tin nghệ nhân"
      @save="onEdit"
    />
  </DashBoard>
</template>

<script>
import { get, create, destroy, update } from "../api/expert";
import Pagination from "@/components/Pagination.vue";
import List from "@/components/ListExpert.vue";
import ExpertForm from "@/components/ExpertForm.vue";
import DashBoard from "@/components/DashBoard.vue";

export default {
  components: {
    Pagination,
    List,
    ExpertForm,
    DashBoard,
  },

  data() {
    return {
      experts: null,
      total: 0,
    };
  },
  mounted() {
    get().then((response) => (this.experts = response.data.experts));
  },

  methods: {
    async create(values) {
      try {
        await create(values);
        await get().then((response) => (this.experts = response.data.experts));
        this.$message({
          message: "Đã thêm thành công nghệ nhân",
          type: "success",
        });
      } catch (e) {
        this.$message({
          message: "Có lỗi xảy ra",
          type: "error",
        });
      }
    },

    async onDelete(id) {
      try {
        await destroy(id);
        await get().then(
          (response) => (
            (this.experts = response.data.experts),
            (this.total = response.data.experts.length)
          )
        );
        this.$message({
          message: "Đã xóa nghệ nhân",
          type: "success",
        });
      } catch (e) {
        this.$message({
          message: "Có lỗi xảy ra",
          type: "error",
        });
      }
    },

    async onEdit(values) {
      try {
        await update(values.id, values);
        await get().then((response) => (this.experts = response.data.experts));
        this.$message({
          message: "Cập nhật thành công",
          type: "success",
        });
      } catch (e) {
        this.$message({
          message: "Có lỗi xảy ra",
          type: "error",
        });
      }
    },
  },
};
</script>
