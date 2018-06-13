<template>
    <table class="table table-borderless table-sm table-hover">
        <thead>
        <tr>
            <th scope="col">Tarea</th>
            <th scope="col">Estado</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="task in tasks">
            <td>
                <a :href="'tasks/' + task.id">{{ task.name }}</a>
            </td>
            <td><input type="checkbox" :checked="task.success"></td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                tasks: []
            }
        },
        mounted: function () {
            axios.get('/api/v1/tasks', {
                params: {
                    userId: this.user
                }
            }).then(response => {
                    this.tasks = response.data;
            });
        }
    }
</script>