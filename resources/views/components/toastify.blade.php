<script>
    @if (session('notif'))
        {!! 'show("#22bb33", "'.session('notif').'");' !!}
    @endif

    @if ($errors->any())
        {!! 'show("#ff0000", "'.implode(' ', $errors->all()).'");' !!}
    @endif

    function show(bgColor, message, duration = 5000){
        Toastify({
            close: true,
            text: message,
            duration: duration,
            style: {
                background: bgColor,
            },
        }).showToast();
    }
</script>
