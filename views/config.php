<?php
session_start();

// Fonction pour lire la configuration
function getConfig() {
    $configFile = __DIR__ . '/../settings.json';
    return json_decode(file_get_contents($configFile), true);
}

// Fonction pour sauvegarder la configuration
function saveConfig($config) {
    $configFile = __DIR__ . '/../settings.json';
    file_put_contents($configFile, json_encode($config, JSON_PRETTY_PRINT));
}

$error = '';
$success = '';
$config = getConfig();
$isLoggedIn = isset($_SESSION['config_authenticated']) && $_SESSION['config_authenticated'] === true;

// Gestion de la connexion
if (isset($_POST['password'])) {
    if ($_POST['password'] === $config['password']) {
        $_SESSION['config_authenticated'] = true;
        $isLoggedIn = true;
    } else {
        $error = "Mot de passe incorrect";
    }
}

// Gestion de la déconnexion
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: /');
    exit();
}

// Mise à jour de la configuration
if ($isLoggedIn && isset($_POST['updateConfig'])) {
    $config['vacances'] = isset($_POST['vacances']);
    saveConfig($config);
    $success = "Configuration mise à jour avec succès";
}

require "./components/hero.php" ?>

<section class="config padding margin-first">
    <div class="max-width config-container">
        <h2>Configuration du site</h2>

        <?php if (!$isLoggedIn): ?>
        <form method="POST" class="config-form">
            <?php if ($error): ?>
                <div class="form-error"><?php echo $error; ?></div>
            <?php endif; ?>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="cta">Se connecter</button>
        </form>
        <?php else: ?>
        <form method="POST" class="config-form">
            <?php if ($success): ?>
                <div class="form-feedback"><?php echo $success; ?></div>
            <?php endif; ?>
            <div class="config-option">
                <label for="vacances">Mode vacances</label>
                <label class="switch">
                    <input type="checkbox" id="vacances" name="vacances" <?php echo $config['vacances'] ? 'checked' : ''; ?>>
                    <span class="slider round"></span>
                </label>
            </div>
            <input type="hidden" name="updateConfig" value="1">
            <div class="config-buttons">
                <button type="submit" class="cta">Sauvegarder</button>
                <a href="?logout" class="cta config-logout">Se déconnecter</a>
            </div>
        </form>
        <?php endif; ?>
    </div>
</section>