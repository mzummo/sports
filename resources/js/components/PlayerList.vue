<template>
    <ul id="player-list">
        <li>test</li>
        <li v-for="player in players" :key="player.id">
            {{ player.firstName }} {{ player.lastName }}
        </li>
    </ul>
</template>

<script>
    export default {
        data: function() {
            return {
                players: this.players
            }
        },
        props: ['players'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>