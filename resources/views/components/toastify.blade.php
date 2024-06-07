<script>
    @if ($errors->any())
        Toastify({
            close: true,
            text: '{{ implode(' ', $errors->all()) }}',
            duration: 5000,
            style: {
                background: "#ff0000",
            },
        }).showToast();
    @endif
</script>
