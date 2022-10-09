<template>

    <div id="appstyle" v-bind:class="currentStyle">

        <br>
        <button id="change-style" v-bind:class="currentStyle" v-on:click="changeStyle('change-style')">Change
            style</button>
        <router-view />
    </div>
</template>
 <style lang="scss">
      @import '../../css/_exercice.scss'
</style>
<script>
import AllRooms from './AllRooms'
import AllUserRooms from './AllUserRooms'
import '../../css/_exercice1style.scss'

export default {
    name: 'App',
    data() {
        return {
            currentStyle: localStorage.getItem('style-change'),
        };
    },
    components: {
        'AllRooms': AllRooms,
        'AllUserRooms': AllUserRooms

    },
    methods: {
        changeStyle(style) {
            localStorage.setItem('style-change', style);
            this.currentStyle = localStorage.getItem('style-change');
        },
    },
}


</script>