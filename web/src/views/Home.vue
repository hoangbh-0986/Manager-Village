<template>
  <div>
    <Banner />
    <Header />
    <SlideShow />
    <GeneralInformation />
    <EventHighlinghts />
  </div>
</template>

<script>
import SlideShow from "@/components/SlideShow.vue";
import GeneralInformation from "@/components/GeneralInformation.vue";
import EventHighlinghts from "@/components/EventHighlinghts.vue";
import Banner from "@/components/Banner.vue";
import Header from "@/components/Header.vue";

export default {
  name: "Home",
  components: {
    GeneralInformation,
    SlideShow,
    EventHighlinghts,
    Banner,
    Header,
  },
};
</script>
