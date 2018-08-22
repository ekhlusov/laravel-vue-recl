<template>
    <div class="card">
        <div class="card-header title"><h1>Редактирование кода</h1></div>
        <div class="card-body">
            <form v-on:submit="saveCode()" >
                <div class="row">
                    <div class="col-md-10 form-group">
                        <label class="control-label">Название</label>
                        <input type="text" v-model="code.title" class="form-control">
                    </div>
                    <div class="col-md form-group">
                        <label class="control-label">Приоритет</label>
                        <select v-model="code.priority" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md form-group">
                        <label class="control-label">Рекламный JS-код</label>
                        <editor v-model="code.body" @init="editorInit" lang="javascript" theme="monokai" width="100%" height="500"></editor>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md form-group" style="text-align: right;">
                        <a class="btn btn-default" href="/">Отмена</a>
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
            saveCode() {
                event.preventDefault();
                var app = this;
                var newCode = app.code;
                axios.patch('/api/codes/' + app.codeId, newCode)
                    .then(function () {
                        app.$router.replace('/');
                    })
                    .catch(function (response) {
                        console.log(response);
                        alert('Не удалось загрузить рекламный код');
                    });
            },
            editorInit() {
                require('brace/ext/language_tools') //language extension prerequsite...
                require('brace/mode/javascript')    //language
                require('brace/theme/monokai')
            }
        },
        components: {
            editor: require('vue2-ace-editor'),
        }
    }
</script>
