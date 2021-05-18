<template>
  <DashBoard>
    <List
      :craftVillages="craftVillages"
      @onDelete="onDelete"
      @onEdit="(item) => $refs.edit.open(item)"
      @openCreate="$refs.create.open()"
    />

    <Pagination :total="total" />

    <CraftVillageForm
      ref="create"
      title="Create new Craft Village"
      @save="create"
    />
    <CraftVillageForm ref="edit" title="Edit Craft Village" @save="onEdit" />
  </DashBoard>
</template>

<script>
import { get, create, destroy, update } from "../../api/craftVillage";
import Pagination from "@/components/Pagination.vue";
import List from "@/components/CraftVillage.vue";
import CraftVillageForm from "@/components/CraftVillageForm.vue";
import DashBoard from "@/components/DashBoard.vue";

export default {
  components: {
    Pagination,
    List,
    CraftVillageForm,
    DashBoard,
  },

  data() {
    return {
      craftVillages: [],
      total: 0,
    };
  },
  mounted() {
    get().then((response) => (this.craftVillages = response.data.craftVillage));
  },

  methods: {
    async create(values) {
      try {
        await create(values);
        await get().then((response) => (this.craftVillages = response.data.craftVillage));
        this.$message({
          message: "Craft Villages is created!",
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
        await get().then((response) => (this.craftVillages = response.data.craftVillage));
        this.$message({
          message: "Craft Villages is deleted!",
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
        await get().then((response) => (this.craftVillages = response.data.craftVillage));
        this.$message({
          message: "Craft Villages is updated",
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
