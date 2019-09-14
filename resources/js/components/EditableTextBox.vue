<template>
    <div @click="sendClick" class="editable-text-box" :dataId="id">
        <input ref="input" @focusout="editItem" type="text" :disabled="isDisabled" :value="val">
        <div class="btn-box">
            <button @click="deleteItem"><i class="fas fa-minus-circle"></i></button>
            <button @click="makeEditable"><i class="fas fa-edit"></i></button>
        </div>
    </div>
</template>

<script>
    export default {
        mounted(){
            this.value = this.val
        },
        data(){
            return {
                isDisabled: true,
                value: ""
            }
        },
        methods: {
            deleteItem(){
                this.$emit('deleteEvent', this.id)
            },
            makeEditable(event){
                this.isDisabled = false;
                this.$refs.input.focus()
            },
            editItem(){
                this.isDisabled = true;
                this.$emit('editEvent', this.id, this.$refs.input.value)
            },
            sendClick(){
                this.$emit('click', this.id)
            }
        },
        props: ['val', 'id']
    }
</script>