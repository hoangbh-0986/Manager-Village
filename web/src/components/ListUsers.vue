<template>
    <el-table :data="users" style="width: 100%">
      <el-table-column prop="id" width="100" lable="#" sortable />
      <el-table-column label="Tên" prop="name" width="200"> </el-table-column>
      <el-table-column label="Email" width="450" prop="email" />
      <el-table-column
        fixed="right"
        label="Admin"
        align="center"
        min-width="110"
      >
        <template slot-scope="scope">
          <el-button v-if="!scope.row.isAdmin" icon="el-icon-check" circle @click="setRole(scope.row.id)" />
          <el-button v-else icon="el-icon-check" class="button-role" circle @click="setRole(scope.row.id)" />
        </template>
      </el-table-column>
    </el-table>
</template>

<script>
export default {

  props: {
    users: {
      required: true,
    },
  },

  methods: {
    setRole(item) {
       return this.$emit("setRole", item);
    },
  },
};
</script>
<style scoped>
  .button-role{
    color: white;
    background-color: #0095ff;
  }
</style>