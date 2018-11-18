<template>
    <div id="app" class="app-layout">
        <h1>Магазин</h1>

        <List />
    </div>
</template>

<script>
    import List from './components/List'

    export default {
        name: 'App',

        components: {
            List
        }
    }
</script>

<style lang="scss">
    @import url('https://fonts.googleapis.com/css?family=Roboto&subset=cyrillic');

    #app {
        font-family: 'Roboto', sans-serif;
        color: #333;
    }

    .app {

        &-layout {
            max-width: 1200px;
            width: 100%;

            margin: 0 auto;
            padding: 20px;
        }
    }

    body {
        cursor: default;    
    }
    
    *, *:after, *:before {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

</style>
