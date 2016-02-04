<!DOCTYPE html>
<html>
  <head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div class="container">
      <h1>Articles</h1>
      <div class="row">
        <div v-for="article in articles">
          <article-widget :article="article"></article-widget>
        </div>
      </div>
      <hr />
      <h1>Open Source Repositories</h1>
      <div class="row" v-for="chunk in repoList">
        <div class="col-md-4" v-for="repo in chunk">
          <github-repo :repo="repo"></github-repo>
        </div>
      </div>
    </div>

    <script src="{{ elixir('js/app.js') }}"></script>
  </body>
</html>
