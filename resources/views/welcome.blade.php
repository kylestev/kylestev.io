<!DOCTYPE html>
<html>
  <head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="/css/app.css" rel="stylesheet" type="text/css">

    <style>
      html, body {
        height: 100%;
      }

      body {
        margin: 0;
        padding: 0;
        width: 100%;
        display: table;
        font-weight: 600;
        font-family: 'Lato';
      }

      .container {
        text-align: center;
        display: table-cell;
        vertical-align: middle;
      }

      .content {
        text-align: center;
        display: inline-block;
      }

      .title {
        font-size: 96px;
      }
    </style>
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
        <div class="col-md-4 col-sm-6 col-lg-3" v-for="repo in chunk">
          <github-repo :repo="repo"></github-repo>
        </div>
      </div>
    </div>

    <script src="/js/app.js"></script>
  </body>
</html>
