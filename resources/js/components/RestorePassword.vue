<template>
    <form method="POST" action="{{ route('restorePassword') }}">
        @csrf
        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">Почта</label>

            <div class="col-md-6">
                <input id="email" type="text" class="form-control" name="email">
            </div>
        </div>
    </form>
    <form method="POST" action="{{ route('confirmCode') }}">
        @csrf
        <div class="row mb-3">
            <label for="code" class="col-md-4 col-form-label text-md-end">Введите код из электронного письма</label>

            <div class="col-md-6">
                <input id="code" type="text" class="form-control" name="code">
            </div>
        </div>
    </form>
    <form method="POST" action="{{ route('setNewPass') }}">
        @csrf
        <div class="row mb-3">
            <label for="newPass" class="col-md-4 col-form-label text-md-end">Новый пароль</label>

            <div class="col-md-6">
                <input id="newPass" type="text" class="form-control" name="newPass">
            </div>

            <label for="confirmNewPass" class="col-md-4 col-form-label text-md-end">Подтвердите новый пароль</label>

            <div class="col-md-6">
                <input id="confirmNewPass" type="text" class="form-control" name="confirmNewPass">
            </div>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {

        }
    },
    props: {
        name: {
            type: String,
            require: true,
        }
    }
}
</script>

<style scoped>

</style>
