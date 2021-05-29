<template>
  <el-pagination
    layout="prev, pager, next"
    :page-size="2"
    :total="total"
    class="text-center mt-1"
    background
    @current-change="go"
    @size-change="(size) => go(currentPage, { limit: size })"
  />
</template>

<script>
import _assign from "lodash/assign";

export default {
  props: {
    total: Number,
    queryParam: {
      type: String,
      default: "page",
    },
  },

  methods: {
    go(page, query) {
      this.$router.push(this.to(page, query));
    },

    to(page, params = {}) {
      const path = this.$route.path;
      const nextParams = _assign({}, this.$route.query, params);
      const query = _assign({}, nextParams, { [this.queryParam]: page });

      return { path, query };
    },
  },
};
</script>
