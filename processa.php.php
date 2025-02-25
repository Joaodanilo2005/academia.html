<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST["nome"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $mensagem = htmlspecialchars($_POST["mensagem"]);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = "seuemail@example.com";
        $subject = "Nova mensagem do site";
        $body = "Nome: $nome\nEmail: $email\nMensagem:\n$mensagem";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            echo "Mensagem enviada com sucesso!";
        } else {
            echo "Erro ao enviar a mensagem.";
        }
    } else {
        echo "Email inválido.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
