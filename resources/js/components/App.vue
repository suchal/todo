<template>
    <div class="row">
        <Sidebar v-show="!($mq == 'sm' && todo) " :removeTodo="!todo" @todoSelected="loadTodo"></Sidebar>
        <Content v-show="!($mq == 'sm' && !todo) " @showSidebar="showSidebar" :todo="todo"></Content>
    </div>
</template>

<script>

    export default {
        data(){
            return {
                todo: null,

            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            loadTodo(todo){
                this.todo = todo;
            },
            showSidebar(){
                console.log('hiding todo');
                this.todo = null;
            }
        }
    }
</script>
