<template>
  <div>
    <SlideShow />
    <GeneralInformation />
    <EventHighlinghts />
  </div>
</template>

<script>
import SlideShow from "@/components/SlideShow.vue";
import GeneralInformation from "@/components/GeneralInformation.vue";
import EventHighlinghts from "@/components/EventHighlinghts.vue";
export default {
  name: "Home",
  components: {
    GeneralInformation,
    SlideShow,
    EventHighlinghts,
  },
};
</script>
