#!/bin/bash
php artisan migrate --force --seed
php artisan followAdmin
