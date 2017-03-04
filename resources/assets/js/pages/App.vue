<template>
    <div id="app">
        <div class="container">

            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Laravel 5.4 / Vue.js 2.x</a>
                        <ul class="nav navbar-nav">
                            <router-link tag="li" to="/" exact><a>One</a></router-link>
                            <router-link tag="li" to="/two"><a>Two</a></router-link>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="row">
                <router-view></router-view>
            </div>

        </div><!-- /.container -->

    </div>
</template>

<script>

    export default {
        name: 'app'
    }
</script>

<style>
    #app {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
        margin-top: 60px;
    }

</style>
