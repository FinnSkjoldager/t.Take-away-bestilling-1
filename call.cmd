echo on
rem "./c"
rem d:
rem cd D:\Virksomhedsgruppen_2\frontend
rem --build-optimizer --cross-origin --optimization
rem npm run build --prod
rem call ng build --output-hashing=all
rem call ng build
rem call copy dist\assets C:\xampp1\htdocs\public\assets
rem call copy dist\assets C:\xampp1\htdocs\public\assets
rem call copy dist C:\xampp\htdocs\public
rem c:
rem cd C:\xampp\htdocs
rem call copy app\index.php public\index.php
rem call copy app\.htaccess public\.htaccess
rem call xcopy . C:\xampp\htdocs /e /i /x /ocall 
call xcopy . C:\xampp\htdocs /e /i /y