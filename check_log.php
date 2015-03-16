<?php
  $elogin = strtolower(htmlspecialchars($_POST["elogin"])); // Получаем логин, преобразуем ряд спецсимволов и приводим строку к нижнему регистру
 $mysqli = new mysqli("localhost", "root", "", "notum"); // Подключаемся к базе данных
  $query = "SELECT `ID_pat` FROM `patient` WHERE `Mail`='".$mysqli->real_escape_string($elogin)."'"; // Формируем запрос на поиск пользователя с полученным логином
  $result_set = $mysqli->query($query); // Отправляем запрос
  echo $result_set->num_rows != 0; // Если ничего не найдено, то выводим false, иначе true
?>