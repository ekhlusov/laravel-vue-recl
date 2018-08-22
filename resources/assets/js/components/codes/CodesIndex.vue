<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'createCode'}" class="btn btn-success">Добавить</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Список рекламных кодов</div>
            <div class="panel-body">
                <div class="row" v-for="code, index in codes">
                    {{ code.priority }}
                    {{ code.title }}
                    <router-link :to="{name: 'editCode', params: {id: code.id}}" class="btn btn-primary">Редактировать
                    </router-link>
                    <button :@click="deleteCode(code.id, index)" class="btn btn-danger">Удалить</button>
                </div>
            </div>
        </div>
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
            deleteCode(id, index) {
                if (confirm('Вы действительно хотите удалить рекламный код?')) {
                    var app = this;
                    axios.delete('/api/codes' + id)
                        .then(function () {
                            app.codes.splice(index, 1);
                        })
                        .catch(function () {
                            alert('Не удалось удалить код');
                        });
                }
            }
        }
    }
</script>
