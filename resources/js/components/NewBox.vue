<template>
    <div class="new-box">
        <input @keyup="keyupListener" v-model="text" type="text">
        <button @click="sendData">+</button>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                text: ""
            }
        },
        mounted() {
        },
        methods: {
            sendData(){
                this.$emit('new_created', this.text)
                this.text = "";
            },
            keyupListener(event){
                if (event.keyCode === 13) {
                  event.preventDefault();
                  this.sendData();
                }
            }
        }
    }
</script>