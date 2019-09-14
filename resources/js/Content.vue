<template>
    <div class="content" v-if="todo">
        <div class="todo-header">
            <div class="editable-text-box">
                <input type="text" disabled="" :value="todo.name">
            </div>
        </div>
        <div class="todo-content">
            <NewBox @new_created="onNewItem"></NewBox>
            <ul class="todo-items">
                <li v-for="item in items" class="todo-item">
                <input type="checkbox">
                <EditableTextBox :val="item.content" :id="item.id"></EditableTextBox>
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
                let obj = this
                axios.get('lists/'+this.todo.id).then((response)=>{
                    obj.items = response.data
                })
            },
            onNewItem(value){
                let obj = this;
                axios.post('items', {list_id: this.todo.id, 'content': value}).then((response)=>{
                    if(response.data.status == 'success'){
                        obj.loadItems()
                    }
                })
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
