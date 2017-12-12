<template>
    <div class="event-ticket-box">

        <div  style="text-align: center;">
            <p>
                YOUR EVENT STATUS
            </p>
            <div style="margin-bottom: 5px;" class="btn-group" role="group">
                <button @click="createTicket" v-bind:class="{ 'going': this.attendanceFlag }" type="button" class="btn" style="border: 1px solid black;">Going</button>
                <button @click="destroyTicket" v-bind:class="{ 'not-going': !this.attendanceFlag }" type="button" class="btn" style="border: 1px solid black;">Not Going</button>
            </div>
        </div>

        <ul class="fa-ul">
            <li>
                <i class="fa-li fa fa-check-square"></i>
                {{ attendeeCurrentCount }} / {{ this.attendeeMax}} attendees
            </li>
            <li>
                <i class="fa-li fa fa-check-square"></i>
                {{ firstNotification }}
            </li>
            <li>
                <i class="fa-li fa fa-check-square"></i>
                {{ secondNotification }}
            </li>
        </ul>

    </div>
</template>
<style>
    .going {
        background-color: #FFBA07;
    }

    .not-going {
        background-color: red;
    }
</style>
<script>
    export default {
        name: 'ticketbox',
        props: ['eventId', 'userId', 'attendingEvent', 'attendeeMax', 'attendeeCount'],
        data() {
            return {
                attendanceFlag: false,
                firstNotification: "",
                secondNotification: "",
                attendeeCurrentCount: this.attendeeCount
            }
        },
        created: function() {
            this.setAttendanceFlag(this.attendingEvent)
        },
        methods: {

            getApprovalStatus: function() {

                this.$http.get('/approvals/' + this.eventId).then(response => {
                    if (response.data.approved == 1) {
                        this.secondNotification = "Your request to join this event has been approved!"
                    } else {
                        this.secondNotification = "Your request has not yet been approved"
                    }
                })
                    .catch(error => {
                        alert("ERROR RETRIEVING APPROVAL STATUS")
                    })

            },

            setAttendanceFlag: function(flag) {
                if (flag == "1") {
                    this.attendanceFlag = true
                    this.firstNotification = "You're attending this event."
                    this.getApprovalStatus()
                } else {
                    this.attendanceFlag = false
                    this.firstNotification = "You're not signed up to attend this event"
                    this.secondNotification = "To attend the event, press the above Going button"
                }
            },

            createTicket: function(event) {

                var attending = {
                    group: 'tickets',
                    title: "You're attending an event",
                    text: "An event has been added to your event list"
                }

                this.$http.post('/tickets', {id: this.eventId}).then(response => {
                    this.firstNotification = "You're attending this event"
                    this.secondNotification = "You'll receive an e-mail once the organizer has approved your request"
                    this.attendanceFlag = true
                    this.attendeeCurrentCount = parseInt(this.attendeeCurrentCount) + 1;
                    //document.getElementById(this.userId + '-avatar').style.visibility="visible"
                    this.$notify(attending)
                })
                    .catch(error => {
                        alert("Error creating ticket")
                    })

            },

            destroyTicket: function(event) {

                var notAttending = {
                    group: 'tickets',
                    title: "You're no longer attending an event",
                    text: "An event has been removed from your event list"
                }

                this.$http.delete('/tickets/' + this.eventId, {method: 'DELETE'}).then(response => {
                    this.firstNotification = "You're no longer signed up to attend this event"
                    this.secondNotification = "If this was a mistake, just click the Going button again"
                    this.attendanceFlag = false
                    this.attendeeCurrentCount = parseInt(this.attendeeCurrentCount) - 1;
                    //document.getElementById(this.userId + '-avatar').style.visibility="hidden"
                    this.$notify(notAttending)
                })
                    .catch(error => {
                        alert(error)
                        alert("Error deleting ticket")
                    })

            }

        }
    }
</script>
