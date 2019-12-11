<template>
    <div class="container">
        <p v-for="user in users" :key="user.id">{{ user.name }}</p>
        <div class="row mt-5 justify-content-center">
            <div class="col-md-8 text-center">
                <input type="text" v-model="task" class="form-control">
                <button type="button" @click="addTask" class="btn btn-primary mt-2">Guardar</button>
            </div>
        </div>
        <div class="text-center">
            <p v-for="task in tasks" :key="task">{{ task }}</p>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['room'],
        data() {
            return {
                task: '',
                tasks: [],
                users: []
            }
        },
        created() {
            this.fillTask();
            // window.Echo.channel('new-post').listen('NewPost', (e) => {
            //     console.log(e);
            //     this.tasks.push(e.task.name);
            // });
            window.Echo.join('room.' + this.room)
                        .here((users) => {
                            this.users = users;
                            console.log(users);
                        })
                        .joining((user) => {
                            // this.users.splice(this.users.indexOf(user),1);
                            this.users.push(user);
                            console.log(user);
                        })
                        .leaving((user) => {
                            this.users.splice(this.users.indexOf(user),1);
                            console.log(user);
                        })
        },
        methods: {
            addTask(){
                axios.post('/task',{
                    name: this.task
                })
                .then(res => {
                    this.tasks.push(res.data.name);
                    this.task = '';
                })
                .catch(err => {
                    console.error(err);
                })
            },
            fillTask(){
                axios.get('/tasks')
                .then(res => {
                    // console.log(res)
                    this.tasks = res.data;
                })
                .catch(err => {
                    console.error(err);
                })
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
