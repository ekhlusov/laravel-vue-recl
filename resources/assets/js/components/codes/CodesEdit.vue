<template>
    <div class="panel panel-default">
        <div class="panel-heading">Создание нового кода</div>
        <div class="panel-body">
            <form :onsubmit="saveCode()" >
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label class="control-label">Название</label>
                        <input type="text" v-model="code.title" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label class="control-label">Приоритет</label>
                        <input type="text" v-model="code.priority" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label class="control-label">Рекламный JS-код</label>
                        <editor v-model="code.body" @init="editorInit" lang="javascript" theme="monokai" width="500" height="100"></editor>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <button class="btn btn-default">Отмена</button>
                        <button class="btn btn-success">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</template>

<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.codeId = id;
            axios.get('/api/codes/' + id)
                .then(function (response) {
                    app.code = response.data;
                })
                .catch(function () {
                    alert('Не удалось загрузить рекламный код');
                });
        },
        data: function () {
            return {
                codeId: null,
                code: {
                    title: '',
                    priority: '',
                    body: '',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newCode = app.code;
                axios.patch('/api/codes/' + app.codeId, newCode)
                    .then(function (response) {
                        app.$router.replace('/');
                    })
                    .catch(function (response) {
                        console.log(response);
                        alert('Не удалось загрузить рекламный код');
                    });
            }
        }
    }
</script>
