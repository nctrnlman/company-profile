<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php
// reCAPTCHA key
$recaptchaSecretKey = '6LdnLwYoAAAAAM0oA32qzK-lSACMIOgd2S-qfyBL';

// Verify the reCAPTCHA response
$recaptchaResponse = $_POST['g-recaptcha-response'];

$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = [
    'secret'   => $recaptchaSecretKey,
    'response' => $recaptchaResponse,
];

$options = [
    'http' => [
        'header' => 'Content-type: application/x-www-form-urlencoded',
        'method' => 'POST',
        'content' => http_build_query($data),
    ],
];

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$recaptchaResult = json_decode($result);

if ($recaptchaResult->success) {
    // reCAPTCHA verification succeeded, return a success response
    echo json_encode(['success' => true]);
} else {
    // reCAPTCHA verification failed, return an error response
    echo json_encode(['success' => false, 'error' => 'reCAPTCHA verification failed.']);
}
?>
<script>
$(document).ready(function () {
    $('form').on('submit', function (event) {
        event.preventDefault();
        var $form = $(this);
        var formData = $form.serialize();

        // Verify reCAPTCHA using AJAX
        $.ajax({
            type: 'POST',
            url: 'recaptcha_verify.php',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // reCAPTCHA verification succeeded, continue with form submission
                    $form.submit();
                } else {
                    // reCAPTCHA verification failed, display an error message
                    alert('reCAPTCHA verification failed. Please try again.');
                }
            },
        });
    });
});
</script>
