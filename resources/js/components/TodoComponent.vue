<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-white">
                    <div class="card-body">
                        <form action="javascript:void(0);">
                            <input type="text" class="form-control add-task" placeholder="New Task...">
                            <button type="submit" @click="createItem" class="btn btn-default"> Add Task</button>
                        </form>
                        <div class="todo-list">
                            <div class="todo-item" :class=" item.status ? 'active' : 'inactive' " v-for="(item, index) in this.todoItems" :key="index" :data-id="item.id" :data-index="index">
                                <div class="checker">
                                    <span class="">
                                        <input type="checkbox" @click="itemState" :checked="item.status ? false : true">
                                    </span>
                                    </div>
                                <span>{{ item.title }}</span>
                                <a href="javascript:void(0);" @click="removeItem" class="float-right remove-todo-item">X</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: [
        'items'
    ],
    data() {
        return {
            todoItems: []
        }
    },
    methods: {
        createItem(e) 
        {
            let input = e.target.previousElementSibling.value
            if(input.trim().length == 0 || input == "") {
                alert('Task title is required')
            }

            axios.post( '/create' , {data: input}).then(response => {
                this.todoItems.push(response.data.data);
                alert('Task Created');
            });
        },

        itemState(e) 
        {
            let state = e.target.checked;
            let itemContainer = e.target.closest('.todo-item')
            let id = itemContainer.dataset.id;
            axios.post( '/done' , {data: id}).then(response => {
                this.todoItems.forEach(function(item) {
                    if(item.id == id) {
                        item.status = response.data.data.status
                    }
                })
            });
        },
        removeItem(e) {
            let itemContainer = e.target.closest('.todo-item')
            let id = itemContainer.dataset.id;
            let index = itemContainer.dataset.index;
            axios.post( '/delete' , {data: id}).then(response => {
                this.todoItems.splice(index, 1);
            });
            
        }
    },
    mounted() {
        this.todoItems = JSON.parse(this.items)
    },
}
</script>