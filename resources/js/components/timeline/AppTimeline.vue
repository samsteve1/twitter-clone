<template>
    <div>
        <app-tweet v-for="tweet in tweets" :key="tweet.id" :tweet="tweet"></app-tweet>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    data() {
        return {
            tweets: []
        }
    },
    methods: {
        async getTweets(){
            await axios.get('/api/timeline').then((response) => {
                this.tweets = response.data.data
            })
        }
    },
    mounted() {
        this.getTweets()
    },
}
</script>