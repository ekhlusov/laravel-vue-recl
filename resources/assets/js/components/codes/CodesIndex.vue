<template>
    <div>
        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-sm title">
                        <h1>Список рекламных кодов</h1>
                    </div>
                    <div class="col-sm btn-add-block">
                        <router-link :to="{name: 'createCode'}" class="btn btn-success btn-add">Добавить</router-link>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-codes">
                    <tbody>
                    <tr v-for="code, index in codes" class="shadow-sm">
                       <td class="priority">{{ code.priority }}</td>
                       <td class="title">{{ code.title }}</td>
                       <td class="actions">
                           <router-link :to="{name: 'editCode', params: {id: code.id}}" class="actions__action-edit">Редактировать</router-link>
                           <a @click="deleteCode(code.id, index)" class="actions__action-delete">Удалить</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
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
                    axios.delete('/api/codes/' + id)
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
