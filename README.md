# praktyki-fork

## Instrukcja uruchomienia projektu

Wymagania:

- docker
- docker-compose

Aby uruchomić projekt:

1. Skopiuj i wprowadź ewentualne zmiany w plikach konfiguracyjnych:
    - `.env.example` -> `.env`
    - `backend/.env.example` -> `backend/.env`
1. W terminalu w katalogu projektu uruchom komendę `docker-compose up -d`, która pobierze obrazy i uruchomi 4 kontenery:
    - `php`
    - `nginx`
    - `mariadb` (MySQL)
    - `node`
1. Dla backendu wykonaj dodatkowe komendy w kontenerze `php`:
    - `docker-compose exec php composer install` - instaluje potrzebne pakiety
    - `docker-compose exec php php artisan key:generate` - generuje unikalny klucz aplikacji
    - `docker-compose exec php php artisan migrate` - tworzy w bazie MySQL tabele
    - `docker-compose exec php php artisan db:seed` - dodaje do tabeli przykładowe rekordy
1. Po zakończeniu instalacji aplikacja powinna być dostępna na dwóch adresach:
    - http://localhost:8900 - frontend
    - http://localhost:8899 - backend
    - http://localhost:8898 - baza danych MariaDB

## Szczegóły dotyczące backendu

Dokumentacja Laravel: https://laravel.com/docs/8.x
Biblioteka do autoryzacji: https://laravel.com/docs/8.x/sanctum

