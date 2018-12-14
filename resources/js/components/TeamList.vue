<template>
<select @change="onTeamChange()"
        v-model="selectedTeam"
        >
    <option disabled value="">Select Team</option>
    <option v-for="(team, index) in teams" :value="team.id" :key="index">{{ team.name }}</option>
</select>
</template>

<script>
    export default {
        props: ['teams'],
        mounted() {
            console.log('Component mounted.')
        },
        data: function() {
            return {
                selectedTeam: ''
            }
        },
    }
</script>
