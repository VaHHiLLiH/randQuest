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
