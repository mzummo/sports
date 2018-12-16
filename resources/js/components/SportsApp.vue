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
                <button @click="onAddTeam()" class="btn btn-info" style="margin:5px">
                    Add Team
                </button>
                <div class="spacer">|</div>
                <button @click="onAddPlayer()" class="btn btn-dark" style="margin:5px">
                    Add Player
                </button>
                <select @change="onTeamChange()"
                        v-model="selectedTeam"
                        >
                    <option disabled value="">Select Team</option>
                    <option v-for="team in teams" :value="team.id" :key="team.id">{{ team.name }}</option>
                </select>
            </div>
            <div class="card-body">
                <!-- TODO: could use a bootstrap table vue component -->
                <ul id="player-list" class="list-group">
                    <li class="list-group-item" 
                        v-for="(player, index) in players"
                        :key="player.id"
                        :index="index"
                        >
                        <div class="d-inline-block">
                            <div v-if="!edit[index]" class="show-player-info">
                                <span><b>Player Name:</b> {{ player.firstName }} {{ player.lastName }}</span>
                            </div>
                            <div v-else class="edit-player-info">
                                <!-- TODO: use a bootstrap form control so we can have labels above -->
                                <input v-model="player.firstName" type="text" >
                                <input v-model="player.lastName" type="text">
                            </div>
                        </div>
                        <div class="d-inline-block float-right">
                            <button v-if="!edit[index]" type="button" class="btn btn-primary btn-sm btn-edit "
                                    @click="onPlayerEdit(player, $event)"
                                    >
                                edit
                            </button>
                            <button v-else type="button" class="btn btn-primary btn-sm btn-save"
                                    @click="onPlayerSave(player, $event)"
                                    >
                                save
                            </button>
                            <div class="spacer">|</div>
                            <button type="button" class="btn btn-danger btn-sm"
                                    @click="onPlayerDelete(player, $event)"
                                    >
                                delete
                            </button>
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
                    // { id: 0, name: "team 1" },
                    // { id: 1, name: "team 2" }
                ],
                players: [
                    // { id: 0, firstName: 'Player 1', lastName: 'L 1' },
                    // { id: 1, firstName: 'Player 2', lastName: 'L 2' }
                ],
                // items: [
                //     { message: 'Foo' },
                //     { message: 'Bar' }
                // ],
                selectedTeam: '',
                edit: {}
            }
        },
        created: function() {
            this.getAllTeams();
        },
        methods: {
            checkVal: function(val) {
                if (val) {
                    return true;
                }
                return false;
            },
            getAllTeams: function() {
                let _this = this;
                axios
                    .get('/api/team')
                    .then(function(response) {
                        _this.teams = response.data;
                    });
                    // TODO else toastr error
            },
            onPlayerDelete: function(player, e) {
                    let _this = this;
                    axios
                        .delete('/api/player/' + player.id, {})
                        .then(function(response) {
                            _this.players.splice(_this.players.indexOf(player), 1);
                        });
                        // TODO: alerts success
            },
            onAddTeam: function() {
                // could make a function that takes an object of params to build all this and re-use
                let _this = this;
                swal({
                    title: 'Add Team',
                    html:
                        `<input id="swal-input-team-name" class="swal2-input" placeholder="Team Name">`,
                    focusConfirm: false,
                    preConfirm: () => {
                        return {
                            name: document.getElementById('swal-input-team-name').value,
                        }
                    }
                }).then(function({value: formValues}) {
                    let newTeam = {
                        name: formValues.name,
                    }
                    axios
                        .post('/api/team', newTeam)
                        .then(function(response) {
                            _this.teams.push(response.data);
                        });
                        // TODO else toastr error
                });
            },
            onAddPlayer: function() {
                let _this = this;
                if (this.players.length === 0) {
                    alert("You must add a team first.");
                    return;
                }
                swal({
                    title: 'Add Player',
                    html:
                        `<input id="swal-input-firstName" class="swal2-input" placeholder="First Name">
                         <input id="swal-input-lastName" class="swal2-input" placeholder="Last Name">`,
                    focusConfirm: false,
                    preConfirm: () => {
                        return {
                            firstName: document.getElementById('swal-input-firstName').value,
                            lastName: document.getElementById('swal-input-lastName').value
                        }
                    }
                }).then(function({value: formValues}) {
                    let newPlayer = {
                        firstName: formValues.firstName,
                        lastName: formValues.lastName,
                        'team_id': _this.selectedTeam
                    }
                    axios
                        .post('/api/player', newPlayer)
                        .then(function(response) {
                            _this.players.push(response.data);
                        });
                        // TODO only save on success else throw toastr error
                });
            },
            onTeamChange: function() {
                let _this = this;
                axios
                    .get('/api/team/' + this.selectedTeam + '/players')
                    .then(function(response) {
                        _this.players = response.data;
                    });
            },
            onPlayerSave: function(player, event, index) {
                // could make add and save player one function
                let _this = this;
                axios
                    .post('/api/player/' + player.id, player)
                    .then(function(response) {
                        // there is going to be an issue where we can't revert if save failed
                    });     
            },
            onPlayerEdit: function(player, event, index) {
                Vue.set(sportsApp.$children[0].edit, index, true);
                // use this.$refs.nameElement[index]
            }
        }
    }
</script>