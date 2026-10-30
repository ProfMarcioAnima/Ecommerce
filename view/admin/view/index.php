<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $logado = isset($_SESSION['logado']) && $_SESSION['logado'] == true;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Loja Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top py-3 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="index.php">
                <i class="fas fa-lock text-warning me-2"></i>PAINEL ADMINISTRATIVO
            </a>
            <div class="d-flex align-items-center">
                <?php if ($logado) { ?>
                    <span class="text-light me-3"><i class="fas fa-user-shield me-1"></i> Admin</span>
                    <a href="#" onclick="confirmSair()" class="btn btn-danger btn-sm"><i class="fas fa-sign-out-alt me-1"></i> Sair</a>
                <?php } ?>
            </div>
        </div>
    </nav>

    <div class="container my-5 flex-grow-1">
        <?php if (!$logado) { ?>
            <div class="row justify-content-center align-items-center" style="min-height: 50vh;">
                <div class="col-md-5">
                    <div class="card shadow border-0">
                        <div class="card-body p-4">
                            <h3 class="text-center fw-bold mb-4"><i class="fas fa-lock text-warning me-2"></i>Login Administrativo</h3>
                            <form method="post" action="../controller/usuarioController.php?action=loginAdmin">
                                <div class="mb-3">
                                    <label class="form-label">Usuário</label>
                                    <input type="text" name="login" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Senha</label>
                                    <input type="password" name="senha" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-dark w-100 fw-semibold py-2">
                                    <i class="fas fa-sign-in-alt me-1"></i> Entrar no Painel
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="fw-bold">Gerenciamento do Sistema</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 bg-light">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-box-open fa-3x text-primary mb-3"></i>
                            <h5 class="fw-bold">Gerenciar Produtos</h5>
                            <p class="text-muted small">Adicionar, editar ou remover produtos do catálogo.</p>
                            <a href="produtos.php" class="btn btn-primary btn-sm w-100 fw-semibold">Acessar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 bg-light">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-shopping-bag fa-3x text-success mb-3"></i>
                            <h5 class="fw-bold">Visualizar Vendas</h5>
                            <p class="text-muted small">Acompanhar pedidos e vendas realizadas na loja.</p>
                            <a href="vendas.php" class="btn btn-success btn-sm w-100 fw-semibold">Acessar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 bg-light">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-users fa-3x text-info mb-3"></i>
                            <h5 class="fw-bold">Gerenciar Usuários</h5>
                            <p class="text-muted small">Controlar contas de clientes e administradores.</p>
                            <a href="usuarios.php" class="btn btn-info btn-sm w-100 fw-semibold">Acessar</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <footer class="bg-black text-white py-2 mt-auto border-top border-secondary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <p class="small mb-0 text-white-50"><i class="fas fa-lock text-warning me-1"></i> &copy; <?php echo date('Y'); ?> Painel Administrativo. Todos os direitos reservados.</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="../../index.php" id="acesso_site" class="text-decoration-none text-white-50 small">
                        <i class="fas fa-store me-1"></i> Acesso ao Site
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function confirmSair() {
            Swal.fire({
                title: "DESLOGAR!",
                text: "VOCÊ TEM CERTEZA?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#060",
                cancelButtonColor: "#aaa",
                cancelButtonText: "Não Deslogar!",
                confirmButtonText: "Deslogar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `../controller/usuarioController.php?action=sair`;
                }
            });
        }
    </script>
</body>
</html>