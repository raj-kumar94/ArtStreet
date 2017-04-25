<template>
    <div>
        <p class="text-center" v-if="loading">
            <div v-if="loading">Loading...</div>
        </p>
        <p class="text-center" v-if="!loading">
            <div><button class="btn btn-success" v-if="status == 0" @click="add_friend">Add Friend</button></div>

            <div>
            <button class="btn btn-success" v-if="status == 'pending'" @click="accept_friend">Accept Friend</button>
            </div>

            <div>
            <span class="text-success" v-if="status == 'waiting'">Waiting for response</span>
            </div>
            
            <div v-if="status == 'friends'">
                <span class="text-success">Friends</span><br>
                <button class="btn btn-success" @click="testdata">Send me a message</button>
                <button class="btn btn-primary" @click="testdata">Hire</button>
            </div>    
        
            
        </p>
    </div>
</template>

<script>
export default {
    mounted() {
        this.$http.get('/check_relationship_status/' + this.profile_user_id )
            .then( (resp) => {
                console.log(resp)
                this.status = resp.body.status
                this.loading = false
            })
    },
    props: ['profile_user_id'],
    data() {
        return {
            status: '',
            loading: true
        }
    },
    methods: {
        add_friend() {
            this.loading = true
            this.$http.get('/add_friend/' + this.profile_user_id )
                .then( (r) => {
                    if(r.body == 1)
                        this.status = 'waiting'
                    noty({
                        type: 'success',
                        layout: 'bottomLeft',
                        text: 'Friend request sent .'
                    })
                    this.loading = false
                })
        },
        accept_friend() {
            this.loading = true
            this.$http.get('/accept_friend/' + this.profile_user_id )
                .then( (r) => {
                    if(r.body == 1)
                        this.status = 'friends'
                    noty({
                        type: 'success',
                        layout: 'bottomLeft',
                        text: 'You are now friend. Go ahead and hangout .'
                    })
                    this.loading = false
                })
        },
        testdata () {
            axios.post('/posttest',this.status)
            .then( (r) => {
                console.log()
            })
        }
    }
}
</script>
