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
                        <textarea v-model="code.body" class="form-control"></textarea>
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
        data: function () {
            return {
                code: {
                    title: '',
                    priority: 1,
                    body: ''
                }
            }
        },
        methods: {
            saveCode() {
                event.preventDefault();
                var app = this;
                var newCode = app.code;
                axios.post('/api/codes', newCode)
                    .then(function (response) {
                        app.$router.push({path: '/'});
                    })
                    .catch(function (response) {
                        console.log(response);
                        alert('Не удалось добавить запись');
                    });
            }
        }
    }
</script>
