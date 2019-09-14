<template>
    <div class="sidebar bg-dark">
        <div class="header">
            <div class="header-title">Suchal Todo</div>
            <div>
                <a href="logout" class="logout-btn" type="submit"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
        <div class="create-box">
            <h4 class="center">Create New List</h4>
            <NewBox @new_created="onNewList"></NewBox>
        </div>
        <ul class="todo-list">
            <li v-for="todo in todos">
            <EditableTextBox @click="todoSelected" @deleteEvent="deleteTodo" @editEvent="editTodo" :val="todo.name" :id="todo.id"></EditableTextBox>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                todos : []
            }
        },
        mounted() {
            console.log('Component mounted.')
            this.loadTodo()
        },
        methods: {
            onNewList(data){
                let obj = this;
                axios.post('/lists', {'name':data}).then(function(response){
                        obj.loadTodo();
                    })
            },
            loadTodo(){
                let obj = this;
                axios.get('lists').then(function(response){
                        console.log(response);
                        obj.todos = response.data;
                    })
            },
            deleteTodo(id){
                let obj = this;
                axios.delete('lists/'+id).then(function(response){
                    console.log(response);
                    obj.loadTodo()
                })
            },
            editTodo(id, name){
                let obj = this
                axios.patch('lists/', {list_id: id, name: name}).then(function(response){
                    console.log(response);
                    obj.loadTodo()
                })
            },
            todoSelected(id){
                let todo = null;
                this.todos.forEach(function(_todo){
                    if(_todo.id == id)
                        todo = _todo
                })
                this.$emit('todoSelected', todo)
            }
        }
    }
</script>
