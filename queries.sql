
--Вставка значений в таблицу users
INSERT INTO users
SET email = "Logvinovich.Ira@gmail.com", name = "Ирина", password = "12345";
INSERT INTO users
SET email = "ruirchik@mail.ru", name = "Алексей", password = "qwerty";
--Вставка значений в таблицу projects
INSERT INTO projects
SET name = "Входящие", user_id = 1;
INSERT INTO projects
SET name = "Учеба", user_id = 1;
INSERT INTO projects
SET name = "Работа", user_id = 1;
INSERT INTO projects
SET name = "Домашние дела", user_id = 1;
INSERT INTO projects
SET name = "Авто", user_id = 1;
--Вставка значений в таблицу tasks
INSERT INTO tasks
SET name = "Заказать пиццу", user_id = 1, project_id = 4 ;
INSERT INTO tasks
SET name = "Купить корм для кота", user_id = 1, project_id = 4 ;
INSERT INTO tasks
SET execution_date = "22.12.2019 00:00:00", name = "Встреча с другом", user_id = 1, project_id = 1 ;
INSERT INTO tasks
SET execution_date = "26.02.2019 00:00:00", name = "Собеседование в IT компании", user_id = 1, project_id = 3 ;
INSERT INTO tasks
SET execution_date = "25.03.2019 00:00:00", name = "Выполнить тестовое задание", user_id = 1, project_id = 3 ;
INSERT INTO tasks
SET execution_date = "21.12.2019 00:00:00", status = 1, name = "Сделать задание первого раздела", user_id = 1, project_id = 2 ;

--получить список из всех проектов для одного пользователя;
SELECT name FROM projects WHERE user_id = 1;
--получить список из всех задач для одного проекта;
SELECT name FROM tasks WHERE project_id = 3;
--пометить задачу как выполненную;
UPDATE tasks SET status = 1 WHERE task_id = 1;
--обновить название задачи по её идентификатору.
UPDATE tasks SET name = "Собеседование в другой компании" WHERE task_id = 4;

