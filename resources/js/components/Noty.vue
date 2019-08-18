<template>
  <div :class="type" v-if="notification" class="alert alert-noty">
    <p class="text-center">{{notification.type}}</p>
  </div>
</template>

<script>
export default {
  created() {
    window.events.$on("notification", payload => {
      this.notification = payload;

      setTimeout(() => {
        this.notification = null;
      }, 2500);
    });
  },
  data() {
    return {
      notification: null
    };
  },
  computed: {
    type() {
      return `alert-${this.notification.type}`;
    }
  }
};
</script>


<style >
.alert-noty {
  position: fixed;
  width: 100%;
  right: 20px;
  bottom: 40px;
  z-index: 1;
}
</style>