<template>
  <div class="container">
    <h1 class="text-center">
      <button class="btn btn-primary" @click="createNewLesson()">create new lesson</button>
    </h1>
    <ul class="list-group d-flex">
      <li
        class="list-group-item d-flex justify-content-between"
        v-for="(lesson,key ) in lessons "
        v-bind:key="key"
      >
        <p>{{lesson.title}}</p>
        <p>
          <button class="btn btn-primary btn-xs" @click="editLesson(lesson)">edit</button>
          <button class="btn btn-danger btn-xs" @click="deleteLesson(lesson.id,key)">delete</button>
        </p>
      </li>
    </ul>
    <create-lesson></create-lesson>
  </div>
</template>

<script>
import axios from "axios";
export default {
  props: ["defualt_lessons", "series_id"],

  mounted() {
    this.$on("lesson_created", lesson => {
      window.noty({
        message: "lesson ss successfully",
        type: "danger"
      });
      this.lessons.push(lesson);
    });
    this.$on("lesson_updated", lesson => {
      let lessonIndex = this.lessons.findIndex(l => {
        return lesson.id == l.id;
      });
      this.lessons.splice(lessonIndex, 1, lesson);
    });
  },

  components: {
    "create-lesson": require("./children/CreateLesson.vue").default
  },

  data() {
    return {
      lessons: JSON.parse(this.defualt_lessons)
    };
  },

  computed: {},
  methods: {
    createNewLesson() {
      this.$emit("create_new_lesson", this.series_id);
    },
    deleteLesson(id, key) {
      if (confirm("are you sure")) {
        axios
          .delete(`/admin/${this.series_id}/lessons/${id}`)
          .then(resp => {
            this.lessons.splice(key, 1);
            console.log(resp);
          })
          .catch(resp => {
            console.log(resp);
          });
      }
    },
    editLesson(lesson) {
      let seriesId = this.series_id;
      this.$emit("edit_lesson", { lesson, seriesId });
    }
  }
};
</script>
