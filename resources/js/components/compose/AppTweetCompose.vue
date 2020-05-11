<template>
  <div>
    <form class="flex" @submit.prevent="tweet">
      <div class="mr-3">
        <img :src="$user.avatar" class="w-12 rounded-full" />
      </div>
      <div class="flex-grow">
        <textarea
          class="bg-gray-900 w-full outline-none text-lg text-gray-300 resize-none mb-2"
          placeholder="What's happening"
          autofocus
          v-model="form.body"
          @keypress.enter="tweet"
        ></textarea>
        <div class="flex justify-between">
            <div>
                actions
            </div>
            <div>
                <button type="submit" class="bg-blue-500 rounded-full text-gray-300 text-center px-4 py-3 font-bolf leading-none">Tweet</button>
            </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            form:{
                body: ''
            }
        }
    },
    methods: {
        async tweet() {
            await axios.post('api/tweets', this.form)
              .then(() =>{
                this.form.body = ''
              })
        }
    },
};
</script>