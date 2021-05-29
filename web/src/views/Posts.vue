<template>
  <DashBoard>
    <List
      :posts="posts"
      @onDelete="onDelete"
      @onEdit="(item) => $refs.edit.open(item)"
    />
    <PostForm ref="create" title="Create new job" @save="create" />
    <PostForm ref="edit" title="Edit ward" @save="onEdit" />
    <Pagination :total="total" />
  </DashBoard>
</template>

<script>
import { get, create, destroy, update } from "../api/post";
import Pagination from "@/components/Pagination.vue";
import List from "@/components/ListPosts.vue";
import DashBoard from "@/components/DashBoard.vue";
import PostForm from "@/components/PostForm.vue"

export default {
  components: {
    Pagination,
    List,
    DashBoard,
    PostForm,
  },

  data() {
    return {
      posts: null,
      total: 0,
    };
  },
  mounted() {
    get().then((response) => (this.posts = response.data.post, this.total = response.data.post.lenght));
  },

  methods: {
    async create(values) {
      try {
        await create(values);
        await get().then((response) => (this.posts = response.data.post));
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
        await get().then((response) => (this.posts = response.data.post));
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
        await get().then((response) => (this.posts = response.data.post));
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
