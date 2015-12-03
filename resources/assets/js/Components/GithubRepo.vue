<style>
  .Repo {
    border-radius: 15px;
    border: 1px solid #c4c4c4;
    cursor: pointer;
    margin: 5px;
    padding: 0.25em;
    /*height: 150px;*/
  }

  .Repo h3 {
    font-weight: 600;
  }

  .Repo span.language {
    font-weight: 800;
  }

  .Repo p {
    font-size: 16px;
  }
</style>

<template>
  <div class="Repo" @click="visitRepo">
    <h3>
      {{ repo.name }}
      <small>({{ yearUpdated }})</small>
      <small v-if="repo.stargazers_count > 0">+{{ repo.stargazers_count }}</small>
    </h3>
    <span class="language" v-if="repo.language">[{{ repo.language }}]</span>
    <p>{{ repo.description }}</p>
  </div>
</template>

<script>
export default {
  props: {
    repo: Object
  },

  computed: {
    yearUpdated: function () {
      return this.repo.updated_at.split('-')[0];
    }
  },

  methods: {
    visitRepo() {
      let win = window.open(this.repo.html_url, '_blank');
      win.focus();
    }
  }
}
</script>
