<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Настройки системы</title>

    <!-- Подключение Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Подключение Font Awesome для иконок -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Подключение Custom CSS для дополнительных стилей -->
    <style>
        .setting-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .setting-card .card-header {
            background-color: #f7f7f7;
            font-weight: bold;
            color: #333;
        }

        .setting-card .form-label {
            font-weight: bold;
        }

        .setting-card .form-control {
            border-radius: 10px;
        }

        .btn-save {
            background-color: #007bff;
            color: white;
            border-radius: 20px;
            font-size: 16px;
            padding: 10px 20px;
        }

        .btn-save:hover {
            background-color: #0056b3;
        }

        .range-labels span {
            font-size: 12px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2 class="text-center mb-5">Настройки системы</h2>

            <!-- Настройки уведомлений -->
            <div class="card setting-card">
                <div class="card-header">
                    <h5 class="card-title">Уведомления</h5>
                </div>
                <div class="card-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="notificationsSwitch" checked>
                        <label class="form-check-label" for="notificationsSwitch">
                            Получать уведомления
                        </label>
                    </div>
                    <p class="mt-2 text-muted">Включить или отключить уведомления о событиях и обновлениях.</p>
                </div>
            </div>

            <!-- Выбор темы -->
            <div class="card setting-card">
                <div class="card-header">
                    <h5 class="card-title">Выбор темы</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="themeSelect" class="form-label">Выберите тему интерфейса</label>
                        <select class="form-select" id="themeSelect">
                            <option value="light">Светлая</option>
                            <option value="dark">Тёмная</option>
                            <option value="auto">Автоматическая</option>
                        </select>
                    </div>
                    <p class="text-muted">Выберите между светлой и тёмной темой для интерфейса.</p>
                </div>
            </div>

            <!-- Настройки звука -->
            <div class="card setting-card">
                <div class="card-header">
                    <h5 class="card-title">Звук уведомлений</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="soundLevel" class="form-label">Громкость уведомлений</label>
                        <input type="range" class="form-range" id="soundLevel" min="0" max="100" value="50">
                        <div class="range-labels d-flex justify-content-between">
                            <span>Тихо</span>
                            <span>Громко</span>
                        </div>
                    </div>
                    <p class="text-muted">Настройте громкость для звуковых уведомлений.</p>
                </div>
            </div>

            <!-- Кнопка сохранения настроек -->
            <div class="d-flex justify-content-center">
                <button class="btn btn-save" id="saveSettingsBtn">
                    <i class="fas fa-save"></i> Сохранить настройки
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Подключение Bootstrap 5 JS и jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Добавление интерактивности -->
<script>
    // Функции для обработки изменений настроек
    $('#notificationsSwitch').on('change', function() {
        const isChecked = $(this).prop('checked');
        alert(`Уведомления ${isChecked ? 'включены' : 'отключены'}`);
    });

    $('#themeSelect').on('change', function() {
        const theme = $(this).val();
        alert(`Выбрана тема: ${theme}`);
        // Можно добавить логику для динамической смены темы
    });

    $('#soundLevel').on('input', function() {
        const level = $(this).val();
        console.log(`Громкость: ${level}`);
        // Можно добавить логику для изменения громкости звуков
    });

    $('#saveSettingsBtn').on('click', function() {
        alert('Настройки успешно сохранены!');
    });
</script>
</body>
</html>
