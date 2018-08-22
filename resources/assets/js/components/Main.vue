<template>
    <div>
        <table class="table table-bordered">
            <tr v-for="code in codes">
                <td>{{ code.title }}</td>
                <td>{{ code.body }}</td>
            </tr>
        </table>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                codes: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/codes')
                .then(function (response) {
                    app.codes = response.data;
                })
                .catch(function (response) {
                    console.log(response);
                    alert('Нет кодов для загрузки');
                });
        },
        methods: {
            // @todo: добавить метод для загрузки нужного кода
            }
    }
</script>
