<template>
  <div>
    <div class="flex justify-end w-full mb-4">
      <el-button
        class="px-4 py-2 bg-blue-400 text-white rounded hover:bg-blue-500 active:bg-blue-600"
        @click="open"
      >
        Create new
      </el-button>
    </div>
  <el-table :data="jobs" style="width: 100%">
    <el-table-column prop="id" lable="#" sortable />
    <el-table-column label="Note" width="200" prop="note"> </el-table-column>
    <el-table-column label="Name" prop="name" width="180"> </el-table-column>
    <el-table-column label="Year create" prop="year_create"> </el-table-column>
    <el-table-column label="Ancestor" prop="ancestor"> </el-table-column>
    <el-table-column
      fixed="right"
      label="Actions"
      align="center"
      min-width="150"
    >
      <template slot-scope="scope">
        <el-button icon="el-icon-view" circle />
        <el-button icon="el-icon-edit" circle @click="onEdit(scope.row)" />
        <el-button type="danger" icon="el-icon-delete" circle @click="onDelete(scope.row.id)" />
      </template>
    </el-table-column>
  </el-table>
  </div>
</template>

<script>
export default {
  props: {
    jobs: {
      type: Array,
      required: true,
    },
  },

  methods: {
    onDelete (id) {
      this.$confirm('Delete this job ?', {
        confirmButtonText: 'Delete',
        cancelButtonText: 'cancel',
        type: 'warning'
      }).then(() => {
        return this.$emit('onDelete', id)
      }). catch(() => {})
    },

    onEdit (item) {
      return this.$emit('onEdit', item)
    },

    open () {
      return this.$emit('openCreate')
    },
  }
};
</script>
