<template>
  <DashBoard>
    <List
      :wards="wards"
      @onDelete="onDelete"
      @onEdit="(item) => $refs.edit.open(item)"
      @openCreate="$refs.create.open()"
    />

    <Pagination :total="total" />

    <WardForm ref="create" title="Create new ward" @save="create" />
    <WardForm ref="edit" title="Edit ward" @save="onEdit" />
  </DashBoard>
</template>

<script>
import { get, create, destroy, update } from "../../api/ward";
import Pagination from "@/components/Pagination.vue";
import List from "@/components/ListWard.vue";
import WardForm from "@/components/WardForm.vue";
import DashBoard from "@/components/DashBoard.vue";

export default {
  components: {
    Pagination,
    List,
    WardForm,
    DashBoard,
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
    async create(values) {
      try {
        await create(values);
        await get().then((response) => (this.wards = response.data.data));
        this.$message({
          message: "Ward is created!",
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
        await get().then((response) => (this.wards = response.data.data));
        this.$message({
          message: "Ward is deleted!",
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
        await get().then((response) => (this.wards = response.data.data));
        this.$message({
          message: "ward is updated",
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
