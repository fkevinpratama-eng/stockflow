@echo off
cd /d "C:\laragon\www\stockflow"

start "StockFlow Server" cmd /k "php artisan serve --host=127.0.0.1 --port=8000"

timeout /t 3 /nobreak >nul

start "" "C:\Program Files\Google\Chrome\Application\chrome.exe" --app="http://127.0.0.1:8000"

exit