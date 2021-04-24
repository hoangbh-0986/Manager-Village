<template>
  <div>
    <SlideShow />
    <GeneralInformation />
  </div>
</template>

<script>
import SlideShow from "@/components/SlideShow.vue";
import GeneralInformation from "@/components/GeneralInformation.vue";
export default {
  name: "Home",
  components: {
    GeneralInformation,
    SlideShow,
  },
};
</script>
