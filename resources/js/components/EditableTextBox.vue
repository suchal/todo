<template>
    <div @click="sendClick" class="editable-text-box" :dataId="id">
        <input ref="input" @focusout="editItem" type="text" :disabled="isDisabled" :value="val">
        <div class="btn-box">
            <button v-show="isDisabled" @click="deleteItem"><i class="fas fa-minus-circle"></i></button>
            <button v-show="isDisabled" @click="makeEditable"><i class="fas fa-edit"></i></button>
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
                let obj = this;
                this.$swal({
                    text: "Are you sure you want to delete?",
                    showCancelButton: true,
                }).then((re)=>{
                    console.log(re);
                    if(re.value){
                        obj.$emit('deleteEvent', this.id)
                    }
                })
            },
            makeEditable(event){
                this.isDisabled = false;
                let inp = this.$refs.input;
                setTimeout(()=>{inp.focus()}, 100)
            },
            editItem(){
                this.isDisabled = true;
                this.$emit('editEvent', this.id, this.$refs.input.value)
            },
            sendClick(event){
                if(!event.target.className.includes('fa'))
                    this.$emit('click', this.id)
            }
        },
        props: ['val', 'id']
    }
</script>