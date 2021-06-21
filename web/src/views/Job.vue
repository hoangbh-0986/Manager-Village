<template>
  <DashBoard>
    <List
      :jobs="jobs"
      @onDelete="onDelete"
      @onEdit="(item) => $refs.edit.open(item)"
      @openCreate="$refs.create.open()"
    />

    <Pagination :total="total" />

    <JobForm ref="create" title="Thêm mới nghề truyền thống" @save="create" />
    <JobForm ref="edit" title="Cập nhật nghề truyền thống" @save="onEdit" />
  </DashBoard>
</template>

<script>
import { get, create, destroy, update } from "../api/job";
import Pagination from "@/components/Pagination.vue";
import List from "@/components/ListJob.vue";
import JobForm from "@/components/JobForm.vue";
import DashBoard from "@/components/DashBoard.vue";

export default {
  components: {
    Pagination,
    List,
    JobForm,
    DashBoard,
  },

  data() {
    return {
      jobs: null,
      total: 0,
    };
  },
  mounted() {
    get().then((response) => (this.jobs = response.data.jobs));
  },

  methods: {
    async create(values) {
      try {
        await create(values);
        await get().then(
          (response) => (
            (this.jobs = response.data.data), (this.total = response.data.total)
          )
        );
        this.$message({
          message: "Thêm mới nghề thành công",
          type: "success",
        });
      } catch (e) {
        this.$message({
          message: "Đã có lỗi xảy ra",
          type: "error",
        });
      }
    },

    async onDelete(id) {
      try {
        await destroy(id);
        await get().then((response) => (this.jobs = response.data.data));
        this.$message({
          message: "Đã xóa nghề ",
          type: "success",
        });
      } catch (e) {
        this.$message({
          message: "Đã có lỗi xảy ra",
          type: "error",
        });
      }
    },

    async onEdit(values) {
      try {
        await update(values.id, values);
        await get().then((response) => (this.jobs = response.data.data));
        this.$message({
          message: "Đã cập nhật nghề",
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
