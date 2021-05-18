<template>
  <DashBoard>
    <List
      :jobs="jobs"
      @onDelete="onDelete"
      @onEdit="(item) => $refs.edit.open(item)"
      @openCreate="$refs.create.open()"
    />

    <Pagination :total="total" />

    <JobForm ref="create" title="Create new job" @save="create" />
    <JobForm ref="edit" title="Edit ward" @save="onEdit" />
  </DashBoard>
</template>

<script>
import { get, create, destroy, update } from "../../api/job";
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
    get().then((response) => (this.jobs = response.data.data));
  },

  methods: {
    async create(values) {
      try {
        await create(values);
        await get().then((response) => (this.jobs = response.data.data));
        this.$message({
          message: "Job is created!",
          type: "success",
        });
      } catch (e) {
        this.$message({
          message: "Something goes wrong",
          type: "error",
        });
      }
    },

    async onDelete(id) {
      try {
        await destroy(id);
        await get().then((response) => (this.jobs = response.data.data));
        this.$message({
          message: "Job is deleted!",
          type: "success",
        });
      } catch (e) {
        this.$message({
          message: "Something goes wrong",
          type: "error",
        });
      }
    },

    async onEdit(values) {
      try {
        await update(values.id, values);
        await get().then((response) => (this.jobs = response.data.data));
        this.$message({
          message: "Job is updated",
          type: "success",
        });
      } catch (e) {
        this.$message({
          message: "Something goes wrong",
          type: "error",
        });
      }
    },
  },
};
</script>
