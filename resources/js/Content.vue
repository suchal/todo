<template>
    <div class="content" v-if="todo">
        <div class="todo-header">
            <div class="menu_btn">
                <button @click="showSidebar"><i class="fas fa-bars"></i></button>
            </div>
            <div class="editable-text-box">
                <input type="text" disabled="" :value="todo.name">
                <div class="btn-box">
                    <button class="share-btn" @click="share"><i class="fas fa-share"></i> Share</button>
                </div>
            </div>
        </div>
        <div class="todo-content">
            <NewBox @new_created="onNewItem"></NewBox>
            <ul class="todo-items">
                <li v-for="item in items" class="todo-item">
                <input @click="toggleItem(item.id)" :checked="item.is_done" type="checkbox">
                <EditableTextBox @click="toggleItem" @deleteEvent="deleteItem" @editEvent="editItem" :val="item.content" :id="item.id"></EditableTextBox>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                items: []
            }
        },
        mounted() {
        },
        methods: {
            loadItems(){
                console.log('loading items')
                let obj = this
                axios.get('lists/'+this.todo.id).then((response)=>{
                    obj.items = response.data
                })
            },
            onNewItem(value){
                let obj = this;
                axios.post('lists/'+this.todo.id+'/items', {list_id: this.todo.id, 'content': value}).then((response)=>{
                    if(response.data.status == 'success'){
                        obj.loadItems()
                    }
                })
            },
            editItem(id, val){
                console.log('edit item', id, val)
                let obj = this;
                axios.patch('lists/'+this.todo.id+'/items', {item_id: id, content: val}).then((response)=>{
                    obj.loadItems()
                })
            },
            deleteItem(id){
                let obj = this;
                axios.delete('lists/'+this.todo.id+'/items/'+id).then((response)=>{
                    obj.loadItems();
                })
            },
            toggleItem(id){
                let obj = this;
                axios.post('lists/'+this.todo.id+'/items/'+id+'/toggle', {}).then((response)=>{
                    obj.loadItems();
                })
            },
            share(){
                let obj = this;
                this.$swal({
                    input: 'email',
                    titleText: 'Share Todo List',
                    text: 'Please enter the email of the person you would like to share the todo list with',
                    showCancelButton: true,
                    confirmButtonText: 'Share',
                    cancelButtonText: 'Cancel'
                }).then((data)=>{
                    let obj2 = obj;
                    axios.post('lists/'+this.todo.id+'/share', {user_email: data.value}).then((response)=>{
                        if(response.data.status == 'error'){
                            this.$swal(response.data.msg)
                        }else{
                            this.$swal('The user can now access this todo list.')
                        }
                    })
                });
            },
            showSidebar(){
                console.log('clicked hamburger');
                this.$emit('showSidebar');
            }
        },
        props: ['todo'],
        watch: {
            todo(newTodo){
                this.loadItems();
            }
        }
    }
</script>
