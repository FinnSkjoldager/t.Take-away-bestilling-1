echo on
rem "./ca"
rem d:
cd frontend_angular
rem --build-optimizer --cross-origin --optimization
rem npm run build --prod
call ng build --output-hashing=all
rem call ng build
call copy dist\Angular7\assets C:\xampp\htdocs\public\assets
call copy dist\Angular7\assets\img C:\xampp\htdocs\public\assets\img
call copy dist\Angular7 C:\xampp\htdocs\public 
rem c:
rem cd C:\xampp\htdocs
rem call copy app\index.php public\index.php
rem call copy app\.htaccess public\.htaccess
rem call xcopy . C:\xampp\htdocs /e /i /x /o