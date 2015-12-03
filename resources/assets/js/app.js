const Vue = require('vue');
const _ = require('lodash');

Vue.use(require('vue-resource'));

Vue.config.debug = true;

new Vue({

  el: 'body',

  components: {
    'article-widget': require('./Components/ArticleWidget.vue'),
    'github-repo': require('./Components/GithubRepo.vue'),
  },

  data: {
    articles: [],
    repos: []
  },

  computed: {
    languages: function () {
      return _.object(_.map(_.groupBy(this.repos, 'language'), (items, lang) => {
        return [lang, items.length];
      }));
    },

    repoList: function () {
      if (this.repos.length === 0) {
        return [];
      }

      let repos = this.repos.filter(repo => +repo.updated_at.split('-')[0] >= 2015);

      return _.chunk(_.sortByOrder(repos, ['stargazers_count'], ['desc']), 3);
    }
  },

  ready: function () {
    this.$http.get('/api/articles', (res) => {
      this.articles = res.data;
    });
    this.$http.get('/api/repos', (res) => {
      this.repos = res.data;
    });
  }
});
