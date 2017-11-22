# flash_cards
An web &amp; mobile app based on flash cards for learning languages (Laravel framework)

Convert mysql database to sqlite3:

mysqldump --compact --add-drop-table --default-character-set=utf8 --skip-extended-insert -h127.0.0.1 -u<USER> -p<PASS> flash_cards > ./database/dumps/flash_cards.sql
./database/mysql2sqlite ./database/dumps/flash_cards.sql | sqlite3 ./database/dumps/flash_cards.db

