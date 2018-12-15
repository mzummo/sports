<style scoped>
    select {
        width: 60%;
    }
    .card {
        margin-top: 25px;
    }
    .spacer {
        margin: 2px;
        display: inline-block;
    }
    button {
        display: inline-block;
    }
</style>

<template>
    <div id='app'>
        <div class="card">
            <div class="card-header">
                <button @click="addTeam()" class="btn btn-info" style="margin:5px">
                    Add Team
                </button>
                <div class="spacer">|</div>
                <button @click="addPlayer()" class="btn btn-dark" style="margin:5px">
                    Add Player
                </button>
                <select @change="onTeamChange()"
                        v-model="selectedTeam"
                        >
                    <option disabled value="">Select Team</option>
                    <option v-for="(team, index) in teams" :value="team.id" :key="index">{{ team.name }}</option>
                </select>
            </div>
            <div class="card-body">
                <ul id="player-list" class="list-group">
                    <li class="list-group-item" 
                        v-for="player in players"
                        :key="player.id"
                        >
                        <div class="d-inline-block">
                            <div class="show-player-info">
                                <span>{{ player.firstName }} {{ player.lastName }}</span>
                            </div>
                            <div class="edit-player-info d-none">
                                <input v-model="player.firstName" type="text" >
                                <input v-model="player.lastName" type="text">
                            </div>
                        </div>
                        <div class="d-inline-block float-right">
                            <button type="button" class="btn btn-primary btn-sm btn-edit "
                                    @click="onPlayerEdit(player, $event)"
                                    >
                                edit
                            </button>
                            <button type="button" class="btn btn-primary btn-sm btn-save d-none"
                                    @click="onPlayerSave(player, $event)"
                                    >
                                save
                            </button>
                            <div class="spacer">|</div>
                            <button type="button" class="btn btn-danger btn-sm">delete</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                teams: [
                    { id: 0, name: "team 1" },
                    { id: 1, name: "team 2" }
                ],
                players: [
                    { id: 0, firstName: 'Player 1', lastName: 'L 1' },
                    { id: 1, firstName: 'Player 2', lastName: 'L 2' }
                ],
                items: [
                    { message: 'Foo' },
                    { message: 'Bar' }
                ],
                selectedTeam: ''
            }
        },
        methods: {
            addTeam: function() {
                console.log('team');
            },
            addPlayer: function() {
                console.log('player');
            },
            onTeamChange: function() {
                let _this = this;
                axios
                    .get('/team/' + this.selectedTeam + '/players')
                    .then(function(response) {
                        _this.players = response.data;
                    });
            },
            onPlayerSave: function(player, e) {
                console.log(player);
                // there is a better way we could toggle Save/Edit
                let parent = e.target.parentElement;
                let $elm = $(parent)
                    .closest("li")
                ;
                $elm
                    .find(".show-player-info")
                    .show()
                ;
                $elm
                    .find(".edit-player-info")
                    .addClass("d-none")
                ;
                $elm
                    .find(".btn-edit")
                    .show()
                ;
                $elm
                    .find(".btn-save")
                    .addClass("d-none")
                ;       
            },
            onPlayerEdit: function(player, e) {

                this.$root.showModal = true;
                let parent = e.target.parentElement;
                let $elm = $(parent)
                    .closest("li")
                ;
                $elm
                    .find(".show-player-info")
                    .hide()
                ;
                $elm
                    .find(".edit-player-info")
                    .removeClass("d-none")
                ;
                $elm
                    .find(".btn-edit")
                    .hide()
                ;
                $elm
                    .find(".btn-save")
                    .removeClass("d-none")
                ;
            }
        }
    }
</script>