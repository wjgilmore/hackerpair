<template>
    <span>
        <i @click="updateNotification" v-bind:class="{ 'fa-star-o': this.starInverse }" class="fa fa-star fa-lg"></i>
    </span>
</template>

<script>
    export default {
        name: 'favorite',
        data() {
            return {
                starInverse: false
            }
        },
        props: ['eventId', 'favorited'],
        created: function() {
            this.notAlreadyFavorited(this.favorited)
        },
        methods: {

            notAlreadyFavorited: function(previous) {
                if (this.favorited == "1") {
                    this.starInverse = false
                } else {
                    this.starInverse = true
                }
            },

            updateNotification: function(event) {

                this.starInverse = !this.starInverse

                var favorited = {
                    group: 'favorites',
                    title: 'You favorited an event',
                    text: 'An event has been added to your favorite list'
                }

                var unfavorited = {
                    group: 'favorites',
                    title: 'You unfavorited an event',
                    text: 'An event has been removed from your favorites list'
                }

                this.$http.post('/favorites', {id: this.eventId}).then(response => {
                    var res = this.starInverse ? unfavorited : favorited
                    this.$notify(res)
            })

            }
        }
    }

</script>

