<?
/**
 * Двухфакторная авторизация - вариант реализации
 * 
 * 1. Пользователь начинает авторизацию (вводит свои реквизиты)
 * 2. Записать во отдельную таблицу (очищаемую по таймауту) его результат первой авторизации
 * 3. После подтверждения вторым способом выполнять фактическую авторизацию (выдавать права)
 * 
 */