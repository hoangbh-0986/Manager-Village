<template>
  <DashBoard>
    <List
      :experts="experts"
      @onDelete="onDelete"
      @onEdit="(item) => $refs.edit.open(item)"
      @openCreate="$refs.create.open()"
    />

    <Pagination :total="total" />

    <ExpertForm ref="create" title="Create new expert" @save="create" />
    <ExpertForm ref="edit" title="Edit ward" @save="onEdit" />
  </DashBoard>
</template>

<script>
import { get, create, destroy, update } from "../../api/expert";
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
    get().then((response) => (this.experts = response.data.data));
  },

  methods: {
    async create(values) {
      try {
        await create(values);
        this.$message({
          message: "Expert is created!",
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
        this.$message({
          message: "Expert is deleted!",
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
        this.$message({
          message: "Expert is updated",
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
