<template>
    <div class="row">
        <Sidebar @todoSelected="loadTodo"></Sidebar>
        <Content :todo="todo"></Content>
    </div>
</template>

<script>

    export default {
        data(){
            return {
                todo: null
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            loadTodo(todo){
                this.todo = todo;
            }
        }
    }
</script>
