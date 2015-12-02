const Vue = require('vue');

Vue.use(require('vue-resource'));

new Vue({

  el: 'body',

  components: {
    'article-widget': require('./Components/ArticleWidget.vue')
  },

  data: {
    articles: []
  },

  ready: function () {
    this.$http.get('/api/articles', (res) => {
      this.articles = res.data;
    });
  }
});
