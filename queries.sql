
--Вставка значений в таблицу users
INSERT INTO users (email, name, password) VALUES
("logvinovich.ira@gmail.com", "Ирина", "12345"),
("ruirchik@mail.ru", "Алексей", "qwerty");
--Вставка значений в таблицу projects
INSERT INTO projects (name, user_id) VALUES
("Входящие", 1),
("Учеба", 1),
("Работа", 1),
("Домашние дела", 1),
("Авто", 1);
--Вставка значений в таблицу tasks
INSERT INTO tasks (execution_date, status, name, user_id, project_id) VALUES
(null, 0, "Заказать пиццу", 1, 4),
(null, 0, "Купить корм для кота", 1, 4),
('2019.12.22 00:00:00', 0, "Встреча с другом", 1, 1),
('2019.02.26 00:00:00', 0, "Собеседование в IT компании", 1, 3),
('2019.03.25 00:00:00', 0, "Выполнить тестовое задание", 1, 3),
('2019.12.21 00:00:00', 1, "Сделать задание первого раздела", 1, 2);
--получить список из всех проектов для одного пользователя;
SELECT name FROM projects WHERE user_id = 1;
--получить список из всех задач для одного проекта;
SELECT name FROM tasks WHERE project_id = 3;
--пометить задачу как выполненную;
UPDATE tasks SET status = 1 WHERE task_id = 1;
--обновить название задачи по её идентификатору.
UPDATE tasks SET name = "Собеседование в другой компании" WHERE task_id = 4;

