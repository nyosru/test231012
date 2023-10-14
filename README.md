test231012
#  задание

Необходимо попробовать максимально задействовать возможности фреймворка по канонам паттерна MVC.

Есть сущность "Событие" с полями title, place, date, period, period_type

Необходимо описать роутер и контроллер который:

1. Принимает только поля 
 

    title(varchar название мероприятия)
    place(varchar место проведения мероприятия)
    date(date дата проведения мероприятия)

2. Создает сущность "Событие" через модель Event

   3. Поля 

       + period(signed int период от/до события) 
       + period_type(char день/месяц/год) заполняются в зависимости от пришеднего в контроллер 
       + date(date дата проведения мероприятия).
   
      Если дата проведения мероприятия в прошлом (мероприятие прошло) 
      
        + тогда period >= 0, 
        + в противном случае period < 0 (событие в будущем).
      
      Если до даты события
   
        + меньше месяца, то это дни. 
        + Если меньше года, то месяцы.
   
       Пример:

       событие было 2 года, 3 месяца, 2 дня назад  
       - в таком случае
       period = 2, period_type = год. 
       Или событие через 13 дней 
       period = 13, period_type = день

4. Созданную и сохраненную сущность отправить в 5ти минутный кеш и в очередь
   Обработчик очереди делать не нужно.    БД создавать и подключать тоже.
   Работоспособность кода не важна, главное - способ реализации.

5. Запросом из роута нужно выгрузить список сущностей и также задействовать кеш (если есть и не просрочился). 
   + Выгружается полями 
     + name (конкатенация title + place), 
     + дата проведения в формате (d.m.Y) 
     + и период в формате "через 13 день, было 2 год назад" (склонять не надо)

6. Необходимо учесть, что 

   + контроллер должен быть максимально "тонким" 
   + с минимальным вызовом вспомогательных сервисов вида $this->eventService->age()

#  что делал (порядок действий)
+ создание модели миграции контроллера 

    php artisan make:controller EventController

+ создал для валидации входящих данных реквест что будет проверять и допускать нужные поля


    php artisan make:request EventCreateRequest

+ роут для добавления POST /event
+ добавил исключение чтобы post запрос /event проходил без авторизации
+ создал обсервер (наблюдатель)


    php artisan make:observer EventCreateObserver


+ при сохранениимодели с датой ... привязал обсервер наблюдатель .. который из даты формирует период и тип периода ... и добавляет в сохраняемую модель

+ добавил свагер для удобного просмотра и возможности тестить

 
    /api/documentation#/

+ перенёс запросы в апи
  

    POST /api/event

+ добавил дебаг бар (готовил инструменты найти ошибку настройки сервера .. а она сама нашлась ))

+ сайт запущен на впс (для запуска использую сервер caddy) с CI/CD с гита при пуше .. домен https://test231012.php-cat.com/

# примечание 

в описании задачи нет варианта с разницей лет ... но в примере по данным есть ... добавил и разницу в годах
