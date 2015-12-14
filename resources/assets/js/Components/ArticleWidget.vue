<style>
  .Article img, .Article h3 {
    cursor: pointer;
  }

  .Article img {
    height: 200px;
  }

  .Article p {
    margin: 0.5em 0;
    font-size: 16px;
  }
</style>

<template>
  <div class="col-md-4 Article">
    <h3 @click="visitArticle">{{ article.title }}</h3>
    <img @click="visitArticle" :src="article.image" />
    <p>{{ article.description }}</p>
  </div>
</template>

<script>
export default {
  props: {
    article: Object
  },

  methods: {
    visitArticle() {
      window.open(this.article.article_url, '_blank').focus();
    }
  }
}
</script>
