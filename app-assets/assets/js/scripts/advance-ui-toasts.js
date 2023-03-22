/*
 * Toasts - Advanced UI 
 */

// Basic Toast

$('.toast-basic').on('click', function () {
    M.toast({
        html: 'I am a toast!'
    })
})

// Custom Toast

$('.toast-custom').on('click', function () {
    var toastHTML = '<span>I am toast content</span><button class="btn-flat toast-action">Undo</button>';
    M.toast({
        html: toastHTML
    });
});

// Toast With Callback 

$('.toast-callback').on('click', function () {
    M.toast({
        html: 'I am a toast',
        completeCallback: function () {
            alert('Your toast was dismissed')
        }
    })
});

$('.toast-rounded').on('click', function () {
    M.toast({
        html: 'I am a toast!',
        classes: 'rounded'
    });
})