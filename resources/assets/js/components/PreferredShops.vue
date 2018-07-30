<template>
    <v-app>
        <div class="loading" v-if="loading">
            Loading...
        </div>
        <v-card>
            <v-container
                    fluid
                    grid-list-md
            >
                <v-layout row wrap>
                    <v-flex
                            v-for="card in shops"
                            :key="card.id"
                    >
                        <v-card>
                            <v-card-media
                                    :src="card.picture"
                                    height="200px"
                            >
                                <v-container
                                        fill-height
                                        fluid
                                        pa-2
                                >
                                    <v-layout fill-height>
                                        <v-flex xs12 align-end flexbox>
                                            <span class="headline white--text" v-text="card.name"></span>
                                        </v-flex>
                                    </v-layout>
                                </v-container>
                            </v-card-media>

                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn small color="error"  @click="deleteShop(card.id)">Delete</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-card>
    </v-app>
</template>


<script>
    import api from "../api";

    export default {
        data () {
            return {
                loading: false,
                shops: [],
            }
        },

        created () {
            this.getShops()
        },


        methods: {
            getShops() {
                this.loading = true;

                if(navigator.geolocation){
                    navigator.geolocation.getCurrentPosition(position => {
                        var data = {
                            lang: position.coords.longitude,
                            lent: position.coords.latitude
                        };

                        api.shops('/api/likedshops').getShops(data)
                            .then(({data}) => {
                                this.shops = data;
                                this.loading = false;
                            })
                            .catch(({response}) => {
                                alert(response.data.message);
                            });
                    })
                }
            },

            deleteShop(id) {
                api.shops('/api/delete').deleteShop({id})
                    .then(({}) => {
                        let i = this.shops.map(item => item.id).indexOf(id);
                        this.shops.splice(i, 1);
                    }).catch(({response}) => {
                    alert(response.data.message);
                })
            }
        }
    }
</script>
