<template>
  <div>
    <div :data-vimeo-id="lesson.video_id" v-if="lesson" data-vimeo-width="640" id="handstick"></div>
  </div>
</template>	

<script>
import Player from "@vimeo/player";
import Swal from "sweetalert2";
import axios from "axios";
export default {
  props: ["defualt_lesson", "next_lesson_url"],
  data() {
    return {
      lesson: JSON.parse(this.defualt_lesson)
    };
  },
  methods: {
    displayVideoEndedAlert() {
      if (this.next_lesson_url) {
        Swal.fire({
          type: "success",
          title: "Your work has been saved",
          showConfirmButton: true
        }).then(() => {
          window.location = this.next_lesson_url;
        });
      } else {
        Swal.fire({
          title: "Error!",
          text: "compelted",
          type: "error",
          confirmButtonText: "Cool"
        });
      }
    },
    completeLesson() {
      axios
        .post(`/series/complete-lesson/${this.lesson.id}`, {})
        .then(resp => {
          console.log(resp.data);
          this.displayVideoEndedAlert();
        })
        .catch(resp => {
          console.log(resp.data);
        });
    }
  },
  mounted() {
    const player = new Player("handstick");
    player.on("ended", () => {
      this.completeLesson();
    });
  }
};
</script>